<?php
session_start();
require('config.php');

$date=$_POST['dates'];
$quantity=$_POST['quantity'];

$customers=$_POST['customers'];
$category=$_POST['category'];
$name=$_POST['name'];
$amount=$_POST['amount'];
$quant=$_POST['quant'];
$total=$_POST['total'];
$tendered=$_POST['tendered'];
$change=$_POST['change'];

	$register="INSERT INTO sales(dates,customers,category,name,amount,quant,total,tendered,change) VALUES('$dates','$customers','$category','$name','$amount','$quant','$total','$tendered','$change')" or die("error".mysqli_errno($db_link));
	$result=mysqli_query($db_link,$register);
		header('location:supplier.php');

mysqli_close($db_link);
?>
