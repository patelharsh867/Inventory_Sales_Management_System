<?php
session_start();
require('config.php');

$suppliername=$_POST['suppliername'];
$contactperson=$_POST['contactperson'];
$address=$_POST['address'];
$contactno=$_POST['contactno'];
$note=$_POST['note'];

	$register="INSERT INTO supplier(suppliername,contactperson,address,contactno,note) VALUES('$suppliername','$contactperson','$address','$contactno','$note')" or die("error".mysqli_errno($db_link));
	$result=mysqli_query($db_link,$register);
		header('location:supplier.php');

mysqli_close($db_link);
?>
