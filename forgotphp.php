<?php
session_start();
include 'connect.php'; 

if(isset($_POST['reset'])){
    $reset_email = $_POST['reset_email'];
    

    $forget_query = "select * from jobseeker_register where Email = '$reset_email'";
    $result = mysqli_query($conn, $forget_query);
    $row = $result->fetch_assoc();
        $name = $row["Name"];
        $token = $row["token"];

    if($result){
        $mail = require 'mail.php';
    $mail->setFrom("akhansha38@gmail.com","Jobnax");
    $mail->addAddress($_POST["reset_email"]);
    $mail->Subject = "Forgot Password";
    $mail->Body = <<<END
    Hello, $name<br/>
    Click <a href="http://localhost/JOBNAX/recover_password.php?token=$token">here</a> 
    to reset your password.

    END;

    try {

        $mail->send();

    } catch (Exception $e) {

        echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
        exit;
    }
    $_SESSION['msg'] = "Check your email to reset your password.";
    header("Location: login.php");
    exit;
    }else{
        echo "User not found.";
    }
}

mysqli_close($conn);
?>

