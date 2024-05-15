<?php
// Check if the 'route' parameter is set in the URL
require_once 'models/User.php'; // Include the User model

if (isset($_GET['route'])) {
    $route = $_GET['route'];
    echo "Route: " . $route;
} else {
    $route = 'landing'; // Default route if no 'route' parameter is provided
}
$route = isset($_GET['route']) ? trim($_GET['route']) : '';
switch ($route) {
    case 'login':
        include './login.php';
        break;

    case 'authentification':
        include './views/authentification.php';
        break;

    case 'register':
        include './views/auth/register.php';
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

    // Add more routes as needed
    default:
        include './views/LandingPage.php'; // Assuming views folder is at the same level as index.php
        break;
}

