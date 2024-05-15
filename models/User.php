<?php
require_once './config/Database.php'; // Include the Database configuration

class User
{
    private $id;
    private $username;
    private $email;
    private $password;


    public function __construct($data = [])
    {
        if (!empty($data)) {
            $this->id = $data['id'] ?? null;
            $this->username = $data['username'] ?? '';
            $this->email = $data['email'] ?? '';
            $this->password = $data['password'] ?? '';
        }
   
    }

    public static function findUser($email, $password, $db)
{
    $db->query("SELECT * FROM users WHERE email = :email AND password = :password");
    $db->bind(':email', $email);
    $db->bind(':password', $password);

    // Execute the query and fetch the user data
    $user = $db->single();

    // Debugging: Output the executed SQL query
    echo "Executed SQL query: " . $db->getSQLQuery() . "<br>";

    // Debugging: Output the fetched user data
    echo "Fetched user data: ";
    var_dump($user);
    echo "<br>";

    // Check if the user exists
    if ($user) {
        // Return a new User object with user data
        return new User($user, $db);
    } else {
        // Return false if user does not exist
        return false;
    }
}



    // Getter methods
    public function getId()
    {
        echo 'fine';
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
        // Query the database to retrieve a user by IDsing $db
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

    public static function checkCredentials($email, $password, $db) {
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($password, $user['password'])) {
            return true;
        } else {
            return false;
        }
    }

    

    // Method to insert a new user
    public static function createUser($username, $email, $password, $db)
    {
        $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $password,
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