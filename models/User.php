<?php

class User
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $db;

    public function __construct($data = [], $db)
    {
        if (!empty($data)) {
            $this->id = $data['id'] ?? null;
            $this->username = $data['username'] ?? '';
            $this->email = $data['email'] ?? '';
            $this->password = $data['password'] ?? '';
        }
        $this->db = $db;
    }

    // Getter and Setter methods
    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

                       
    // Other methods for interacting with the database (create, read, update, delete)
    public static function findById($id, $db)
    {
        // Query the database to retrieve a user by ID using $db
    }

    public static function findByEmail($email, $db)
    {
        // Query the database to retrieve a user by email using $db                    

    }

    public static function emailExists($email, $db)
    {
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->rowCount() > 0;
    }

    // Method to insert a new user
    public static function createUser($username, $email, $password, $db)
    {
        $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT) // Hash the password
        ]);
        return $stmt->rowCount() > 0;
    }

    public function update()
    {
        // Update an existing user in the database
    }

    public function delete()
    {
        // Delete a user from the database
    }
}