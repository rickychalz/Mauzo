<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    // Connect to the database 
    $db = new mysqli('localhost', 'root', '3]H_iTKr6XK~', 'amplepac_tebozdb'); 

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_GET["token"]; // Token from the URL parameter
    $newPassword = $_POST["pwd"]; // New password

    // Check if the token exists and is not expired
    $current_timestamp = time();
    $sql = "SELECT email FROM pwdreset WHERE token = '$token' AND exptime > '$current_timestamp'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row["email"];
        // Hash the new password and update it in the users table
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET userPwd = '$hashedPassword' WHERE userEmail = '$email'";
        $db->query($sql);

        // Delete the used token from the password_reset_requests table
        $sql = "DELETE FROM pwdreset WHERE token = '$token'";
        $db->query($sql);

        $successMessage = "Password reset successfully";
    } else {
        $errorMessage = "Invalid or expired token";
    }
}

$db->close();
?>
