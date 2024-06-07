<?php
session_start();
if (!isset($_SESSION["emp_username"])) {
    header('Location: emplogin.php');
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-9/assets/css/login-9.css">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.7/b-3.0.2/b-html5-3.0.2/datatables.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-2.0.7/b-3.0.2/b-html5-3.0.2/datatables.min.js"></script>
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

        .dataTables_wrapper .dataTable td {
            text-align: center !important;
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
                    <p class="fw-bold">Welcome, <?php echo $_SESSION['emp_name']; ?></p>
                    <a type="button" class="btn btn-outline-info fw-bold" href="emplogout.php">Logout</a>
                </span>
            </div>
        </div>
    </nav>
    <div class="container py-2">
        <section id="candidates" class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center latest-job margin-bottom-20">
                        <h3 class="alert alert-info fw-bold" style="font-family: Garamond, serif;">Candidate List</h3>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <table class="table table-bordered border-primary">
                    <thead class="table-danger">
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Category</th>
                            <th>Occupation</th>
                            <th>Experience</th>
                            <th>Highest Qualification</th>
                            <th>Candidate Location</th>
                            <th>View More</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'connect.php';

                        if (isset($_SESSION['emp_id'])) {
                            $emp_id = $_SESSION['emp_id'];

                            $sql = "select cd.*,ced.*,cex.*,ajp.*,jp.* from apply_job_post ajp
                                    inner join candidate_details cd on cd.Can_id = ajp.Candidate_id
                                    inner join candidate_education ced on ced.Candidate_id = ajp.Candidate_id
                                    inner join candidate_experience cex on cex.Can_id = ajp.Candidate_id
                                    inner join add_job jp on jp.Id = ajp.Job_id where ajp.Emp_id = '$emp_id'";

                            $result = $conn->query($sql);
                            while ($total = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>" . htmlspecialchars($total['Can_Name']) . "</td>
                                    <td>" . htmlspecialchars($total['Company']) . "</td>
                                    <td>" . htmlspecialchars($total['Category']) . "</td>
                                    <td>" . htmlspecialchars($total['Occupation']) . "</td>
                                    <td>" . htmlspecialchars($total['Type']) . "</td>
                                    <td>" . htmlspecialchars($total['First_Education_type']) . "</td>
                                    <td>" . htmlspecialchars($total['State']) . "</td>
                                    <td>
                                    <button data-id='" . htmlspecialchars($total['Can_id']) . "' class='btn btn-primary fw-bold view-more-btn' data-bs-toggle='modal' data-bs-target='#view'>View More</button>
                                    </td>
                                    </tr>";
                            }
                        }

                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <div class='modal fade' id='view' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-scrollable'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Candidate Details</h1>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <!-- Candidate details will be loaded here -->
                </div>
                <div class='modal-footer'>
                <a id="accept-button" href="#" class="btn btn-success" role="button">Accept</a>
                <a id="reject-button" href="#" class="btn btn-danger" role="button">Reject</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.view-more-btn').on('click', function () {
                var candidateId = $(this).data('id');
                console.log(candidateId);
                $.ajax({
                    url: 'get_details.php',
                    type: 'POST',
                    data: { id: candidateId },
                    success: function (response) {
                        $('#view .modal-body').html(response);
                        $('#accept-button').attr('href', 'accept.php?id=' + candidateId);
                        $('#reject-button').attr('href', 'reject.php?id=' + candidateId);
                    }
                });
            });
        });
    </script>
</body>

</html>
