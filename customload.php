<?php
//include get key
include('bootstrap.php');

MboHelper::startTime();

include('key.php');

//setup soap client
$soapConnector = new MboSoapConnector($ws_folder_url);
$soapConnector->connect('ContactService.asmx?WSDL');

//setup parameter to send
$filterarray[] = array(
'name' => 'ID', 
'value' => '305604'
);
$filter = MboHelper::BuildMCSFilterString($filterarray, 'Name_Profile');
$params['KeyId'] = $keyid;
$params['XMLString'] = MboHelper::FormulateRequestXML($filter, '');
$params['ErrorMessage'] = '';

//$xmlrequest = MboHelper::FormulateRequestXML($filter, '');
//var_dump($xmlrequest);exit;


//call Contact Web service
$ws = new Contact();
//call method
$ws->customLoad($soapConnector->getSoapClient(), $params);
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

