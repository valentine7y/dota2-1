<?php
include ('../../lib/location.php');

if(!isset($_GET['province']))
{
	exit();
}


$city_value = $city[$_GET['province']];

$json = json_encode($city_value);
print($json);

?>
