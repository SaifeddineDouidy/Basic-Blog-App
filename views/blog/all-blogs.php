<?php

require_once 'config/Database.php';
require_once 'models/Blogs.php';
include 'views/header.php';

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    $userId = 1;
}

$db = new Database();
$blogs = Blogs::findAll($db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Blogs</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="./all-blogs.css" rel="stylesheet">
</head>
<body>
   
    <div class="container searchBar mt-5 mb-4">
        <div class="text-center mb-3">
            <h3>Search for various blogs!</h3>
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

    <!-- Updated Filter Section -->
<div class="container">
    <div class="row">
        <div class="col">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Choose
                </button>
                <div class="dropdown-menu" aria-labelledby="filterDropdown">
                    <div class="dropdown-divider"></div>
                    <a href="index.php?route=last-blog" class="dropdown-item">Last Blog</a>
                    <a href="index.php?route=oldest-blog" class="dropdown-item">Oldest Blog</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?route=blogs-by-genre&genre=Travel">Travel</a>
                    <a class="dropdown-item" href="index.php?route=blogs-by-genre&genre=Technology">Technology</a>
                    <a class="dropdown-item" href="index.php?route=blogs-by-genre&genre=Health">Health</a>
                    <a class="dropdown-item" href="index.php?route=blogs-by-genre&genre=Literature">Literature</a>
                    <!-- Add more genres as needed -->
                </div>
            </div>
        </div>
    </div>
</div>


<br>
<br>
<br>

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
    <?php else:?>
        <p>No blogs found.</p>
    <?php endif;?>

    <?php include 'views/footer.php';?>
</body>
</html>
