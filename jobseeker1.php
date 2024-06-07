<?php
session_start();
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Jobseeker Home Page</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style>
    .nav-link{
            color:white;
            font-size:20px;
           }
.nav-link:hover{
  color: #FFB6C1;
}
           
.navbar-text p,
.navbar-text a {
    display: inline; 
    margin-right: 5px; 
}

    </style>
<body style="background-color:#FFF0F5;">
<?php
error_reporting(0);
if(isset($_SESSION["username"])) {
  $loggedin = true;
}else{
    $loggedin = false;
}

  echo '<nav class="navbar navbar-expand-lg" style=" background-color:#CD5C5C;">
  <div class="container-fluid">
    <a class="navbar-brand">
    <img src="job.png" alt="Logo" width="60" height="50" class="d-inline-block align-text-top" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="job.php">Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About us</a>
        </li>';

    

      if(!$loggedin){
        echo '<a type="button" class="btn btn-warning me-4 fw-bold" href="jobregister.php">Register</a>
        <a type="button" class="btn btn-primary fw-bold" href="login.php">Log in</a>
        ';
        
      }
      if($loggedin){
        echo '<li class="nav-item">
        <a class="nav-link" href="#">Notification</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          More
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li><a class="dropdown-item" href="#">Edit/Update Resume</a></li>
          <li><a class="dropdown-item" href="#">My Applications</a></li>
          <li><a class="dropdown-item" href="#">My Preference</a></li>
          
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
    
        <span class="navbar-text">
        <p class="fw-bold">Welcome, ' . $_SESSION['name'] . '</p>
        <a type="button" class="btn btn-outline-info fw-bold" href="logout.php">Logout</a>
        </span>
        </div>';

    
      }

      echo '
    </div>
  </div>
</nav>';
?>
<h3>This is Jobseeker Portal.</h3>
</body>
</html>
