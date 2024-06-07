<?php
session_start();
error_reporting(0);
?>


<?php
include 'connect.php';

$edu1 = isset($_GET['edu_1']) ? htmlspecialchars($_GET['edu_1']) : '';
$sch1 = isset($_GET['sch_1']) ? htmlspecialchars($_GET['sch_1']) : '';
$stream1 = isset($_GET['stream1']) ? htmlspecialchars($_GET['stream1']) : '';
$pass1 = isset($_GET['pass1']) ? htmlspecialchars($_GET['pass1']) : '';
$per1 = isset($_GET['per1']) ? htmlspecialchars($_GET['per1']) : '';
$cgpa1 = isset($_GET['cgpa1']) ? htmlspecialchars($_GET['cgpa1']) : '';
$edu2 = isset($_GET['edu_2']) ? htmlspecialchars($_GET['edu_2']) : '';
$sch2 = isset($_GET['sch_2']) ? htmlspecialchars($_GET['sch_2']) : '';
$stream2 = isset($_GET['stream2']) ? htmlspecialchars($_GET['stream2']) : '';
$pass2 = isset($_GET['pass2']) ? htmlspecialchars($_GET['pass2']) : '';
$per2 = isset($_GET['per2']) ? htmlspecialchars($_GET['per2']) : '';
$cgpa2 = isset($_GET['cgpa2']) ? htmlspecialchars($_GET['cgpa2']) : '';
$edu3 = isset($_GET['edu_3']) ? htmlspecialchars($_GET['edu_3']) : '';
$sch3 = isset($_GET['sch_3']) ? htmlspecialchars($_GET['sch_3']) : '';
$stream3 = isset($_GET['stream3']) ? htmlspecialchars($_GET['stream3']) : '';
$pass3 = isset($_GET['pass3']) ? htmlspecialchars($_GET['pass3']) : '';
$per3 = isset($_GET['per3']) ? htmlspecialchars($_GET['per3']) : '';
$cgpa3 = isset($_GET['cgpa3']) ? htmlspecialchars($_GET['cgpa3']) : '';
$edu4 = isset($_GET['edu_4']) ? htmlspecialchars($_GET['edu_4']) : '';
$sch4 = isset($_GET['sch_4']) ? htmlspecialchars($_GET['sch_4']) : '';
$stream4 = isset($_GET['stream4']) ? htmlspecialchars($_GET['stream4']) : '';
$pass4 = isset($_GET['pass4']) ? htmlspecialchars($_GET['pass4']) : '';
$per4 = isset($_GET['per4']) ? htmlspecialchars($_GET['per4']) : '';
$cgpa4 = isset($_GET['cgpa4']) ? htmlspecialchars($_GET['cgpa4']) : '';
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Update Education</title>
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
          <a class="nav-link" href="qualification.php">Update Education</a>
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
<div class="container py-2">
<section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h3 class="alert alert-info fw-bold" style="font-family: Garamond, serif;">Update Education</h3> 
            
</div>
</div>
</div>

<div class="container text-center">
  <div class="row g-2">
    <form method="post" action="update_qua.php">
    <div class="col-10" style="border-style:groove;">
      <div class="p-3">

      <div class="row">
  <div class="col">
  <label for="qua_type" class="form-label fw-bold">Qualification Type</label>
  <select class="form-select" aria-label="Default select example" name="qua_type1">
  <option selected>Select</option>
  <option value="Class X" <?php if($edu1 == "Class X") echo "selected"; ?>>Class X</option>
  <option value="Class XII" <?php if($edu1 == "Class XII") echo "selected"; ?>>Class XII</option>
  <option value="Graduation" <?php if($edu1 == "Graduation") echo "selected"; ?>>Graduation</option>
  <option value="Post-Graduation" <?php if($edu1 == "Post-Graduation") echo "selected"; ?>>Post-Graduation</option>
</select>
  </div>
  <div class="col">
  <label for="name" class="form-label fw-bold">School/College Name</label>
    <input type="text" class="form-control" name="clg_name1" value="<?php echo "$sch1"; ?>">
  </div>
</div>

<div class="row pt-4">
  <div class="col">
  <label for="pass_year" class="form-label fw-bold">Year Of Passing</label>
    <input type="date" class="form-control" name="pass_year1" value="<?php echo "$pass1"; ?>">
  </div>
  <div class="col">
  <label for="stream" class="form-label fw-bold">Stream</label>
    <input type="text" class="form-control" name="stream1" value="<?php echo "$stream1"; ?>">
  </div>
</div>

<div class="row pt-4">
  <div class="col">
  <label for="percentage" class="form-label fw-bold">Percentage</label>
    <input type="text" class="form-control" name="percentage1" value="<?php echo "$per1"; ?>">
  </div>
  <div class="col">
  <label for="cgpa" class="form-label fw-bold">CGPA</label>
    <input type="text" class="form-control" name="cgpa1" value="<?php echo "$cgpa1"; ?>">
  </div>
</div>

      </div>
    </div>
    <div class="col-2"></div>
      
    <div class="col-10" style="border-style:groove;">
    <?php
      if(isset($_SESSION['msg'])) {
        echo "<h4>{$_SESSION['msg']}</h4>";
        unset($_SESSION['msg']);
      }
      ?>
      <div class="p-3 pt-5">
      <div class="row">
  <div class="col">
  <label for="qua_type" class="form-label fw-bold">Qualification Type</label>
  <select class="form-select" aria-label="Default select example" name="qua_type2">
  <option selected>Select</option>
  <option value="Class X" <?php if($edu2 == "Class X") echo "selected"; ?>>Class X</option>
  <option value="Class XII" <?php if($edu2 == "Class XII") echo "selected"; ?>>Class XII</option>
  <option value="Graduation" <?php if($edu2 == "Graduation") echo "selected"; ?>>Graduation</option>
  <option value="Post-Graduation" <?php if($edu2 == "Post-Graduation") echo "selected"; ?>>Post-Graduation</option>
