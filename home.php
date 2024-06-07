<!DOCTYPE html>
    <html>
        <head>
            <title>Home Page</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous">
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
           .nav-link{
            color:white;
            font-size:20px;
           }
.nav-link:hover{
  color: #FFB6C1;
}
.main-header{
  text-align: center;

}


body {
  margin: 0;
}

.marquee {
/*   overflow: hidden; */
}

.marquee-content {
  display: flex;
  animation: scrolling 10s linear infinite;
}

.marquee-item {
  flex: 0 0 16vw;
  margin: 0 1vw;

}






      
          </style>
</head>
<body style="background-color:#FFF0F5;">

<nav class="navbar navbar-expand-lg" style=" background-color:#CD5C5C;">
  <div class="container-fluid">
  <a class="navbar-brand">
     <img src="job.png" alt="Logo" width="60" height="30" class="d-inline-block align-text-top" />
 </a>
 
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#home">Candidate</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#company">Company</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About Us</a>
        </li>
      </ul>
      <div class="d-flex">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item pe-5">
      <a class="btn btn-primary fw-bold" type="button" href="login.php">Login</a>
          </li>
      <li class="nav-item pe-2">
<div class="btn-group">
  <button type="button" class="btn btn-warning dropdown-toggle fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
    For employers
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="emplogin.php">Employer Login</a></li>
    <li><a class="dropdown-item" href="empregister.php">Employer SignUp</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="admin.php">Admin login</a></li>
  </ul>
</div>
          </li>
      <li class="nav-item">
      <a class="btn btn-info fw-bold" type="button" href="jobregister.php">Sign up</a>
          </li>
          </ul>
          </div>
    </div>
  </div>
</nav>
<div class="container-fluid">
  <div class="main-header">
   <h2 class="pt-5 fw-bold" style="font-family: Garamond, serif; color:#00008B;"> GREAT THINGS NEVER COMES FROM CONFORT ZONE</h2>
   <h4 class="fw-bold" style="font-family: Garamond, serif; color:#005A9C;">Make your dream career a reality</h4>
   
</div>

<div id="carouselExampleIndicators" class="carousel carousel-dark slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
    
        <img src="home.webp" class="rounded mx-auto d-block" alt="Flower 1">
    
</div>
    <div class="carousel-item">
    
        <img src="home1.jpg" class="rounded mx-auto d-block" alt="Flower 2">
    
</div>
    <div class="carousel-item">
      
        <img src="home4.jpg" class="rounded mx-auto d-block" alt="Flower 3">
   
</div>
<div class="carousel-item">
      
        <img src="home3.avif" class="rounded mx-auto d-block" alt="Flower 3">
   
</div>
<div class="carousel-item">
      
        <img src="home5.jpg" class="rounded mx-auto d-block" alt="Flower 3">
   
</div>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<div class="container py-5" id="home">
<section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1 class="fw-bold" style="font-family: Garamond, serif; color:#00008B;">Candidates</h1>
            <h3 class="fw-bold" style="font-family: Garamond, serif; color:#005A9C;">Finding a job just got easier. Create a profile and apply with single mouse click.</h3>            
          </div>
        </div>
        

        <div class="row row-cols-1 row-cols-md-3 g-4 py-5">

            <div class="col">
                <div class="card">
                    <img src="./img/jobsearch.avif" class="card-img-top" alt="broken">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center;">BROWSE JOB</h5>
                        
                    </div>
                    <div class="mb-5 d-flex justify-content-around">
                        
                        <button class="btn btn-primary">Apply Now</button>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="./img/getinter.jpeg" class="card-img-top" alt="broken">
                    <div class="card-body">
                        <h5 class="card-title"  style="text-align: center;">APPLY & GET INTERVIEWED</h5>
                        
                    </div>
                    <div class="mb-5 d-flex justify-content-around">
                        
                        <button class="btn btn-primary">Apply Now</button>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="./img/careers.webp" class="card-img-top" alt="broken">
                    <div class="card-body">
                        <h5 class="card-title"  style="text-align: center;">START A CAREER</h5>
                        
                    </div>
                    <div class="mb-5 d-flex justify-content-around">
                        
                        <button class="btn btn-primary">Apply Now</button>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="container py-5" id="company">
