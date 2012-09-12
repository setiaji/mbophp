<?php
//include get key
include('bootstrap.php');

MboHelper::startTime();

include('key.php');

//setup soap client
$soapConnector = new MboSoapConnector($ws_folder_url);
$soapConnector->connect('ContactService.asmx?WSDL');

//setup parameter to send
/*
$filterarray[] = array(
'name' => 'TollFreePhone', 
'value' => '%0871', 
'operator' => 'like');
*/
$filterarray[] = array(
'name' => 'Email', 
'value' => 'adi.setiawan@metisc.com.au'
);

$filter = MboHelper::BuildMCSFilterString($filterarray, 'contact');
$data = '';
$params['KeyId'] = $keyid;
$params['RecordBeginIndex'] = '0';
$params['RecordEndIndex'] = '1000';
$params['XMLString'] = MboHelper::FormulateRequestXML($filter, $data);
$params['ErrorMessage'] = '';

//var_dump(MboHelper::FormulateRequestXML($filter, $data));exit;

//call Contact Web service
$ws = new Contact();
//call method
$ws->loadList($soapConnector->getSoapClient(), $params);
$ws->soapResponse();

if($ws->isError()) {
	echo $ws->getErrorMessage();
	exit;
} else {
	//convert to object
	$xml_object =  simplexml_load_string($ws->getXMLString());

	//use it!
	foreach($xml_object->data->entity as $key => $val) {
		$arrayresult = array();
		$result[] = MboHelper::Xml2array($val, $arrayresult);
	}
	echo '<pre>';
	var_dump($xml_object);
	echo '</pre>';
}

//echo MboHelper::endTime() .' seconds';

