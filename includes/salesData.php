<?php
header('Content-Type: application/json');
include('../includes/dbcon.php');

//query to get data from the table
$query = "SELECT `id`,  `salesAmount` FROM `Sales` WHERE 1";

//execute query
$result = $db->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}



//now print the data
print json_encode($data);


?>