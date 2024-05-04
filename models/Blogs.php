<?php

class Blog
{
    private $id;
    private $title;
    private $content;
    private $user_id;
    private $created_at;
    private $db;

    public function __construct($data = [])
    {
        if (!empty($data)) {
            $this->id = $data['id'] ?? null;
            $this->title = $data['title'] ?? '';
            $this->content = $data['content'] ?? '';
            $this->user_id = $data['user_id'] ?? null;
            $this->created_at = $data['created_at'] ?? null;
        }
        $this->db=$db;
    }

    // Getter and Setter methods
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    // Other methods for interacting with the database (create, read, update, delete)
    public static function findAll()
    {
        // Query the database to retrieve all blogs
    }

    public static function findByUserId($userId, $db)
    {
        // Query the database to retrieve blogs by user ID
    }

    public function create()
    {
        // Insert a new blog into the database
    }

    public function update()
    {
        // Update an existing blog in the database
    }

    public function delete()
    {
        // Delete a blog from the database
    }
}