<?php
require_once 'controllers/BlogController.php'; // Adjust the path according to your project structure

// Instantiate the BlogController
$controller = new BlogController();

// Get the form data from the POST request
$titre = $_POST['titre'];
$description = $_POST['description'];
$genre = $_POST['genre'];

// Call the createBlog method of the controller
$response = $controller->createBlog($titre, $description, $genre);

// Send the response back to the client
echo json_encode($response);
