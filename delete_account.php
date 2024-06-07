<?php
error_reporting(0);
session_start();
if(isset($_SESSION["username"])) {
    $loggedin = true;
  }else{
    //  $loggedin = false;
    header('Location:login.php');
  }
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Delete Account</title>
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

.error{
  color:red;
  font-weight:bold;
}



    </style>
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
          <a class="nav-link" href="job.php">Job</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="notification.php">My Application</a>
        </li>
        
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          More
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="personal.php">Profile</a></li>
          
        </ul>
     </li>
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Manage Account
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="change_pass.php">Change Password</a></li>
          <li><a class="dropdown-item" href="change_email.php">Change Email Address</a></li>
          <li><a class="dropdown-item" href="delete_account.php">Delete Account</a></li>
          
        </ul>
     </li>
     
    </ul>
</ul>
<span class="navbar-text">
         <p class="fw-bold">Welcome, <?php echo $_SESSION['name'];?></p>
        <a type="button" class="btn btn-outline-info fw-bold" href="logout.php">Logout</a>
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
            <h3 class="fw-bold" style="font-family: Garamond, serif; color:#005A9C;">Delete Account</h3> 
            <h5 class="fw-bold" style="font-family: Garamond, serif; color:#0000FF;"><?php echo $_SESSION['name'];?>, we are sorry to see you go.</h5>
            <h5 class="fw-bold" style="font-family: Garamond, serif; color:#0000FF;">Please note that deleting your account is irreversible and all the data associated with your <?php echo $_SESSION['username'];?>  account will be permanently deleted.</h5>
            <div class="container text-center">
  <div class="row align-items-center py-3">
    <div class="col">
    </div>
    
    <div class="col-4" style="border-style:groove;">
    <?php
include ('connect.php');
if(isset($_SESSION['msg'])) {
  echo "<p>{$_SESSION['msg']}</p>";
  unset($_SESSION['msg']);
}
?>  
<form method="post" action="del_php.php">
<p class="error"><?php echo $error;?></p>
<p><label for="feedback">Before you leave, please tell us why you'd like to delete your Jobnax account. This information will help us improve. (Optional)</label></p>
<textarea name="feedback" rows="4" cols="50" placeholder="Your Feedback Matters"></textarea>
<div class="pt-3 pb-3">
<input class="btn btn-info" type="submit" value="Proceed" name="delete_btn">
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