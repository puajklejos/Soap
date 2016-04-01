<?php
 
require_once ('lib/nusoap.php');
$wsdl="http://www.webservicex.net/globalweather.asmx?wsdl";
$client = new nusoap_client($wsdl,'wsdl');
$i = 0;

if (!empty($_POST['pais'])) {
	$pais = $_POST['pais'];
	$params = array('CountryName'=>$pais);
	$result= $client->call('GetCitiesByCountry', $params);
	$strings = implode('', $result);
	$xml = simplexml_load_string($strings);

 
	echo "<table border=1>";
	while($i<sizeof($xml))
	{
		echo "<tr>";
		echo "<td>".$xml->Table[$i]->City."</td>";
		echo "</tr>";
		$i++;
	}
	echo "</table>";
	
}
else
{
	print_r("Error");
}

?>

