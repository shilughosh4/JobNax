<?php
include ('connect.php');
session_start();
if(isset($_SESSION['msg'])) {
  echo "<h4 class='alert alert-success' role='alert' style='text-align:center;'>{$_SESSION['msg']}</h4>";
  unset($_SESSION['msg']);
}
?>
<?php
if(isset($_SESSION['err_msg'])) {
  echo "<h4 class='alert alert-danger' role='alert' style='text-align:center;'>{$_SESSION['err_msg']}</h4>";
  unset($_SESSION['err_msg']);
}
?>

<!DOCTYPE html>
    <html>
        <head>
            <title>Employee Login</title>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style>
	.font{
		color:green;
	}
    
    </style>
<body>
<div class="container-fluid">
<section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="emplog.jpeg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" height="100"/>
				<h3>Jobnax hiring suite for employeers.</h3>
				<p class="fw-bold ms-5 font">From Campus to Senior Level Hiring</p>
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="post" action="emploginphp.php">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <span class="h3 fw-bold mb-0">JOBNAX</span>
                  </div>


                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

				  
                  <div data-mdb-input-init class="form-outline mb-4">
				  <label class="form-label" for="off_email">Email address</label>
                    <input type="email" id="off_email" class="form-control form-control-lg" name="off_email"/>
                    
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
				  <label class="form-label" for="off_password">Password</label>
                    <input type="password" id="off_password" class="form-control form-control-lg" name="off_password" />
                  </div>

                  <div class="pt-1 mb-4">
                    <input data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-lg btn-block" type="submit" value="Login" name="emp_login">
                  </div>

                  <a class="small text-muted" href="emp_forgot.php">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color:blue;">Don't have an account? <a href="empregister.php"
                      style="color: blue;">Register here</a></p>
                 
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
	
</body>

</html>