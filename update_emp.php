<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['emp_id'])) {
    $_SESSION['msg'] = "User not logged in.";
    header("Location: update_profile.php");
    exit;
}

if (isset($_POST['Update'])) {

    $emp_id = $_SESSION['emp_id'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $deg = $_POST['deg'];
    $Company_name = $_POST['com_name'];
    $Company_location = $_POST['com_loc'];
    $dob = $_POST['dob'];
    $blood = $_POST['blood'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $code = $_POST['code'];

    // Prepare an update statement
    $stmt = $conn->prepare("UPDATE employee_details SET Phone = ?, City = ?, Gender = ?, Designation = ?, Company_name = ?, Company_location = ?, DOB = ?, Blood_Group = ?, Address = ?, State = ?, Pincode = ? WHERE Emp_id = ?");
    $stmt->bind_param("sssssssssssi", $phone, $city, $gender, $deg, $Company_name, $Company_location, $dob, $blood, $address, $state, $code, $emp_id);

    if ($stmt->execute()) {
        echo '<script>
            alert("Profile Updated...");
            window.location.href = "emp_profile1.php";
            </script>';
    } else {
        $_SESSION['msg'] = "Update failed: " . $stmt->error;
        header("Location: update_profile.php");
        exit;
    }

    $stmt->close();
} else {
    $_SESSION['msg'] = "Invalid request.";
    header("Location: update_profile.php");
    exit;
}

$conn->close();
?>
