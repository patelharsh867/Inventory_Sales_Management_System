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
	    <th scope="col"><font face="Arial" style =size="25px";">I<span style="font-size: 18px;">nventory and Stock Sale System </span></font></th>
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
  <td width="1053" height="62">
    <table width="900" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <th width="100" height="62" scope="col"><a href="index.php">Dashboard</a></th>
      <th width="80" scope="col"><a href="sales.php">Sales</a></th>
      <th width="100" scope="col"><a href="products.php">Products</a></th>
      <th width="120" scope="col"><a href="customers.php">Customers</a></th>
      <th width="110" scope="col"><a href="supplier.php">Supplier</a></th>
      <th width="112" scope="col"><a href="salesreport.php">Sales Report</a></th>
      <th width="120" scope="col"><a href="chart1.php">Product Share</a></th>
      <th width="100" scope="col"><a href="chart3.php">Sales Graph</a></th>
      <th width="60" scope="col"><a href="due.php">Dues</a></th>
      <th width="120" scope="col"><a href="predict.php">Predict Sales</a></th>

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

<table border="0" align="center" cellpadding="0" cellspacing="0" width="80%">
      
      <tr>
      <td>
      <form action="salesreport.php" method="get" ecntype="multipart/data-form">
        <td width="48%" height="37" align="right"><input type="text" name="d1" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="From Eg.2015-05-13" required /></td>
        <td width="15%" align="left"> <input type="text" name="d2" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="To Eg.2015-06-13" required  /> </td>
        <td width="0%" align="left"><input type="submit" id="btnsearch" value="Search" name="search" /></td>
        </form>
      </td>
        <td width="50" align="right">
        
        <form action="exportsales.php" method="get" ecntype="multipart/data-form">
          <button type="submit" id="btnexp" name="export">Export to Excel </button>
        </form>
        
        </td>
      </tr>
    
    </table></th>
  </tr>
  
  <br>
  
  <tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0" align="center" width="80%" style="border:1px solid #033; color:#033;">
    
     <tr>
     <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #030; background: #030; color:#FFF;"> Summary of Sales </th>
    </tr>
    
      <tr height="30px">
      	<th style="border-bottom:1px solid #333;"> Date </th>
      	<th style="border-bottom:1px solid #333;"> Customers </th>
        <th style="border-bottom:1px solid #333;"> Product Sold </th>
        <th style="border-bottom:1px solid #333;"> Quantity Sold </th>
        <th style="border-bottom:1px solid #333;"> Amnt Paid </th>
        <th style="border-bottom:1px solid #333;"> Profit </th>
      </tr>
      
        <!-- Search goes here! -->
 

  
  		<!-- Search end here -->
      
       <?php
require('config.php');

if(isset($_GET['search'])){
			$d1 = $_GET['d1'];
			$d2 = $_GET['d2'];
			
$query="SELECT * FROM sales WHERE dates BETWEEN '$d1' and '$d2'";
$result=mysqli_query($db_link, $query);
while ($row=mysqli_fetch_array($result)){?>
      
      <tr align="center" style="height:35px">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['dates']; ?> </td>
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['customers']; ?> </td>
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['quantity']; ?> </td>
        <td style="border-bottom:1px solid #333;">Rs. <?php echo $row['total']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['profit']; ?> </td>
      </tr>
   <?php
}}?>
      
    </table>
    <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom-color: #030; border-right-color: #030; border-bottom-style: solid; border-right-style: solid; border-bottom-width: 1px; border-right-width: 1px;">
      <tr>
        <td width="20%" style="border-left-color: #030; border-left-style: solid; border-left-width: 1px;">&nbsp;</td>
        <td width="20%">&nbsp;</td>
        <td width="39%">&nbsp;</td>
        <td width="11%" style="border-bottom-color: #030; border-bottom-style: solid; border-bottom-width: 1px; border-left-color: #030; border-right-color: #030; border-left-style: solid; border-right-style: solid; border-left-width: 1px; border-right-width: 1px; height:35px;">Sales</td>
        <td width="10%" style="border-bottom-color: #030; border-bottom-style: solid; border-bottom-width: 1px ; height:35px;">Profit</td>
      </tr>
      <tr>
        <td style="border-bottom-color: #030; border-bottom-style: none; border-bottom-width: 1px; border-right-width: 1px; border-top-width: 1px; border-left-color: #030; border-left-style: solid; border-left-width: 1px;">Total Obtained:</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td style="border-left-color: #030; height:35px; border-right-color: #030; border-left-style: solid; border-right-style: solid; border-left-width: 1px; border-right-width: 1px;">
        
        <?php
			if(isset($_GET['search'])){
			$d1 = $_GET['d1'];
			$d2 = $_GET['d2'];
				$view1 = "SELECT sum(total) FROM sales WHERE dates BETWEEN '$d1' and '$d2'";
				$results=mysqli_query($db_link, $view1);
				for($i=0; $rows = mysqli_fetch_array($results); $i++){
				$total=$rows['sum(total)'];
				echo "Rs."." ".$total;
				}
			}
	  ?>
        
        </td>
        <td height = "35px">
        
        <?php
		if(isset($_GET['search'])){
			$d1 = $_GET['d1'];
			$d2 = $_GET['d2'];

				$view2 = "SELECT sum(profit) FROM sales WHERE dates BETWEEN '$d1' and '$d2'";
				$results1=mysqli_query($db_link, $view2);
				for($i=0; $rowss = mysqli_fetch_array($results1); $i++){
				$profit=$rowss['sum(profit)'];
				echo "Rs."." ".$profit;
				}
		}
	  ?>
        
        </td>
      </tr>
    </table>
    <p>&nbsp;</p></td>
  </tr>
</table>

<br>
<br><br>
<div id="bdcontainer"></div>

<div id="footer">
<table border="0" cellpadding="15px" align="center"; style="size: 12px; font-family: 'Courier New', Courier, monospace; color: #FFF; font-size: 12px;">
<tr>
	<td>
    &copy; 2016 All Rights Reserved.  |  Designed By:Harsh Patel(12BCE057)	
    </td>
</tr>
</table>
</div>

</div>

</body>
</html>