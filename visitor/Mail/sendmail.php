<?php

class Mail_sendmail extends Mail {


    var $sendmail_path = '/usr/sbin/sendmail';


    var $sendmail_args = '-i';


    function Mail_sendmail($params)
    {
        if (isset($params['sendmail_path'])) {
            $this->sendmail_path = $params['sendmail_path'];
        }
        if (isset($params['sendmail_args'])) {
            $this->sendmail_args = $params['sendmail_args'];
        }


        if (defined('PHP_EOL')) {
            $this->sep = PHP_EOL;
        } else {
            $this->sep = (strpos(PHP_OS, 'WIN') === false) ? "\n" : "\r\n";
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

        $recipients = $this->parseRecipients($recipients);
        if (is_a($recipients, 'PEAR_Error')) {
            return $recipients;
        }
        $recipients = implode(' ', array_map('escapeshellarg', $recipients));

        $headerElements = $this->prepareHeaders($headers);
        if (is_a($headerElements, 'PEAR_Error')) {
            return $headerElements;
        }
        list($from, $text_headers) = $headerElements;


        if (!empty($headers['Return-Path'])) {
            $from = $headers['Return-Path'];
        }

        if (!isset($from)) {
            return PEAR::raiseError('No from address given.');
        } elseif (strpos($from, ' ') !== false ||
                  strpos($from, ';') !== false ||
                  strpos($from, '&') !== false ||
                  strpos($from, '`') !== false) {
            return PEAR::raiseError('From address specified with dangerous characters.');
        }

        $from = escapeshellarg($from); // Security bug #16200

        $mail = @popen($this->sendmail_path . (!empty($this->sendmail_args) ? ' ' . $this->sendmail_args : '') . " -f$from -- $recipients", 'w');
        if (!$mail) {
            return PEAR::raiseError('Failed to open sendmail [' . $this->sendmail_path . '] for execution.');
        }


        fputs($mail, $text_headers . $this->sep . $this->sep);

        fputs($mail, $body);
        $result = pclose($mail);
        if (version_compare(phpversion(), '4.2.3') == -1) {
          
            $result = $result >> 8 & 0xFF;
        }

        if ($result != 0) {
            return PEAR::raiseError('sendmail returned error code ' . $result,
                                    $result);
        }

        return true;
    }

}
