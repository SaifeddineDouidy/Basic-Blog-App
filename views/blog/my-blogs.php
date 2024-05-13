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
$blogs = Blogs::findByAuthorId($userId, $db);


?>
<?php include 'views/header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./my-blogs.css" rel="stylesheet">
    <title>My Blogs</title>
</head>
<body>
    <div class="card-container ml-3">
        <h1 class="text-center my-4">My Blogs</h1>
        <div class="row">
            <?php if (count($blogs) > 0):?>
                <?php foreach ($blogs as $blog):?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm">
                            <img class="card-img-top" src="path/to/your/image.jpg" alt="Blog Image">
                            <div class="card-body">
                                <h2 class="card-title"><?= htmlspecialchars($blog->getTitle())?></h2>
                                <p class="card-text"><?= htmlspecialchars($blog->getDescription())?></p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        Posted on <?= htmlspecialchars(date('M d, Y', strtotime($blog->getCreatedAt())))?>
                                    </small>
                                </p>
                                <a href="#" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php else:?>
                <p class="text-center">You haven't created any blogs yet.</p>
            <?php endif;?>
        </div>
    </div>
    <!-- Include the footer -->
    <?php include 'views/footer.php';?>
</body>

</html>