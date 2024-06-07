<?php
session_start();
include ('connect.php');

if(isset($_POST['emp_register'])){

    $emp_name = $_POST['emp_name'];
    $emp_email = $_POST['emp_email'];
    $emp_password = $_POST['emp_password'];
    $emp_con_password = $_POST['con_pass'];

    if($emp_password !== $emp_con_password){
        $_SESSION['err_msg'] = "Passwords do not match.";
        header("Location: empregister.php");
        exit;
    }

    $pass = password_hash($emp_password, PASSWORD_BCRYPT);
    $token = bin2hex(random_bytes(15));
    $check_email_query = "SELECT * FROM `employee_register` WHERE Email='$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if(mysqli_num_rows($check_email_result) > 0) {
        // Email already exists
        $_SESSION['err_msg'] = "Already registered with this email.";
            header("Location: empregister.php");
           
    } else {
    $sql = "INSERT INTO `employee_register`(Name,Email,Password,token,status)values('$emp_name','$emp_email','$pass','$token','inactive')";
    $result = mysqli_query($conn, $sql);
   
       if($result) {
           
         $mail = require 'mail.php';
         $mail->setFrom("akhansha38@gmail.com","Jobnax");
         $mail->addAddress($_POST["emp_email"]);
         $mail->Subject = "Employee Account Activation";
         $mail->Body = <<<END
         Hello, $emp_name<br/>
         Click <a href="http://localhost/JOBNAX/emp_activate_account.php?token=$token">here</a> 
         to activate your account.
     
         END;
     
         try {
     
             $mail->send();
     
         } catch (Exception $e) {
     
             echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
             exit;
     
         }
         $_SESSION['msg'] = "Check your email to activate your account.";
         header("Location: emplogin.php");
         exit;
         
         } else {
            
            echo json_encode(array('success' => false, 'message' => "Error: " . mysqli_error($conn)));
         }
       
     }
    }

     mysqli_close($conn);
     ?>
     