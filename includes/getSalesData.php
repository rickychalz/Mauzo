
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$db = mysqli_connect('localhost', 'root', '3]H_iTKr6XK~', 'amplepac_tebozdb');

// Get the product name 
$sql = "SELECT SUM(salesAmount) AS dailySum, date FROM Sales WHERE `date` BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 WEEK) AND CURDATE() GROUP BY `date`  ";
$result = mysqli_query($db, $sql);
while($rows = mysqli_fetch_assoc($result)){
  $data[] = array(
    "x" => $rows["date"],
    "y" => $rows["dailySum"]
  );
    
}

echo json_encode($data);

?>
  