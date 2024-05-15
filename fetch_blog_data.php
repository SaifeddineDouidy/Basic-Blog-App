<?php
require_once 'controllers/BlogController.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $blogId = isset($_GET['blogId']) ? $_GET['blogId'] : null;

    if ($blogId) {
        $blogController = new BlogController();
        $blog = $blogController->getBlogData($blogId);

        if ($blog) {
            http_response_code(200);
            echo json_encode(['success' => true, 'blog' => $blog]);
        } else {
            http_response_code(404);
            echo json_encode(['success' => false, 'message' => 'Blog not found']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Invalid or missing blogId']);
    }
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}