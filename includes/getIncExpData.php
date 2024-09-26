<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('dbcon.php');


// Check connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT DATE(date) as date, SUM(amount) FROM transactions  WHERE transType = 'expense') as total_income, SUM(expense) as total_expense FROM income_expense_data WHERE DATE(date_column) BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE() GROUP BY DATE(date_column)";
$result = $db->query($sql);

$data = array();
while($row = $result->fetch_assoc()) {
  $data[] = $row;
}



echo json_encode($data);
?>