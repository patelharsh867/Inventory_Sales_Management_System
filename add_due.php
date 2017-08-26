<?php
session_start();
require('config.php');

$dates=$_POST['dates'];
$supplier=$_POST['supplier'];
$balance=$_POST['balance'];

	$register="INSERT INTO due(dates,supplier,balance) VALUES('$dates','$supplier','$balance')" or die("error".mysqli_errno($db_link));
	$result=mysqli_query($db_link,$register);
		header('location:due.php');

mysqli_close($db_link);
?>
