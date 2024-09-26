<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = mysqli_connect('localhost', 'root', '3]H_iTKr6XK~', 'amplepac_tebozdb');

if (isset($_POST['addCustomer'])) {
	// call these variables with the global keyword to make them available in function

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$customerName     =    $_POST['customerName'];
	$customerPhone  =    $_POST['customerPhone'];
    $customerEmail  =    $_POST['customerEmail'];
    $customerAddress  =    $_POST['customerAddress'];
   

	$query = "INSERT INTO `customers`(`customerName`, `customerPhone`, `customerEmail`, `customerAddress`) VALUES ('$customerName','$customerPhone','$customerEmail','$customerAddress')";
	$sql = mysqli_query($db, $query);

	// register user if there are no errors in the form
	  if(($sql) == 1) {
    
        echo '<script>alert("Customer added succesfully ...")</script>';
        header("location:./customers.php");
     }else {
      echo '<script>alert("Failed to add new customer")</script>';
    
     }
} 