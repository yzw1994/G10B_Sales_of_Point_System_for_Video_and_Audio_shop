<?PHP


require_once 'Net/SMTP.php';

class Mail_smtpmx extends Mail {


    var $_smtp = null;


    var $port = 25;


    var $mailname = 'localhost';


    var $timeout = 10;


    var $withNetDns = true;


    var $resolver;


    var $verp = false;


    var $vrfy = false;


    var $test = false;


    var $debug = false;


    var $errorCode = array(
        'not_connected' => array(
            'code'  => 1,
            'msg'   => 'Could not connect to any mail server ({HOST}) at port {PORT} to send mail to {RCPT}.'
        ),
        'failed_vrfy_rcpt' => array(
            'code'  => 2,
            'msg'   => 'Recipient "{RCPT}" could not be veryfied.'
        ),
        'failed_set_from' => array(
            'code'  => 3,
            'msg'   => 'Failed to set sender: {FROM}.'
        ),
        'failed_set_rcpt' => array(
            'code'  => 4,
            'msg'   => 'Failed to set recipient: {RCPT}.'
        ),
        'failed_send_data' => array(
            'code'  => 5,
            'msg'   => 'Failed to send mail to: {RCPT}.'
        ),
        'no_from' => array(
            'code'  => 5,
            'msg'   => 'No from address has be provided.'
        ),
        'send_data' => array(
            'code'  => 7,
            'msg'   => 'Failed to create Net_SMTP object.'
        ),
        'no_mx' => array(
            'code'  => 8,
            'msg'   => 'No MX-record for {RCPT} found.'
        ),
        'no_resolver' => array(
            'code'  => 9,
            'msg'   => 'Could not start resolver! Install PEAR:Net_DNS or switch off "netdns"'
        ),
        'failed_rset' => array(
            'code'  => 10,
            'msg'   => 'RSET command failed, SMTP-connection corrupt.'
        ),
    );

    function __construct($params)
    {
        if (isset($params['mailname'])) {
            $this->mailname = $params['mailname'];
        } else {
            // try to find a valid mailname
            if (function_exists('posix_uname')) {
                $uname = posix_uname();
                $this->mailname = $uname['nodename'];
            }
        }

        // port number
        if (isset($params['port'])) {
            $this->_port = $params['port'];
        } else {
            $this->_port = getservbyname('smtp', 'tcp');
        }

        if (isset($params['timeout'])) $this->timeout = $params['timeout'];
        if (isset($params['verp'])) $this->verp = $params['verp'];
        if (isset($params['test'])) $this->test = $params['test'];
        if (isset($params['peardebug'])) $this->test = $params['peardebug'];
        if (isset($params['netdns'])) $this->withNetDns = $params['netdns'];
    }


    function Mail_smtpmx($params)
    {
        $this->__construct($params);
        register_shutdown_function(array(&$this, '__destruct'));
    }


    function __destruct()
    {
        if (is_object($this->_smtp)) {
            $this->_smtp->disconnect();
            $this->_smtp = null;
        }
    }


