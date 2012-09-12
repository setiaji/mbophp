<?php

class Contact extends MboWebServices {

	public function __construct() {
		parent::__construct();
	}
		
	
	public function contactAddressDelete(SoapClient $soapClient, array $params) {
			MboHelper::checkParams($params, array('KeyId','ContactEntityPrimaryKeyId','XMLString','ErrorMssage'));
			$this->setResultProperty('ContactAddressDeleteResult');
			$this->setSoapResponse($soapClient->ContactAddressDelete($params));
	}

	public function contactAddressInsert(SoapClient $soapClient,array $params) {
		MboHelper::checkParams($params, array('KeyId','ContactEntityPrimaryKeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('ContactAddressInsertResult');
		$this->setSoapResponse($soapClient->contactAddressInsert($params));
	}
	
	public function contactAddressUpdate(SoapClient $soapClient,array $params){
		MboHelper::checkParams($params, array('KeyId','ContactEntityPrimaryKeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('ContactAddressUpdateResult');
		$this->setSoapResponse($soapClient->contactAddressUpdate($params));
	}
	
	public function customDelete(SoapClient $soapclient,array $params) {
		MboHelper::checkParams($params, array('KeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('CustomDeleteResult');
		$this->setSoapResponse($soapclient->customDelete($params));
	}
	
	public function customInsert(SoapClient $soapclient,array $params) {
		MboHelper::checkParams($params, array('KeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('CustomInsertResult');
		$this->setSoapResponse($soapclient->customInsert($params));
	}
	
	public function customLoad(SoapClient $soapclient,array $params) {
		MboHelper::checkParams($params, array('KeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('CustomLoadResult');
		$this->setSoapResponse($soapclient->customLoad($params));
	}
	
	public function customLoadCount(SoapClient $soapclient,array $params) {
		MboHelper::checkParams($params, array('KeyId','Count','XMLString','ErrorMessage'));
		$this->setResultProperty('CustomLoadCountResult');
		$this->setSoapResponse($soapclient->customLoadCount($params));		
	}
	
	public function customLoadPaged(SoapClient $soapclient,array $params) {
		MboHelper::checkParams($params, array('KeyId','BeginIndexOrPageNumber','EndIndexOrPageSize','XMLString','ErrorMessage'));
		$this->setResultProperty('CustomLoadPagedResult');
		$this->setSoapResponse($soapclient->customLoadPaged($params));
	}
	
	public function customUpdate(SoapClient $soapclient,array $params) {
		MboHelper::checkParams($params, array('KeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('CustomUpdateResult');
		$this->setSoapResponse($soapclient->customUpdate($params));
	}
	
	public function delete(SoapClient $soapclient, array $params) {
		MboHelper::checkParams($params, array('KeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('DeleteResult');
		$this->setSoapResponse($soapclient->delete($params));		
	}
	
	public function getUserNameByEmail(SoapClient $soapclient, array $params) {
		MboHelper::checkParams($params, array('KeyId','Email','ErrorMessage'));
		$this->setResultProperty('GetUserNameByEmailResult');
		$this->setSoapResponse($soapclient->getUserNameByEmail($params));
	}
	
	public function insert(SoapClient $soapclient, array $params) {
		MboHelper::checkParams($params, array('KeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('InsertResult');
		$this->setSoapResponse($soapclient->insert($params));
	}
	
	public function load(SoapClient $soapclient, array $params) {
		MboHelper::checkParams($params, array('KeyId','EntityPrimaryKeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('LoadResult');
		$this->setSoapResponse($soapclient->load($params));
	}
	
	public function loadContactAddress(SoapClient $soapclient, array $params) {
		MboHelper::checkParams($params, array('KeyId','ContactEntityPrimaryKeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('LoadContactAddressResult');
		$this->setSoapResponse($soapclient->loadContactAddress($params));
	}
	
	public function loadList(SoapClient $soapclient, array $params) {
		MboHelper::checkParams($params, array('KeyId','RecordBeginIndex','RecordEndIndex','XMLString','ErrorMessage'));
		$this->setResultProperty('LoadListResult');
		$this->setSoapResponse($soapclient->loadList($params));
	}
	
	public function loadListCount(SoapClient $soapclient, array $params) {
		MboHelper::checkParams($params, array('KeyId','Count','XMLString','ErrorMessage'));
		$this->setResultProperty('LoadListCountResult');
		$this->setSoapResponse($soapclient->loadListCount($params));
	}
	
	public function subscriptionInsert(SoapClient $soapclient, array $params) {
		MboHelper::checkParams($params, array('KeyId','SaveSubscription','ContactEntityPrimaryKeyId','XMLSting','ErrorMessage'));
		$this->setResultProperty('SubscriptionInsertResult');
		$this->setSoapResponse($soapclient->subscriptionInsert($params));
	}
	
	public function subscriptionList(SoapClient $soapclient, array $params) {
		MboHelper::checkParams($params, array('KeyId','ContactEntityPrimaryKeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('SubcriptionListResult');
		$this->setSoapResponse($soapclient->subscriptionList($params));
	}
	
	public function subscriptionPayment(SoapClient $soapclient, array $params) {
		MboHelper::checkParams($params, array('KeyId','SavePayment','ContactEntityPrimaryKeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('SubscriptionPaymentResult');
		$this->setSoapResponse($soapclient->subscriptionPayment($params));
	}
	
	public function update(SoapClient $soapclient, array $params) {
		MboHelper::checkParams($params, array('KeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('UpdateResult');
		$this->setSoapResponse($soapclient->update($params));
	}
	
	//public function webServiceName(SoapClient $soapclient, array $params) {
	//	MboHelper::checkParams($params, array(''));
	//}
}