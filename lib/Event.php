<?php

class Event extends MboWebServices {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function eventPayment(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','EventPrimaryKeyId','SavePayment','XMLString','ErrorMessage'));
		$this->setResultProperty('EventPaymentResult');
		$this->setSoapResponse($soapClient->eventPayment($params));
	}
	
	public function loadEvent(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','EventPrimaryKeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('LoadEventResult');
		$this->setSoapResponse($soapClient->loadEvent($params));
	}
	
	public function loadEventFunction(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','EventPrimaryKeyId','FunctionPrimaryKeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('LoadEventFunctionResult');
		$this->setSoapResponse($soapClient->loadEventFunction($params));
	}
	
	public function loadEventFunctionList(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','EventPrimaryKeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('LoadEventFunctionListResult');
		$this->setSoapResponse($soapClient->loadEventFunctionList($params));
	}
	
	public function loadEventList(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('LoadEventListResult');
		$this->setSoapResponse($soapClient->loadEventList($params));
	}
	
	public function loadFunctionFeeList(SoapClient $soapclient, array $params) {
		MboHelper::checkParams($params, array('KeyId','EventPrimaryKeyId','FunctionPrimaryKeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('LoadFunctionFeeListResult');
		$this->setSoapResponse($soapclient->loadFunctionFeeList($params));
	}
	
	public function loadRegistrationList(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('LoadRegistrationListResult');
		$this->setSoapResponse($soapClient->loadRegistrationList($params));
	}
	
	public function registerForEventFunctions(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','EventPrimaryKeyId','SaveRegistration','XMLString','ErrorMessage'));
		$this->setResultProperty('RegisterForEventFunctionsResult');
		$this->setSoapResponse($soapClient->registerForEventFunctions($params));
	}
	
}