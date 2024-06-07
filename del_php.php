<?php
session_start();
include 'connect.php'; 
$error = "";
if(isset($_POST['delete_btn'])){

    $email = $_SESSION['username'];
    $name = $_SESSION['name'];
    $feedback =  $_POST['feedback'];

    $delete = "INSERT INTO `deleted_users`(Name,Email,Feedback,User_type)values('$name','$email','$feedback','Jobseeker')";
   $result = mysqli_query($conn, $delete);
   if($result){
    //echo "Added";
    header('Location:del_next.php');
   }else{
    $_SESSION['msg'] = "Cannot Proceed, Something went wrong.";
    header('Location:delete_account.php');
   }

}


mysqli_close($conn);
    ?>