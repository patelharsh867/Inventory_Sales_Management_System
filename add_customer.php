<?php
session_start();
require('config.php');

$name=$_POST['name'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$note=$_POST['note'];


	$register="INSERT INTO customers(name,contact,address,note) VALUES('$name','$contact','$address','$note')" or die("error".mysqli_errno($db_link));
	$result=mysqli_query($db_link,$register);
		header('location:customers.php');

mysqli_close($db_link);
?>
