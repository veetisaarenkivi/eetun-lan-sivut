<?php
//otetaan yhteys kantaan

$host = "magnesium"; //jos ette tiedä, käytää "localhost"
$user = "16aveetis";
$pass = "salasana";
$skeema = "db16aveetis";

try
{
	$yhteys = new PDO("mysql:host=$host;dbname=$skeema;charset=utf8",$user,$pass);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
?>