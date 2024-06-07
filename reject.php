<?php
session_start();
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE apply_job_post SET Status = 'Rejected' WHERE Candidate_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>
        alert("You Rejected...");
        window.location.href = "report.php";
        </script>';
    } else {
        echo '<script>
        alert("Something went wrong while rejecting...");
        window.location.href = "report.php";
        </script>';
    }
    mysqli_close($conn);
}
?>
