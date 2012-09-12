<?php
//include get key
include('bootstrap.php');

MboHelper::startTime();

include('key.php');

//setup soap client
$soapConnector = new MboSoapConnector($ws_folder_url);
$soapConnector->connect('ContactService.asmx?WSDL');

//setup parameter to send
$dataarray = array(
'ID' => '305604', 
'LANGUAGES' => 'MALAY'
);

$data = MboHelper::BuildMCSDataString($dataarray, 'Name_Profile');
$params['KeyId'] = $keyid;
$params['XMLString'] = MboHelper::FormulateRequestXML('', $data);
$params['ErrorMessage'] = '';

//$xmlrequest = MboHelper::FormulateRequestXML($filter, '');
//var_dump($xmlrequest);exit;

//call Contact Web service
$ws = new Contact();
//call method
$ws->customUpdate($soapConnector->getSoapClient(), $params);
$ws->soapResponse();

//var_dump($ws);exit;

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

