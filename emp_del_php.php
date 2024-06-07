<?php
session_start();
include 'connect.php'; 
$error = "";
if(isset($_POST['delete_btn'])){

    $email = $_SESSION['emp_username'];
    $name = $_SESSION['emp_name'];
    $feedback =  $_POST['feedback'];

    $delete = "INSERT INTO `deleted_users`(Name,Email,Feedback,User_type)values('$name','$email','$feedback','Employee')";
   $result = mysqli_query($conn, $delete);
   if($result){
    //echo "Added";
    header('Location:emp_del_next.php');
   }else{
    $_SESSION['msg'] = "Cannot Proceed, Something went wrong.";
    header('Location:emp_delete_account.php');
   }

}


mysqli_close($conn);
    ?>