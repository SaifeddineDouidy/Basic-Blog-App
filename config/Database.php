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

    public function getConnection()
    {
        return $this->pdo;
    }

    public function insert($table, $columns, $values)
    {
        $columns = implode(',', array_keys($columns));
        $placeholders = ':'. implode(', :', array_keys($columns));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        try {
            $stmt = $this->pdo->prepare($sql);
            foreach ($columns as $column => $value) {
                $stmt->bindValue(":$column", $value);
            }
            $stmt->execute();
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            error_log('Database insert error: '. $e->getMessage());
            throw $e;
        }
    }

    public function query($sql, $params = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            error_log('Database query error: '. $e->getMessage());
            throw $e; // Re-throw the exception for the caller to handle
        }
    }

    public function fetchAll($query, $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public function fetchOne($query, $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // New method to check if a table exists
    public function tableExists($tableName)
    {
        $sql = "SHOW TABLES LIKE '$tableName'";
        $stmt = $this->pdo->query($sql);
        return $stmt->rowCount() > 0;
    }
}
