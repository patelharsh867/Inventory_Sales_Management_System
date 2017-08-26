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

	<td width="669" height="62">
	<table width="124" border="0" align="left" cellpadding="0" cellspacing="0">
	  <tr>
	    <th width="211" scope="col"><a href="sales1.php">Sales</a></th>
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
        <td width="250" align="right">
        
        <form action="result_sales1.php" method="get" ecntype="multipart/data-form">
        <input type="text" name="query" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Search product..." /><input type="submit" id="btnsearch" value="Search" name="search" />
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
     <th colspan="7" align="center" height="55px" style="border-bottom:1px solid #030; background: #030; color:#FFF;"> Select Products 	</th>
    </tr>
    
      <tr height="30px">
        <th style="border-bottom:1px solid #333;"> Category </th>
        <th style="border-bottom:1px solid #333;"> Name </th>
        <th style="border-bottom:1px solid #333;"> Price </th>
        <th style="border-bottom:1px solid #333;"> Quantity Left </th>
        <th style="border-bottom:1px solid #333;"> Supplier </th>
        <th style="border-bottom:1px solid #333;"> Pick Order </th>
      </tr>
      
					<?php
					include 'config.php';
					
					if(isset($_GET['search'])){
						$query = $_GET['query'];

						$sql = "select * from products where category like '%$query%' or name like '%$query%'";

						$result = $db_link->query($sql);
						if($result->num_rows > 0){
							while($row = $result->fetch_array()){?>
						<tr align="center" style="height:35px">
      	<td style="border-bottom:1px solid #333;"> <?php echo $row['category']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['name']; ?> </td>
        <td style="border-bottom:1px solid #333;">Rs. <?php echo $row['retail']; ?> </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['quantity']; ?> pcs. </td>
        <td style="border-bottom:1px solid #333;"> <?php echo $row['supplier']; ?> </td>
        <td style="border-bottom:1px solid #333;">
        
<a href="process_sales1.php?id=<?php echo md5($row['id']);?>"><input type="button" value="pick" style="width:90px; height:30px; color:#FFF; background: #930; border:1px solid #930; border-radius:3px;"></a>
        
        </td>
      </tr>
						<?php
					
							}

						}else{
							echo "<center>No records</center>";
						}
					}
				$db_link->close();
				?>
				</table>
                </td>
  </tr>
</table>
<br><br><br>
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


<div id="popup-box1" class="popup-position">
<div id="popup-wrapper">
<div id="popup-container">
    <div id="popup-head-color1">
    <p style="text-align:right !important; font-family: 'Courier New', Courier, monospace;font-size:15px;"><a href= "javascript:void(0)" onclick="toggle_visibility('popup-box1')"><font color="#FFF"> X </font></a></p>
    <p style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:16px;"> Add Item Form </p>
    </div>
    <br />

</div>
</div>
</div>

</body>
</html>