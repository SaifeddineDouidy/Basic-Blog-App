<?php

//controllers/BlogController.php

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
            $searchQuery = isset($_GET['query'])? $_GET['query'] : '';
            $blogs = $this->blogModel->searchByTitre($this->db, $searchQuery);

            // Assuming renderView is a method in your controller to render views
            $this->renderView('search_results', [
                'blogs' => $blogs,
                'searchQuery' => $searchQuery
            ]);
        } catch (PDOException $e) {
            echo 'Error: '. $e->getMessage();
        }
    }

    public function updateBlog()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $blogId = $_POST['blogId'];
            $titre = $_POST['titre'];
            $description = $_POST['description'];
            $genre = $_POST['genre'];
    
            try {
                // Retrieve the blog from the database
                $blog = $this->blogModel->findById($blogId);
                if ($blog) {
                    // Update the blog information
                    $blog->setTitre($titre);
                    $blog->setDescription($description);
                    $blog->setGenre($genre);
                    $blog->save();
    
                    // Return a JSON response
                    echo json_encode(['success' => true]);
                } else {
                    // Return an error response if the blog is not found
                    echo json_encode(['success' => false, 'message' => 'Blog not found']);
                }
            } catch (PDOException $e) {
                // Handle the exception
                echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
            }
        } else {
            // Return an error response for invalid requests
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
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
                    // Display an error message
                    echo "Failed to delete the blog";
                }
            } catch (PDOException $e) {
                // Handle exception
                echo 'Error: ' . $e->getMessage();
            }
        } else {
            // Redirect or display an error message for invalid requests
            header('Location: my-blogs.php?error=true');
            exit;
        }
    }
    
    public function getLastBlog()
    {
        try {
            $lastBlog = $this->blogModel->findLastBlog();
            if ($lastBlog) {
                $this->renderView('last-blog', ['lastBlog' => $lastBlog]);
            } else {
                // Handle case when no last blog is found
                echo "No last blog found";
            }
        } catch (PDOException $e) {
            echo 'Error: '. $e->getMessage();
        }
    }

    public function getOldestBlog()
    {
        try {
            $oldestBlog = $this->blogModel->findOldestBlog();
            $this->renderView('oldest-Blog', ['oldestBlog' => $oldestBlog]);
        } catch (PDOException $e) {
            echo 'Error: '. $e->getMessage();
        }
    }

        
    public function getBlogsByGenre($genre)
{
    try {
        // Assuming you have a method named findBlogsByGenre in your Blogs model
        $blogs = $this->blogModel->findBlogsByGenre($genre);
        $this->renderView('blogs-by-genre', ['blogs' => $blogs, 'genre' => $genre]);
    } catch (PDOException $e) {
        echo 'Error: '. $e->getMessage();
    }
}


}
