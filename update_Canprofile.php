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
<?php
include 'connect.php';

$father = $_GET['father'];
$mother = $_GET['mother'];
$dob = $_GET['dob'];
$blood = $_GET['blood'];
$add = $_GET['add'];
$city = $_GET['city'];
$state = $_GET['state'];
$code = $_GET['code'];
$about = $_GET['about'];
$gender = $_GET['gender'];
$type = $_GET['type'];
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Update Candidate Profile</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous">
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
          <a class="nav-link" href="profile.php">Back</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Update Candidate Profile</a>
        </li>
</ul>
<span class="navbar-text">
<p class="fw-bold" style="font-family: Garamond, serif; color:#FAEBD7;">Welcome, <?php echo $_SESSION['name'];?></p>
        <a type="button" class="btn btn-outline-info fw-bold" href="logout.php">Logout</a>
        </span>
</div>
</div>
</nav>
<div class="container-fluid">

<div class="container py-3">
<section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h2 class="fw-bold" style="font-family: Garamond, serif; color:#00008B;">Update Personal Details</h2>           
          </div>
        </div>
<div class="container text-center">
  <div class="row align-items-center py-3">
    <div class="col">
    </div>
    <div class="col-9">
    <div class="border border-2 border-primary p-2 mb-2">
<form method="post" action="up_Canprofile.php" enctype="multipart/form-data">
<?php
      include 'connect.php';
      if(isset($_SESSION['msg'])) {
        echo "<h4>{$_SESSION['msg']}</h4>";
        unset($_SESSION['msg']);
      }
      ?>
      
<div class="row g-3 py-3">
  <div class="col-md-6">
  <label class="visually-hidden" for="name">Name</label>
    <div class="input-group">
      <div class="input-group-text">Name:</div>
      <input type="text" class="form-control fw-bold" value="<?php echo $_SESSION['name'];?>" disabled>
    </div>
  </div>

  <div class="col-md-6">
  <label class="visually-hidden" for="email">Email:</label>
    <div class="input-group">
      <div class="input-group-text">Email</div>
      <input type="email" class="form-control fw-bold" value="<?php echo $_SESSION['username'];?>" disabled>
    </div>
  </div>
  
</div>

<div class="row g-3 py-3">
  <div class="col-md-6">
  <label class="visually-hidden" for="phone">Mobile No.:</label>
    <div class="input-group">
      <div class="input-group-text">Mobile No.:</div>
      <input type="text" class="form-control" name="phone">
    </div>
  </div>

  <div class="col-md-6">
  <label class="visually-hidden" for="city">Current City:</label>
    <div class="input-group">
      <div class="input-group-text">Current City:</div>
      <input type="text" class="form-control"  name="city" value="<?php echo $city; ?>">
    </div>
  </div>
  
</div>

<div class="row g-3 py-3">
<div class="col-md-6">
    <label for="gender" class="form-label fw-bold">Gender</label>
    <select class="form-select" aria-label="Default select example" name="gender">
  <option selected>Select Gender</option>
  <option value="Male" <?php if($gender == "Male") echo "selected"; ?>>Male</option>
  <option value="Female" <?php if($gender == "Female") echo "selected"; ?>>Female</option>
  <option value="Others" <?php if($gender == "Others") echo "selected"; ?>>Others</option>
</select>
  </div>

  <div class="col-md-6">
    <label for="type" class="form-label fw-bold">Type</label>
    <select class="form-select" aria-label="Default select example" name="type">
  <option selected>Select Type</option>
  <option value="Fresher" <?php if($type == "Fresher") echo "selected"; ?>>Fresher</option>
  <option value="College Student" <?php if($type == "College Student") echo "selected"; ?>>College Student</option>
  <option value="Working Professional" <?php if($type == "Working Professional") echo "selected"; ?>>Working Professional</option>
  <option value="Experienced" <?php if($type == "Experienced") echo "selected"; ?>>Experienced</option>
</select>
  </div>
</div>

<div class="row g-3 py-3">
  <div class="col-md-6">
  <label class="visually-hidden" for="father_name">Father's Name</label>
    <div class="input-group">
      <div class="input-group-text">Father's name:</div>
      <input type="text" class="form-control"  name="father_name" value="<?php echo $father; ?>" >
    </div>
  </div>

  <div class="col-md-6">
  <label class="visually-hidden" for="mother_name">Mother's Name:</label>
    <div class="input-group">
      <div class="input-group-text">Mother's Name</div>
      <input type="text" class="form-control" name="mother_name" value="<?php echo $mother; ?>">
    </div>
  </div>
  
</div>

<div class="row g-3 py-3">
  <div class="col-md-6">
  <label class="visually-hidden" for="dob">Date Of Birth:</label>
    <div class="input-group">
      <div class="input-group-text">Date Of Birth:</div>
      <input type="date" class="form-control"  name="dob" value="<?php echo $dob; ?>">
    </div>
  </div>

  <div class="col-md-6">
  <label class="visually-hidden" for="blood">Blood Group:</label>
    <div class="input-group">
      <div class="input-group-text">Blood Group:</div>
      <input type="text" class="form-control" name="blood" value="<?php echo $blood; ?>">
    </div>
  </div>
  
</div>

<div class="col-12">
<label class="visually-hidden" for="address">Address:</label>
    <div class="input-group">
      <div class="input-group-text">Address:</div>
      <input type="text" class="form-control" name="address" value="<?php echo $add; ?>">
    </div>
  </div>

  <div class="row g-3 py-3">
  <div class="col-md-6">
  <label class="visually-hidden" for="state">State:</label>
    <div class="input-group">
      <div class="input-group-text">State:</div>
      <input type="text" class="form-control"  name="state" value="<?php echo $state; ?>">
    </div>
  </div>

  <div class="col-md-6">
  <label class="visually-hidden" for="code">Pincode:</label>
    <div class="input-group">
      <div class="input-group-text">Pincode:</div>
      <input type="text" class="form-control" name="code" value="<?php echo $code; ?>">
    </div>
  </div>
  
</div>

<div class="row g-3 py-3">

  <div class="col-md-6">
  <label class="visually-hidden" for="photo">Profile Photo:</label>
    <div class="input-group">
      <div class="input-group-text">Profile Photo:</div>
      <input type="file" class="form-control"  name="photo">
    </div>
</div>

<div class="col-md-6">
  <label class="visually-hidden" for="about">About Myself:</label>
    <div class="input-group">
      <div class="input-group-text">About Myself:</div>
      <textarea name="about" rows="4" cols="50"><?php echo "$about" ?>
</textarea>
    </div>
  </div>

    </div>

<div class="d-grid gap-2 d-md-flex justify-content-md-center">
  <input type="submit" class="btn btn-outline-info fw-bold" value="Update" name="Save">
</div>
  
</form>
    </div>
    </div>
    <div class="col">
    </div>
  </div>
</div>
</div>

</body>
</html>