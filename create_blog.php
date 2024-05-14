<?php
session_start();
require_once 'config/Database.php';
require_once 'models/Blogs.php';

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $userId =1;// $_SESSION['user_id'];
} else {
    $userId =1;
    exit;
}

// Initialize the database and blog model
$db = new Database();
$blogModel = new Blogs($db);

// Get form data
$titre = $_POST['titre'];
$description = $_POST['description'];
$genre = $_POST['genre'];

// Attempt to create the blog
try {
    $blogModel->create($userId, $titre, $description, $genre);
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: '. $e->getMessage()]);
}
?>
