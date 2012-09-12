<?php

class OrderService extends MboWebServices {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function orderInsert(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','SaveOrder','XMLString','ErrorMessage'));
		$this->setResultProperty('OrderInsertResult');
		$this->setSoapResponse($soapClient->orderInsert($params));
	}
	
	public function orderList(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','RecordBeginIndex','RecordEndIndex','XMLString','ErrorMessage'));
		$this->setResultProperty(OrderListResult);
		$this->setSoapResponse($soapClient->orderList($params));
	}
	
	public function orderListCount(SoapClient $soapclient, array $params) {
		MboHelper::checkParams($params, array('KeyId','Count','XMLString','ErrorMessage'));
		$this->setResultProperty('OrderListCountResult');
		$this->setSoapResponse($soapclient->orderListCount($params));
	}
	
	public function orderPayment(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','SavePayment','XMLString','ErrorMessage'));
		$this->setResultProperty('OrderPaymentResult');
		$this->setSoapResponse($soapClient->orderPayment($params));
	}
	
	public function productList(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','RecordBeginIndex','RecordEndIndex','XMLString','ErrorMessage'));
		$this->setResultProperty('ProductListResult');
		$this->setSoapResponse($soapClient->productList($params));
	}
	
	public function productListCount(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','Count','XMLString','ErrorMessage'));
		$this->setResultProperty('ProductListCountResult');
		$this->setSoapResponse($soapClient->productListCount($params));
	}
	
	
}