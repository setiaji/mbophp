<?php


class MboSoapConnector {

    private $_soapClient;
    private $_url;

    public function __construct($url) {
        $this->_soapClient = null;
        $this->_url = $url;
    }

    public function connect($url) {
        if (empty($url)) {
            throw new Exception('no web service url specified');
        }
        
        $url = $this->_url . '/' . $url;
        
        $soapOptions['stream_context'] = stream_context_create();
        
        //the supression is used to protect incorrect web service url messages
        try {
            $this->_soapClient =@ new SoapClient($url, $soapOptions) or die();
        }
        catch (Exception $e) {
            echo '<pre>' . print_r($e->getMessage(), true);
            
            //test curl
            $curl = curl_init(); 
            curl_setopt($curl, CURLOPT_URL, $url); 
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            if (! $result = curl_exec($curl) )
            {
            	$error = curl_error($curl);
            	throw new Exception('curl error: '.$error);
            }
        }

    }

    public function getSoapClient() {
        if (!isset ($this->_soapClient)) {
            throw new Exception('no soap client created');
        }
        return $this->_soapClient;
    }

}
