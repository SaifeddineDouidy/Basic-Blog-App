<?php
require_once 'models/User.php';

class UserController {
    private $model;

    public function __construct($db) {
        $this->model = new User([], $db);
    }

    public function register($db) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            if ($this->model->emailExists($email, $db)) {
                $_SESSION['message'] = "Adresse e-mail déjà existante!";
                $_SESSION['message_type'] = "yellow";
            } else {


                if ($this->model->createUser($username, $email, $password, $db)) {
                    $_SESSION['message'] = "Inscription réussie!";
                    $_SESSION['message_type'] = "green";
                    header('Location: index.php?route=login');
                    exit;
                } else {
                    $_SESSION['message'] = "Erreur: ". $this->model->getError();
                    $_SESSION['message_type'] = "red";
                }
            }
        }
    
        require_once 'views/auth/signup.php';
    }
    
    public function login($db) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            if (User::checkCredentials($email, $password, $db)) {
                // Fetch user data and store in session if needed
                $user = User::findUser($email, $password, $db);
                $_SESSION['user_id'] = $user->getId(); // Adjust this line to get the user ID from the user object
                $_SESSION['username'] = $email;
                $_SESSION['logged_in'] = true;
    
                header('Location: index.php?route=all-blogs');
                exit;
            } else {
                $_SESSION['message'] = "Identifiants incorrects!";
                $_SESSION['message_type'] = "red";
            }
        }
    
        require_once 'views/auth/login.php';
    }
}

