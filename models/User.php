<?php
// models/User.php


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

    public function create()
    {
        // Insert a new user into the database
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