<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
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
    .errmsg {
        color: red;
        font-weight: bold;
    }
    .msg {
        color: green;
        font-weight: bold;
    }
</style>
</head>
<body style="background-color:#FFF0F5;">
<nav class="navbar navbar-expand-lg" style="background-color:#CD5C5C;">
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
                    <a class="nav-link" href="notification.php">Notification</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        More
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="personal.php">Profile</a></li>
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
            <span class="navbar-text">
                <p class="fw-bold" style="color: white;">Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></p>
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
                        <h3 class="alert alert-info fw-bold" style="font-family: Garamond, serif;"><?php echo htmlspecialchars($_SESSION['name']); ?>'s Profile</h3>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row g-2">
                <div class="col-10">
                    <div class="p-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php
                                            include 'connect.php';

                                            if (isset($_SESSION['username'])) {

                                                $email = $_SESSION['username'];

                                                $sql = "SELECT * FROM candidate_details WHERE Can_Email = '$email'";
                                                $result = $conn->query($sql);

                                                if ($result) {
                                                    $check_post = mysqli_num_rows($result) > 0;
                                                    if ($check_post) {
                                                        $row = $result->fetch_assoc();

                                                        echo "<img src='candidate_photo/" . htmlspecialchars($row['Candidate_photo']) . "' class='rounded' alt='candidate photo' height='90'>";
                                                    } else {
                                                        echo "<img src='img/preview.jpg' class='rounded' alt='preview photo' height='90'>";
                                                    }
                                                } else {
                                                    echo "<img src='img/preview.jpg' class='rounded' alt='preview photo' height='90'>";
                                                }
                                            }
                                            mysqli_close($conn);
                                            ?>
                                            <h3><?php echo htmlspecialchars($_SESSION['name']); ?></h3>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col fw-bold">Registered On: <?php echo htmlspecialchars($_SESSION['date']); ?></div>
                                        <div class="col"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <a type="button" class="btn btn-warning rounded-pill fw-bold" href="personal.php">Add Personal Details</a>
                                            <a type="button" class="btn btn-warning rounded-pill fw-bold" href="qualification.php">Add Education</a>
                                            <a type="button" class="btn btn-warning rounded-pill fw-bold" href="experience.php">Add Experience</a>
                                        </div>
                                        <div class="col-4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="p-3"></div>
                </div>
            </div>
        </div>

        <div class="container overflow-hidden">
            <div class="row gx-5">
                <div class="col-10">
                    <div class="p-3">
                    <?php
                include 'connect.php';

                if (isset($_SESSION['username'])) {
                    $email = $_SESSION['username'];

                    $sql = "SELECT * FROM candidate_details WHERE Can_Email = '$email'";
                    $result = $conn->query($sql);

                    if ($result) {
                        $check_post = mysqli_num_rows($result) > 0;
                        if ($check_post) {
                            while ($row = mysqli_fetch_assoc($result)) {
                               
                ?>
                                <div class="card">
                                    <div class="card-body">
                                        <h5>About Myself:</h5>
                                        <h6 style='font-size:18px;'><?php echo htmlspecialchars($row['About_Myself']); ?></h6>
                                        
                                    </div>
                                </div>
                <?php
                            }
                        } else {
                            echo "<div class='card'>
                                    <div class='card-body'>
                                        <h5>About Myself:</h5>
                                        <p>No Details</p>
                                    </div>
                                  </div>";
                        }
                    } else {
                        echo "<div class='card'>
                                <div class='card-body'>
                                    <h5>About Myself:</h5>
                                    <p>Error fetching details: " . htmlspecialchars($conn->error) . "</p>
                                </div>
                              </div>";
                    }
                }
                mysqli_close($conn);
                ?>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </div>

        <div class="container overflow-hidden">
    <div class="row gx-5">
        <div class="col-10">
            <div class="p-3">
                <?php
                if (isset($_SESSION['msg'])) {
                    echo "<h4>" . htmlspecialchars($_SESSION['msg']) . "</h4>";
                    unset($_SESSION['msg']);
                }
                ?>
                <?php
                include 'connect.php';

                if (isset($_SESSION['username'])) {

                    $email = $_SESSION['username'];

                    $sql = "SELECT * FROM candidate_education WHERE Email = '$email'";
                    $result = $conn->query($sql);

                    if ($result) {
                        $check_post = mysqli_num_rows($result) > 0;
                        if ($check_post) {
                            while ($row = mysqli_fetch_assoc($result)) {
                ?>             
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Qualifications:</h5>
                                        <p style='font-size:18px;'> Education 1 : <?php echo htmlspecialchars($row['First_Education_type']); ?></p>
                                        <p style='font-size:18px;'> School/College : <?php echo htmlspecialchars($row['First_Clg_name']); ?></p>
                                        <p style='font-size:18px;'> Stream : <?php echo htmlspecialchars($row['First_stream']); ?></p>
                                        <p style='font-size:18px;'> Passout : <?php echo htmlspecialchars($row['First_year_of_passing']); ?></p>
                                        <p style='font-size:18px;'> Percentage : <?php echo htmlspecialchars($row['First_percentage']); ?></p>
                                        <p style='font-size:18px;'> CGPA : <?php echo htmlspecialchars($row['First_CGPA']); ?></p><br/>

                                        <p style='font-size:18px;'> Education 2 : <?php echo htmlspecialchars($row['Second_Education_type']); ?></p>
                                        <p style='font-size:18px;'> School/College : <?php echo htmlspecialchars($row['Second_Clg_name']); ?></p>
                                        <p style='font-size:18px;'> Stream : <?php echo htmlspecialchars($row['Second_stream']); ?></p>
                                        <p style='font-size:18px;'> Passout : <?php echo htmlspecialchars($row['Second_year_of_passing']); ?></p>
                                        <p style='font-size:18px;'> Percentage : <?php echo htmlspecialchars($row['Second_percentage']); ?></p>
                                        <p style='font-size:18px;'> CGPA : <?php echo htmlspecialchars($row['Second_CGPA']); ?></p><br/>

                                        <p style='font-size:18px;'> Education 3 : <?php echo htmlspecialchars($row['Third_Education_type']); ?></p>
                                        <p style='font-size:18px;'> School/College : <?php echo htmlspecialchars($row['Third_Clg_name']); ?></p>
                                        <p style='font-size:18px;'> Stream : <?php echo htmlspecialchars($row['Third_stream']); ?></p>
                                        <p style='font-size:18px;'> Passout : <?php echo htmlspecialchars($row['Third_year_of_passing']); ?></p>
                                        <p style='font-size:18px;'> Percentage : <?php echo htmlspecialchars($row['Third_percentage']); ?></p>
                                        <p style='font-size:18px;'> CGPA : <?php echo htmlspecialchars($row['Thirde_CGPA']); ?></p><br/>

                                        <p style='font-size:18px;'> Education 4 : <?php echo htmlspecialchars($row['Four_Education_type']); ?></p>
                                        <p style='font-size:18px;'> School/College : <?php echo htmlspecialchars($row['Four_Clg_name']); ?></p>
                                        <p style='font-size:18px;'> Stream : <?php echo htmlspecialchars($row['Four_stream']); ?></p>
                                        <p style='font-size:18px;'> Passout : <?php echo htmlspecialchars($row['Four_year_of_passing']); ?></p>
                                        <p style='font-size:18px;'> Percentage : <?php echo htmlspecialchars($row['Four_percentage']); ?></p>
                                        <p style='font-size:18px;'> CGPA : <?php echo htmlspecialchars($row['Four_CGPA']); ?></p><br/>
                                        <a href="update_education.php?edu_1=<?php echo urlencode(htmlspecialchars($row['First_Education_type'])); ?>&sch_1=<?php echo urlencode(htmlspecialchars($row['First_Clg_name'])); ?>&stream1=<?php echo urlencode(htmlspecialchars($row['First_stream'])); ?>&pass1=<?php echo urlencode(htmlspecialchars($row['First_year_of_passing'])); ?>&per1=<?php echo urlencode(htmlspecialchars($row['First_percentage'])); ?>&cgpa1=<?php echo urlencode(htmlspecialchars($row['First_CGPA'])); ?>&edu_2=<?php echo urlencode(htmlspecialchars($row['Second_Education_type'])); ?>&sch_2=<?php echo urlencode(htmlspecialchars($row['Second_Clg_name'])); ?>&stream2=<?php echo urlencode(htmlspecialchars($row['Second_stream'])); ?>&pass2=<?php echo urlencode(htmlspecialchars($row['Second_year_of_passing'])); ?>&per2=<?php echo urlencode(htmlspecialchars($row['Second_percentage'])); ?>&cgpa2=<?php echo urlencode(htmlspecialchars($row['Second_CGPA'])); ?>&edu_3=<?php echo urlencode(htmlspecialchars($row['Third_Education_type'])); ?>&sch_3=<?php echo urlencode(htmlspecialchars($row['Third_Clg_name'])); ?>&stream3=<?php echo urlencode(htmlspecialchars($row['Third_stream'])); ?>&pass3=<?php echo urlencode(htmlspecialchars($row['Third_year_of_passing'])); ?>&per3=<?php echo urlencode(htmlspecialchars($row['Third_percentage'])); ?>&cgpa3=<?php echo urlencode(htmlspecialchars($row['Thirde_CGPA'])); ?>&edu_4=<?php echo urlencode(htmlspecialchars($row['Four_Education_type'])); ?>&sch_4=<?php echo urlencode(htmlspecialchars($row['Four_Clg_name'])); ?>&stream4=<?php echo urlencode(htmlspecialchars($row['Four_stream'])); ?>&pass4=<?php echo urlencode(htmlspecialchars($row['Four_year_of_passing'])); ?>&per4=<?php echo urlencode(htmlspecialchars($row['Four_percentage'])); ?>&cgpa4=<?php echo urlencode(htmlspecialchars($row['Four_CGPA'])); ?>" class="btn btn-warning" type="button">Update</a>


                                    </div>
                                </div>
                <?php
                            }
                        } else {
                            echo "<div class='card'><div class='card-body'><h5>Qualification:</h5><p>No Details</p></div></div>";
                        }
                    } else {
                        echo "<div class='card'><div class='card-body'><h5>Qualification:</h5><p>No Details</p></div></div>";
                    }
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>

<div class="container overflow-hidden">
    <div class="row gx-5">
        <div class="col-10">
            <div class="p-3">
                <?php
                include 'connect.php';

                if (isset($_SESSION['username'])) {

                    $email = $_SESSION['username'];

                    $sql = "SELECT * FROM candidate_experience WHERE Email = '$email'";
                    $result = $conn->query($sql);

                    if ($result) {
                        $check_post = mysqli_num_rows($result) > 0;
                        if ($check_post) {
                            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                            <div class="card">
                                <div class="card-body">
                                    <h5>Experience:</h5>
                                    <p> Employment Name: <?php echo htmlspecialchars($row['Employment_Name']); ?></p>
                                    <p> Employment Type: <?php echo htmlspecialchars($row['Employment_type']); ?></p>
                                    <p> Company Name: <?php echo htmlspecialchars($row['Company_name']); ?></p>
                                    <p> Start Date: <?php echo htmlspecialchars($row['Start_Date']); ?></p>
                                    <p> End Date: <?php echo htmlspecialchars($row['End_Date']); ?></p>
                                    <p> CTC (per month): <?php echo htmlspecialchars($row['CTC']); ?></p>
                                    <p> Skills: <?php echo htmlspecialchars($row['Can_Skills']); ?></p>
                                    <p> Resume/CV: <a href="files/<?php echo htmlspecialchars($row['Resume']); ?>" target="_blank">View</a></p>
                                    <a href="update_exp.php?emp_name=<?php echo urlencode($row['Employment_Name']); ?>&emp_type=<?php echo urlencode($row['Employment_type']); ?>&com_name=<?php echo urlencode($row['Company_name']); ?>&st_date=<?php echo urlencode($row['Start_Date']); ?>&en_date=<?php echo urlencode($row['End_Date']); ?>&ctc=<?php echo urlencode($row['CTC']); ?>&skill=<?php echo urlencode($row['Can_Skills']); ?>&resume=<?php echo urlencode($row['Resume']); ?>" class="btn btn-warning" type="button">Update</a>

                                    


                                </div>
                            </div>
                <?php
                            }
                        } else {
                            echo "<div class='card'>
                                    <div class='card-body'>
                                        <h5>Experience:</h5>
                                        <p>No Details</p>
                                    </div>
                                  </div>";
                        }
                    } else {
                        echo "<div class='card'>
                                <div class='card-body'>
                                    <h5>Experience:</h5>
                                    <p>Error fetching details: " . htmlspecialchars($conn->error) . "</p>
                                </div>
                              </div>";
                    }
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>

<div class="container overflow-hidden">
    <div class="row gx-5">
        <div class="col-10">
            <div class="p-3">
                <?php
                include 'connect.php';

                if (isset($_SESSION['username'])) {
                    $email = $_SESSION['username'];

                    $sql = "SELECT * FROM candidate_details WHERE Can_Email = '$email'";
                    $result = $conn->query($sql);

                    if ($result) {
                        $check_post = mysqli_num_rows($result) > 0;
                        if ($check_post) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['Id'];
                                $_SESSION['per_id'] = $id;
                ?>
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Personal Details:</h5>
                                        <p>Father's Name: <?php echo htmlspecialchars($row['Father_name']); ?></p>
                                        <p>Mother's Name: <?php echo htmlspecialchars($row['Mother_name']); ?></p>
                                        <p>Date Of Birth: <?php echo htmlspecialchars($row['DOB']); ?></p>
                                        <p>Blood Group: <?php echo htmlspecialchars($row['Blood_Group']); ?></p>
                                        <p>Address: <?php echo htmlspecialchars($row['Address']); ?></p>
                                        <p>City: <?php echo htmlspecialchars($row['City']); ?></p>
                                        <p>State: <?php echo htmlspecialchars($row['State']); ?></p>
                                        <p>Pincode: <?php echo htmlspecialchars($row['Pincode']); ?></p>
                                        <a href="update_Canprofile.php?father=<?php echo urlencode($row['Father_name']); ?>&mother=<?php echo urlencode($row['Mother_name']); ?>&gender=<?php echo urlencode($row['Can_Gender']); ?>&type=<?php echo urlencode($row['Type']); ?>&dob=<?php echo urlencode($row['DOB']); ?>&blood=<?php echo urlencode($row['Blood_Group']); ?>&add=<?php echo urlencode($row['Address']); ?>&city=<?php echo urlencode($row['City']); ?>&state=<?php echo urlencode($row['State']); ?>&code=<?php echo urlencode($row['Pincode']); ?>&about=<?php echo urlencode($row['About_Myself']); ?>" class = "btn btn-warning" type="button">Update</a>
                                    </div>
                                </div>
                <?php
                            }
                        } else {
                            echo "<div class='card'>
                                    <div class='card-body'>
                                        <h5>Personal Details:</h5>
                                        <p>No Details</p>
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
        <div class="col-2"></div>
    </div>
</div>

    </div>
</div>
</body>
</html>
