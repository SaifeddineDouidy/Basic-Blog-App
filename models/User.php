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
}
?>
