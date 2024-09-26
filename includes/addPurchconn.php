<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = mysqli_connect('localhost', 'root', '3]H_iTKr6XK~', 'amplepac_tebozdb');

if (isset($_POST['addPurchase'])) {
	// call these variables with the global keyword to make them available in function

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$prodName = $_POST['prodName'];
    $prodBrand = $_POST["prodBrand"];
	$prodCategory = $_POST['prodCategory'];
    $barCode = $_POST['barCode'];
    $supplier = $_POST['supplier'];
    $quantity = $_POST['quantity'];
    $purchCost = $_POST['purchCost'];
    $totalAmount = $_POST['totalAmount'];
    $date = $_POST['date'];


	$query = "INSERT INTO `Purchases`(`prodName`, `prodBrand`, `prodCategory`, `barCode`, `supplier`, `quantity`, `purchCost`, `totalAmount`, `date`) VALUES ('$prodName','$prodBrand','$prodCategory','$barCode','$supplier','$quantity','$purchCost','$totalAmount','$date')";
	$sql = mysqli_query($db, $query);

	// register user if there are no errors in the form
	  if(($sql== 1)) {
        echo '<script>alert("Purchase recorded succesfully ...")</script>';
        header("location:./purchases.php");
     }else {
      echo '<script>alert("Failed to add new purchase")</script>';
    
     }
} 
?>
