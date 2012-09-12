<?php
//setup soap client
$soapConnector = new MboSoapConnector($ws_folder_url);
$soapConnector->connect('UserAuthenticationService.asmx?WSDL');

//setup parameter to send
$params['SiteID'] = 'Default';
$params['UserID'] = $username;
$params['UserPassword'] = $password;
$params['KeyId'] = '';
$params['ErrorMessage'] = '';

//call UserAuthentication Web service
$ws = new UserAuthentication();
//call method
$ws->LoginUser($soapConnector->getSoapClient(), $params);
$ws->soapResponse();

if($ws->isError()) {
	echo $ws->getErrorMessage();
	exit;
} else {
	$soapResponse = $ws->getSoapResponse();
	$keyid = $soapResponse->KeyId;
}