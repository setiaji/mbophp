<?php
// include get key
include ('bootstrap.php');

MboHelper::startTime();

include ('key.php');

// setup soap client
$soapConnector = new MboSoapConnector($ws_folder_url);
$soapConnector->connect('UserAuthenticationService.asmx?WSDL');

// setup parameter to send
$filterarray[] = array(
						'name' => 'ID',
						'value' => '305604');

$filter = MboHelper::BuildMCSFilterString($filterarray, 'Name_Profile');
$params['KeyId'] = $keyid;
$params['WebLoginId'] = $webloginid;
$params['XMLString'] = MboHelper::FormulateRequestXML($filter,'');

// call UserAuthentication web service
$ws = new UserAuthentication();
$ws->getAccountDetails($soapConnector->getSoapClient(), $params);
$ws->getSoapResponse();

// error response
if ($ws->IsError()) {
	echo $ws->getErrorMessage();
	exit();
}else {
	// convert to object
	$xml_obj = simplexml_load_string($ws->getXMLString());
	// use it
	var_dump($xml_obj);
}

