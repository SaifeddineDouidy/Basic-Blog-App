<?php
require_once 'controllers/BlogController.php';

$blogController = new BlogController();

if (isset($_GET['query'])) {
    $blogController->searchBlogs();
} else {
    //header("Location: /"); 
    exit;
}
