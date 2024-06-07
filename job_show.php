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
            <title>Show Post</title>    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-9/assets/css/login-9.css">
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.7/b-3.0.2/b-html5-3.0.2/datatables.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.7/b-3.0.2/b-html5-3.0.2/datatables.min.js"></script>
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

.dataTables_wrapper .dataTable td {
    text-align: center !important;
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

<table class="table table-striped" id="datatable">
  <thead class="table-danger">
    <tr>
    <th>Id</th>
   
    <th>Company</th>
    <th>Category</th>
    <th>Occupation</th>
    <th>Required Employees</th>
    <th>Salary</th>
    <th>Employee_Type</th>
    <th>Qualification</th>
    <th>Website</th>
    <th>Gender</th>
    <th>Job Description</th>
    <th>Location</th>
    <th>Experience</th>
    <th>Action</th>
</tr>
</thead>
<tbody>

<?php
include 'connect.php'; 

$username = $_SESSION["emp_username"];
$sql = "SELECT * FROM add_job where Email = '$username'";
$result = $conn->query($sql);

$count = 1;
while ($total = $result->fetch_assoc()) {

  $post_id = $total["Id"];
        $_SESSION["post_id"] = $post_id;

    echo "<tr>
        <td>$count</td>
        <td>".$total['Company']."</td>
        <td>".$total['Category']."</td>
        <td>".$total['Occupation']."</td>
        <td>".$total['Required_Employees']."</td>
        <td>".$total['Salary']."</td>
        <td>".$total['Employment_type']."</td>
        <td>".$total['Qualification']."</td>
        <td>".$total['Website']."</td>
        <td>".$total['Gender']."</td>
        <td>".$total['Job_Description']."</td>
        <td>".$total['Location']."</td>
        <td>".$total['Experience']."</td>
        <td>
        <a class='link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fw-bold' href='update_post.php?id=$post_id&company=$total[Company]&category=$total[Category]&occupation=$total[Occupation]&req_emp=$total[Required_Employees]&salary=$total[Salary]&emp_type=$total[Employment_type]&qualification=$total[Qualification]&gender=$total[Gender]&job_des=$total[Job_Description],&location=$total[Location]&exp=$total[Experience]'>Edit</a><a href='delete_post.php?id=$post_id' class='link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover fw-bold px-3' data-id='".$total['Id']."'>Delete</a>
        
    </td>
    </tr>";

    $count++;
}
    
mysqli_close($conn);
?>
 
</tbody>
</table>

</div>



<script type="text/javascript">
    $(document).ready(function() {
    $('#datatable').DataTable({
    });
    
});
    </script>
</body>
</html>
