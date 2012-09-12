<?php
//include get key
include('bootstrap.php');

MboHelper::startTime();

include('key.php');

//setup soap client
$soapConnector = new MboSoapConnector($ws_folder_url);
$soapConnector->connect('ContactService.asmx?WSDL');

//setup parameter to send
$filterarray[] = array('name' => 'COUNTRY', 'value' => 'Indonesia');
$filter = MboHelper::BuildMCSFilterString($filterarray, 'Country');
$filter = "<field entity='CountryList' name='' value='' ></field>";
$params['KeyId'] = $keyid;
$params['XMLString'] = MboHelper::FormulateRequestXML($filter, '');
$params['ErrorMessage'] = '';

//var_dump($filter);exit;

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
	echo '<pre>';
	var_dump($xml_object);
}

//echo MboHelper::endTime() .' seconds';

