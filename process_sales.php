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
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
      
      <tr>
      	<td width="573">&nbsp;  </td>
        <td width="304" align="right"><form action="result.php" method="get" ecntype="multipart/data-form">
        <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Search product..." /><input type="submit" id="btnsearch" value="Search" name="search" />
        </form></td>
      </tr>
    
    </table></th>
  </tr>
  
  <div id="footer">
<table border="0" cellpadding="15px" align="center"; style="size: 12px; font-family: 'Courier New', Courier, monospace; color: #FFF; font-size: 12px;">
<tr>
	<td>
    &copy; 2016 All Rights Reserved.  |  Designed By:Harsh Patel(12BCE057)	
    </td>
</tr>
</table>
</div>
  
  <div id="popup-box2" class="popup-position1">
<div id="popup-wrapper2">
<div id="popup-container2">
    <div id="popup-head-color5">
    <br>
    <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Transaction Form </p>
    </div>

<?php
include 'config.php';

$id = $_GET['id'];
$view = "SELECT * from products where md5(id) = '$id'";
$result = $db_link->query($view);
$row = $result->fetch_assoc();

if(isset($_POST['update'])){

	$ID = $_GET['id'];
	
$view1 = "SELECT quantity from products where md5(id) = '$id'";
$result1 = $db_link->query($view);
$row2 = $result->fetch_assoc();
	
	$quant = $_POST['quant'];
	$dates=$_POST['dates'];
	$quantity=$_POST['quantity'];
	
	$customers=$_POST['customers'];
	$category=$_POST['category'];
	$name=$_POST['name'];
	$amount=$_POST['amount'];
	$quant=$_POST['quant'];
	$total=$_POST['total'];
	$tendered=$_POST['tendered'];
	$changed=$_POST['changed'];
	$prof = $_POST['profit'];

	$insert1 = "UPDATE products set quantity = quantity - '$quant' where md5(id) = '$ID'";
	$insert = "INSERT INTO sales(dates,customers,category,name,amnt,quantity,total,profit,tendered,changed) VALUES('$dates','$customers','$category','$name','$amount','$quant','$total','$prof','$tendered','$changed')" or die("error".mysqli_errno($db_link));
	$result=mysqli_query($db_link,$insert);
	if($db_link->query($insert1)== TRUE){

			echo "Sucessfully update data";
			header('location:sales.php');			
	}
	
	$db_link->close();
}

?>
   
    <br>
    <form action="" method="POST">
    
    <table border="0" align="center">  
    
    <?php
	
	if(isset($_POST['sub']))
	{
	
	@$total = $_POST['total'];
	@$tendered = $_POST['tendered'];
	@$quant = $_POST['quant'];
	@$profit = $_POST['profit'];
	
	@$profit = $profit;
	@$quant = $quant;
	@$ten = $tendered;
	@$change = $tendered - $total;
	}
	
	?>
    
    <tr>
    <td align="right"> Date Today: </td>
    <td> <input type="text" name="dates" id="txtbox" value="<?php echo "  ". date("Y/m/d")?>" readonly> </td>
    </tr>

    <tr>
    <td align="right">Customers:</td>
    <td>
    <select name="customers" id="txtbox" readonly>
    
    <?php
	require('config.php');
	$query="SELECT * FROM customers";
	$result=mysqli_query($db_link, $query);
	while ($row1=mysqli_fetch_array($result)){?>
    
	<option><?php echo $row1['name']; ?></option>
    					
	<?php
}?>
    
    </select>
    </td>
    </tr>
    
    <tr>
    <td align="right">Category:</td>
    <td><input type="text" id="txtbox" name="category" value="<?php echo $row['category'];?>" readonly><br></td>
    </tr>
    
    <tr>
    <td align="right">Product name:</td>
    <td><input type="text" id="txtbox" name="name" value="<?php echo $row['name'];?>" readonly><br></td>
    </tr>
    
      
    <!-- Computation starts here -->
    
    <form method="POST">
    
    <?php
    
	if(isset($_POST['calculate']))
	{
	@$amnt = $_POST['amount'];
	@$quant = $_POST['quant'];
	@$profit = $_POST['profit'];
	@$purchase = $_POST['purchase'];
	
	@$quant = $quant;
	@$total = $amnt * $quant;
	@$profit = $total - $quant * $purchase;
	}
	
	
	?>
    
    <form method="post">
    <tr>
    <td><input type="text" id="txtbox" name="purchase" value="<?php echo $row['purchase'];?>" hidden><br></td>
    </tr>
    
    <tr>
    <td align="right">Retail Amnt:</td>
    <td><input type="text" id="txtbox" name="amount" value="<?php echo $row['retail'];?>" readonly><br></td>
    </tr>
    
    <tr>
    <td align="right">Quantity:</td>
    <td><input type="text" id="txtbox" name="quant" value="<?php echo @$quant ?>" placeholder="quantity" required></td>
    </tr>
    
    <tr>
    <td align="right">Total Payable Amount:</td>
    <td><input type="text" id="txtbox" name="total" value="<?php echo @$total ?>" readonly></td>
    <td><input type="submit" name="calculate" value="Compute" id="btncalc"></td>
    </tr>
    
    <tr>
    <td align="right">Profit:</td>
    <td><input type="text" id="txtbox" name="profit" value="<?php echo @$profit ?>" readonly><br></td>
    </tr>

    </form>
    
    
    <tr>
    <td align="right">Tendered:</td>
    <td><input type="text" id="txtbox" value="<?php echo @$ten ?>" name="tendered" placeholder="Tendered"></td>
    <td><input type="submit" value="Calculate" name="sub" id="btncalc"></td>
    </tr>
    
    <tr>
    <td align="right">Return Change:</td>
    <td><input type="text" id="txtbox" name="changed" value="<?php echo @$change ?>" readonly></td>
    </tr>
    
    </form>
    
    <!-- Computation ends here -->
    
    
    <br>
    <tr  align="center">
    <td>&nbsp;  </td>
    <td>
    <br>
    <input type="SUBMIT" name="update" id="btnnav" value="Add"></form>
    <a href="sales.php"><input type="button" style="border:1px solid #900; background:#900; height:40px; width:105px; border-radius:3px; color:#FFF;" value="Cancel"></a>
    
    </td>
    </tr>
    
    </table>

</div>
</div>
</div>
  
  <br>
  
  <tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #030; color:#033;">
    
     <tr>
     <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #030; background: #030; color:#FFF;"> Select Products </th>
    </tr>
    
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> Category </th>
        <th style="border-bottom:1px solid #333;"> Name </th>
        <th style="border-bottom:1px solid #333;"> Price </th>
        <th style="border-bottom:1px solid #333;"> Quantity Left </th>
        <th style="border-bottom:1px solid #333;"> Supplier </th>
        <th style="border-bottom:1px solid #333;"> Pick Order </th>
      </tr>
      
        <!-- Search goes here! -->
 

  
  		<!-- Search end here -->
      
       <?php
require('config.php');
$query="SELECT * FROM products";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){?>
      
      <tr align="center" style="height:35px">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['category']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
        <td style="border-bottom:1px solid #333;">Php <?php echo $row['retail']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['quantity']; ?> pcs. </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['supplier']; ?> </td>
        <td style="border-bottom:1px solid #333;">
        
        
        <a href="process_sales.php?id=<?php echo md5($row['id']);?>"><input type="button" value="pick" style="width:90px; height:30px; color:#FFF; background: #930; border:1px solid #930; border-radius:3px;"></a>
        
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
