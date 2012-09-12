<?php
//include get key
include('bootstrap.php');

MboHelper::startTime();

include('key.php');

//setup soap client
$soapConnector = new MboSoapConnector($ws_folder_url);
$soapConnector->connect('ContactService.asmx?WSDL');

//setup parameter to send
$params['KeyId'] = $keyid;
//$params['ContactEntityPrimaryKeyId'] = '105111';
$params['ContactEntityPrimaryKeyId'] = '200885';
$filterarray[] = array(
'name' => 'AddressPurpose', 
'value' => 'Main Address'
);
$filter = MboHelper::BuildMCSFilterString($filterarray, 'address');
$params['XMLString'] = MboHelper::FormulateRequestXML($filter, '');
$params['ErrorMessage'] = '';

//call Contact Web service
$ws = new Contact();
//call method
$ws->loadContactAddress($soapConnector->getSoapClient(), $params);
$ws->soapResponse();

if($ws->isError()) {
	echo $ws->getErrorMessage();
	exit;
} else {
	//convert to object
	$xml_object =  simplexml_load_string($ws->getXMLString());
	//use it!
	var_dump($xml_object);
}

//echo MboHelper::endTime() .' seconds';

