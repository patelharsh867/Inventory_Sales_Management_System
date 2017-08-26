<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<link rel="stylesheet" type="text/css" href="css/css1.css">
<script>
	function toggle_visibility(id){
		var e = document.getElementById(id);
		if(e.style.display=='block')
			e.style.display = 'none';
		else
			e.style.display = 'block';
		}
</script>

<body>

<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
	}
?>

<div id="container">
<div id="header">
<table cellspacing="0" width="100%" border="0" cellpadding="20px">
<tr>
	<td width="56%">
    <table width="41%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <th scope="col"><font size="12px">I</font><span style="font-size: 18px;">nventory and Stock Sale  </span></th>
	    </tr>
	  </table></td>
    <td style="font-size:14px;">
      <table width="93%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        	<th scope="col">Welcome: <?php echo $_SESSION['access'];?></th>
          	<th scope="col"><?php
			$Today = date('y:m:d',time());
			$new = date('l, F d, Y', strtotime($Today));
			echo $new;
			?></th>
          	<th scope="col" width="20px"><a href="logout.php">
            <input type="button" id="btnadd" value="Logout" align="middle" />
          	</a></th>
        </tr>
  </table></td>
    </tr>

</table>
</div>

<br><br><br><br><br>
<!-- Footer -->
<div id = "headnav"> 
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>

	<td width="669" height="62">
	<table width="669" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <th width="90" height="56" scope="col"><a href="index.php">Dashboard</a></th>
	    <th width="50" scope="col"><a href="sales.php">Sales</a></th>
	    <th width="80" scope="col"><a href="products.php">Products</a></th>
	    <th width="90" scope="col"><a href="customers.php">Customers</a></th>
	    <th width="90" scope="col"><a href="supplier.php">Supplier</a></th>
	    <th width="112" scope="col"><a href="salesreport.php">Sales Report</a></th>
	    </tr>
	  </table>
      </td>
      
      <td width="13">
      <table border="0" cellspacing="0" cellpadding="0">
      	<tr>
        	<td align="left" style="color:#FFF">
            <?php
			$date_time=date("h:i:sa");
			
			echo $date_time;
			?>
            </td>
        </tr>
      </table>
      </td>

</tr>
</table>
</div>
<br>

<div id="footer">
<table border="0" cellpadding="15px" align="center"; style="size: 12px; font-family: 'Courier New', Courier, monospace; color: #FFF; font-size: 12px;">
<tr>
	<td>
    &copy; 2016 All Rights Reserved.  |  Designed By:Harsh Patel(12BCE057)	
    </td>
</tr>
</table>
</div>

<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
      
      <tr>
        <td width="750" align="right"><form action="result.php" method="get" ecntype="multipart/data-form">
        <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Search supplier..." /><input type="submit" id="btnsearch" value="Search" name="search" />
        </form></td>
        
        <td width="127" height="37" align="right">
        <a href="javascript:void(0)" onclick="toggle_visibility('popup-box1')"><input type="button" style="border:1px solid #066; background:#066; height:45px; width:125px; color:#FFF; border-radius:3px; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;" value="+ Add Supplier" /></a></td>
      </tr>
    
    </table></th>
  </tr>
  
  <div id="popup-box2" class="popup-position1">
<div id="popup-wrapper1">
<div id="popup-container1">
    <div id="popup-head-color2">
    <br>
    <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Edit Supplier </p>
    </div>

<?php

include 'config.php';

$id = $_GET['id'];
$view = "SELECT * from supplier where md5(id) = '$id'";
$result = $db_link->query($view);
$row = $result->fetch_assoc();

if(isset($_POST['update'])){

	$ID = $_GET['id'];

	$suppliername = $_POST['suppliername'];
	$contactperson = $_POST['contactperson'];
	$address = $_POST['address'];
	$contactno = $_POST['contactno'];
	$note = $_POST['note'];

	$insert = "UPDATE supplier set suppliername = '$suppliername', contactperson = '$contactperson', address = '$address', contactno = '$contactno', note = '$note' where md5(id) = '$ID'";
	
	if($db_link->query($insert)== TRUE){

			echo "Sucessfully update data";
			header('location:supplier.php');			
	}else{

		echo "Ooppss cannot add data" . $conn->error;
		header('location:supplier.php');
	}
	
	$db_link->close();
}

?>
   
    <br>
    <form action="" method="POST">
    <table border="0" align="center">
    
    <tr>
    <td align="right">Supplier Name:</td>
    <td><input type="text" id="txtbox" name="suppliername" placeholder="Suppliername" value="<?php echo $row['suppliername'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Contact Person:</td>
    <td><input type="text" id="txtbox" name="contactperson" placeholder="Contactperson" value="<?php echo $row['contactperson'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Address:</td>
    <td><input type="text" id="txtbox" name="address" placeholder="Address" value="<?php echo $row['address'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Contact No:</td>
    <td><input type="text" id="txtbox" name="contactno" maxlength="11" placeholder="Contact no" value="<?php echo $row['contactno'];?>" required><br></td>
    </tr>
    
    <tr>
    <td align="right">Note:</td>
    <td><input type="text" id="txtbox" name="note" placeholder="Note" value="<?php echo $row['note'];?>" required><br></td>
    </tr>    
    <br>
    <tr align="center">
    <td>&nbsp;  </td>
    <td>
    <br>
    <input type="SUBMIT" name="update" id="btnnav" value="Update"></form>
    <a href="supplier.php"><input type="button" style="border:1px solid #900; background:#900; height:40px; width:105px; border-radius:3px; color:#FFF;" value="Cacel"></a>
    
    </td>
    </tr>
    
    </table>

</div>
</div>
</div>
  
  <br>
  
  <tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #066; color:#033;">
    
     <tr>
     <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #033; background: #066; color:#FFF;"> Products 	</th>
    </tr>
    
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> Supplier Name </th>
        <th style="border-bottom:1px solid #333;"> Contact Person </th>
        <th style="border-bottom:1px solid #333;"> Address </th>
        <th style="border-bottom:1px solid #333;"> Contact No. </th>
        <th style="border-bottom:1px solid #333;"> Note </th>
        <th style="border-bottom:1px solid #333;"> Action </th>
      </tr>
      
       <?php
require('config.php');
$query="SELECT * FROM supplier";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){?>
      
      <tr align="center" height="25px;">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['suppliername']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['contactperson']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['address']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['contactno']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['note']; ?> </td>
        <td style="border-bottom:1px solid #333;">
        
        
        <a href="edit_supplier.php?id=<?php echo md5($row['id']);?>"><input type="button" value="Edit" style="width:50px; height:20; color:#FFF; background:#069; border:1px solid #069; border-radius:3px;"></a>/<a href="delete_supplier.php"><input type="button" value="Delete" style="width:15; height:20; color:#FFF; background: #900; border:1px solid #900; border-radius:3px;"></a>
        
        </td>
        </td>
      </tr>
   <?php
}?>
      
    </table>
    
  </td>
  </tr>
</table>

</div>

</body>
</html>
