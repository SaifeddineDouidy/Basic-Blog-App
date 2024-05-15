<?php

require_once 'config/Database.php';
require_once 'models/Blogs.php';

class BlogController
{
    private $db;
    private $blogModel;

    public function __construct()
    {
        session_start();

        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            // Redirect to login page or handle the situation
            //header("Location: login.php");
            $userId = 1;
            exit;
        }
        $this->db = new Database();
        $this->blogModel = new Blogs($this->db);
    }

    public function renderView($viewName, $data = [])
    {
        extract($data);
        $viewFile = "views/blog/$viewName.php";
        if (file_exists($viewFile)) {
            include $viewFile;
        } else {
            echo "View file not found: $viewName";
        }
    }


    public function createBlog($titre, $description, $genre)
    {
        try {
            //$currentUserId = $_SESSION['user_id'];
            $currentUserId = 1; // Testing purposes
            // Assuming the Blogs model has a create method that accepts these parameters
            $blog = $this->blogModel->create($currentUserId, $titre, $description, $genre);
    
            if ($blog) {
                return [
                   'success' => true,
                   'status_code' => 201 // Created
                ];
            } else {
                return [
                   'success' => false,
                   'message' => 'Failed to create the blog',
                   'status_code' => 500 // Internal Server Error
                ];
            }
        } catch (PDOException $e) {
            return [
               'success' => false,
               'message' => 'Error: '. $e->getMessage(),
               'status_code' => 500 // Internal Server Error
            ];
        }
    }
    


    public function getAllBlogs()
    {
        try {
            $blogs = $this->blogModel->findAll();
            $this->renderView('header');
            $this->renderView('all-blogs', ['blogs' => $blogs]);
        } catch (PDOException $e) {
            echo 'Error: '. $e->getMessage();
        }
    }

    public function getMyBlogs()
    {
        try {
            $currentUserId = $_SESSION['user_id'];
            $blogs = $this->blogModel->findByAuthorId($currentUserId, $this->db);
            // Render the header
            $this->renderView('header');
            // Render the 'my-blogs' view and pass the blogs data to it
            $this->renderView('my-blogs', ['blogs' => $blogs]);
            // Render the footer
            $this->renderView('footer');
        } catch (PDOException $e) {
            // Handle exception
            echo 'Error: '. $e->getMessage();
        }
    }
    public function searchBlogs() {
        try {
            $searchQuery = isset($_GET['query']) ? $_GET['query'] : '';
            $blogs = $this->blogModel->searchByTitre($this->db, $searchQuery);

            $this->renderView('search_results', [
                'blogs' => $blogs,
                'searchQuery' => $searchQuery
            ]);
        } catch (PDOException $e) {
            echo 'Error: '. $e->getMessage();
        }
    }
    public function updateBlog($blogId, $titre, $description, $genre)
    {
        // Check if the required input data is present
        if (empty($blogId) || empty($titre) || empty($description) || empty($genre)) {
            return [
                'success' => false,
                'message' => 'Invalid or missing input data',
                'status_code' => 400 // Bad Request
            ];
        }
    
        try {
            $blog = $this->blogModel->findById($blogId);
            if (!$blog) {
                return [
                    'success' => false,
                    'message' => 'Blog not found',
                    'status_code' => 404 // Not Found
                ];
            }
    
            $blog->setTitre($titre)
                ->setDescription($description)
                ->setGenre($genre)
                ->save();
    
            return [
                'success' => true,
                'status_code' => 200 // OK
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
                'status_code' => 500 // Internal Server Error
            ];
        }
    }


    public function getBlogData($blogId)
{
    try {
        $blog = $this->blogModel->findById($blogId);
        if ($blog) {
            return [
                'id' => $blog->getId(),
                'titre' => $blog->getTitre(),
                'description' => $blog->getDescription(),
                'genre' => $blog->getGenre()
            ];
        }
        return null;
    } catch (PDOException $e) {
        // Handle exception
        echo 'Error: ' . $e->getMessage();
        return null;
    }
}
    
    
    public function deleteBlog()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $blogId = $_POST['blogId'];
            try {
                $deleted = $this->blogModel->deleteById($blogId);
                if ($deleted) {
                    // Redirect or display a success message
                    header('Location: index.php?route=my-blogs');
                    exit;
                } else {
                    echo "Failed to delete the blog";
                }
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        } else {
            header('Location: my-blogs.php?error=true');
            exit;
        }
    }
    

    

    


}
