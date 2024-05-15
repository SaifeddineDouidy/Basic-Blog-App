<?php
session_start();

include "db_connect.php";

if(isset($_POST['email']) && isset($_POST['password'])){
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$email = validate($_POST['email']);
$password = validate($_POST['password']);

if(empty($email)){
    header ("Location: ./index.php?error=email is required");
    exit();
}
else if(empty($password)){
    header ("Location: ./index.php?error=password is required");
    exit();
    }

$sql = "SELECT * FROM User WHERE email='$email' AND password='$password' ";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)===1){
    $row = mysqli_fetch_assoc($result);
    if($row['email'] === $email  && $row['password'] === $password){
        echo 'Logged in';
        $_SESSION['email'] = $row['email'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $row['id'];
        header("Location: ./index.php?route=all-blogs");
        exit();
    }
    else{
        header("Location: ./index.php?error=Incorrect email or password");}
}
else{
    header("Location ./index.php");
    exit(); 
}
