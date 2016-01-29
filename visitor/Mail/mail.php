<?php




class Mail_mail extends Mail {


    var $_params = '';


    function Mail_mail($params = null)
    {

        if (is_array($params)) {
            $this->_params = join(' ', $params);
        } else {
            $this->_params = $params;
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


        if (is_array($recipients)) {
            $recipients = implode(', ', $recipients);
        }


        $subject = '';
        if (isset($headers['Subject'])) {
            $subject = $headers['Subject'];
            unset($headers['Subject']);
        }


        unset($headers['To']);


        $headerElements = $this->prepareHeaders($headers);
        if (is_a($headerElements, 'PEAR_Error')) {
            return $headerElements;
        }
        list(, $text_headers) = $headerElements;


        if (empty($this->_params) || ini_get('safe_mode')) {
            $result = mail($recipients, $subject, $body, $text_headers);
        } else {
            $result = mail($recipients, $subject, $body, $text_headers,
                           $this->_params);
        }


        if ($result === false) {
            $result = PEAR::raiseError('mail() returned failure');
        }

        return $result;
    }

}
