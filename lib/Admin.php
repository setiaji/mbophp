<?php

class Admin extends MboWebServices {

    public function __construct() {
        parent::__construct();
    }

    public function getFinancialBatch(SoapClient $soapClient, array $params) {

        if (!isset($params['XMLString'])) {
            throw new Exception('no XMLString specified in params');
        }
        if (!array_key_exists('KeyId', $params)) {
            throw new Exception('no KeyId specified in params');
        }
        if (!array_key_exists('ErrorMessage', $params)) {
            throw new Exception('no ErrorMessage specified in params');
        }
        
        $this->setResultProperty('GetFinancialBatchResult');
        $this->setSoapResponse($soapClient->GetFinancialBatch($params));
    }
    
    public function listAllTableAttributes(SoapClient $soapClient, array $params) {
    
    	if (!isset($params['XMLString'])) {
    		throw new Exception('no XMLString specified in params');
    	}
    	if (!array_key_exists('KeyId', $params)) {
    		throw new Exception('no KeyId specified in params');
    	}
    	if (!array_key_exists('ErrorMessage', $params)) {
    		throw new Exception('no ErrorMessage specified in params');
    	}
    	if (!array_key_exists('tableName', $params)) {
    		throw new Exception('no tableName specified in params');
    	}
    
    	$this->setResultProperty('ListAllTableAttributesResult');
    	$this->setSoapResponse($soapClient->ListAllTableAttributes($params));
    }
    
    
    public function listAllTableNames(SoapClient $soapClient, array $params) {
    
    	if (!isset($params['XMLString'])) {
    		throw new Exception('no XMLString specified in params');
    	}
    	if (!array_key_exists('KeyId', $params)) {
    		throw new Exception('no KeyId specified in params');
    	}
    	if (!array_key_exists('ErrorMessage', $params)) {
    		throw new Exception('no ErrorMessage specified in params');
    	}
    
    	$this->setResultProperty('ListAllTableNamesResult');
    	$this->setSoapResponse($soapClient->ListAllTableNames($params));
    }
	
    
    public function lookUpInformation(SoapClient $soapClient, array $params) {
    
    	if (!isset($params['XMLString'])) {
    		throw new Exception('no XMLString specified in params');
    	}
    	if (!array_key_exists('KeyId', $params)) {
    		throw new Exception('no KeyId specified in params');
    	}
    	if (!array_key_exists('ErrorMessage', $params)) {
    		throw new Exception('no ErrorMessage specified in params');
    	}
    	if (!array_key_exists('IndividualTableName', $params)) {
    		throw new Exception('no IndividualTableName specified in params');
    	}
    
    	$this->setResultProperty('LookUpInformationResult');
    	$this->setSoapResponse($soapClient->LookUpInformation($params));
    }
	
}
