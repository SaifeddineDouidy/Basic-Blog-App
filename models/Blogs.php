<?php
// models/Blogs.php

class Blogs
{
    private $id;
    private $titre;
    private $description;
    private $genre;
    private $author_id;
    private $db;

    public function __construct(Database $db, $data = [])
    {
        $this->db = $db;

        if (!empty($data)) {
            $this->id = $data['id'] ?? null;
            $this->titre = $data['titre'] ?? '';
            $this->description = $data['description'] ?? '';
            $this->genre = $data['genre'] ?? '';
            $this->author_id = $data['author_id'] ?? null;
            $this->created_at = $data['created_at'] ?? null;
        }
    }

    // Getter and Setter methods
    public function getId()
    {
        return $this->id;
    }

    public function getTitre()
    {
        return $this->titre;
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

    public function getGenre(){
        return $this->genre;
    }

    public function setTitre($titre)
    {
        $this->validateTitre($titre);
        $this->titre = $titre;
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

    public function setGenre($genre){
        $this->genre = $genre;
    }

    

    private function getAuthorNameById($authorId)
    {
        $query = "SELECT username FROM user WHERE id = :author_id";
        $result = $this->db->fetchOne($query, [':author_id' => $authorId]);
        return $result ? $result['username'] : null;
    }

    public function getAuthorName()
    {
        return $this->getAuthorNameById($this->author_id);
    }

    
    
    public static function searchBytitre($db, $searchQuery)
    {
        $sql = "SELECT * FROM blogs WHERE titre LIKE :searchQuery";
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
        $query = "INSERT INTO blogs (titre, description, created_at, author_id) VALUES (:titre, :description, :created_at, :author_id)";
        $params = [
            ':titre' => $this->titre,
            ':description' => $this->description,
            ':created_at' => time(),
            ':author_id' => $this->author_id
        ];
        $this->db->query($query, $params);
        $this->id = $this->db->pdo->lastInsertId();
    }

    private function update()
    {
        $query = "UPDATE blogs SET titre = :titre, description = :description, updated_at = :updated_at WHERE id = :id";
        $params = [
            ':titre' => $this->titre,
            ':description' => $this->description,
            ':updated_at' => time(),
            ':id' => $this->id
        ];
        $this->db->query($query, $params);
    }

    public function deleteById($blogId)
    {
        $sql = "DELETE FROM blogs WHERE id = :blogId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':blogId', $blogId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }


    public function findBlogsByGenre($genre) {
        $query = "SELECT * FROM blogs WHERE genre = :genre";
        $params = [':genre' => $genre];
        $results = $this->db->fetchAll($query, $params);
        
        // Assuming Blogs::fetchAll() method returns an array of Blogs objects
        $blogs = [];
        foreach ($results as $result) {
            $blogs[] = new Blogs($this->db, $result);
        }
        
        return $blogs;
    }



public function findLastBlog()
{
    $query = "SELECT *, FROM_UNIXTIME(created_at) as formatted_created_at FROM blogs ORDER BY created_at DESC LIMIT 1";
    $result = $this->db->fetchOne($query);
    return $result ? new Blogs($this->db, $result) : null;
}

public function findOldestBlog()
{
    $query = "SELECT *, FROM_UNIXTIME(created_at) as formatted_created_at FROM blogs ORDER BY created_at ASC LIMIT 1";
    $result = $this->db->fetchOne($query);
    return $result ? new Blogs($this->db, $result) : null;
}

    private function validateTitre($titre)
    {
        if (empty(trim($titre))) {
            throw new Exception("titre cannot be empty.");
        }
    }

    private function validateDescription($description)
    {
        if (empty(trim($description))) {
            throw new Exception("Description cannot be empty.");
        }
    }
}