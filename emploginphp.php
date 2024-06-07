<?php
session_start();
include 'connect.php';

if(isset($_POST['emp_login'])) {
    $email = $_POST['off_email'];
    $password = $_POST['off_password'];

    $sql = "SELECT * FROM employee_register WHERE Email='$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
      $row = $result->fetch_assoc();
        $name = $row["Name"];
        $emp_id = $row["Id"];
        if($row['status'] === 'active' && password_verify($password, $row['Password'])) {
          $_SESSION['emp_name'] = $name;
            $_SESSION['emp_username'] = $email;
            $_SESSION["emp_id"] = $emp_id;
            header("Location: job_show.php"); 
            exit;
        } else {
            $_SESSION['err_msg'] = "Incorrect email or password.";
        }
    } else {
        $_SESSION['err_msg'] = "User not found.";
    }
}

mysqli_close($conn);
header("Location: emplogin.php");
exit;
?>
