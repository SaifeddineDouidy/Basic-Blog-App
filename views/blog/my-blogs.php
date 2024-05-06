<?php
require_once 'config/Database.php';
require_once 'models/Blogs.php';

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    $userId = '1'; // Default user ID if not logged in
}

// Initialize the database and blog model
$db = new Database();

// Fetch blogs for the current user
$blogs = Blogs::findByUserId($userId, $db);

// Render the view and pass the blogs data to it
include 'views/blog/my-blogs.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blogs</title>
</head>
<body>
    <h1>My Blogs</h1>

    <?php foreach ($blogs as $blog):?>
        <div class="blog-post">
            <h2><?= htmlspecialchars($blog['title'])?></h2>
            <p><?= htmlspecialchars($blog['description'])?></p>
            <p>Posted on <?= htmlspecialchars($blog['created_at'])?></p>
        </div>
    <?php endforeach;?>

    <!-- Include the footer -->
    <?php include 'views/footer.php';?>
</body>
</html>
