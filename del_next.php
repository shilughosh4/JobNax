<!DOCTYPE html>
    <html>
        <head>
            <title>Delete Confirmation</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style>
    

.error{
  color:red;
  font-weight:bold;
}

.msg{
  color:green;
  font-weight:bold;
}

    </style>
<body style="background-color:#FFF0F5;">
<nav class="navbar navbar-expand-lg" style=" background-color:#CD5C5C;">
  <div class="container-fluid">
    <a class="navbar-brand">
    <img src="job.png" alt="Logo" width="60" height="30" class="d-inline-block align-text-top" />
    </a>
    
</div>
</nav>
<div class="container-fluid">
<div class="container py-5">
<section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h3 class="fw-bold" style="font-family: Garamond, serif; color:#005A9C;">Click the button to delete your account.</h3> 
           
            <div class="container text-center">
  <div class="row align-items-center py-3">
    <div class="col">
    </div>
    
    <div class="col-4">
    <?php
session_start();
include 'connect.php'; 
$msg = "";
$error = "";

if(isset($_POST['del_btn'])){
    $email = $_SESSION["username"];

    $del_query = "delete from jobseeker_register where Email = '$email'";
      $result = mysqli_query($conn, $del_query);

      if($result){
        $msg = "Deleted Successfully";
      } else{
        $error = "Not Deleted";  
      }
    
}
mysqli_close($conn);
    ?>
    <p class="error"><?php echo $error;?></p>
    <p class="msg"><?php echo $msg;?></p>
    <form method="post" action="">
<div class="pt-3 pb-3">
<input class="btn btn-info" type="submit" value="Delete Account" name="del_btn" id="del">
</div>
<div>
    <a type="button" class="btn btn-warning" href="home.php">Home</a>
</div>

</form>
</div>

<div class="col">
    </div>

          </div>
        </div>
</div>

</body>

</html>