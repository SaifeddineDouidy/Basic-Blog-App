<?php

require_once 'config/Database.php';
require_once 'models/Blogs.php';

class BlogController
{
    private $db;
    private $blogModel;

    public function __construct()
    {
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


    public function getAllBlogs()
    {
        try {
            $blogs = $this->blogModel->findAll();
            // Render the header
            $this->renderView('header');
            // Render the 'all-blogs' view and pass the blogs data to it
            $this->renderView('all-blogs', ['blogs' => $blogs]);
            // Render the footer
            $this->renderView('footer');
        } catch (PDOException $e) {
            // Handle exception
            echo 'Error: '. $e->getMessage();
        }
    }

    public function getMyBlogs()
    {
        try {
            $currentUserId = $_SESSION['user_id'];
            $blogs = $this->blogModel->findByUserId($currentUserId, $this->db);
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
            $searchQuery = isset($_GET['query'])? $_GET['query'] : '';
            $blogs = $this->blogModel->searchByTitle($this->db, $searchQuery);

            // Assuming renderView is a method in your controller to render views
            $this->renderView('search_results', [
                'blogs' => $blogs,
                'searchQuery' => $searchQuery
            ]);
        } catch (PDOException $e) {
            echo 'Error: '. $e->getMessage();
        }
    }
    
    

    


}
