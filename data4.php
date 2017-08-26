<?php
$con = mysql_connect("localhost","root","12345");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("major", $con);

$result = mysql_query("SELECT dates,quantity FROM sales where category = 'Hardware' ");

$bln = array();
$bln['name'] = 'dates';
$rows['name'] = 'Hardware';
while ($r = mysql_fetch_array($result)) {
    $bln['data'][] = $r['dates'];
    $rows['data'][] = $r['quantity'];
}

$result = mysql_query("SELECT dates,quantity FROM sales where category = 'Software Licence' ");

$bln1 = array();
$rows1['name'] = 'Software Licence';
while ($r = mysql_fetch_array($result)) {
    $rows1['data'][] = $r['quantity'];
}

$result = mysql_query("SELECT dates,quantity FROM sales where category = 'External Accesories' ");

$bln2 = array();
$rows2['name'] = 'External Accesories';
while ($r = mysql_fetch_array($result)) {
    $rows2['data'][] = $r['quantity'];
}

$result = mysql_query("SELECT dates,quantity FROM sales where category = 'Mobile Devices' ");

$bln3 = array();
$rows3['name'] = 'Mobile Devices';
while ($r = mysql_fetch_array($result)) {
    $rows3['data'][] = $r['quantity'];
}

$rslt = array();
array_push($rslt, $bln);
array_push($rslt, $rows);
array_push($rslt, $rows1);
array_push($rslt, $rows2);
array_push($rslt, $rows3);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysql_close($con);
?> 