<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed"  style="background-color: #2c2c54;">
        <div class="container">
        <a class="nav-link" href="index.php?route=all-blogs" style="color: white; font-weight: bold; padding-right:10px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
</svg></a>
        
            
                    
            <a class="navbar-brand" href="#" style="color: white; font-weight: bold;">Blog App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?route=all-blogs" style="color: white; font-weight: bold;">All Blogs </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?route=my-blogs" style="color: white;font-weight: bold;">My Blogs <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./logoutcontrol.php" style="color: white; font-weight: bold;">Logout </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- JavaScript files -->
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.bundle.min.js"></script>
</body>
</html>