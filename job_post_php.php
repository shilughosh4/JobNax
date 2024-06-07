<?php
session_start();
include 'connect.php';

if(isset($_POST['post_job'])) {
    // Check if user is logged in
    if(isset($_SESSION["emp_username"])){
        $name = $_SESSION["emp_name"];
        $username = $_SESSION["emp_username"];
        $emp_id = $_SESSION['emp_id'];
        $company = $_POST['company'];
        $category = $_POST['category'];
        $occupation = $_POST['occupation'];
        $required_emp = $_POST['req_emp'];
        $salary = $_POST['salary'];
        $skill = $_POST['skill'];
        $Employment_type = $_POST['emp_type'];
        $qualification = $_POST['qualification'];
        $web = $_POST['web'];
        $gender = $_POST['gender'];
        $job_des = $_POST['job_des'];
        $location = $_POST['location'];
        $experience = $_POST['Exp'];
        
        
        $job_insert = $conn->prepare("INSERT INTO add_job (Emp_id,Name, Email, Company, Category, Occupation, Required_Employees, Salary, Employment_type, Qualification, Gender, Website, Job_Description,Skills,Location,Experience) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)");
        $job_insert->bind_param("ssssssssssssssss",$emp_id, $name, $username, $company, $category, $occupation, $required_emp, $salary, $Employment_type, $qualification, $gender, $web, $job_des,$skill, $location, $experience);
        
        
        if ($job_insert->execute()) {
            $_SESSION['msg'] = "Job posted successfully.";
        } else {
            $_SESSION['msg'] = "Failed to post job: " . $conn->error;
        }
        
        $job_insert->close();
    } else {
        $_SESSION['msg'] = "User not logged in.";
    }
    
    
    header("Location: job_post.php");
    exit;
}

mysqli_close($conn);
?>
