<?php
include ('connect.php');
session_start();
if(isset($_SESSION['msg'])) {
  echo "<p>{$_SESSION['msg']}</p>";
  unset($_SESSION['msg']);
}
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Update Password</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-9/assets/css/login-9.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>

    </style>
    </head>
    <body>
    <?php
include 'connect.php'; 

if(isset($_POST['update_pass'])){
    
    if(isset($_GET['token'])) {
        $token = $_GET["token"];
    
        $new_password = $_POST['reset_pass'];
        $confirm_password = $_POST['con_pass'];

        $new_pass = password_hash($new_password, PASSWORD_BCRYPT);
        $con_pass = password_hash($confirm_password, PASSWORD_BCRYPT);

        
        if($new_password == $confirm_password){
            
            $update_password = "UPDATE jobseeker_register SET Password = '$new_pass' WHERE token = '$token'";
            $result = mysqli_query($conn, $update_password);

            if($result){
                $_SESSION['msg'] = "Password Updated Successfully..";
                header("Location: login.php");
                exit;
            } else{
                $_SESSION['msg'] = "Password Not Updated.";
                header("Location: recover_password.php");
                
            }
        } else{
            $_SESSION['msg'] = "Password Does not Match.";
            header("Location: recover_password.php");
            
        }
    } else{
        
        $_SESSION['msg'] = "Token not found";
        header("Location: recover_password.php");
        
    }
}

mysqli_close($conn);
?>

    <div class="container-fluid">
<div class="container py-5">
<section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h3 class="fw-bold" style="font-family: Garamond, serif; color:#005A9C;">Change Password</h3> 
            <div class="container text-center">
  <div class="row align-items-center py-3">
    <div class="col">
    </div>
    
    <div class="col-4" style="border-style:groove;">
    <form method="post" action="">
    <label for="reset_pass" class="form-label fw-bold">New Password</label>
<input type="password" id="" class="form-control"  name="reset_pass">

<label for="con_pass" class="form-label fw-bold pt-2">Confirm Password</label>
<input type="password" id="" class="form-control"  name="con_pass">

<div class="pt-3 pb-3">
<input class="btn btn-secondary" type="submit" value="Update" name="update_pass">
</div>
</form>
</div>

<div class="col">
    </div>

          </div>
        </div>
</div>
</body>


</html>