    function send($recipients, $headers, $body)
    {
        if (!is_array($headers)) {
            return PEAR::raiseError('$headers must be an array');
        }

        $result = $this->_sanitizeHeaders($headers);
        if (is_a($result, 'PEAR_Error')) {
            return $result;
        }

        // Prepare headers
        $headerElements = $this->prepareHeaders($headers);
        if (is_a($headerElements, 'PEAR_Error')) {
            return $headerElements;
        }
        list($from, $textHeaders) = $headerElements;

        // use 'Return-Path' if possible
        if (!empty($headers['Return-Path'])) {
            $from = $headers['Return-Path'];
        }
        if (!isset($from)) {
            return $this->_raiseError('no_from');
        }

        // Prepare recipients
        $recipients = $this->parseRecipients($recipients);
        if (is_a($recipients, 'PEAR_Error')) {
            return $recipients;
        }

        foreach ($recipients as $rcpt) {
            list($user, $host) = explode('@', $rcpt);

            $mx = $this->_getMx($host);
            if (is_a($mx, 'PEAR_Error')) {
                return $mx;
            }

            if (empty($mx)) {
                $info = array('rcpt' => $rcpt);
                return $this->_raiseError('no_mx', $info);
            }

            $connected = false;
            foreach ($mx as $mserver => $mpriority) {
                $this->_smtp = new Net_SMTP($mserver, $this->port, $this->mailname);

                // configure the SMTP connection.
                if ($this->debug) {
                    $this->_smtp->setDebug(true);
                }

                // attempt to connect to the configured SMTP server.
                $res = $this->_smtp->connect($this->timeout);
                if (is_a($res, 'PEAR_Error')) {
                    $this->_smtp = null;
                    continue;
                }

                // connection established
                if ($res) {
                    $connected = true;
                    break;
                }
            }

            if (!$connected) {
                $info = array(
                    'host' => implode(', ', array_keys($mx)),
                    'port' => $this->port,
                    'rcpt' => $rcpt,
                );
                return $this->_raiseError('not_connected', $info);
            }

            // Verify recipient
            if ($this->vrfy) {
                $res = $this->_smtp->vrfy($rcpt);
                if (is_a($res, 'PEAR_Error')) {
                    $info = array('rcpt' => $rcpt);
                    return $this->_raiseError('failed_vrfy_rcpt', $info);
                }
            }

            // mail from:
            $args['verp'] = $this->verp;
            $res = $this->_smtp->mailFrom($from, $args);
            if (is_a($res, 'PEAR_Error')) {
                $info = array('from' => $from);
                return $this->_raiseError('failed_set_from', $info);
            }

            // rcpt to:
            $res = $this->_smtp->rcptTo($rcpt);
            if (is_a($res, 'PEAR_Error')) {
                $info = array('rcpt' => $rcpt);
                return $this->_raiseError('failed_set_rcpt', $info);
            }

            // Don't send anything in test mode
            if ($this->test) {
                $result = $this->_smtp->rset();
                $res = $this->_smtp->rset();
                if (is_a($res, 'PEAR_Error')) {
                    return $this->_raiseError('failed_rset');
                }

                $this->_smtp->disconnect();
                $this->_smtp = null;
                return true;
            }

            // Send data
            $res = $this->_smtp->data("$textHeaders\r\n$body");
            if (is_a($res, 'PEAR_Error')) {
                $info = array('rcpt' => $rcpt);
                return $this->_raiseError('failed_send_data', $info);
            }

            $this->_smtp->disconnect();
            $this->_smtp = null;
        }

        return true;
    }


    function _getMx($host)
    {
        $mx = array();

        if ($this->withNetDns) {
            $res = $this->_loadNetDns();
            if (is_a($res, 'PEAR_Error')) {
                return $res;
            }

            $response = $this->resolver->query($host, 'MX');
            if (!$response) {
                return false;
            }

            foreach ($response->answer as $rr) {
                if ($rr->type == 'MX') {
                    $mx[$rr->exchange] = $rr->preference;
                }
            }
        } else {
            $mxHost = array();
            $mxWeight = array();

            if (!getmxrr($host, $mxHost, $mxWeight)) {
                return false;
            }
            for ($i = 0; $i < count($mxHost); ++$i) {
                $mx[$mxHost[$i]] = $mxWeight[$i];
            }
        }

        asort($mx);
        return $mx;
    }


    function _loadNetDns()
    {
        if (is_object($this->resolver)) {
            return true;
        }

        if (!include_once 'Net/DNS.php') {
            return $this->_raiseError('no_resolver');
        }

        $this->resolver = new Net_DNS_Resolver();
        if ($this->debug) {
            $this->resolver->test = 1;
        }

        return true;
    }

  
    function _raiseError($id, $info = array())
    {
        $code = $this->errorCode[$id]['code'];
        $msg = $this->errorCode[$id]['msg'];

        // include info to messages
        if (!empty($info)) {
            $search = array();
            $replace = array();

            foreach ($info as $key => $value) {
                array_push($search, '{' . strtoupper($key) . '}');
                array_push($replace, $value);
            }

            $msg = str_replace($search, $replace, $msg);
        }

        return PEAR::raiseError($msg, $code);
    }

}
