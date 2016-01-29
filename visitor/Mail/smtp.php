<?php

define('PEAR_MAIL_SMTP_ERROR_CREATE', 10000);

/** Error: Failed to connect to SMTP server */
define('PEAR_MAIL_SMTP_ERROR_CONNECT', 10001);

/** Error: SMTP authentication failure */
define('PEAR_MAIL_SMTP_ERROR_AUTH', 10002);

/** Error: No From: address has been provided */
define('PEAR_MAIL_SMTP_ERROR_FROM', 10003);

/** Error: Failed to set sender */
define('PEAR_MAIL_SMTP_ERROR_SENDER', 10004);

/** Error: Failed to add recipient */
define('PEAR_MAIL_SMTP_ERROR_RECIPIENT', 10005);

/** Error: Failed to send data */
define('PEAR_MAIL_SMTP_ERROR_DATA', 10006);

class Mail_smtp extends Mail {


    var $_smtp = null;


    var $_extparams = array();


    var $host = 'localhost';


    var $port = 25;


    var $auth = false;

    /**
     * The username to use if the SMTP server requires authentication.
     * @var string
     */
    var $username = '';

    /**
     * The password to use if the SMTP server requires authentication.
     * @var string
     */
    var $password = '';


    var $localhost = 'localhost';


    var $timeout = null;

    /**
     * Turn on Net_SMTP debugging?
     *
     * @var boolean $debug
     */
    var $debug = false;


    var $persist = false;


    var $pipelining;


    function Mail_smtp($params)
    {
        if (isset($params['host'])) $this->host = $params['host'];
        if (isset($params['port'])) $this->port = $params['port'];
        if (isset($params['auth'])) $this->auth = $params['auth'];
        if (isset($params['username'])) $this->username = $params['username'];
        if (isset($params['password'])) $this->password = $params['password'];
        if (isset($params['localhost'])) $this->localhost = $params['localhost'];
        if (isset($params['timeout'])) $this->timeout = $params['timeout'];
        if (isset($params['debug'])) $this->debug = (bool)$params['debug'];
        if (isset($params['persist'])) $this->persist = (bool)$params['persist'];
        if (isset($params['pipelining'])) $this->pipelining = (bool)$params['pipelining'];

        // Deprecated options
        if (isset($params['verp'])) {
            $this->addServiceExtensionParameter('XVERP', is_bool($params['verp']) ? null : $params['verp']);
        }

        register_shutdown_function(array(&$this, '_Mail_smtp'));
    }


    function _Mail_smtp()
    {
        $this->disconnect();
    }


