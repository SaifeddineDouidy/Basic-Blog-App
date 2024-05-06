<?php

class Database
{
    private $host = 'localhost';
    private $dbname = 'blog_app';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4";
            $this->pdo = new PDO($dsn, $this->username, $this->password);

            // Set PDO to throw exceptions on error
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Set PDO to return associative arrays
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // If connection fails, display error message
            die('Database connection failed: '. $e->getMessage());
        }
    }

    public function query($sql, $params = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            // Log the error or handle it in a more appropriate way
            error_log('Database query error: ' . $e->getMessage());
            throw $e; // Re-throw the exception for the caller to handle
        }
    }

    public function fetchAll($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }

    public function prepare($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        if ($params) {
            $types = str_repeat('s', count($params)); // Assuming all parameters are strings
            $stmt->execute($params, $types);
        }
        return $stmt;
    }


    // Add more methods as needed for INSERT, UPDATE, DELETE, etc.
}
