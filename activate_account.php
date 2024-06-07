<?php
session_start();
include 'connect.php';

if(isset($_GET['token'])) {

    $token = $_GET["token"];
    $update_query = "UPDATE jobseeker_register SET status ='active' WHERE token ='$token'";
    $query = mysqli_query($conn, $update_query);

    if($query){
        $_SESSION['msg'] = "Account activated";
    }else{
        $_SESSION['msg'] = "Account not activated";
    }
} else {
    $_SESSION['msg'] = "Invalid token";
}

mysqli_close($conn);

header("Location: login.php");
exit;
?>
