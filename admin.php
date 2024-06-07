
<!DOCTYPE html>
    <html>
        <head>
            <title>Admin Login</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
    .col{
        font-size: 28px;
        
        color:blue;
    }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div>
<nav class="navbar fixed-top bg-body-tertiary">
  <!-- <div class="container-fluid"> -->
  <ul class="nav justify-content-center">
    <li class="nav-item ps-5">
    <a class="navbar-brand">
      <img src="job.png" alt="Logo" width="80" height="50" class="d-inline-block align-text-top">
    </a>
</li>
<li class="nav-item" style="font-size:30px;color:blue; font-family: Cursive, Lucida Handwriting, sans-serif;">
    JoBnax
</li>
</ul>
</nav>
</div>
</div>
<div>
<section class="vh-100" style="background-color: #B9D9EB;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

    <p class="text-center h1 mb-5 mx-1 mx-md-4 mt-4"
 style="font-size:29px;font-family: Cursive, Lucida Handwriting, sans-serif;color:#6F00FF">Admin Login</p>

                <form class="mx-1 mx-md-4" method="post" action="admin_login.php">

                  

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                    <label class="form-label fw-bold" for="email" style="color:#0066b2">Admin Email</label>
                      <input type="email" id="email" class="form-control" name="email" />
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div data-mdb-input-init class="form-outline flex-fill mb-0">
                    <label class="form-label fw-bold" for="password" style="color:#0066b2">Password</label>
                      <input type="password" id="password" class="form-control" name="password" />
                      
                    </div>
                  </div>

                  

                  

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
     <input type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" value="Login" name="admin_login">
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="admin.png"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<footer class="footer" style="background-color:#1877F2;"> 
        <div class="container"> 
            <div class="row"> 
                <div class="col-md-3 fw-bold"> 
                    <h2>Jobnax</h2> 
                </div> 
                <div class="col-md-3"> 
                    <h5>About Us</h5> 
                    <p style="font-size:15px;"> 
                    A Jobnax is a website where people who need jobs can find jobs and companies 
                    looking for job seekers can find the perfect employees. It serves as a medium where 
                    job seekers can create profiles, upload resumes, and search for job openings across
                     various industries and locations.
                   </p> 
                </div> 
                <div class="col-md-3 fw-bold"> 
                    <h5>Contact Us</h5> 
                    <ul class="list-unstyled fw-bold"> 
                        <li>Email: info@jobnax.com</li> 
                        <li>Phone: +91 9733225722</li> 
                        <li>Address: Edison, Durgapur, India</li> 
                    </ul> 
                </div> 
                
            </div> 
            <hr> 
            <div class="row"> 
                <div class="col-md-6 fw-bold"> 
                    <p>© 2024 our Website. All rights reserved.</p> 
                </div> 
                
            </div> 
        </div> 
    </footer> 
</div>

</body>
</html>
