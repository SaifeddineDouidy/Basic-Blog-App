<?php

class Blogs
{
    private $id;
    private $titre;
    private $description;
    private $genre;
    private $author_id;
    private $created_at;
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
        $query = "SELECT username FROM users WHERE id = :author_id";
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

    public function create($author_id, $titre, $description, $genre)
    {
        // Prepare the SQL statement
        $sql = "INSERT INTO blogs (titre, description, genre, author_id) VALUES (?,?,?,?)";
    
        // Prepare the statement
        $stmt = $this->db->prepare($sql);
    
        // Bind the parameters
        $stmt->bindValue(1, $titre, PDO::PARAM_STR);
        $stmt->bindValue(2, $description, PDO::PARAM_STR);
        $stmt->bindValue(3, $genre, PDO::PARAM_STR);
        $stmt->bindValue(4, $author_id, PDO::PARAM_INT); // Use the author_id parameter
    
        // Execute the statement
        $stmt->execute();
    
        // Return the inserted blog's ID or a success indicator
        return $stmt->rowCount() > 0;
    }
    
    


    private function update()
    {
        $query = "UPDATE blogs SET titre = :titre, description = :description, genre = :genre, updated_at = :updated_at WHERE id = :id";
        $params = [
            ':titre' => $this->titre,
            ':description' => $this->description,
            ':genre' => $this->genre,
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