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
    $email = $_SESSION['username'];
    $name = $_SESSION['name'];
    $emp_name = $_POST['emp_name'];
    $emp_type = $_POST['emp_type'];
    $company = $_POST['com_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $ctc = $_POST['ctc'];
    $skill = $_POST['skills'];

    $sql = "INSERT INTO candidate_experience (Can_id, Name,Email, Employment_Name, Employment_type, Company_name, Start_Date, End_Date, CTC,Can_Skills,Resume) VALUES ( '$can_id', '$name','$email', '$emp_name', '$emp_type', '$company', '$start_date', '$end_date', '$ctc','$skill','$file_name')";
   $query = mysqli_query($conn,$sql);

   if($query){
    $_SESSION['msg'] = 'Experience added successfully.';
    header("Location: profile.php"); 
   }else{
    $_SESSION['msg'] = 'Experience not added.';
    header("Location: profile.php"); 
   }
     








}
mysqli_close($conn);
?>