    function send($recipients, $headers, $body)
    {
        /* If we don't already have an SMTP object, create one. */
        $result = &$this->getSMTPObject();
        if (PEAR::isError($result)) {
            return $result;
        }

        if (!is_array($headers)) {
            return PEAR::raiseError('$headers must be an array');
        }

        $this->_sanitizeHeaders($headers);

        $headerElements = $this->prepareHeaders($headers);
        if (is_a($headerElements, 'PEAR_Error')) {
            $this->_smtp->rset();
            return $headerElements;
        }
        list($from, $textHeaders) = $headerElements;

        /* Since few MTAs are going to allow this header to be forged
         * unless it's in the MAIL FROM: exchange, we'll use
         * Return-Path instead of From: if it's set. */
        if (!empty($headers['Return-Path'])) {
            $from = $headers['Return-Path'];
        }

        if (!isset($from)) {
            $this->_smtp->rset();
            return PEAR::raiseError('No From: address has been provided',
                                    PEAR_MAIL_SMTP_ERROR_FROM);
        }

        $params = null;
        if (!empty($this->_extparams)) {
            foreach ($this->_extparams as $key => $val) {
                $params .= ' ' . $key . (is_null($val) ? '' : '=' . $val);
            }
        }
        if (PEAR::isError($res = $this->_smtp->mailFrom($from, ltrim($params)))) {
            $error = $this->_error("Failed to set sender: $from", $res);
            $this->_smtp->rset();
            return PEAR::raiseError($error, PEAR_MAIL_SMTP_ERROR_SENDER);
        }

        $recipients = $this->parseRecipients($recipients);
        if (is_a($recipients, 'PEAR_Error')) {
            $this->_smtp->rset();
            return $recipients;
        }

        foreach ($recipients as $recipient) {
            $res = $this->_smtp->rcptTo($recipient);
            if (is_a($res, 'PEAR_Error')) {
                $error = $this->_error("Failed to add recipient: $recipient", $res);
                $this->_smtp->rset();
                return PEAR::raiseError($error, PEAR_MAIL_SMTP_ERROR_RECIPIENT);
            }
        }

        /* Send the message's headers and the body as SMTP data. */
        $res = $this->_smtp->data($textHeaders . "\r\n\r\n" . $body);
		list(,$args) = $this->_smtp->getResponse();

		if (preg_match("/Ok: queued as (.*)/", $args, $queued)) {
			$this->queued_as = $queued[1];
		}

		/* we need the greeting; from it we can extract the authorative name of the mail server we've really connected to.
		 * ideal if we're connecting to a round-robin of relay servers and need to track which exact one took the email */
		$this->greeting = $this->_smtp->getGreeting();

        if (is_a($res, 'PEAR_Error')) {
            $error = $this->_error('Failed to send data', $res);
            $this->_smtp->rset();
            return PEAR::raiseError($error, PEAR_MAIL_SMTP_ERROR_DATA);
        }

        /* If persistent connections are disabled, destroy our SMTP object. */
        if ($this->persist === false) {
            $this->disconnect();
        }

        return true;
    }

    function &getSMTPObject()
    {
        if (is_object($this->_smtp) !== false) {
            return $this->_smtp;
        }

        include_once 'Net/SMTP.php';
        $this->_smtp = &new Net_SMTP($this->host,
                                     $this->port,
                                     $this->localhost);

        /* If we still don't have an SMTP object at this point, fail. */
        if (is_object($this->_smtp) === false) {
            return PEAR::raiseError('Failed to create a Net_SMTP object',
                                    PEAR_MAIL_SMTP_ERROR_CREATE);
        }

        /* Configure the SMTP connection. */
        if ($this->debug) {
            $this->_smtp->setDebug(true);
        }

        /* Attempt to connect to the configured SMTP server. */
        if (PEAR::isError($res = $this->_smtp->connect($this->timeout))) {
            $error = $this->_error('Failed to connect to ' .
                                   $this->host . ':' . $this->port,
                                   $res);
            return PEAR::raiseError($error, PEAR_MAIL_SMTP_ERROR_CONNECT);
        }

        /* Attempt to authenticate if authentication has been enabled. */
        if ($this->auth) {
            $method = is_string($this->auth) ? $this->auth : '';

            if (PEAR::isError($res = $this->_smtp->auth($this->username,
                                                        $this->password,
                                                        $method))) {
                $error = $this->_error("$method authentication failure",
                                       $res);
                $this->_smtp->rset();
                return PEAR::raiseError($error, PEAR_MAIL_SMTP_ERROR_AUTH);
            }
        }

        return $this->_smtp;
    }


    function addServiceExtensionParameter($keyword, $value = null)
    {
        $this->_extparams[$keyword] = $value;
    }


    function disconnect()
    {
        /* If we have an SMTP object, disconnect and destroy it. */
        if (is_object($this->_smtp) && $this->_smtp->disconnect()) {
            $this->_smtp = null;
        }

        /* We are disconnected if we no longer have an SMTP object. */
        return ($this->_smtp === null);
    }

  
    function _error($text, &$error)
    {
        /* Split the SMTP response into a code and a response string. */
        list($code, $response) = $this->_smtp->getResponse();

        /* Build our standardized error string. */
        return $text
            . ' [SMTP: ' . $error->getMessage()
            . " (code: $code, response: $response)]";
    }

}
