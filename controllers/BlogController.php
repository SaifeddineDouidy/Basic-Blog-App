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
        $this->blogModel = new Blog($this->db);
    }

    private function renderView($viewName, $data = [])
    {
        // Define paths to your view files
        $viewPaths = [
            'header' => 'views/header.php',
            'footer' => 'views/footer.php',
            'my-blogs' => 'views/blog/my-blogs.php',
            'all-blogs' => 'views/blog/all-blogs.php',
        ];

        // Check if the view file exists
        if (isset($viewPaths[$viewName])) {
            $viewFile = $viewPaths[$viewName];
            // Include the view file
            include $viewFile;

            // If there's data to pass to the view, extract it
            if (!empty($data)) {
                // Extract the data into variables
                extract($data);
            }
        } else {
            // Handle the case where the view file doesn't exist
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
    


}
