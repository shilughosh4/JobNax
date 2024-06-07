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
            <title>Employee Profile</title>
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
          <a class="nav-link"  aria-current="page" href="job_show.php">View</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="job_post.php">Post Job</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="report.php">Reports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="emp_profile1.php">Profile</a>
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
<div class="card">
<div class="container">
    <div class="row">
    <div class="col-md-3">
<?php
      include 'connect.php';

    if (isset($_SESSION['emp_username'])) {

      $email = $_SESSION['emp_username'];

        $sql = "SELECT * FROM employee_details WHERE Email = '$email'";
            $result = $conn->query($sql);

            if ($result) {
            $check_post = mysqli_num_rows($result) > 0;
            if ($check_post) {
              $row = $result->fetch_assoc();

            echo "<img src='candidate_photo/" . htmlspecialchars($row['Employee_photo']) . "' class='rounded-circle' alt='employee photo' height='170'>";
             } else {
               echo "<img src='img/preview.jpg' class='rounded' alt='preview photo' height='90'>";
                 }
                } else {
              echo "<img src='img/preview.jpg' class='rounded' alt='preview photo' height='90'>";
                }
            }
            mysqli_close($conn);
            ?>
           </div>
           <div class="col-md-9">
            <?php
            include 'connect.php';

            if (isset($_SESSION['emp_username'])) {
                $email = $_SESSION['emp_username'];

                $sql = "SELECT * FROM employee_details WHERE Email = '$email'";
                $result = $conn->query($sql);

                if ($result) {
                    $check_post = mysqli_num_rows($result) > 0;
                    if ($check_post) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            
            ?>
           <div class="card-body">
    <h4 class="card-title">Personal Details</h4>
    <p class="card-text">
    <h6 style='font-size:18px;'> Name : <?php echo htmlspecialchars($row['Name']); ?></h6>
    <h6 style='font-size:18px;'> Email : <?php echo htmlspecialchars($row['Email']); ?></h6>
    <h6 style='font-size:18px;'> Phone : <?php echo htmlspecialchars($row['Phone']); ?></h6>
    <h6 style='font-size:18px;'> Gender : <?php echo htmlspecialchars($row['Gender']); ?></h6>
    <h6 style='font-size:18px;'> Date Of Birth : <?php echo htmlspecialchars($row['DOB']); ?></h6>
    <h6 style='font-size:18px;'> Blood Group : <?php echo htmlspecialchars($row['Blood_Group']); ?></h6>
    <h6 style='font-size:18px;'> Company Name : <?php echo htmlspecialchars($row['Company_name']); ?></h6>
    <h6 style='font-size:18px;'> Company Location : <?php echo htmlspecialchars($row['Company_location']); ?></h6>
    <h6 style='font-size:18px;'> Designation : <?php echo htmlspecialchars($row['Designation']); ?></h6>
    <h6 style='font-size:18px;'> Address : <?php echo htmlspecialchars($row['Address']); ?></h6>
    <h6 style='font-size:18px;'> City : <?php echo htmlspecialchars($row['City']); ?></h6>
    <h6 style='font-size:18px;'> State : <?php echo htmlspecialchars($row['State']); ?></h6>
    <h6 style='font-size:18px;'> Pincode : <?php echo htmlspecialchars($row['Pincode']); ?></h6>

    </p>
    <a href="update_profile.php?Empid=<?php echo htmlspecialchars($row['Emp_id']); ?>&Phone= <?php echo htmlspecialchars($row['Phone']); ?>&gender=<?php echo htmlspecialchars($row['Gender']); ?>&dob=<?php echo htmlspecialchars($row['DOB']); ?>&blood=<?php echo htmlspecialchars($row['Blood_Group']); ?>&com_name=<?php echo htmlspecialchars($row['Company_name']); ?>&com_loc=<?php echo htmlspecialchars($row['Company_location']); ?>&deg=<?php echo htmlspecialchars($row['Designation']); ?>&add=<?php echo htmlspecialchars($row['Address']); ?>&city=<?php echo htmlspecialchars($row['City']); ?>&state=<?php echo htmlspecialchars($row['State']); ?>&code=<?php echo htmlspecialchars($row['Pincode']); ?>" class="btn btn-warning">Update</a>
  </div>
  
           </div>
        </div>
        </div>    
        <?php
                            }
                        } else {
                            echo "<div class='card'>
                                    <div class='card-body'>
                                        <h5>Personal Details:</h5>
                                        <p>No Details</p>
                                        <a href='emp_profile.php' class='btn btn-info' type='button'>Add</a>
                                    </div>
                                  </div>";
                        }
                    } else {
                        echo "<div class='card'>
                                <div class='card-body'>
                                    <h5>Personal Details:</h5>
                                    <p>Error fetching details: " . htmlspecialchars($conn->error) . "</p>
                                </div>
                              </div>";
                    }
                }
                mysqli_close($conn);
                ?>                  
  
</div>
</div>
</body>
</html>
