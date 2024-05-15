<?php
require_once 'config/Database.php';
require_once 'models/Blogs.php';

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    // Redirect to login page or display an error message
    //header("Location: login.php");
    //exit;
    $userId = 1;
}

// Initialize the database and blog model
$db = new Database();

// Fetch blogs for the current user
$blogs = Blogs::findAll($db);

// Include the header first
include 'views/header.php';
?>
<!DOCTYPE html>
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
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        <?php endforeach;?>
    <?php endif;?>
</body>
</html>