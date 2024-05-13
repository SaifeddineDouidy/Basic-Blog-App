<?php

class Blogs
{
    private $id;
    private $title;
    private $description;
    private $author_id;
    private $created_at;
    private $db;

    public function __construct(Database $db, $data = [])
    {
        $this->db = $db;

        if (!empty($data)) {
            $this->id = $data['id'] ?? null;
            $this->title = $data['title'] ?? '';
            $this->description = $data['description'] ?? '';
            $this->author_id = $data['author_id'] ?? null;
            $this->created_at = $data['created_at'] ?? null;
        }
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

    public function getDescription()
    {
        return $this->description;
    }

    public function getAuthorId()
    {
        return $this->author_id;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setTitle($title)
    {
        $this->validateTitle($title);
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->validateDescription($description);
        $this->description = $description;
    }

    public function setAuthorId($author_id)
    {
        $this->author_id = $author_id;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    private function getAuthorNameById($authorId)
    {
        $query = "SELECT username FROM users WHERE id = :author_id";
        $result = $this->db->fetchOne($query, [':author_id' => $authorId]);
        return $result ? $result['username'] : null;
    }

    public function getAuthorName()
    {
        return $this->getAuthorNameById($this->author_id);
    }
    
    public static function searchByTitle($db, $searchQuery)
    {
        $sql = "SELECT * FROM blogs WHERE title LIKE :searchQuery";
        $params = [
            ':searchQuery' => "%$searchQuery%"
        ];

        $result = $db->fetchAll($sql, $params);
        $blogs = [];
        foreach ($result as $row) {
            $blogs[] = new Blogs($db, $row);
        }
        return $blogs;
    }

    public static function findAll(Database $db)
    {
        $query = "SELECT * FROM blogs";
        $result = $db->fetchAll($query);
        $blogs = [];
        foreach ($result as $row) {
            $blogs[] = new Blogs($db, $row);
        }
        return $blogs;
    }

    public static function findByAuthorId($authorId, Database $db)
    {
        $query = "SELECT * FROM blogs WHERE author_id = :author_id";
        $result = $db->fetchAll($query, [':author_id' => $authorId]);
        $blogs = [];
        foreach ($result as $row) {
            $blogs[] = new Blogs($db, $row);
        }
        return $blogs;
    }

    public function save()
    {
        if ($this->id) {
            $this->update();
        } else {
            $this->create();
        }
    }

    private function create()
    {
        $query = "INSERT INTO blogs (title, description, created_at, author_id) VALUES (:title, :description, :created_at, :author_id)";
        $params = [
            ':title' => $this->title,
            ':description' => $this->description,
            ':created_at' => time(),
            ':author_id' => $this->author_id
        ];
        $this->db->query($query, $params);
        $this->id = $this->db->pdo->lastInsertId();
    }

    private function update()
    {
        $query = "UPDATE blogs SET title = :title, description = :description, updated_at = :updated_at WHERE id = :id";
        $params = [
            ':title' => $this->title,
            ':description' => $this->description,
            ':updated_at' => time(),
            ':id' => $this->id
        ];
        $this->db->query($query, $params);
    }

    public function delete()
    {
        $query = "DELETE FROM blogs WHERE id = :id";
        $params = [
            ':id' => $this->id
        ];
        $this->db->query($query, $params);
    }

    private function validateTitle($title)
    {
        // Simple validation: title must not be empty
        if (empty(trim($title))) {
            throw new Exception("Title cannot be empty.");
        }
    }

    private function validateDescription($description)
    {
        // Simple validation: description must not be empty
        if (empty(trim($description))) {
            throw new Exception("Description cannot be empty.");
        }
    }
}