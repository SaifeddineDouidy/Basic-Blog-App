<?php

// Check if the 'route' parameter is set in the URL
$route = isset($_GET['route']) ? $_GET['route'] : '';

switch ($route) {
    case 'login':
        include 'views/auth/login.php';
        break;
    case 'register':
        include 'views/auth/register.php';
        break;
    // Add more routes as needed
    default:
        include 'views/LandingPage.php'; // Assuming views folder is at the same level as index.php
        break;
}
?>
