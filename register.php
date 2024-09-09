<?php

// code to fetch data from the form data and to send it to admin's email as well as to database

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD']=="POST") {
    require 'comp/_dbconnect.php';
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $uname = $_POST['uname'];
    
    $sql = "INSERT INTO `informer` (`name`, `email`, `password`, `username`, `created_at`) VALUES ('$name', '$email', '$password', '$uname', CURRENT_TIMESTAMP);";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Sent to database successfully";
    }

    try {   // used try-catch method to get exception message on facing any issue
        $mail = new PHPMailer(true);    // creating an instance of PHPMailer
        
        // SMTP setup
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ntcian802@gmail.com'; // sender's gmail ID
        $mail->Password = 'wangjdvidhghleey';   // gmail app password
        $mail->SMTPSecure = 'ssl';  // protocol. Alternative : tcp
        $mail->Port = 465;  // port number. 587 for tcp
    
        // sender details
        $mail->setFrom('ntcian802@gmail.com');
        // recipient details
        $mail->addAddress('siddharthsharmaofficial3@gmail.com');
        $mail->isHTML(true);
        // message details
        $mail->Subject = "New Entry Recieved";
        $mail->Body = "<h3>One New Entry Is Recieved</h3> <br><br>Name : <b>$name</b><br>Email : <b>$email</b>";
        // sending message
        $mail->Send();
        // confirmation alert
        echo "<script>   alert('message sent'); document.location.href = 'index.html';   </script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer error : {$mail->ErrorInfo}";    // exception handling
        }
}
?>