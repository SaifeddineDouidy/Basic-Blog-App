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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blogs</title>
</head>
<body>
    <h1>My Blogs</h1>

    <?php if (count($blogs) > 0): ?>
        <?php foreach ($blogs as $blog): ?>
            <div class="blog-post">
                <h2><?= htmlspecialchars($blog->getTitle())?></h2>
                <p><?= htmlspecialchars($blog->getDescription())?></p>
                <p>Posted on <?= htmlspecialchars($blog->getCreatedAt())?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>You haven't created any blogs yet.</p>
    <?php endif; ?>

    <!-- Include the footer -->
    <?php include 'views/footer.php';?>
</body>
</html>