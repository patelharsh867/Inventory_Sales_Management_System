<?php
	include 'config.php';
	$id = $_GET['id'];
	$sql = "Delete from supplier where md5(id) = '$id'";
	if($db_link->query($sql) === true){
		echo "Sucessfully deleted data";
		header('location:supplier.php');
	}else{
		echo "Oppps something error ";
	}
	$db_link->close();
?>