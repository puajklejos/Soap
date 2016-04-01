<?php
 
require_once ('lib/nusoap.php');
$wsdl="http://localhost/projectes/Soap/serv/calc_server.php?wsdl";
$client = new nusoap_client($wsdl,'wsdl');

if (!empty($_POST['first']) && !empty($_POST['second'])) {
	$number1 = $_POST['first'];
	$number2 = $_POST['second'];
	$op = $_POST['desplegable'];
	$params = array('a' => $number1, 'b'=>$number2);

	if ($op=='sum') {
		$result= $client->call('Add', $params);
	}
	if ($op=='rest') {
		$result= $client->call('Substract', $params);
	}
	if ($op=='mul') {
		$result= $client->call('Mul', $params);
	}
	if ($op=='div') {
		$result= $client->call('Div', $params);
	}
	echo '<h2>Resultat</h2><pre>';
	$err = $client->getError();
	if ($err) {
		// Display the error
		echo '<p><b>Error: '.$err.'</b></p>';
	} else {
		// Display the result
		print_r($result);
	}
}
?>




