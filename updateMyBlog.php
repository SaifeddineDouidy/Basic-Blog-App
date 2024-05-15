// updateMyBlog.php
<?php
require_once 'controllers/BlogController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blogId = isset($_POST['blogId']) ? $_POST['blogId'] : null;
    $titre = isset($_POST['titre']) ? $_POST['titre'] : null;
    $description = isset($_POST['description']) ? $_POST['description'] : null;
    $genre = isset($_POST['genre']) ? $_POST['genre'] : null;

    $blogController = new BlogController();
    $result = $blogController->updateBlog($blogId, $titre, $description, $genre);

    http_response_code($result['status_code']);
    echo json_encode($result);
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}