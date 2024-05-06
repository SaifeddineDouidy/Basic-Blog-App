<?php

class Blog
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
            $this->content = $data['content']?? '';
            $this->user_id = $data['user_id']?? null;
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

    public function setTitle($title)
    {
        $this->validateTitle($title);
        $this->title = $title;
    }

    public function setContent($content)
    {
        $this->validateContent($content);
        $this->content = $content;
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
        $query = "SELECT * FROM blogs WHERE user_id =?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
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
        $query = "INSERT INTO blogs (title, content, user_id, created_at) VALUES (?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssii", $this->title, $this->content, $this->user_id, time());
        $stmt->execute();
        $this->id = $stmt->insert_id;
    }

    private function update()
    {
        $query = "UPDATE blogs SET title =?, content =?, updated_at =? WHERE id =?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssii", $this->title, $this->content, time(), $this->id);
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
