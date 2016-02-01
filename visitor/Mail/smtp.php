<?php

define('PEAR_MAIL_SMTP_ERROR_CREATE', 10000);
define('PEAR_MAIL_SMTP_ERROR_CONNECT', 10001);
define('PEAR_MAIL_SMTP_ERROR_AUTH', 10002);
define('PEAR_MAIL_SMTP_ERROR_FROM', 10003);
define('PEAR_MAIL_SMTP_ERROR_SENDER', 10004);
define('PEAR_MAIL_SMTP_ERROR_RECIPIENT', 10005);
define('PEAR_MAIL_SMTP_ERROR_DATA', 10006);

class Mail_smtp extends Mail {


    var $_smtp = null;
    var $_extparams = array();
    var $host = 'localhost';
    var $port = 25;
    var $auth = false;
    var $username = '';
    var $password = '';
    var $localhost = 'localhost';
    var $timeout = null;
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


        $res = $this->_smtp->data($textHeaders . "\r\n\r\n" . $body);
		list(,$args) = $this->_smtp->getResponse();

		if (preg_match("/Ok: queued as (.*)/", $args, $queued)) {
			$this->queued_as = $queued[1];
		}


		$this->greeting = $this->_smtp->getGreeting();

        if (is_a($res, 'PEAR_Error')) {
            $error = $this->_error('Failed to send data', $res);
            $this->_smtp->rset();
            return PEAR::raiseError($error, PEAR_MAIL_SMTP_ERROR_DATA);
        }


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


        if (is_object($this->_smtp) === false) {
            return PEAR::raiseError('Failed to create a Net_SMTP object',
                                    PEAR_MAIL_SMTP_ERROR_CREATE);
        }


        if ($this->debug) {
            $this->_smtp->setDebug(true);
        }


        if (PEAR::isError($res = $this->_smtp->connect($this->timeout))) {
            $error = $this->_error('Failed to connect to ' .
                                   $this->host . ':' . $this->port,
                                   $res);
            return PEAR::raiseError($error, PEAR_MAIL_SMTP_ERROR_CONNECT);
        }


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

        if (is_object($this->_smtp) && $this->_smtp->disconnect()) {
            $this->_smtp = null;
        }


        return ($this->_smtp === null);
    }


    function _error($text, &$error)
    {

        list($code, $response) = $this->_smtp->getResponse();
        return $text
            . ' [SMTP: ' . $error->getMessage()
            . " (code: $code, response: $response)]";
    }

}
