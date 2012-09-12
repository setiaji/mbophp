<?php

class MboHelper {
	
	static function Xml2array( $xmlObject, $out = array() )
	{
		foreach ( (array) $xmlObject as $index => $node ) {
			$out[$index] = ( is_object ( $node ) ) ? self::Xml2array ( $node ) : $node;
		}
		return $out;
	}
	
	static function BuildMCSFilterString(array $filter, $entityName) 
	{
		$filterString = '';
		if (!empty($filter)) {
			foreach ($filter as $key => $val) {
				if(isset($val['name']) && isset($val['value'])) {
					if(isset($val['operator'])) {
						$operator = "operator='".$val['operator']."'";
					} else {
						$operator = '';
					}
					$filterString .= "<field name='".$val['name']."' value='".$val['value']."' ".$operator." entity='".$entityName."' />";
				} else {
					continue;
				}
				
			}
		}
		return $filterString;
	}
	
	static function BuildMCSDataString(array $dataNamesAndValues, $entityName) 
	{
		$dataString = "<entity name='".$entityName."'>";
		if (!empty($dataNamesAndValues)) {
			foreach ($dataNamesAndValues as $dataName => $dataValue) {
				$dataString .= '<'.$dataName.'>'.$dataValue.'</'.$dataName.'>';
			}
		}
		$dataString .= "</entity>";
	
		return $dataString;
	}
	
	static function FormulateRequestXML($filter='', $data='') 
	{
		$xml = '<metisc><filter>'.$filter.'</filter>
		<data>'.$data.'</data></metisc>';
		return $xml;
	}
	
	static function setMicrotimeFloat()
	{
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}
	
	static function startTime()
	{
		$starttime = self::setMicrotimeFloat();
		define('MCS_STARTTIME', $starttime);
		return MCS_STARTTIME;
	}
	
	static function endTime()
	{
		$time_end = self::setMicrotimeFloat();
		$time = $time_end - MCS_STARTTIME;
		return $time;
	}
	
	static function checkParams(array $paramtocheck, array $requiredparam)
	{
		foreach($requiredparam as $key => $val) {
			if (!array_key_exists($val, $paramtocheck)) {
				throw new Exception('no '.$val.' specified in params');
				//throw new Exception($message, $code, $previous)
			}
		}
	}
	
	
}