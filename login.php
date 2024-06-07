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
            <title>Jobseeker Login</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-9/assets/css/login-9.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>

    </style>
    <body>
    
<section class="bg-primary py-3 py-md-5 py-xl-8">
  <div class="container">
    <div class="row gy-4 align-items-center">
      <div class="col-12 col-md-6 col-xl-7">
        <div class="d-flex justify-content-center text-bg-primary">
          <div class="col-12 col-xl-9">
            <img class="img-fluid rounded mb-4" loading="lazy" src="log.png" width="245" height="100" alt="Break img">
             <hr class="border-primary-subtle mb-4">
            <h3 class="h3 mb-4">Introducing a career platform for college students & fresh grads.</h3>
            
            
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-xl-5">
        <div class="card border-0 rounded-4">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-4">
                  <h3>Sign in</h3>
                  <p>Don't have an account? <a href="jobregister.php" style="text-decoration:none;">Sign up</a></p>
                  
                </div>
              </div>
            </div>
            <form action="loginphp.php" method="post" name="loginForm">
              <div class="row gy-3 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="login_email" id="email" required>
                    <label for="email" class="form-label fw-bold">Email</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="login_password" id="password" required>
                    <label for="password" class="form-label fw-bold">Password</label>
                  </div>
                </div>
                
                <div class="col-12">
                  <div class="d-grid">
                    <input class="btn btn-primary btn-lg" type="submit" value="Log in now" name="login">
                  </div>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-12">
                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end mt-4">
                <a href="forgot.php" style="text-decoration:none;">Forgot password ?</a></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <p class="mt-4 mb-4">Or continue with</p>
                <div class="d-flex gap-2 gap-sm-3 justify-content-centerX">
                  <a href="#!" class="btn btn-outline-danger bsb-btn-circle bsb-btn-circle-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                      <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                    </svg>
                  </a>
                  <a href="#!" class="btn btn-outline-primary bsb-btn-circle bsb-btn-circle-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                      <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                  </a>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    </body>
    </html>
    
    