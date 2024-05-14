<?php
class UserController {
    private $model;

    public function __construct($db) {
        $this->model = new User([], $db);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            if ($this->model->emailExists($email)) {
                $_SESSION['message'] = "Adresse e-mail déjà existante!";
                $_SESSION['message_type'] = "yellow";
            } else {
                if ($this->model->createUser($username, $email, $password)) {
                    $_SESSION['message'] = "Inscription réussie!";
                    $_SESSION['message_type'] = "green";
                    header('Location: index.php?route=login'); // Redirect to login page
                    exit;
                } else {
                    $_SESSION['message'] = "Erreur: ". $this->model->getError();
                    $_SESSION['message_type'] = "red";
                }
            }
        }
    
        // Render the registration form
        require_once 'views/auth/register.php';
    }
}


?>