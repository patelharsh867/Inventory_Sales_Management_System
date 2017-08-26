<html>
<head>
</head>
<body>
<?php
require('config.php');
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

$query1 ="SELECT name , AVG(quantity) - Slope * (TO_DAYS(dates) - AVG(TO_DAYS(dates))) AS pd from predict group by name";
$result1=mysqli_query($db_link, $query1);

while ($row=mysqli_fetch_array($result1)){
	echo $row['name'];
		echo $row['pd'];


}
?>


</body>
</html>