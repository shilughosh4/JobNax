<?php
session_start();
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Job Details</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-9/assets/css/login-9.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
          <a class="nav-link" href="job.php">Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About us</a>
        </li>
        <li class="nav-item">
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
</ul>
<span class="navbar-text">
         <p class="fw-bold">Welcome, <?php echo $_SESSION['name'];?></p>
        <a type="button" class="btn btn-outline-info fw-bold" href="logout.php">Logout</a>
        </span>
</div>
</div>
</nav>
<div class="container-fluid">
<div class="py-5">
    <div class="row">
    <div class="col">
    </div>
    <div class="col-8">
<?php

include ('connect.php');

if(isset($_GET['view_id'])) {

 $id = $_GET['view_id'];

 $post_query = "select * from add_job where Id = '$id'";
 $result = mysqli_query($conn, $post_query);

 $check_post = mysqli_num_rows($result) > 0;
 if($check_post){

    while($row = mysqli_fetch_assoc($result)){

        ?>

        <div class="card">
        <div class="card-header text-center">
          <h3><?php echo $row['Category']; ?></h3>
        </div>
        <div class="card-body">
          <h4 class="card-title">Company Name: <?php echo $row['Company']; ?> </h4>
          <p class="card-text fw-bold">

          Role: <?php echo $row['Occupation']; ?><br/>
          Experience: <?php echo $row['Experience']; ?><br/>
          Location: <?php echo $row['Location']; ?><br/>
          Skills: <?php echo $row['Skills'];?><br/>
          Salary: <?php echo $row['Salary'];?>
          
<div>
  <h4>Qualification</h4>
  <p><?php echo $row['Qualification'];?></p><br/>
  <h6>Company Website: <?php echo $row['Website'];?> </h6>
    </div>

    <div>
    <h6>Gender: <?php echo $row['Gender'];?> </h6><br/>
    <h6>Employment Type: <?php echo $row['Employment_type'];?> </h6>
    </div>

    <div>
      <h6>Job Description</h6>
      <p><?php echo $row['Job_Description'];?></p><br/>
      <h6>Employees Required: <?php echo $row['Required_Employees'];?></h6><br/>
      <h6>Posted by- <?php echo $row['Name'];?></h6><br/>
    </div>
          </p>
          <div class="d-grid gap-2 col-4 mx-auto">
          <a href="apply.php?id=<?php echo $row['Id']; ?>" class="btn btn-primary" role="button">Submit Application</a>

</div>
        </div>
        <div class="card-footer text-body-secondary text-center">
          Posted on: <?php echo $row['Posted_On'];?>
        </div>
<?php

    }
}
}else{
  header("Location: view_more.php");
  exit();
}

mysqli_close($conn);
?>   
</div>


</div>
<div class="col">
    </div>



</div>
</body>
</html>