<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'dbcon.php';

$low_stock_threshold = 5; // Set your threshold for low stock
$sql = "SELECT id, prodName, quantity FROM products WHERE quantity < $low_stock_threshold AND quantity != 0";
$sql2 = "SELECT id, prodName, quantity FROM products WHERE quantity = 0";
$result = $db->query($sql);
$result2 = $db->query($sql2);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $prodName = $row["prodName"];
        $quantity = $row["quantity"];

        $title = "Low stock";
        $message = "Product"." ".$prodName. " has only". " " .$quantity." "."units left.";
        $isRead = 1;

        // Add code to insert notification into notifications table
        $insert_sql = "INSERT INTO `notifications` (`title`, `message`, `isRead`) VALUES ('$title', '$message', '$isRead')";
        $db->query($insert_sql);
    }
    echo "Notifications generated for low stock products.";
} else if($result2->num_rows > 0){
    while($row2 = $result2->fetch_assoc()) {
        $id = $row2["id"];
        $prodName = $row2["prodName"];
        $quantity = $row2["quantity"];

        $title2 = "Out of stock";
        $message2 = "Product '$prodName' is out of stock.";
        $isRead = 1;

        // Add code to insert notification into notifications table
        $insert_sql2 = "INSERT INTO `notifications` (`title`, `message`, `isRead`) VALUES ('$title', '$message', '$isRead')";
        $db->query($insert_sql2);
    }
    echo "Notifications generated for out of stock products.";
}
else
{
    echo "No low or out of stock products.";
}

?>