<section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1 class="fw-bold" style="font-family: Garamond, serif; color:#00008B;">Companies</h1>
            <h3 class="fw-bold" style="font-family: Garamond, serif; color:#005A9C;">Hiring? Register your company for free, browse our talented pool, post and track job applications</h3>            
          </div>
        </div>
        

        <div class="row row-cols-1 row-cols-md-3 g-4 py-5">

            <div class="col">
                <div class="card">
                    <img src="./img/postjob.jpeg" class="card-img-top" alt="broken">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center;">POST A JOB</h5>
                        
                    </div>
                    <div class="mb-5 d-flex justify-content-around">
                        
                        <button class="btn btn-primary">Start Now</button>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="./img/manage.jpg" class="card-img-top" alt="broken">
                    <div class="card-body">
                        <h5 class="card-title"  style="text-align: center;">MANAGE & TRACK</h5>
                        
                    </div>
                    <div class="mb-5 d-flex justify-content-around">
                        
                        <button class="btn btn-primary">Start Now</button>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="./img/hire.jpg" class="card-img-top" alt="broken">
                    <div class="card-body">
                        <h5 class="card-title"  style="text-align: center;">HIRE</h5>
                        
                    </div>
                    <div class="mb-5 d-flex justify-content-around">
                        
                        <button class="btn btn-primary">Start Now</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container py-5">
<section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1 class="fw-bold" style="font-family: Garamond, serif; color:#00008B;">Companies trust us</h1>
                      
          </div>
        </div>

        <marquee behavior="scroll" direction="left" scrollamount="10">
        <div class="marquee">
  <div class="marquee-content"> 
    <div class="marquee-item">
      <img src="./img/amazon.png" alt="" width="120" height="80" alt="Natural">
    </div>
    
    <div class="marquee-item">
      <img src="./img/oyo.png" alt="" width="120" height="80" alt="Natural">
    </div>
    
    <div class="marquee-item">
      <img src="./img/dabur.png" alt="" width="120" height="80" alt="Natural">
    </div>
    
    <div class="marquee-item">
      <img src="./img/nyka.png" alt="" width="120" height="80" alt="Natural">
    </div>
    
    <div class="marquee-item">
      <img src="./img/paytm.png" alt="" width="120" height="80" alt="Natural">
    </div>
    
    <div class="marquee-item">
      <img src="./img/mahindra.png" alt="" width="120" height="80" alt="Natural">
    </div>

    <div class="marquee-item">
      <img src="./img/airtel.jpeg" alt="" width="120" height="80" alt="Natural">
    </div>

    <div class="marquee-item">
      <img src="./img/boat.png" alt="" width="120" height="80" alt="Natural">
    </div>

    <div class="marquee-item">
      <img src="./img/book.png" alt="" width="120" height="80" alt="Natural">
    </div>

    <div class="marquee-item">
      <img src="./img/nestle.png" alt="" width="120" height="80" alt="Natural">
    </div>
    
    <div class="marquee-item">
      <img src="./img/phone.png" alt="" width="120" height="80" alt="Natural">
    </div>
    
    <div class="marquee-item">
      <img src="./img/puma.png" alt="" width="120" height="80" alt="Natural">
    </div>

    
  </div>
</div>
</marquee>



  <div class="container py-5">
<section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1 class="fw-bold" style="font-family: Garamond, serif; color:#00008B;">About Us</h1>
                      
          </div>
        </div>
        <div class="row pt-4">
          <div class="col-md-6">
            <img src="about.png" class="img-responsive" height="400" width="auto">
          </div>
          <div class="col-md-6 about-text margin-bottom-20 pt=3">
            <p>If you are not networking you are not working. <p>Jobnax -the online job portal application allows job seekers and recruiters to connect.The application provides the ability for job seekers to create their accounts, upload their profile and resume, search for jobs, apply for jobs, view different job openings. The application provides the ability for companies to create their accounts, search candidates, create job postings, and view candidates applications.
            </p>
            <p>
              This website is used to provide a platform for potential candidates to get their dream job and excel in their career.
              This site can be used as a paving path for both companies and job-seekers for a better life .
              
            </p>
          </div>
        </div>
      </div>
    </section>
    
</div>



  
         
         <script src="scriptfile.js"></script>
</body>
</html>



