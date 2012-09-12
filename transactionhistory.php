<?php
//include get key
include('bootstrap.php');

MboHelper::startTime();

include('key.php');

//setup soap client
$soapConnector = new MboSoapConnector($ws_folder_url);
$soapConnector->connect('OrderService.asmx?WSDL');

//setup parameter to send
$filterarray[] = array(
'name' => 'ID',
'value' => '105111'
);
$filter = MboHelper::BuildMCSFilterString($filterarray, 'transaction');
$data = '';
$params['KeyId'] = $keyid;
$params['XMLString'] = MboHelper::FormulateRequestXML($filter, $data);
$params['ErrorMessage'] = '';

//call Contact Web service
$ws = new Order();
//call method
$ws->transactionHistory($soapConnector->getSoapClient(), $params);
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
	echo '</pre>';
}

//echo MboHelper::endTime() .' seconds';

