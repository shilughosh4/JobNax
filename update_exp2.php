<?php
session_start();
include 'connect.php';

if(isset($_POST['submit'])) {
    echo '<pre>';
    print_r($_FILES['resume']);
    echo '</pre>';

   $file_name = $_FILES['resume']['name'];
  $file_size = $_FILES['resume']['size'];
  $file_type = $_FILES['resume']['type'];
  $tmp_name = $_FILES['resume']['tmp_name'];
  $error = $_FILES['resume']['error'];
  $file_store = "files/".$file_name;

  move_uploaded_file($tmp_name,$file_store);

    $can_id = $_SESSION['can_id'];
    $emp_name = $_POST['emp_name'];
    $emp_type = $_POST['emp_type'];
    $company = $_POST['com_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $ctc = $_POST['ctc'];
    $skill = $_POST['skills'];

    $sql = "update candidate_experience set Employment_Name = '$emp_name',Employment_type = '$emp_type',Company_name = '$company',Start_date = '$start_date',End_date = '$end_date',CTC = '$ctc',Can_Skills = '$skill',Resume = '$file_name' where Can_id = '$can_id'";
    $query = mysqli_query($conn,$sql);
    if ($query) {
        echo '<script>
            alert("Experience Updated...");
            window.location.href = "profile.php";
            </script>';
    } else {
        $_SESSION['msg'] = "Update failed: ";
        header("Location: update_exp.php");
        exit;
    }

    $stmt->close();
} else {
    $_SESSION['msg'] = "Invalid request.";
    header("Location: update_exp.php");
    exit;
}

mysqli_close($conn);

?>