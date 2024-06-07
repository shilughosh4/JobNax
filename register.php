<?php
session_start();
include 'connect.php'; 

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password !== $confirm_password){
      $_SESSION['err_msg'] = "Passwords do not match.";
      header("Location: jobregister.php");
      exit;
  }

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $token = bin2hex(random_bytes(15));

    // Check if the email already exists
    $check_email_query = "SELECT * FROM `jobseeker_register` WHERE Email='$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if(mysqli_num_rows($check_email_result) > 0) {
        // Email already exists
        $_SESSION['err_msg'] = "Already registered with this email.";
            header("Location: jobregister.php");
           
    } else {
        // Email does not exist, proceed with the registration
        $sql = "INSERT INTO `jobseeker_register` (Name, Email, Password, token, status) VALUES ('$name', '$email', '$pass', '$token', 'inactive')";
        $result = mysqli_query($conn, $sql);

        if($result) {
            $mail = require 'mail.php';
            $mail->setFrom("akhansha38@gmail.com", "Jobnax");
            $mail->addAddress($_POST["email"]);
            $mail->Subject = "Account Activation";
            $mail->Body = <<<END
            Hello, $name<br/>
            Click <a href="http://localhost/JOBNAX/activate_account.php?token=$token">here</a> 
            to activate your account.
            END;

            try {
                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
                exit;
            }
            $_SESSION['msg'] = "Check your email to activate your account.";
            header("Location: login.php");
            exit;
        } else {
            echo json_encode(array('success' => false, 'message' => "Error: " . mysqli_error($conn)));
        }
    }
}

mysqli_close($conn);
?>
