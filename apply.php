<?php
session_start();
include ('connect.php');

if(isset($_GET)) {

	$sql = "SELECT * FROM add_job WHERE Id ='$_GET[id]'";
	  $result = $conn->query($sql);
	  if($result->num_rows > 0) 
	  {
	    	$row = $result->fetch_assoc();
	    	$emp_id = $row['Emp_id'];
	   }

       $sql1 = "SELECT * FROM apply_job_post WHERE Candidate_id = {$_SESSION['can_id']} AND Job_id = {$row['Id']}";

     $result1 = $conn->query($sql1);
     if($result1->num_rows == 0) {  
    	
    	$sql = "INSERT INTO apply_job_post (Job_id, Emp_id, Candidate_id,Status) VALUES ('" . $_GET['id'] . "', '" . $emp_id . "', '" . $_SESSION['can_id'] . "','Applied')";

		if($conn->query($sql)===TRUE) {
			$_SESSION['msg'] = 'Applied Successfully !!';
			header("Location: job.php");
			exit();
		} else {
			$_SESSION['err_msg'] = 'Not Applied !!';
			header("Location: job.php");
			exit();
		}

		

    }  else {
        $_SESSION['al_msg'] = 'Already Applied !!';
		header("Location: job.php");
		exit();
	}
    
    }

    

    $conn->close();
?>