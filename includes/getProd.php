<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$db = mysqli_connect('localhost', 'root', '3]H_iTKr6XK~', 'amplepac_tebozdb');

// Get the product name 
$prodName = isset($_POST['prodName']) ? $_POST['prodName']:'';
$sql = "SELECT `prodBrand`, `barCode`, `sellPrice` FROM products WHERE `prodName` = '$prodName'";
$result = mysqli_query($db, $sql);
while($rows = mysqli_fetch_array($result)){
    $data['brand'] = $rows['prodBrand'];
    $data['barcode'] = $rows['barCode'];
    $data['price'] = $rows['sellPrice'];
}

echo json_encode($data);

?>
  
