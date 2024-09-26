<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('./includes/dbcon.php');

if (isset($_POST['addSale'])) {
	// call these variables with the global keyword to make them available in function

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$prodName     =    $_POST['prodName'];
    $prodBrand    =    $_POST['prodBrand'];
	$prodCategory  =    $_POST['prodCategory'];
    $barCode  =    $_POST['barCode'];
    $quantity  =    $_POST['quantity'];
    $salesPrice  =    $_POST['salesPrice'];
    $discount = $_POST['discount'];
    $salesAmount  =    $_POST['salesAmount'];
    $date  =    $_POST['date'];

    //$submittedDate = strtotime($date);
    //$currentDate = time();

    //if($submittedDate <= $currentDate){
        $query = "INSERT INTO `Sales`(`prodName`, `prodBrand`, `prodCategory`, `barCode`, `quantity`, `salesPrice`, `discount`, `salesAmount`, `date`) VALUES ('$prodName','$prodBrand','$prodCategory','$barCode','$quantity','$salesPrice','$discount','$salesAmount','$date')";
  
        $sql = mysqli_query($db, $query);
       
    
    
        // register user if there are no errors in the form
          if(($sql == 1)){
            
            echo '<script>alert("Sale recorded succesfully ...")</script>';
            header("location:sales.php");
         }else {
          echo '<script>alert("Failed to add new sale")</script>';
        
         }
        
    } 
    
    //else{
    //    echo "Error: The record date cannot be in the Future.";
    //    header("location:addSale.php");
    //}
    //} 
?>
