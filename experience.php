<?php
session_start();
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Experience</title>
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
                    <a class="nav-link" href="profile.php">Back</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="experience.php">Add Experience</a>
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
                        <h3 class="alert alert-info fw-bold" style="font-family: Garamond, serif;">Add Experience</h3> 
                    </div>
                </div>
            </div>
            
            <form action="process.php" method="post" enctype="multipart/form-data">
                <div id="formContainer">
                    <div class="duplicate-row">
                        <div class="border border-primary-subtle">
                            <div class="row g-3 py-3 px-3">
                                <div class="col">
                                    <label for="emp_name" class="form-label fw-bold">Employment Name</label>
                                    <input type="text" class="form-control" name="emp_name">
                                </div>
                                <div class="col">
                                    <label for="emp_type" class="form-label fw-bold">Employment Type</label>
                                    <input type="text" class="form-control" placeholder="Full-time/Part-time" name="emp_type">
                                </div>
                            </div>
                            <div class="row g-3 pt-3 px-3">
                                <div class="col">
                                    <label for="com_name" class="form-label fw-bold">Company Name</label>
                                    <input type="text" class="form-control" name="com_name">
                                </div>
                                <div class="col">
                                    <label for="start_date" class="form-label fw-bold">Start Date</label>
                                    <input type="date" class="form-control" name="start_date">
                                </div>
                            </div>
                            <div class="row g-3 py-3 px-3">
                                <div class="col">
                                    <label for="end_date" class="form-label fw-bold">End Date</label>
                                    <input type="date" class="form-control" name="end_date">
                                </div>
                                <div class="col">
                                    <label for="ctc" class="form-label fw-bold">CTC (per month)</label>
                                    <input type="text" class="form-control" name="ctc">
                                </div>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end py-3">
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row g-3 py-3 px-3">
                    <div class="col-5">
                    <label for="skills" class="form-label fw-bold">Skills</label>
                                    <input type="text" class="form-control" name="skills">
                    </div>
                    <div class="col">
                    </div>
                </div>

                <div class="row g-3 py-3 px-3">
                    <div class="col-5">
                    <label for="resume" class="form-label fw-bold">Resume/CV</label>
                                    <input type="file" class="form-control" name="resume">
                    </div>
                    <div class="col">
                    </div>
                </div>
                <div class="d-grid gap-2 col-2 mx-auto">
                <input type="submit" class="btn btn-primary" name="submit" value="Save">
</div>
            </form>
        </section>
    </div>
</div>

    
</body>
</html>
