<?php
session_start();
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
                    <a class="nav-link" href="job.php">Back</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="notification.php">Notifications</a>
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
                        <h3 class="alert alert-info fw-bold" style="font-family: Garamond, serif;">Applied Jobs</h3> 
                    </div>
                </div>
            </div>
            <?php
                        include 'connect.php';

                        if (isset($_SESSION['can_id'])) {

                            $can_id = $_SESSION['can_id'];

$sql = "SELECT aj.*, ajp.*, js.*
FROM apply_job_post ajp
INNER JOIN add_job aj ON aj.Id = ajp.Job_id
INNER JOIN jobseeker_register js ON js.Id = ajp.Candidate_id where ajp.Candidate_id = '$can_id'";

                            $result = $conn->query($sql);

                            if ($result) {
                                $check_post = mysqli_num_rows($result) > 0;
                                if ($check_post) {

                                    while ($row = mysqli_fetch_assoc($result)) {

                                        
                        ?>
            <div class="card">
  <div class="card-body">
 
  <div class="container">
  <div class="row">
    <div class="col-6">
    <?php echo '<h5 style="color:seagreen;">Applied for job: ' . $row['Company'] . '</h5>'; ?>
    <?php echo '<p>Category: ' . $row['Category'] . ' (' . $row['Occupation'] . ')</p>'; ?>
    <?php echo '<p>Job type: ' . $row['Employment_type'] . '</p>'; ?>
    <?php echo '<p>Email: ' . $row['Email'] . '</p>'; ?>
    <?php echo '<h6>Applied Date: ' . $row['Applied'] . '</h6>'; ?>
    <?php echo '<h6 style="color:blueviolet;">' . $row['Status'] . '</h6>'; ?>

    </div>
    <div class="col-6"></div>
  </div>
</div>
    






  </div>
</div>
<?php
                                    }
                                }
                            } else {
                                echo "<p class='errmsg'>Error: " . htmlspecialchars($conn->error) . "</p>";
                            }
                        }
                        mysqli_close($conn);
                        ?>
    </body>
    </html>