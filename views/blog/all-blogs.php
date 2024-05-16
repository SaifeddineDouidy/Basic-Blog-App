<?php
require_once 'config/Database.php';
require_once 'models/Blogs.php';
session_start();
// Check if the user is logged in
$db = new Database();

// Fetch blogs for the current user
$blogs = Blogs::findAll($db);
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $userId = $_SESSION['id'];
    //echo $_SESSION['id'];
    ?>
    <?php include "views/header.php" ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blogs</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="public/css/all-blogs.css" rel="stylesheet">-->
</head>
<body>
    <!-- Search Bar -->
    <div class="container searchBar mt-5 mb-4">
        <div class="text-center" style="font-size: 30; font-weight: bold;">
            <h3>Search for various blogs !</h3><br>
        </div>
        <form action="search.php" method="GET">
            <div class="input-group">
                <input type="text" class="form-control " placeholder="Search title blogs..." name="query" style="
   
   border-color: rgb(73, 53, 154);
   border-radius: 5px;
   padding: 5px;
   width: 500px;
">
                <div class="input-group-append">
                    <button class="btn " type="submit" style="background-color: #6b63ff; color: white;">Search</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
    <div class="row">
        <div class="row">
            <h4> Filter By: </h4>
            <div class="dropdown"></div>
                <button class="btn  dropdown-toggle" type="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #6b63ff; color: white; margin: 0px 20px;">
                    By Date
                </button>
                
                <div class="dropdown-menu" aria-labelledby="filterDropdown">
                    
                    <a href="index.php?route=last-blog" class="dropdown-item">Last Blog</a>
                    <a href="index.php?route=oldest-blog" class="dropdown-item">Oldest Blog</a>
                    
                    <!-- Add more genres as needed -->
                </div>
            </div>
            <div class="dropdown">
                <button class="btn  dropdown-toggle" type="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #6b63ff; color: white;">
                    By Genre
                </button>
                
                <div class="dropdown-menu" aria-labelledby="filterDropdown">
                   
                   
                    <a class="dropdown-item" href="index.php?route=blogs-by-genre&genre=Travel">Travel</a>
                    <a class="dropdown-item" href="index.php?route=blogs-by-genre&genre=Technology">Technology</a>
                    <a class="dropdown-item" href="index.php?route=blogs-by-genre&genre=Health">Health</a>
                    <a class="dropdown-item" href="index.php?route=blogs-by-genre&genre=Literature">Literature</a>
                    <a class="dropdown-item" href="index.php?route=blogs-by-genre&genre=poetry">Poetry</a>
                    <!-- Add more genres as needed -->
                </div>
                </div>
            </div>
        </div>
    </div>
</div>





    <?php if (count($blogs) > 0):?>
        <?php foreach ($blogs as $blog):?>
            <div class="card border-dark " style="margin: 30px 200px; border-radius:20px">
                <div class="mybody" style="width: 50%; padding: 20px; ">
                    <h2 class="card-title" style="font-weight: bolder"><?= htmlspecialchars($blog->getTitre())?></h2>
                    <p class="card-text"><?= htmlspecialchars($blog->getDescription())?></p>
                    <p class="card-text">
                        <small class="text-muted">
                            Posted on <?= htmlspecialchars(date('M d, Y', strtotime($blog->getCreatedAt())))?>
                            By <?= htmlspecialchars($blog->getAuthorName())?>
                        </small>
                    </p>
                    <p class="card-text">
                        <small class="text-muted">
                            Blog genre : <?= htmlspecialchars($blog->getGenre())?>
                        </small>
                    </p>
                    <a href="#" class="btn" style="background-color: #6b63ff; color: white;">Read More</a>
                </div>
            </div>
        <?php endforeach;?>
    <?php endif;?>


   <!-- Include the footer -->
   
</body>
</html><?php

} else {
    
    $userId = 1;
    ?><!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Blogs</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="public/css/all-blogs.css" rel="stylesheet">
    </head>
    <body>
        <!-- Search Bar -->
        <div class="container searchBar mt-5 mb-4">
            <div class="text-center mb-3">
                <h3>Search for various blogs !</h3>
            </div>
            <form action="search.php" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search title blogs..." name="query">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    
        <?php if (count($blogs) > 0):?>
            <?php foreach ($blogs as $blog):?>
                <div class="card ml-2 mb-3 border-dark blog-post-card">
                    <div class="card-body">
                        <h2 class="card-title"><?= htmlspecialchars($blog->getTitre())?></h2>
                        <p class="card-text"><?= htmlspecialchars($blog->getDescription())?></p>
                        <p class="card-text">
                            <small class="text-muted">
                                Posted on <?= htmlspecialchars(date('M d, Y', strtotime($blog->getCreatedAt())))?>
                                By <?= htmlspecialchars($blog->getAuthorName())?>
                            </small>
                        </p>
                        <p class="card-text">
                            <small class="text-muted">
                                Blog genre : <?= htmlspecialchars($blog->getGenre())?>
                            </small>
                        </p>
                        <a href="#" class="btn" style="background-color: #6b63ff; color: white;">Read More</a>
                    </div>
                </div>
            <?php endforeach;?>
        <?php endif;?>
    
    
        <!-- Include the footer -->
        <?php include 'views/footer.php';?>
    </body>
    </html>
    <?php
}

?>
