<?php
$con = mysql_connect("localhost","root","12345");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("major", $con);

$result = mysql_query("SELECT dates,quantity FROM sales where category = 'Mobile Devices' ");

$bln = array();
$bln['name'] = 'dates';
$rows['name'] = 'Mobile Devices';
while ($r = mysql_fetch_array($result)) {
    $bln['data'][] = $r['dates'];
    $rows['data'][] = $r['quantity'];
}


$rslt = array();
array_push($rslt, $bln);
array_push($rslt, $rows);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysql_close($con);
?> 