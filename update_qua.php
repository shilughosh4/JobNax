<?php
session_start();
include 'connect.php';

if (isset($_POST['education'])) {

    $can_id = $_SESSION['can_id'];
    $edu_type1 = $_POST['qua_type1'];
    $clg_name1 = $_POST['clg_name1'];
    $pass_year1 = $_POST['pass_year1'];
    $stream1 = $_POST['stream1'];
    $percentage1 = $_POST['percentage1'];
    $cgpa1 = $_POST['cgpa1'];
    $edu_type2 = $_POST['qua_type2'];
    $clg_name2 = $_POST['clg_name2'];
    $pass_year2 = $_POST['pass_year2'];
    $stream2 = $_POST['stream2'];
    $percentage2 = $_POST['percentage2'];
    $cgpa2 = $_POST['cgpa2'];
    $edu_type3 = $_POST['qua_type3'];
    $clg_name3 = $_POST['clg_name3'];
    $pass_year3 = $_POST['pass_year3'];
    $stream3 = $_POST['stream3'];
    $percentage3 = $_POST['percentage3'];
    $cgpa3 = $_POST['cgpa3'];
    $edu_type4 = $_POST['qua_type4'];
    $clg_name4 = $_POST['clg_name4'];
    $pass_year4 = $_POST['pass_year4'];
    $stream4 = $_POST['stream4'];
    $percentage4 = $_POST['percentage4'];
    $cgpa4 = $_POST['cgpa4'];

    // Prepare the update query
    $update_query = "UPDATE candidate_education 
                    SET First_Education_type = ?, First_Clg_Name = ?, First_year_of_passing = ?, First_stream = ?, First_Percentage = ?, First_CGPA = ?, 
                        Second_Education_type = ?, Second_Clg_Name = ?, Second_year_of_passing = ?, Second_stream = ?, Second_Percentage = ?, Second_CGPA = ?, 
                        Third_Education_type = ?, Third_Clg_Name = ?, Third_year_of_passing = ?, Third_stream = ?, Third_Percentage = ?, Thirde_CGPA = ?, 
                        Four_Education_type = ?, Four_Clg_Name = ?, Four_year_of_passing = ?, Four_stream = ?, Four_Percentage = ?, Four_CGPA = ? 
                    WHERE Candidate_id = ?";

    if ($stmt = $conn->prepare($update_query)) {
        // Bind parameters
        $stmt->bind_param("ssssssssssssssssssssssssi", 
            $edu_type1, $clg_name1, $pass_year1, $stream1, $percentage1, $cgpa1, 
            $edu_type2, $clg_name2, $pass_year2, $stream2, $percentage2, $cgpa2, 
            $edu_type3, $clg_name3, $pass_year3, $stream3, $percentage3, $cgpa3, 
            $edu_type4, $clg_name4, $pass_year4, $stream4, $percentage4, $cgpa4, 
            $can_id);

        // Execute the statement
        if ($stmt->execute()) {
            echo '<script>
            alert("Education Updated...");
            window.location.href = "profile.php";
            </script>';
        } else {
            $_SESSION['msg'] = "Update failed: " . $stmt->error;
            header("Location: update_education.php");
            exit;
        }

        // Close the statement
        $stmt->close();
    } else {
        $_SESSION['msg'] = "Update failed: " . $conn->error;
        header("Location: update_education.php");
        exit;
    }
} else {
    $_SESSION['msg'] = "User not logged in.";
    header("Location: update_education.php"); 
    exit;
}

// Close the connection
mysqli_close($conn);
?>
