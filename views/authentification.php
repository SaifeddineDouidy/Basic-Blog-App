<?php
require_once 'models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo 'user: ' . $email;

    

    // Set the URL of the findUser endpoint
    $url = './models/User.php?action=findUser';

    // Set the parameters
    $params = array(
        'email' => $email,
        'password' => $password
    );

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL request
    $response = curl_exec($ch);

    // Check for errors
    if(curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    }

    // Close cURL session
    curl_close($ch);

    // Handle the response
    if ($response === 'true') {
        // Set session variables
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['username'] = $user->getUsername();

        // Check if user ID session variable is set
        if (isset($_SESSION['user_id'])) {
            // Redirect to all-blogs view upon successful login
            header('Location: ./index.php?route=all-blogs');
            exit;
        } else {
            echo "Failed to set user ID session variable.";
        }
    } else {
        // Display error message or redirect back to login page with error
        echo "Invalid email or password. Please try again.";
    }
} else {
    // Show the login form view
    include './views/auth/login.php';
}
?>
