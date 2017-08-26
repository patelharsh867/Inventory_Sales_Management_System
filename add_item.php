<?php
session_start();
require('config.php');

$category=$_POST['category'];
$name=$_POST['name'];
$quantity=$_POST['quantity'];
$purchase=$_POST['purchase'];
$retail=$_POST['retail'];
$supplier=$_POST['supplier'];
$filetmp = $_FILES["file_img"]["tmp_name"];
$filename = $_FILES["file_img"]["name"];
$filetype = $_FILES["file_img"]["type"];
$filepath = "photo/".$filename;
  
move_uploaded_file($filetmp,$filepath);
	$register="INSERT INTO products(category,name,quantity,purchase,retail,supplier,img) VALUES('$category','$name','$quantity','$purchase','$retail','$supplier','$filepath')" or die("error".mysqli_errno($db_link));
	$result=mysqli_query($db_link,$register);
		header('location:products.php');

mysqli_close($db_link);
?>
