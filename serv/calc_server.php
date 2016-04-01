<?php
	require_once 'lib/nusoap.php';

	$soap = new soap_server;
	$soap->configureWSDL('AddService', 'http://localhost/projectes/Soap/serv');
	$soap->wsdl->schemaTargetNamespace = 'http://localhost/projectes/Soap/serv';
	$soap->register('Add', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/projectes/Soap/serv');
	$soap->register('Substract', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/projectes/Soap/serv');
	$soap->register('Div', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/projectes/Soap/serv');
	$soap->register('Mul', array('a' => 'xsd:int', 'b' => 'xsd:int'),array('c' => 'xsd:int'), 'http://localhost/projectes/Soap/serv');
	$soap->service(isset($HTTP_RAW_POST_DATA) ?$HTTP_RAW_POST_DATA : '');

function Add($a, $b){
	return $a + $b;
}
function Substract($a, $b){
	return $a - $b;
}
function Div($a, $b){
	return $a / $b;
}
function Mul($a, $b){
	return $a * $b;
}
?>

