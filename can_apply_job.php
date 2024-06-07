<?php
error_reporting(0);
session_start();

?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Job Applied</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-9/assets/css/login-9.css">
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.7/b-3.0.2/b-html5-3.0.2/datatables.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.7/b-3.0.2/b-html5-3.0.2/datatables.min.js"></script>
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
          <a class="nav-link" href="dashboard.php">Registered Employees</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reg_can.php">Registered Candidates</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="all_job.php">All job post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="can_apply_job.php">Applied Jobs</a>
        </li>
        
</ul>

<span class="navbar-text">
         <p class="fw-bold" style="color:white;">Welcome, <?php echo $_SESSION['Admin_name'];?></p>
        <a type="button" class="btn btn-outline-info fw-bold" href="admin_logout.php">Logout</a>
        </span>
</div>
</div>
</nav>
<div class="container py-3">
<section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h3 class="fw-bold" style="font-family: Garamond, serif; color:IndianRed;">Candicates Applied for Job</h3> 
            
</div>
</section>
</div>
</div>
</div>


<div class="container-fluid">

<table class="table" id="datatable">
  <thead>
    <tr>
    <th scope="col" class="table-secondary">Candidate_photo</th>
      <th scope="col" class="table-secondary">Name</th>
      <th scope="col" class="table-secondary">Email</th>
      <th scope="col" class="table-secondary">Phone</th>
      <th scope="col" class="table-secondary">Company Applied</th>
      <th scope="col" class="table-secondary">Occupation</th>
      <th scope="col" class="table-secondary">Employment Type</th>
      <th scope="col" class="table-secondary">Gender</th>
      <th scope="col" class="table-secondary">Skills</th>
      <th scope="col" class="table-secondary">Location</th>
      <th scope="col" class="table-secondary">Experience</th>
      <th scope="col" class="table-secondary">Job Posted By</th>
      <th scope="col" class="table-secondary">Job Posted On</th>
      <th scope="col" class="table-secondary">Applied On</th>
      <th scope="col" class="table-secondary">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
include 'connect.php'; 

$sql = "select can.*,job.*,ajp.* from apply_job_post ajp
inner join candidate_details can on can.Can_id = ajp.Candidate_id
inner join add_job job on job.Id = ajp.Job_id";

$result = $conn->query($sql);


while ($total = $result->fetch_assoc()) {

    echo "<tr>
      <td><img src='Candidate_photo/".$total['Candidate_photo']."' alt='Candidate Photo' width='60' height='50' class='rounded-circle'></td>
    <td>".$total['Can_Name']."</td>
    <td>".$total['Can_Email']."</td>
    <td>".$total['Phone']."</td>
    <td>".$total['Company']."</td>
    <td>".$total['Occupation']."</td>
    <td>".$total['Employment_type']."</td>
    <td>".$total['Can_Gender']."</td>
    <td>".$total['Skills']."</td>
    <td>".$total['Location']."</td>
    <td>".$total['Experience']."</td>
    <td>".$total['Name']."</td>
    <td>".$total['Posted_On']."</td>
    <td>".$total['Applied']."</td>
    <td style='color:#9400D3;'>".$total['Status']."</td>

    </tr>";

   
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