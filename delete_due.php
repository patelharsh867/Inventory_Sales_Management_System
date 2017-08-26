<?php
	include 'config.php';
	$id = $_GET['id'];
	$sql = "Delete from due where md5(id) = '$id'";
	if($db_link->query($sql) === true){
		echo "Sucessfully deleted data";
		header('location:due.php');
	}else{
		echo "Oppps something error ";
	}
	$db_link->close();
?>