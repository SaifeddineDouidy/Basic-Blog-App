<?php
session_start(); // Start the session

include 'connect.php';

if(isset($_POST['signUp'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

     $checkEmail="SELECT * FROM user WHERE email='$email'";
     $result=$conn->query($checkEmail);
     if($result->num_rows>0){
        $_SESSION['message'] = "Adresse e-mail déjà existante!";
        $_SESSION['message_type'] = "yellow"; // Yellow for duplicate email
     }
     else{
        $insertQuery="INSERT INTO user(username,email,password) VALUES ('$username', '$email', '$password')";
        if($conn->query($insertQuery)==TRUE){
            $_SESSION['message'] = "Inscription réussie!";
            $_SESSION['message_type'] = "green"; // Green for success
        }
        else{
            $_SESSION['message'] = "Erreur: " . $conn->error;
            $_SESSION['message_type'] = "red"; // Red for error
        }
     }
     header("location: index.php"); // Redirect to index.php
     exit(); // Stop further execution of the current script
}
?>