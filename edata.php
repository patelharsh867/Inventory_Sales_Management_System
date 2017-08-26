<?php
$con = mysql_connect("localhost","root","12345");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("major", $con);

$result = mysql_query("SELECT name,quantity FROM products where category = 'External Accesories'");

$rows = array();
while($r = mysql_fetch_array($result)) {
	$row[0] = $r[0];
	$row[1] = $r[1];
	array_push($rows,$row);
}

print json_encode($rows, JSON_NUMERIC_CHECK);

mysql_close($con);
?> 
