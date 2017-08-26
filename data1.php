<?php
$con = mysql_connect("localhost","root","12345");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("major", $con);

$result = mysql_query("SELECT dates,quantity FROM sales where category = 'Hardware' ");

while($row = mysql_fetch_array($result)) {
  echo $row['dates'] . "\t" . $row['quantity']. "\n";
}


mysql_close($con);
?> 