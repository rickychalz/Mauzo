<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';
require './vendor/phpmailer/phpmailer/src/Exception.php';

    // Connect to the database 
    $db = new mysqli('localhost', 'root', '3]H_iTKr6XK~', 'amplepac_tebozdb'); 

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"]; // Reset submit user's email

    // Check if the email exists in the database
    $sql = "SELECT userId FROM users WHERE userEmail = '$email'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // Generate a random token and store it in the database
        $token = bin2hex(random_bytes(32));
        $expiry_time = time() + 3600; // Token expires in 1 hour
        $exptime = date("Y-m-d H:i:s", $expiry_time);//convert into mysql
        $sql = "INSERT INTO pwdreset(`email`, `token`, `exptime`) VALUES ('$email', '$token', '$exptime')";
        $db->query($sql);

        // Send a password reset link to the user's email
        $reset_link = "http://localhost/Mauzo/changepwd.php?token=$token";
        sendPasswordResetEmail($email, $reset_link);
        // Send the link using email libraries or services like PHPMailer or SendGrid
        // Example: mail($email, "Password Reset", "Click the link to reset your password: $reset_link");

        $successMessage = "Password reset link sent succesfully!";
    } else {
        $errorMessage = "Email not found!";
    }
}



function sendPasswordResetEmail($recipient, $resetLink) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'rickychalz1998@gmail.com'; // Your SMTP username
        $mail->Password = 'hvonulvvsziukjny'; // Your SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('sender@example.com', 'Sender Name');
        $mail->addAddress($recipient);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset';
        $mail->Body = "Click the link to reset your password: <a href='$resetLink'>$resetLink</a>";

        $mail->send();
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>