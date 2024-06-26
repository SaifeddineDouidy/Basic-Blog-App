<?php

// Check if the 'route' parameter is set in the URL
if (isset($_GET['route'])) {
    $route = $_GET['route'];
} else {
    $route = 'landing'; // Default route if no 'route' parameter is provided
}

switch ($route) {
    case 'login':
        include 'views/auth/login.php';
        break;
    case 'register':
        include 'views/auth/register.php';
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


        
    // Add more routes as needed
    default:
        include 'views/LandingPage.php'; // Assuming views folder is at the same level as index.php
        break;
}
?>
