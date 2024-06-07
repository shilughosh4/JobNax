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


  $name = $_SESSION['name'];
  $email = $_SESSION['username'];
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




  if($error === 0){

    if($img_size > 125000){
 
      $_SESSION['msg'] = "Sorry your file is too large.";
        header("Location:profile.php"); 
 
    }else{
 
          $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
          //echo($img_ex);
          $img_ex_lc = strtolower($img_ex);
          $allowed_ex = array("jpg","jpeg","png");

          if(in_array($img_ex_lc,$allowed_ex)){

            $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
            $img_upload_path = 'candidate_photo/'.$new_img_name;
            move_uploaded_file($tmp_name,$img_upload_path);
           
            $sql = "insert into candidate_details(Can_Name,Can_id,Can_Email,Phone,City,Can_Gender,Type,Father_name,Mother_name,DOB,Blood_Group,Address,State,Pincode,About_Myself,Candidate_Photo)values('$name','$can_id','$email','$phone','$city','$gender','$type','$father_name','$mother_name','$dob','$blood','$address','$state','$code','$about','$new_img_name')";
            $result = mysqli_query($conn, $sql);
            if($result) {
              $_SESSION['msg'] = 'Details uploaded.';
              header("Location: profile.php"); 

            }else{
              $_SESSION['msg'] = 'Details not uploaded.';
              header("Location: profile.php"); 
            }



          }else{
            $_SESSION['msg']= "Cannot upload this type of file.";
            header("Location:profile.php"); 
          }

        
    }
 
   }else{
    $_SESSION['msg'] = "unknown error occured.";
     header("Location:profile.php"); 
   }


}else{
    header("Location:profile.php"); 
}

mysqli_close($conn);

?>