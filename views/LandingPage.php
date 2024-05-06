<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/styles.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Blog App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                <a href="index.php?route=login" class="btn btn-primary ml-2" style="color: white; text-decoration: none;">Login</a>

                <a href="index.php?route=login" class="btn btn-primary ml-2" style="color: white; text-decoration: none;">Sign Up</a>
                <a href="index.php?route=my-blogs" class="btn btn-primary ml-2" style="color: white; text-decoration: none;">TEST BUTTON</a>
            </div>
        </div>
    </nav>
    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- Hero Section -->
            <div class="hero-section parallax">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-md-12">
                            <h1 class="display-4 animate__animated animate__fadeInUp">Unleash Your Blogging Potential</h1>
                            <p class="lead animate__animated animate__fadeInUp animate__delay-1s">Empowering Your Blogging Success, Nurturing Your Digital Community.</p>
                            <a href="#" class="btn btn-primary btn-lg mt-4 animate__animated animate__fadeInUp animate__delay-2s">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Image Section -->
            <div class="image-section mt-5">
                <!-- Place your image here -->
                <img src="public/img/h5.png" alt="Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>


    <section id="services" class="container">
        <h2 class="service-title display-4 text-center mt-5 mb-5">Our Services</h2>
    
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card h-100 card-hover">
                    <img class="card-img-top" src="design.jpg" alt="Design">
                    <div class="card-body">
                    <h4 class="card-title">Posting</h4>
                    <p class="card-text">Post whatever comes to mind, feel free while expressing your thoughts!</p>
                    </div>
                    <div class="card-footer py-4">
                    <a href="#" class="btn btn-secondary">Get Started &raquo;</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 card-hover">
                    <img class="card-img-top" src="development.jpg" alt="Development">
                    <div class="card-body">
                    <h4 class="card-title">Explore</h4>
                        <p class="card-text">Read what others have to say about different topics that might interest you!</p>
                    </div>
                    <div class="card-footer py-4">
                    <a href="#" class="btn btn-secondary">Get Started &raquo;</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 card-hover">
                    <img class="card-img-top" src="development.jpg" alt="Development">
                    <div class="card-body">
                    <h4 class="card-title">Explore</h4>
                        <p class="card-text">Read what others have to say about different topics that might interest you!</p>
                    </div>
                    <div class="card-footer py-4">
                    <a href="#" class="btn btn-secondary">Get Started &raquo;</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <section class="container-fluid text-center py-5 mt-5" id="contact">
        <h2 class="display-4  my-4">Get in touch with us today!</h2>
        <p class="lead pb-2">Send us a message and we will get back to 
        you as soon as possible.</p>
        <a href="#" class="btn btn-primary btn-lg mb-4" role="button">Contact us</a>
    </section>
    <footer class="py-5 bg-light">
        <div class="container">
            <p class="text-center footer-text">Copyright &copy; Blogging App 2024</p>
        </div>
    </footer>
    <!-- Here comes the rest of the code -->
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.bundle.min.js"></script>
</body>
</html>