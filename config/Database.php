<?php

// Database configuration
$host = 'localhost'; // Your MySQL host
$dbname = 'blog_app'; // Your MySQL database name
$username = 'root'; // Your MySQL username
$password = '';

try {
    // Create a new PDO instance
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    // Set PDO to throw exceptions on error
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Set PDO to return associative arrays
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // If connection fails, display error message
    die('Database connection failed: ' . $e->getMessage());
}
