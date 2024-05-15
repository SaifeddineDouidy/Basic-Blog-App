<?php
require_once 'controllers/UserController.php';
require_once 'models/User.php';
require_once 'config/Database.php';
require_once 'controllers/BlogController.php';
$blogController = new BlogController();
// Create an instance of the Database class
$db = new Database();

// Check if the 'route' parameter is set in the URL
$route = $_GET['route']?? 'landing';

$userController = new UserController($db);

if ($route === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'views/auth/register.php';
    $userController->register($db); // Execute the register method if it's a POST request
} elseif ($route === 'register') {
    include 'views/auth/signup.php'; // Just display the view if it's not a POST request
} else {

switch ($route) {
    case 'login':
        include './login.php';
        
        break;
    case 'signup':
        include 'views/auth/signup.php';
        break;
    case 'my-blogs':
        include './views/blog/my-blogs.php';
        break;
    case 'all-blogs':
        include './views/blog/all-blogs.php';
        break;
    case 'search_results':
        include './views/blog/search_results.php';
        break;
        case 'last-blog':
            $blogController->getLastBlog();
            break;
        case 'oldest-blog':
            $blogController->getOldestBlog();
            break;
        case 'blogs-by-genre':
            if(isset($_GET['genre'])) {
                $blogController->getBlogsByGenre($_GET['genre']);
            } else {
                // Handle error
            }
            break;
    default:
        include 'views/LandingPage.php';
        break;
}
}
