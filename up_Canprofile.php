<?php
session_start();
include 'connect.php';

if (isset($_POST['Save'])) {

    // Check if a file was uploaded
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] !== 4) {
        echo '<pre>';
        print_r($_FILES['photo']);
        echo '</pre>';

        $img_name = $_FILES['photo']['name'];
        $img_size = $_FILES['photo']['size'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        $error = $_FILES['photo']['error'];

        $can_id = $_SESSION['can_id'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $gender = $_POST['gender'];
        $type = $_POST['type'];
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $dob = $_POST['dob'];
        $blood = $_POST['blood'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $code = $_POST['code'];
        $about = $_POST['about'];

        if ($error === 0) {
            if ($img_size > 125000) {
                $_SESSION['msg'] = "Sorry, your file is too large.";
                header("Location: profile.php");
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
                $allowed_ex = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_ex)) {
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $img_upload_path = 'candidate_photo/' . $new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    $sql = "UPDATE candidate_details 
                            SET Phone = ?, City = ?, Can_Gender = ?, Type = ?, Father_name = ?, Mother_name = ?, DOB = ?, Blood_Group = ?, Address = ?, State = ?, Pincode = ?, About_Myself = ?, Candidate_photo = ? 
                            WHERE Can_id = ?";

                    if ($stmt = $conn->prepare($sql)) {
                        $stmt->bind_param("sssssssssssssi", $phone, $city, $gender, $type, $father_name, $mother_name, $dob, $blood, $address, $state, $code, $about, $new_img_name, $can_id);

                        if ($stmt->execute()) {
                            echo '<script>
                            alert("Details Updated...");
                            window.location.href = "profile.php";
                            </script>';
                        } else {
                            $_SESSION['msg'] = 'Details not uploaded. ' . $stmt->error;
                            header("Location: update_Canprofile.php");
                        }
                        $stmt->close();
                    } else {
                        $_SESSION['msg'] = 'Database error: ' . $conn->error;
                        header("Location: update_Canprofile.php");
                    }
                } else {
                    $_SESSION['msg'] = "Cannot upload this type of file.";
                    header("Location: update_Canprofile.php");
                }
            }
        } else {
            $_SESSION['msg'] = "Unknown error occurred. Error code: $error";
            header("Location: update_Canprofile.php");
        }
    } else {
        // No file was uploaded, so just update the other details
        $can_id = $_SESSION['can_id'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $gender = $_POST['gender'];
        $type = $_POST['type'];
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $dob = $_POST['dob'];
        $blood = $_POST['blood'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $code = $_POST['code'];
        $about = $_POST['about'];

        $sql = "UPDATE candidate_details 
                SET Phone = ?, City = ?, Can_Gender = ?, Type = ?, Father_name = ?, Mother_name = ?, DOB = ?, Blood_Group = ?, Address = ?, State = ?, Pincode = ?, About_Myself = ? 
                WHERE Can_id = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssssssssssi", $phone, $city, $gender, $type, $father_name, $mother_name, $dob, $blood, $address, $state, $code, $about, $can_id);

            if ($stmt->execute()) {
                echo '<script>
                alert("Details Updated...");
                window.location.href = "profile.php";
                </script>';
            } else {
                $_SESSION['msg'] = 'Details not uploaded. ' . $stmt->error;
                header("Location: update_Canprofile.php");
            }
            $stmt->close();
        } else {
            $_SESSION['msg'] = 'Database error: ' . $conn->error;
            header("Location: update_Canprofile.php");
        }
    }
} else {
    header("Location: profile.php");
}

mysqli_close($conn);
?>
