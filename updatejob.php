<?php
session_start();
include 'connect.php';

if(isset($_POST['update_btn'])) {

    
    $id = $_SESSION["post_id"];
    $company = $_POST['company'];
    $category = $_POST['category'];
    $occupation = $_POST['occupation'];
    $required_emp = $_POST['req_emp'];
    $salary = $_POST['salary'];
    $Employment_type = $_POST['emp_type'];
    $qualification = $_POST['qualification'];
    $gender = $_POST['gender'];
    $job_des = $_POST['job_des'];
    $location = $_POST['location'];
    $experience = $_POST['Exp'];
    
    $job_update = "update add_job set Company = '$company',Category = '$category',Occupation = '$occupation',Required_Employees = '$required_emp',Salary = '$salary',Employment_type = '$Employment_type',Qualification = '$qualification',Gender = '$gender',Job_Description = '$job_des',Location = '$location',Experience = '$experience' where Id ='$id'";
    $result = mysqli_query($conn, $job_update);

    if($result) {
        header("Location: job_show.php"); 
        exit;

    }else{
        $_SESSION['msg'] = "Didn't updated.";
        header("Location: update_post.php"); 
        exit;
    }


    }else{
        $_SESSION['msg'] = "User not logged in.";
        header("Location: job_post.php"); 
        exit;
    }




mysqli_close($conn);
?>
