<?php
require_once 'controllers/UserController.php';
require_once 'models/User.php';
require_once 'config/Database.php';

// Create an instance of the Database class
$db = new Database();

// Check if the 'route' parameter is set in the URL
$route = $_GET['route'] ?? 'landing';

$userController = new UserController($db);

switch ($route) {
    case 'login':
        include 'views/auth/login.php';
        $userController->login($db);
        break;
    case 'register':
        $userController->register($db);
        break;
    case 'signup':
        include 'views/auth/signup.php';
        break;
    case 'my-blogs':
        include 'views/blog/my-blogs.php';
        break;
    case 'all-blogs':
        include 'views/blog/all-blogs.php';
        break;
    case 'search_results':
        include 'views/blog/search_results.php';
        break;
    default:
        include 'views/LandingPage.php';
        break;
}
?>
