<html>
<head>
</head>
<body>
<?php
require('config.php');
if(isset($_POST['update'])){
$query="CREATE TABLE  predict SELECT sales.dates, sales.name, sales.quantity, (
N * Sum_XY - Sum_X * Sum_Y
) / ( N * Sum_X2 - Sum_X * Sum_X ) AS Slope
FROM sales
INNER JOIN (

SELECT name, COUNT( * ) AS N, SUM( TO_DAYS( dates ) ) AS Sum_X, SUM( (
TO_DAYS( dates ) ) * ( TO_DAYS( dates ) )
) AS Sum_X2, SUM( quantity ) AS Sum_Y, SUM( quantity * quantity ) AS Sum_Y2, SUM( (
TO_DAYS( dates ) ) * quantity
) AS Sum_XY
FROM sales
GROUP BY name
)G ON G.name = sales.name";





$result=mysqli_query($db_link, $query);
$date = $_POST['dates'];
 $now = strtotime('0000-00-00'); 
     $your_date = strtotime($date);
     $datediff =  $your_date - $now;
     echo (ceil($datediff/86400) + 719528);
$d = (ceil($datediff/86400) + 719528);

$query1 ="SELECT name , (Slope*$d) + ((AVG(quantity) - (Slope * AVG(TO_DAYS(dates))))) AS pd from predict group by name";
$result1=mysqli_query($db_link, $query1);

while ($row=mysqli_fetch_array($result1)){
	echo $row['name'];
		echo $row['pd'];


}
}
?>
<form action="" method="POST" enctype="multipart/form-data">
<table>
<tr>
    <td align="right">Date:</td>
    <td><input type="text" id="txtbox" name="dates" placeholder="dates" required><br></td>
    </tr>
</table>
    <input type="SUBMIT" name="update" id="btnnav" value="compute"></form>

</body>
</html>