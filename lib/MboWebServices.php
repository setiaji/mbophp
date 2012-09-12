<?php


class MboWebServices {
    
	private $_errorMessage;
    private $_isError;
    private $_soapResponse;
    private $_xmlString;
    private $_resultProperty;

    public function __construct() {
        $this->_errorMessage = '';
        $this->_isError = false;
        $this->_soapResponse = null;
        $this->_xmlString = null;
        $this->_resultProperty = null;
    }

    public function getErrorMessage() {
        return $this->_errorMessage;
    }

    protected function setErrorMessage($errorMessage) {
        $this->_errorMessage = $errorMessage;
    }

    public function IsError() {
        if($this->_isError) {
        	return true;
        } else {
        	return false;
        }
    }

    protected function setError() {
        $this->_isError = true;
    }
	
    public function getXMLString() {
    	return $this->_xmlString;
    }
    
    protected function setXMLString($xmlString) {
    	
    	$this->_xmlString = $xmlString;
    }
    
    
    public function getSoapResponse() {
    	return $this->_soapResponse;
    }
    
    protected function setResultProperty($resultProperty) {
    	$this->_resultProperty = $resultProperty;
    }
    
    public function getResultProperty() {
    	return $this->_resultProperty;
    }
    
    protected function setSoapResponse($soapResponse) {
    	$this->_soapResponse = $soapResponse;
    }

	public function soapResponse() {
		
		$resultproperty = $this->getResultProperty();
		
		if(!isset($this->_soapResponse->$resultproperty)) {
			throw new Exception('result Property not exist');
		}

		if($this->_soapResponse) {
			if ($this->_soapResponse->$resultproperty) {
				if(isset($this->_soapResponse->XMLString)) {
					$this->setXMLString($this->_soapResponse->XMLString);
				}
		
				if (trim($this->_soapResponse->ErrorMessage) != '') {
					$this->setError();
					$this->setErrorMessage($this->_soapResponse->ErrorMessage);
				}
		
			} else {
				$this->setError();
				$this->setErrorMessage($this->_soapResponse->ErrorMessage);
			}
		
		} else {
			throw new Exception('soapResponse not exist');
		}
	}
	
	
}