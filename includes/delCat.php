<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = mysqli_connect('localhost', 'root', '3]H_iTKr6XK~', 'amplepac_tebozdb');

if(isset($_GET['id'])) {
    
    $id = $_GET['id'];

$query = "DELETE FROM `categories` WHERE id = $id";
$result = mysqli_query($db,$query);

if($result) {
    
    header("location:../categories.php");

    echo '<script>alert("Deleted successfully...")</script>';

 }else {
  echo '<script>alert("Process failed")</script>';

 }
}
