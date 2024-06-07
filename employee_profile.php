<?php
session_start();

include 'connect.php';

if(isset($_POST['Save']) && isset($_FILES['photo'])) {

    echo '<pre>';
    print_r($_FILES['photo']);
    echo '</pre>';

   $img_name = $_FILES['photo']['name'];
  $img_size = $_FILES['photo']['size'];
  $tmp_name = $_FILES['photo']['tmp_name'];
  $error = $_FILES['photo']['error'];


  $name = $_SESSION['emp_name'];
  $email = $_SESSION['emp_username'];
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




  if($error === 0){

    if($img_size > 125000){
 
      $_SESSION['msg'] = "Sorry your file is too large.";
        header("Location:emp_profile.php"); 
 
    }else{
 
          $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
          //echo($img_ex);
          $img_ex_lc = strtolower($img_ex);
          $allowed_ex = array("jpg","jpeg","png");

          if(in_array($img_ex_lc,$allowed_ex)){

            $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
            $img_upload_path = 'candidate_photo/'.$new_img_name;
            move_uploaded_file($tmp_name,$img_upload_path);
           
            $sql = "insert into employee_details(Emp_id,Name,Email,Phone,City,Gender,Designation,Company_name,Company_location,DOB,Blood_Group,Address,State,Pincode,Employee_Photo)values('$emp_id','$name','$email','$phone','$city','$gender','$deg','$Company_name','$Company_location','$dob','$blood','$address','$state','$code','$new_img_name')";
            $result = mysqli_query($conn, $sql);
            if($result) {
              $_SESSION['msg'] = 'Details uploaded.';
              header("Location: emp_profile.php"); 

            }else{
              $_SESSION['msg'] = 'Details not uploaded.';
              header("Location: emp_profile.php"); 
            }



          }else{
            $_SESSION['msg']= "Cannot upload this type of file.";
            header("Location:emp_profile.php"); 
          }

        
    }
 
   }else{
    $_SESSION['msg'] = "unknown error occured.";
     header("Location:emp_profile.php"); 
   }


}else{
    header("Location:emp_profile.php"); 
}

mysqli_close($conn);

?>
