<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Job Post</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-9/assets/css/login-9.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .nav-link {
            color: white;
            font-size: 18px;
        }
        .nav-link:hover {
            color: #FFB6C1;
        }
        .navbar-text p,
        .navbar-text a {
            display: inline;
            margin-right: 5px;
        }
        .card {
            background: #FAFAD2;
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
                    <a class="nav-link" href="notification.php">My Application</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        More
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
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
                <p class="fw-bold" style="color:white;">Welcome, <?php echo $_SESSION['name']; ?></p>
                <a type="button" class="btn btn-outline-info fw-bold" href="logout.php">Logout</a>
            </span>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <?php
    if (isset($_SESSION['msg'])) {
        echo "<h4 class='alert alert-success' role='alert' style='text-align:center;'>{$_SESSION['msg']}</h4>";
        unset($_SESSION['msg']);
    }
    ?>
    <?php
    if (isset($_SESSION['al_msg'])) {
        echo "<h4 class='alert alert-warning' role='alert' style='text-align:center;'>{$_SESSION['al_msg']}</h4>";
        unset($_SESSION['al_msg']);
    }
    ?>
    <?php
    if (isset($_SESSION['err_msg'])) {
        echo "<h4 class='alert alert-danger' role='alert' style='text-align:center;'>{$_SESSION['err_msg']}</h4>";
        unset($_SESSION['err_msg']);
    }
    ?>
    <div class="py-5">
        <div class="row">
            <div class="col-4">
                <h4 style="text-align:center;color:#FF7F50" class="fw-bold">Filters</h4>
                <form method="GET" action="job.php">
                    <div class="mb-3">
                        <label for="job_type" class="form-label">Job Type</label>
                        <select class="form-select" id="job_type" name="job_type">
                            <option value="">Select Job Type</option>
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="Internship">Internship</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="experience" class="form-label">Experience</label>
                        <select class="form-select" id="experience" name="experience">
                            <option value="">Select Experience</option>
                            <option value="Fresher">Fresher</option>
                            <option value="1 year">1 year</option>
                            <option value="2 year">2 year</option>
                            <option value="3 year">3 year</option>
                            <option value="4 year">4 year</option>
                            <option value="5 year">5 year</option>
                            <option value="6 year">6 year</option>
                            <option value="7 year">7 year</option>
                            <option value="8 years and Above">8 years and Above</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
                    </div>
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                    <a href="job.php" class="btn btn-warning" type="button">Remove Filters</a>
                </form>
            </div>
            <div class="col-8">
                <?php
                include('connect.php');

                // Build the query
                $query = "SELECT * FROM add_job WHERE 1=1";

                if (isset($_GET['job_type']) && !empty($_GET['job_type'])) {
                    $job_type = $_GET['job_type'];
                    $query .= " AND Employment_type = '$job_type'";
                }
                if (isset($_GET['experience']) && !empty($_GET['experience'])) {
                    $experience = $_GET['experience'];
                    $query .= " AND Experience = '$experience'";
                }
                if (isset($_GET['location']) && !empty($_GET['location'])) {
                    $location = $_GET['location'];
                    $query .= " AND Location LIKE '%$location%'";
                }

                $result = mysqli_query($conn, $query);
                $check_post = mysqli_num_rows($result) > 0;

                if ($check_post) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="card border-success mb-3" style="width: 55rem;">
                            <div class="card-body text-success">
                                <h5 class="card-title"><?php echo $row['Category']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $row['Company']; ?></h6>
                                <p class="card-text">
                                    <div class="row">
                                        <div class="col-4">
                                            <p>Location: <?php echo $row['Location']; ?></p>
                                        </div>
                                        <div class="col-4">
                                            <p>Salary: <?php echo $row['Salary']; ?></p>
                                        </div>
                                        <div class="col-4">
                                            <p>Experience: <?php echo $row['Experience']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p>Job type: <?php echo $row['Employment_type']; ?></p>
                                        </div>
                                        <div class="col-4">
                                            <p>Vacancy: <?php echo $row['Required_Employees']; ?></p>
                                        </div>
                                    </div>
                                </p>
                            </div>
                            <div class="card-footer bg-transparent border-success">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="view_more.php?view_id=<?php echo $row['Id']; ?>" class="btn btn-info fw-bold">View More</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No job posts found.</p>";
                }

                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