</select>
  </div>
  <div class="col">
  <label for="name" class="form-label fw-bold">School/College Name</label>
    <input type="text" class="form-control" name="clg_name2" value="<?php echo "$sch2"; ?>">
  </div>
</div>

<div class="row pt-4">
  <div class="col">
  <label for="pass_year" class="form-label fw-bold">Year Of Passing</label>
    <input type="date" class="form-control" name="pass_year2" value="<?php echo "$pass2"; ?>">
  </div>
  <div class="col">
  <label for="stream" class="form-label fw-bold">Stream</label>
    <input type="text" class="form-control" name="stream2" value="<?php echo "$stream2"; ?>">
  </div>
</div>

<div class="row pt-4">
  <div class="col">
  <label for="percentage" class="form-label fw-bold">Percentage</label>
    <input type="text" class="form-control" name="percentage2" value="<?php echo "$per2"; ?>">
  </div>
  <div class="col">
  <label for="cgpa" class="form-label fw-bold">CGPA</label>
    <input type="text" class="form-control" name="cgpa2" value="<?php echo "$cgpa2"; ?>">
  </div>
</div>

      </div>
    </div>
    <div class="col-2"></div>


    <div class="col-10" style="border-style:groove;">
      <div class="p-3 pt-5">
      <div class="row">
  <div class="col">
  <label for="qua_type" class="form-label fw-bold">Qualification Type</label>
  <select class="form-select" aria-label="Default select example" name="qua_type3">
  <option selected>Select</option>
  <option value="Class X" <?php if($edu3 == "Class X") echo "selected"; ?>>Class X</option>
  <option value="Class XII" <?php if($edu3 == "Class XII") echo "selected"; ?>>Class XII</option>
  <option value="Graduation" <?php if($edu3 == "Graduation") echo "selected"; ?>>Graduation</option>
  <option value="Post-Graduation" <?php if($edu1 == "Post-Graduation") echo "selected"; ?>>Post-Graduation</option>
</select>
  </div>
  <div class="col">
  <label for="name" class="form-label fw-bold">School/College Name</label>
    <input type="text" class="form-control" name="clg_name3" value="<?php echo "$sch3"; ?>">
  </div>
</div>

<div class="row pt-4">
  <div class="col">
  <label for="pass_year" class="form-label fw-bold">Year Of Passing</label>
    <input type="date" class="form-control" name="pass_year3" value="<?php echo "$pass3"; ?>">
  </div>
  <div class="col">
  <label for="stream" class="form-label fw-bold">Stream</label>
    <input type="text" class="form-control" name="stream3" value="<?php echo "$stream3"; ?>">
  </div>
</div>

<div class="row pt-4">
  <div class="col">
  <label for="percentage" class="form-label fw-bold">Percentage</label>
    <input type="text" class="form-control" name="percentage3" value="<?php echo "$per3"; ?>">
  </div>
  <div class="col">
  <label for="cgpa" class="form-label fw-bold">CGPA</label>
    <input type="text" class="form-control" name="cgpa3" value="<?php echo "$cgpa3"; ?>">
  </div>
</div>
      </div>
    </div>
    <div class="col-2"></div>

    <div class="col-10" style="border-style:groove;">
      <div class="p-3 pt-5">
      <div class="row">
  <div class="col">
  <label for="qua_type" class="form-label fw-bold">Qualification Type</label>
  <select class="form-select" aria-label="Default select example" name="qua_type4">
  <option selected>Select</option>
  <option value="Class X" <?php if($edu4 == "Class X") echo "selected"; ?>>Class X</option>
  <option value="Class XII" <?php if($edu4 == "Class XII") echo "selected"; ?>>Class XII</option>
  <option value="Graduation" <?php if($edu4 == "Graduation") echo "selected"; ?>>Graduation</option>
  <option value="Post-Graduation" <?php if($edu4 == "Post-Graduation") echo "selected"; ?>>Post-Graduation</option>
</select>
  </div>
  <div class="col">
  <label for="name" class="form-label fw-bold">School/College Name</label>
    <input type="text" class="form-control" name="clg_name4" value="<?php echo "$sch4"; ?>">
  </div>
</div>

<div class="row pt-4">
  <div class="col">
  <label for="pass_year" class="form-label fw-bold">Year Of Passing</label>
    <input type="date" class="form-control" name="pass_year4" value="<?php echo "$pass4"; ?>">
  </div>
  <div class="col">
  <label for="stream" class="form-label fw-bold">Stream</label>
    <input type="text" class="form-control" name="stream4" value="<?php echo "$stream4"; ?>">
  </div>
</div>

<div class="row pt-4">
  <div class="col">
  <label for="percentage" class="form-label fw-bold">Percentage</label>
    <input type="text" class="form-control" name="percentage4" value="<?php echo "$per4"; ?>">
  </div>
  <div class="col">
  <label for="cgpa" class="form-label fw-bold">CGPA</label>
    <input type="text" class="form-control" name="cgpa4" value="<?php echo "$cgpa4"; ?>">
  </div>
</div>
      </div>
    </div>
    <div class="col-2"></div>

    

</div>
</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-center">
  <input type="submit" type="button" class="btn btn-primary me-md-2" value="Update" name="education">
</div>
</form>



</div>
</body>
</html>