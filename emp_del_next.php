<?php
session_start();
include 'connect.php'; 

$msg = "";
$error = "";

if (!isset($_SESSION["emp_username"])) {
    $error = "User not logged in.";
} else {
    if (isset($_POST['del_btn'])) {
        $email = $_SESSION["emp_username"];

        // Start transaction
        mysqli_begin_transaction($conn);

        try {
            // Get employee ID
            $stmt = mysqli_prepare($conn, "SELECT Id FROM employee_register WHERE Email = ?");
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $emp_id);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            if ($emp_id) {
                // Delete from add_job table
                $stmt = mysqli_prepare($conn, "DELETE FROM add_job WHERE Emp_id = ?");
                mysqli_stmt_bind_param($stmt, 'i', $emp_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                // Delete from employee_profile table
                $stmt = mysqli_prepare($conn, "DELETE FROM employee_details WHERE Emp_id = ?");
                mysqli_stmt_bind_param($stmt, 'i', $emp_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                // Delete from employee_register table
                $stmt = mysqli_prepare($conn, "DELETE FROM employee_register WHERE Id = ?");
                mysqli_stmt_bind_param($stmt, 'i', $emp_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                // Commit transaction
                mysqli_commit($conn);

                $msg = "Deleted Successfully";
                // Optionally, destroy the session
                session_destroy();
            } else {
                $error = "Employee not found.";
            }
        } catch (mysqli_sql_exception $exception) {
            mysqli_rollback($conn);
            $error = "Error: " . $exception->getMessage();
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Delete Account</h2>
        <?php if (!empty($msg)) { ?>
            <div class="alert alert-success"><?php echo $msg; ?></div>
        <?php } ?>
        <?php if (!empty($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form method="post" action="">
            <div class="mb-3">
                <button type="submit" name="del_btn" class="btn btn-danger">Delete Account</button>
            </div>
        </form>
    </div>
</body>
</html>
