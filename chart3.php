<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>Total Quantity chart</title>
        <script src="js/highstock.js"></script>

    <script src="js/highcharts-more.js"></script>
    <script src="js/exporting.js"></script>

<script src="js/jq.js"></script>
<script type="text/javascript">
            $(document).ready(function() {
                var options = {
                    chart: {
                        renderTo: 'bdcontainer',
                        type: 'line'
                    },
                    title: {
                        text: 'Sales Report',
                        x: -20 //center
                    },
                    subtitle: {
                        text: '',
                        x: -20
                    },
           
        scrollbar: {
            enabled:'true'
        },
        navigator: {
            enabled: 'true'
        },
       
                xAxis: {
                        categories: [],
                        title: {
                            text: 'Date'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Quantity'
                        },
                        plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                    },
                    tooltip: {
                        valueSuffix: ' pieces'
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
                    },
                    series: []
                };
                $.getJSON("data3.php", function(json) {
                 options.xAxis.categories = json[0]['data']; //xAxis: {categories: []}
				 options.series[0] = json[1];			                   
                 chart = new Highcharts.Chart(options);
                });
            });
function redirectMe (sel) {
    var url = sel[sel.selectedIndex].value;
    window.location = url;
}
        </script>
	
	</head>
	<link rel="stylesheet" type="text/css" href="css/css1.css">

	<body>
		
	


<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:login.php');
	}
?>

<?php

if($_SESSION['access']=='Salesperson'){
	header('location:sales1.php');
	}
?>

<div id="container">
<div id="header">
<table cellspacing="0" width="100%" border="0" cellpadding="20px">
<tr>
	<td width="56%">
    <table width="41%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
<th scope="col"><font face="Arial" style =size="25px";">I<span style="font-size: 18px;">nventory and Stock Sale System </span></font></th>	    </tr>
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
            <input type="button" id="btnadd" value="Logout" align="middle" src="" />
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
<br><br><br><br>
<select name="myselect" onchange="redirectMe(this);">
 <option value="chart3.php" selected>Total Quantity chart</option>
    <option value="Hardwarechart.php" >Hardware Sales</option>
    <option value="Softwarechart.php">Software Sales</option>
    <option value="Externalchart.php">External Accessories Sales</option>
    <option value="Mobilechart.php" >Mobile Devices Sales </option>
</select>

<div id="bdcontainer" style="min-width: 350px; height: 350px; margin: 0 auto"></div>


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
