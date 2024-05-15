<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link rel="stylesheet" href="public/css/landing_styles.css"></link>
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
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                <a href="index.php?route=login" class="btn btn-primary ml-2" style="color: white; text-decoration: none;">Login</a>

                <a href="index.php?route=signup" class="btn btn-primary ml-2" style="color: white; text-decoration: none;">Sign Up</a>
                
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
                <img src="public/img/pic.png" alt="Image" class="img-fluid" > 
            </div>
        </div>
    </div>
</div>


    <section id="services" class="container">
    <h2 class="text-center mb-4">Our services</h2>    
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card h-100 card-hover">
                    
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
    <section class="container mt-5" id="about">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center mb-4">About Us</h2>
            <p class="text-center">Welcome to Blog App, your go-to platform for expressing yourself and sharing your thoughts with the world. At Blog App, we believe in the power of storytelling and the impact it can have on individuals and communities.</p>
            <p class="text-center">Our mission is to provide you with a user-friendly platform where you can unleash your creativity, connect with like-minded individuals, and explore a wide range of topics that interest you.</p>
            <p class="text-center">Whether you're a seasoned blogger or just starting out, Blog App offers a supportive environment where you can grow and thrive as a content creator. Join our community today and start sharing your voice with the world!</p>
        </div>
    </div>
</section>

    <section class="container-fluid text-center py-5 mt-5" id="contact">
    <div class="row mt-5">
    <div class="col-md-6 offset-md-3">
    <h2 class="text-center mb-4">Contact Us</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Subscribe to Our Newsletter</h5>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" placeholder="Enter your phone number" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="interest" required>
                            <option value="" selected disabled>Select your interest</option>
                            <option value="Technology">Technology</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Travel">Travel</option>
                            <option value="Food">Food</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" rows="3" placeholder="Enter your message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div>

    </section>
    <footer class="py-5 bg-light">
        <div class="container">
            <p class="text-center footer-text">Copyright &copy; Blogging App 2024</p>
        </div>
    </footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa4RoGCh2RFi3sZ9AKRQ8KnvD" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-smHYKd7kzA0rGf3qNJ70mCHe9L+0b60Qp+W9cl3x4CmWwB1ZR+4K+z8oRJ6gGPG" crossorigin="anonymous"></script>
</body>
</html>