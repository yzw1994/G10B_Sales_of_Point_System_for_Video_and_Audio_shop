<?php

class Mail_mock extends Mail {


    var $sentMessages = array();


    var $_preSendCallback;


    var $_postSendCallback;

    function Mail_mock($params)
    {
        if (isset($params['preSendCallback']) &&
            is_callable($params['preSendCallback'])) {
            $this->_preSendCallback = $params['preSendCallback'];
        }

        if (isset($params['postSendCallback']) &&
            is_callable($params['postSendCallback'])) {
            $this->_postSendCallback = $params['postSendCallback'];
        }
    }

  
    function send($recipients, $headers, $body)
    {
        if ($this->_preSendCallback) {
            call_user_func_array($this->_preSendCallback,
                                 array(&$this, $recipients, $headers, $body));
        }

        $entry = array('recipients' => $recipients, 'headers' => $headers, 'body' => $body);
        $this->sentMessages[] = $entry;

        if ($this->_postSendCallback) {
            call_user_func_array($this->_postSendCallback,
                                 array(&$this, $recipients, $headers, $body));
        }

        return true;
    }

}
