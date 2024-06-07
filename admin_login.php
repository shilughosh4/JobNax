<?php
session_start();
include 'connect.php';

if(isset($_POST['admin_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE Email='$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
      $row = $result->fetch_assoc();
        $name = $row["Name"];
        $email = $row["Email"];
        
          $_SESSION['Admin_name'] = $name;
          $_SESSION['Admin_email'] = $email;
            header("Location: dashboard.php"); 
            exit;
        
    } else {
        $_SESSION['msg'] = "User not found.";
    }
}

mysqli_close($conn);
header("Location: admin.php");
exit;
?>
