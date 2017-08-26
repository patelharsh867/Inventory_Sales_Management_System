<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		<title>Using Highcharts with PHP and MySQL</title>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
	var chart;
			$(document).ready(function() {
				var options = {
					chart: {
						renderTo: 'bdcontainer',
						defaultSeriesType: 'line',
						marginRight: 130,
						marginBottom: 25
					},
					title: {
						text: 'Sales report',
						x: -20 //center
					},
					subtitle: {
						text: '',
						x: -20
					},
					xAxis: {
						type: 'datetime',
					//	tickInterval: 3600 * 1000, // one hour
						tickWidth: 0,
						gridLineWidth: 1,
						labels: {
							align: 'center',
							x: -3,
							y: 20,
						//	formatter: function() {
						//		return Highcharts.dateFormat('%l%p', this.value);
						//	}
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
					
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'top',
						x: -10,
						y: 100,
						borderWidth: 0
					},
					series: [{
						name: 'Total Sales'
					}]
				}
				// Load data asynchronously using jQuery. On success, add the data
				// to the options and initiate the chart.
				// This data is obtained by exporting a GA custom report to TSV.
				// http://api.jquery.com/jQuery.get/
				jQuery.get('data1.php', null, function(tsv) {
					var lines = [];
					traffic = [];
					try {
						// split the data return into lines and parse them
						tsv = tsv.split(/\n/g);
						jQuery.each(tsv, function(i, line) {
							line = line.split(/\t/);
							date = Date.parse(line[0] +' UTC');
							traffic.push([
								date,
								parseInt(line[1].replace(',', ''), 10)
							]);
						});
					} catch (e) {  }
					options.series[0].data = traffic;

					chart = new Highcharts.Chart(options);
				});
			});
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
	<table width="669" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <th width="100" height="62" scope="col"><a href="index.php">Dashboard</a></th>
	    <th width="80" scope="col"><a href="sales.php">Sales</a></th>
	    <th width="100" scope="col"><a href="products.php">Products</a></th>
	    <th width="120" scope="col"><a href="customers.php">Customers</a></th>
	    <th width="110" scope="col"><a href="supplier.php">Supplier</a></th>
	    <th width="112" scope="col"><a href="salesreport.php">Sales Report</a></th>
	    <th width="150" scope="col"><a href="chart1.php">Product Share</a></th>

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


<div id="bdcontainer" style="min-width: 300px; height: 300px; margin: 0 auto"></div>


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
