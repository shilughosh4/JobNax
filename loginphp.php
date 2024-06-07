<?php
session_start();
include 'connect.php';

if(isset($_POST['login'])) {
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    $sql = "SELECT * FROM jobseeker_register WHERE Email='$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
      $row = $result->fetch_assoc();
        $name = $row["Name"];
        $can_id = $row["Id"];
        $date = $row["Registered_On"];
        if($row['status'] === 'active' && password_verify($password, $row['Password'])) {
          $_SESSION['name'] = $name;
            $_SESSION['username'] = $email;
            $_SESSION['can_id'] = $can_id;
            $_SESSION['date'] = $date;
            header("Location: job.php"); 
            exit;
        } else {
            $_SESSION['err_msg'] = "Incorrect email or password.";
        }
    } else {
        $_SESSION['err_msg'] = "User not found.";
    }
}

mysqli_close($conn);
header("Location: login.php");
exit;
?>
