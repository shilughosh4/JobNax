<?php
error_reporting(0);
session_start();
if(isset($_SESSION["emp_username"])) {
    $loggedin = true;
  }else{
    
    header('Location:emplogin.php');
  }
?>
<?php
include 'connect.php';

$id = $_GET['id'];
 $com = $_GET['company'];
$cat = $_GET['category'];
$occu = $_GET['occupation'];
$req_emp = $_GET['req_emp'];
$salary = $_GET['salary'];
$emp_type = $_GET['emp_type'];
$qualification = $_GET['qualification'];
$gender = $_GET['gender'];
$job_des = $_GET['job_des'];
$location = $_GET['location'];
$exp = $_GET['exp'];

?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Update Post</title>
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
          <a class="nav-link" href="job_show.php">View</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="job_post.php">Post Job</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
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
         <p class="fw-bold" style="color:white;">Welcome, <?php echo $_SESSION['emp_name'];?></p>
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
            <h3 class="fw-bold" style="font-family: Garamond, serif; color:#005A9C;">Update Job Post</h3> 
            <div class="container text-center">
  <div class="row align-items-center py-3">
    <div class="col">
    </div>
    
    <div class="col-6" style="border-style:groove;">
    <form method="post" action="updatejob.php">
      <?php
      include 'connect.php';

      if(isset($_SESSION['msg'])) {
        echo "<h4>{$_SESSION['msg']}</h4>";
        unset($_SESSION['msg']);
      }
      ?>

    <div class="mb-3 row pt-3 ps-2">
    <label for="company" class="col-sm-2 col-form-label fw-bold">Company :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo "$com" ?>" name="company">
    </div>
  </div>

  <div class="mb-3 row ps-2">
    <label for="category" class="col-sm-2 col-form-label fw-bold">Category:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo "$cat" ?>" name="category">
    </div>
  </div>

  <div class="mb-3 row ps-3">
    <label for="occupation" class="col-sm-3 col-form-label fw-bold">Occupation :</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" value="<?php echo "$occu" ?>" name="occupation">
    </div>
  </div>

  <div class="mb-3 row ps-2">
    <label for="req_emp" class="col-sm-4 col-form-label fw-bold">Required Employees :</label>
    <div class="col-sm-8">
      <input type="number" class="form-control" value="<?php echo "$req_emp" ?>" name="req_emp">
    </div>
  </div>

  <div class="mb-3 row ps-4">
    <label for="salary" class="col-sm-2 col-form-label fw-bold">Salary :</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" value="<?php echo "$salary" ?>" name="salary"> 
                      </div>
    </div>
  

  <div class="mb-3 row ps-3">
    <label for="emp_type" class="col-sm-4 col-form-label fw-bold">Employment Type :</label>
    <div class="col-sm-8">
    <select class="form-select" aria-label="Default select example" name="emp_type">
  <option>Select</option>
  <option value="Full-Time" <?php if($emp_type == "Full-Time") echo "selected"; ?>>Full-Time</option>
    <option value="Part-Time" <?php if($emp_type == "Part-Time") echo "selected"; ?>>Part-Time</option>
    <option value="Internship" <?php if($emp_type == "Internship") echo "selected"; ?>>Internship</option>
</select>
    </div>
  </div>

  <div class="mb-3 row ps-4">
    <label for="qualification" class="col-sm-3 col-form-label fw-bold">Qualification :</label>
    <div class="col-sm-8">
    <textarea name="qualification" rows="4" cols="50"><?php echo "$qualification" ?>
</textarea>
    </div>
  </div>

  <div class="mb-3 row ps-4">
    <label for="gender" class="col-sm-2 col-form-label fw-bold">Gender :</label>
    <div class="col-sm-10">
    <select class="form-select" aria-label="Default select example" name="gender">
  <option>Select</option>
  <option value="Male" <?php if($gender == "Male") echo "selected"; ?>>Male</option>
  <option value="Female" <?php if($gender == "Female") echo "selected"; ?>>Female</option>
  <option value="Both Male and Female" <?php if($gender == "Both Male and Female") echo "selected"; ?>>Both Male and Female</option>
</select>
    </div>
  </div>

  <div class="mb-3 row ps-2">
    <label for="job_des" class="col-sm-3 col-form-label fw-bold">Job Description :</label>
    <div class="col-sm-8">
    <textarea name="job_des" rows="4" cols="50"><?php echo "$job_des" ?>
</textarea>
    </div>
  </div>

  <div class="mb-3 row ps-2">
    <label for="location" class="col-sm-3 col-form-label fw-bold">Location:</label>
    <div class="col-sm-8">
    <input type="text" class="form-control" id="" name="location" value="<?php echo "$location" ?>">
    </div>
  </div>

  <div class="mb-3 row ps-2">
    <label for="experience" class="col-sm-3 col-form-label fw-bold">Experience :</label>
    <div class="col-sm-8">
    <select class="form-select" aria-label="Default select example" name="Exp">
  <option>Select</option>
  <option value="Fresher" <?php if($exp == "Fresher") echo "selected"; ?>>Fresher</option>
  <option value="1 year" <?php if($exp == "1 year") echo "selected"; ?>>1 year</option>
  <option value="2 year" <?php if($exp == "2 year") echo "selected"; ?>>2 year</option>
  <option value="3 year" <?php if($exp == "3 year") echo "selected"; ?>>3 year</option>
  <option value="4 year" <?php if($exp == "4 year") echo "selected"; ?>>4 year</option>
  <option value="5 year" <?php if($exp == "5 year") echo "selected"; ?>>5 year</option>
  <option value="6 year" <?php if($exp == "6 year") echo "selected"; ?>>6 year</option>
  <option value="7 year" <?php if($exp == "7 year") echo "selected"; ?>>7 year</option>
  <option value="8 years and Above" <?php if($exp == "8 years and Above") echo "selected"; ?>>8 years and Above</option>
</select>
    </div>
  </div>
  
  <div class="pt-3 pb-3">
<input class="btn btn-warning fw-bold" type="submit" value="Update" name="update_btn">
</div>

</form>
</div>

<div class="col">
    </div>

          </div>
        </div>
</div>
</div>
</body>
</html>