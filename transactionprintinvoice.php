<?php
//include get key
include('bootstrap.php');

MboHelper::startTime();

include('key.php');

//setup soap client
$soapConnector = new MboSoapConnector($ws_folder_url);
$soapConnector->connect('OrderService.asmx?WSDL');

/*
//setup parameter to send
$filteraray[] = array(
	"name" => "ReportFile",
	"value" => "C:\inetpub\wwwroot\MetiscWebServiceDev2\Reports\MeetingInvoicesOE4order.rpt"
);
$filteraray[] = array(
	"name" => "ExportReportName",
	"value" => "Invoice_"
);
$filteraray[] = array(
	"name" => "ReportParam_OrderNo",
	"value" => "274996"
);
$filteraray[] = array(
	"name" => "ExportPath",
	"value" => "C:\inetpub\wwwroot\MetiscWebServiceTest\Report\'"
);
*/
//$filter = MboHelper::BuildMCSFilterString($filterarray, 'transaction');
//ini_set("soap.wsdl_cache_enabled", "0");
$params['XMLString'] =
'<metisc>
	<filter>
    <field name="ReportFile" value="C:\inetpub\wwwroot\MetiscWebServiceDev2\Reports\MeetingInvoicesOE4order.rpt" entity="transaction" />
    <field name="ExportReportName" value="Invoice_" entity="transaction" />
    <field name="ReportParam_OrderNo" value="274996" entity="transaction" />
    <field name="ReportParam_OrgName" value="" entity="transaction" />
    <field name="ReportParam_InvoiceAddress" value="" entity="transaction" />
    <field name="ReportParam_ReportOptions" value="" entity="transaction" />
    <field name="ReportParam_UserName" value="" entity="transaction" />
  </filter>
	<data></data>
</metisc>';
$data = '';
$params['KeyId'] = $keyid;
//$params['XMLString'] = MboHelper::FormulateRequestXML($filter, $data);
$params['ErrorMessage'] = '';
//call Contact Web service
$ws = new Order();
//echo '<pre>'.print_r($params, true).'</pre><br/>';
//call method
$ws->transactionPrintInvoice($soapConnector->getSoapClient(), $params);
$ws->soapResponse();
if($ws->isError()) {
	echo $ws->getErrorMessage();
	exit;
} else {
	//convert to object
	$xml_object =  simplexml_load_string($ws->getXMLString());
	//use it!
	echo 'PDF File Path: '.$xml_object->data->entity->ExportFile;
}

//echo MboHelper::endTime() .' seconds';

