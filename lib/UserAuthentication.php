<?php

class UserAuthentication extends MboWebServices{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function changePassword(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','UserName','NewPassword','OldPassword','ErrorMessage'));
		$this->setResultProperty('ChangePasswordResult');
		$this->setSoapResponse($soapClient->changePassword($params));
	}
	
	public function convertContactToWebUser(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','ContactId','WebLoginId','WebLoginPassword','Email','SecurityGroup','ExpireDate','IsWebUserEnabled','ErrorMessage'));
		$this->setResultProperty('ConvertContactToWebUserResult');
		$this->setSoapResponse($soapClient->convertContactToWebUser($params));
	}
	
	public function convertContactToWebUserValidate(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','ContactId','WebLoginId','WebLoginPassword','Email','SecurityGroup','ExpireDate','IsWebUserEnabled','ErrorMessage'));
		$this->setResultProperty('ConvertContactToWebUserValidateResult');
		$this->setSoapResponse($soapClient->convertContactToWebUserValidate($params));
	}
	
	public function getAccountDetails(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','WebLoginId','XMLString','ErrorMessage'));
		$this->setResultProperty('GetAccountDetailsResult');
		$this->setSoapResponse($soapClient->getAccountDetails($params));
	}
	
	public function getAllUsers(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','XMLString','ErrorMessage'));
		$this->setResultProperty('GetAllUsersResult');
		$this->setSoapResponse($soapClient->getAllUsers($params));
	}
	
	public function loginUser(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('SiteID','UserID','UserPassword','KeyId','ErrorMessage'));
		$this->setResultProperty('LoginUserResult');
		$this->setSoapResponse($soapClient->loginUser($params));
	}
	
	public function logOutUser(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','ErrorMessage'));
		$this->setResultProperty('LogOutUserResult');
		$this->setSoapResponse($soapClient->logOutUser($params));
	}
	
	public function resetPassword(SoapClient $soapClient,array $params) {
		MboHelper::checkParams($params, array('KeyId','UserName','NewPassword','ErrorMessage'));
		$this->setResultProperty('ResetPasswordResult');
		$this->setSoapResponse($soapClient->resetPassword($params));
	}
	
	public function securityGroupList(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','BeginIndexOrPageNumber','EndIndexOrPageSize','XMLString','ErrorMessage'));
		$this->setResultProperty('SecurityGroupListResult');
		$this->setSoapResponse($soapClient->securityGroupList($params));
	}
	
	public function securityGroupListCount(SoapClient $soapClient, array $params){
		MboHelper::checkParams($params, array('KeyId','Count','XMLString','ErrorMessage'));
		$this->setResultProperty('SecurityGroupListCountResult');
		$this->setSoapResponse($soapClient->securityGroupListCount($params));
			
	}
	
	public function securityGroupMembershipList(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','Id','BeginIndexOrPageNumber','EndIndexOrPageSize','XMLString','ErrorMessage'));
		$this->setResultProperty('SecurityGroupMembershipListResult');
		$this->setSoapResponse($soapClient->securityGroupMembershipList($params));
	}
	
	public function securityGroupMembershipListCount(SoapClient $soapClient, array $params) {
		MboHelper::checkParams($params, array('KeyId','Id','Count','XMLString','ErrorMessage'));
		$this->setResultProperty('SecurityGroupMembershipListCountResult');
		$this->setSoapResponse($soapClient->securityGroupMembershipListCount($params));
	}
}
