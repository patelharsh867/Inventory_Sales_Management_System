<?php
session_start();
require('config.php');


$username=$_POST['username'];
$password=$_POST['password'];

$login="SELECT * FROM users WHERE username='$username' AND password='$password'";
$result_login=mysqli_query($db_link, $login); 

	if (@mysqli_num_rows($result_login)==1){
		$_SESSION=mysqli_fetch_array($result_login,MYSQLI_ASSOC);
		header('location:index.php');
	}else{?>
	<script type="text/javascript">
		alert("USERNAME/ PASSWORD IS INVALID");
		window.location.href = "login.php";
	</script><?php
	}
	mysqli_close($db_link);
?>

