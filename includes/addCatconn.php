<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = mysqli_connect('localhost', 'root', '3]H_iTKr6XK~', 'amplepac_tebozdb');

if (isset($_POST['addCategory'])) {
	// call these variables with the global keyword to make them available in function

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$categoryName     =    $_POST['categoryName'];
   

	$query = "INSERT INTO `categories`(`categoryName`) VALUES ('$categoryName')";
	$sql = mysqli_query($db, $query);

	// register user if there are no errors in the form
	  if(($sql) == 1) {
    
        echo '<script>alert("Category added succesfully ...")</script>';
        header("location:./categories.php");
     }else {
      echo '<script>alert("Failed to add new category")</script>';
    
     }
} 