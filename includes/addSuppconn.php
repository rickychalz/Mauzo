<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = mysqli_connect('localhost', 'root', '3]H_iTKr6XK~', 'amplepac_tebozdb');

if (isset($_POST['addSupplier'])) {
	// call these variables with the global keyword to make them available in function

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$supplierName     =    $_POST['supplierName'];
	$supplierPhone  =    $_POST['supplierPhone'];
    $supplierEmail  =    $_POST['supplierEmail'];
    $supplierAddress  =    $_POST['supplierAddress'];
   

	$query = "INSERT INTO `suppliers`(`supplierName`, `supplierPhone`, `supplierEmail`, `supplierAddress`) VALUES ('$supplierName','$supplierPhone','$supplierEmail','$supplierAddress')";
	$sql = mysqli_query($db, $query);

	// register user if there are no errors in the form
	  if(($sql) == 1) {
    
        echo '<script>alert("Supplier added succesfully ...")</script>';
        header("location:./suppliers.php");
     }else {
      echo '<script>alert("Failed to add new supplier")</script>';
    
     }
} 