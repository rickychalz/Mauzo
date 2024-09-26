<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = mysqli_connect('localhost', 'root', '3]H_iTKr6XK~', 'amplepac_tebozdb');

if (isset($_POST['addTransaction'])) {
	// call these variables with the global keyword to make them available in function

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$transaction     =    $_POST['transaction'];
    $category    =    $_POST[ 'category'];
	$type  =    $_POST['type'];
    $source  =    $_POST['source'];
    $amount  =    $_POST['amount'];
    $date  =    $_POST['date'];

	$query = "INSERT INTO `transactions`(`transactions`, `category`, `type`,`source`,`amount`, `date` ) VALUES ('$transaction', '$category', '$type', '$source', '$amount', '$date')";
	$sql = mysqli_query($db, $query);

	// register user if there are no errors in the form
	  if(($sql) == 1) {
    
        echo '<script>alert("Transaction recorded succesfully ...")</script>';
        header("location:./finance.php");
     }else {
      echo '<script>alert("Failed to record transaction")</script>';
    
     }
} 
?>