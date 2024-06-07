<?php
error_reporting(0);
session_start();
if(isset($_SESSION["emp_username"])) {
    $loggedin = true;
  }else{
    
    header('Location:emplogin.php');
  }
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Change Password</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style>
    .nav-link{
            color:white;
            font-size:18px;
           }
.nav-link:hover{
  color: #FFB6C1;
}
           
.navbar-text p,
.navbar-text a {
    display: inline; 
    margin-right: 5px; 
}

.errmsg{
  color:red;
  font-weight:bold;
}

.msg{
  color:green;
  font-weight:bold;
}




    </style>
    </head>
<body style="background-color:#FFF0F5;">
<nav class="navbar navbar-expand-lg" style=" background-color:#CD5C5C;">
  <div class="container-fluid">
    <a class="navbar-brand">
    <img src="job.png" alt="Logo" width="60" height="30" class="d-inline-block align-text-top" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="job_show.php">View</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="job_post.php">Post Job</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="report.php">Reports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="emp_profile1.php">Profile</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Manage Account
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="emp_change_pass.php">Change Password</a></li>
          <li><a class="dropdown-item" href="emp_change_email.php">Change Email Address</a></li>
          <li><a class="dropdown-item" href="emp_delete_account.php">Delete Account</a></li>
          
        </ul>
     </li>
</ul>

<span class="navbar-text">
         <p class="fw-bold">Welcome, <?php echo $_SESSION['emp_name'];?></p>
        <a type="button" class="btn btn-outline-info fw-bold" href="emplogout.php">Logout</a>
        </span>
</div>
</div>
</nav>
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
    <?php
include 'connect.php';
$msg = '';
if(isset($_POST['change_pass']))
{
    $old_password = $_POST['old_pass'];
    $new_password = $_POST['new_pass'];
    $confirm_password = $_POST['con_pass'];
    $email=$_SESSION["emp_username"];
    
    
    $change_pass = "select Password from employee_register where Email = '$email'";
    $result = $conn->query($change_pass);
    $row = $result->fetch_assoc();

    if(password_verify($old_password, $row['Password'])) {

      if($confirm_password ==''){
          $error[] = 'Please confirm the password.';
      }
      if($new_password != $confirm_password){
          $error[] = 'Passwords do not match.';
      }
        if(strlen($new_password)<5){ // min 
          $error[] = 'The password is 6 characters long.';
      }
      
       if(strlen($new_password)>20){ // Max 
          $error[] = 'Password: Max length 20 Characters Not allowed';
      }

      if(!isset($error))
{
      $options = array("cost"=>4);
    $new_password = password_hash($new_password,PASSWORD_BCRYPT,$options);

     $result = mysqli_query($conn,"UPDATE employee_register SET Password='$new_password' WHERE Email='$email'");
           if($result)
           {
      // header("location:account.php?password_updated=1");
      $msg ='Updated Successfully';
           }
           else 
           {
            $error[]='Something went wrong';
           }
}
    }else 
    {
        $error[]='Current password does not match.'; 
    }   
}

if(isset($error)){ 

  foreach($error as $error){ 
    echo '<p class="errmsg">'.$error.'</p>'; 
  }
  }
  mysqli_close($conn);
?>
<p class="msg"><?php echo $msg;?></p>
    <label for="old_pass" class="form-label fw-bold">Old Password</label>
<input type="password" id="" class="form-control"  name="old_pass">

<label for="new_pass" class="form-label fw-bold pt-2">New Password</label>
<input type="password" id="" class="form-control"  name="new_pass">

<label for="con_pass" class="form-label fw-bold pt-2">Confirm Password</label>
<input type="password" id="" class="form-control"  name="con_pass">

<div class="pt-3 pb-3">
<input class="btn btn-primary" type="submit" value="Update" name="change_pass">
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