<?php

class Blogs
{
    private $id;
    private $title;
    private $content;
    private $user_id;
    private $created_at;
    private $db;

    public function __construct($data = [], $db)
    {
        if (!empty($data)) {
            $this->id = $data['id']?? null;
            $this->title = $data['title']?? '';
            $this->description = $data['description']?? '';
            $this->user_id = $data['author_id']?? null;
            $this->created_at = $data['created_at']?? null;
        }
        $this->db = $db;
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

    public function getUserId()
    {
        return $this->user_id;
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
        $this->validateContent($description);
        $this->description = $description;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    // Database Interaction Methods
    public static function findAll($db)
    {
        $query = "SELECT * FROM blogs";
        $result = $db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function findByUserId($userId, $db)
    {
        $query = "SELECT * FROM blogs WHERE author_id =?";
        $stmt = $db->prepare($query);
        
        // Bind the parameter using PDO's syntax
        $stmt->bindParam(1, $userId, PDO::PARAM_INT); // Assuming $userId is an integer
        
        // Execute the statement
        $stmt->execute();
        
        // Fetch all results
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
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
        $query = "INSERT INTO blogs (title, description, created_at, author_id ) VALUES (?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssii", $this->title, $this->description, $this->user_id, time());
        $stmt->execute();
        $this->id = $stmt->insert_id;
    }

    private function update()
    {
        $query = "UPDATE blogs SET title =?, description =?, updated_at =? WHERE id =?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssii", $this->title, $this->description, time(), $this->id);
        $stmt->execute();
    }

    public function delete()
    {
        $query = "DELETE FROM blogs WHERE id =?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
    }

    private function validateTitle($title)
    {
        // Simple validation: title must not be empty
        if (empty(trim($title))) {
            throw new Exception("Title cannot be empty.");
        }
    }

    private function validateContent($content)
    {
        // Simple validation: content must not be empty
        if (empty(trim($content))) {
            throw new Exception("Content cannot be empty.");
        }
    }
}
