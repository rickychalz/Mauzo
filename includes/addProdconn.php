<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = mysqli_connect('localhost', 'root', '3]H_iTKr6XK~', 'amplepac_tebozdb');

if (isset($_POST['addProduct'])) {
	// call these variables with the global keyword to make them available in function

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$prodName     =    $_POST['prodName'];
    $prodBrand    =    $_POST[ 'prodBrand'];
	$prodCategory  =    $_POST['prodCategory'];
    $barCode  =    $_POST['barCode'];
    $quantity  =    $_POST['quantity'];
    $sellPrice  =    $_POST['sellPrice'];

    $sql_check = "SELECT COUNT(*) AS count FROM `products` WHERE `prodName` = '$prodName' AND `prodBrand` = '$prodBrand' AND  `prodCategory` = '$prodCategory' AND `barCode` = '$barCode'";
    $result_check = $db->query($sql_check);

$row_check = $result_check->fetch_assoc();
if ($row_check['count'] > 0) {
    //echo "Record already exists. Insertion stopped.";
    echo "<script>
    alert('Record already exists!');
    window.location.href='./addProd.php';
    </script>";
}
else {
    $query = "INSERT INTO `products`(`prodName`, `prodBrand`, `prodCategory`,`barCode`,`quantity`, `sellPrice` ) VALUES ('$prodName', '$prodBrand', '$prodCategory', '$barCode', '$quantity', '$sellPrice')";
	$sql = mysqli_query($db, $query);

	// register user if there are no errors in the form
	  if(($sql) == 1) {
    
        echo '<script>alert("Product added succesfully ...")</script>';
        header("location:./products.php");
     }else {
      echo '<script>alert("Failed to add new product")</script>';
    
     }
} 
}
?>


