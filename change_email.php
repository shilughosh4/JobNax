<?php
error_reporting(0);
session_start();
if(isset($_SESSION["username"])) {
    $loggedin = true;
} else {
    header('Location:login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Email Address</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        .error {
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
                    <a class="nav-link" href="job.php">Job</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="notification.php">My Application</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        More
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="personal.php">Profile</a></li>
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
                <p class="fw-bold">Welcome, <?php echo $_SESSION['name']; ?></p>
                <a type="button" class="btn btn-outline-info fw-bold" href="logout.php">Logout</a>
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
                        <h3 class="fw-bold" style="font-family: Garamond, serif; color:#005A9C;">Change Email</h3>
                        <h5 class="fw-bold" style="font-family: Garamond, serif; color:#0000FF;">Note: Please note that all the data associated with your account ( <?php echo $_SESSION['username']; ?> ) will be linked to your new email address after this change. Also, ensure that you have access to both the email accounts for making the change.</h5>
                        <div class="container text-center">
                            <div class="row align-items-center py-3">
                                <div class="col"></div>
                                <div class="col-4" style="border-style:groove;">
                                    <?php
                                    include 'connect.php';
                                    $msg = "";
                                    $error = "";

                                    if (isset($_POST['change_email'])) {
                                        $can_id = $_SESSION['can_id'];
                                        $new_email = $_POST['new_email'];
                                        $ex_email = $_SESSION["username"];

                                        if($ex_email != $change_email){

                                        // Update candidate email
                                        $sql1 = "UPDATE jobseeker_register SET Email = ? WHERE Id = ?";
                                        $stmt1 = mysqli_prepare($conn, $sql1);
                                        mysqli_stmt_bind_param($stmt1, 'ss', $new_email, $can_id);
                                        $result1 = mysqli_stmt_execute($stmt1);

                                        if ($result1) {
                                            // Update email in candidate_education
                                            $sql2 = "UPDATE candidate_education ce 
                                                     JOIN jobseeker_register j ON ce.Candidate_id = j.Id
                                                     SET ce.Email = j.Email 
                                                     WHERE j.Id = ?";
                                            $stmt2 = mysqli_prepare($conn, $sql2);
                                            mysqli_stmt_bind_param($stmt2, 's', $can_id);
                                            $result2 = mysqli_stmt_execute($stmt2);

                                            // Update email in candidate_experience
                                            $sql3 = "UPDATE candidate_experience cx 
                                                     JOIN jobseeker_register j ON cx.Can_id = j.Id 
                                                     SET cx.Email = j.Email 
                                                     WHERE j.Id = ?";
                                            $stmt3 = mysqli_prepare($conn, $sql3);
                                            mysqli_stmt_bind_param($stmt3, 's', $can_id);
                                            $result3 = mysqli_stmt_execute($stmt3);

                                            // Update email in candidate_profile
                                            $sql4 = "UPDATE candidate_details cd 
                                                     JOIN jobseeker_register j ON cd.Can_id = j.Id 
                                                     SET cd.Can_Email = j.Email 
                                                     WHERE j.Id = ?";
                                            $stmt4 = mysqli_prepare($conn, $sql4);
                                            mysqli_stmt_bind_param($stmt4, 's', $can_id);
                                            $result4 = mysqli_stmt_execute($stmt4);

                                            if ($result2 && $result3 && $result4) {
                                              $msg = "Email updated successfully.Please logout and login again with your New Email.";
                                            } else {
                                              $error = "Error updating email in education,experience and profile tables: " . mysqli_error($conn);
                                            }
                                        } else {
                                          $error = "Error updating email in candidates table: " . mysqli_error($conn);
                                        }
                                    }else{
                                        $error = "New email must be different from the current one.";
                                      }
                                }
                                    mysqli_close($conn);
                                    ?>
                                    <p class="error"><?php echo $error; ?></p>
                                    <p class="msg"><?php echo $msg; ?></p>
                                    <form method="post" action="">
                                        <label for="new_email" class="form-label fw-bold">New Email</label>
                                        <input type="email" id="new_email" class="form-control" name="new_email">
                                        <div class="pt-3 pb-3">
                                            <input class="btn btn-primary" type="submit" value="Update" name="change_email">
                                        </div>
                                    </form>
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>
