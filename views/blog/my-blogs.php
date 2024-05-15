<?php
session_start();
require_once 'config/Database.php';
require_once 'models/Blogs.php';

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    // Redirect to login page or display an error message
    //header("Location: login.php");
    //exit;
    $userId = 1;
}

// Initialize the database and blog model
$db = new Database();

// Fetch blogs for the current user
$blogs = Blogs::findByAuthorId($userId, $db);
?>

<?php include 'views/header.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blogs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link href="public/css/my-blogs.css" rel="stylesheet">
    <style>
      .add-new-blog {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #007bff;
            color: #fff;
            font-size: 3rem;
            border-radius: 0.25rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">My Blogs</h1>
        <div class="row">
            <?php if (count($blogs) > 0):?>
                <?php foreach ($blogs as $blog):?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h2 class="card-title"><?= htmlspecialchars($blog->getTitre())?></h2>
                                <p class="card-text"><?= htmlspecialchars($blog->getDescription())?></p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        Posted on <?= htmlspecialchars(date('M d, Y', strtotime($blog->getCreatedAt())))?>
                                    </small>
                                </p>
                                <button id="editButton<?= $blog->getId()?>" class="btn btn-warning edit-button" data-toggle="modal" data-target="#editModal" data-blog-id="<?= $blog->getId()?>">Modifier</button>
                                <button id="deleteButton<?= $blog->getId()?>" class="btn btn-danger delete-button" data-toggle="modal" data-target="#confirmModal" data-blog-id="<?= $blog->getId()?>">Delete</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php else:?>
                <p class="text-center">You haven't created any blogs yet.</p>
            <?php endif;?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="add-new-blog" id="addNewBlogButton">
                        <span>+</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Create Blog Modal -->
<div class="modal fade" id="createBlogModal" tabindex="-1" role="dialog" aria-labelledby="createBlogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createBlogModalLabel">Create New Blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="create_blog.php" id="createBlogForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="newTitre" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="newTitre" name="titre" required>
                    </div>
                    <div class="mb-3">
                        <label for="newDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="newDescription" name="description" required></textarea>
                    </div>
                    <div class="dropdown">
                        <label for="newGenre" class="form-label">Genre:</label>
                        <select class="form-control" id="newGenre" name="genre" required>
                            <option value="">Select Genre</option>
                            <option value="Personal">Personal</option>
                            <option value="Technology">Technology</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Travel">Travel</option>
                            <option value="Food">Food</option>
                            <option value="Lifestyle">Lifestyle</option>
                            <option value="Fitness">Fitness</option>
                            <option value="Sports">Sports</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Blog</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <!-- Confirm Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirm Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this blog?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelAction">Cancel</button>
                    <form action="deleteMyBlog.php" method="post" id="deleteForm">
                        <input type="hidden" name="blogId" id="blogIdInput">
                        <button type="submit" class="btn btn-danger" id="confirmAction">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modifier le blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="updateMyBlog.php" method="post" id="editForm">
                <div class="modal-body">
                    <!-- Form fields here -->
                    <form action="updateMyBlog.php" method="post" id="editForm">
                <div class="modal-body">
                    <div class="mb-3">
                    <input type="hidden" id="editBlogId" name="blogId">
                        <label for="editTitre" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="editTitre" name="titre">
                    </div>
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editDescription" name="description"></textarea>
                    </div>
                    <div class="dropdown">
                        <label for="editGenre" class="form-label">Genre : </label>
                        <select class="form-control" id="genreDropdown" name="genre">
                            <option value="">Select Genre</option>
                            <option value="Personal">Personal</option>
                            <option value="Technology">Technology</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Travel">Travel</option>
                            <option value="Food">Food</option>
                            <option value="Lifestyle">Lifestyle</option>
                            <option value="Fitness">Fitness</option>
                            <option value="Sports">Sports</option>
                            <!-- Add more genres as needed -->
                        </select>
                    </div>
                    <input type="hidden" id="editBlogId" name="blogId">
                </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        $('.modal .btn-secondary, .modal .close').on('click', function() {
            $(this).closest('.modal').modal('hide');
            $('.modal-backdrop').remove();
        });

        $(document).ready(function() {

            $('#addNewBlogButton').on('click', function() {
                $('#createBlogModal').modal('show');
            });

            $('#createBlogForm').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);
                $.ajax({
                    url: '/create_blog.php',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        
                        $('#createBlogModal').modal('hide');
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error creating blog: ", error);
                    }
                    
                });
            });

            $('.delete-button').on('click', function() {
                var blogId = $(this).data('blogId');
                $('#blogIdInput').val(blogId);
                $('#confirmModal').modal('show');
            });

            $('#confirmAction').on('click', function() {
                var blogId = $(this).data('blogId');
                $.ajax({
                    url: '/deleteMyBlog.php',
                    type: 'POST',
                    data: { blogId: blogId },
                    success: function(response) {
                        $('#confirmModal').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        console.error("Error deleting blog: ", error, status, xhr);
                    }
                });
            });

            $('#cancelAction').on('click', function() {
                $('#confirmModal').modal('hide');
            });

            $('.edit-button').on('click', function() {
                var blogId = $(this).data('blogId');
                $('#editBlogId').val(blogId);

                $.ajax({
                    url: 'fetch_blog_data.php',
                    type: 'GET',
                    data: { blogId: blogId },
                    dataType: 'json',
                    success: function(data) {
                        if (data.success) {
                            var blog = data.blog;
                            $('#editTitre').val(blog.titre);
                            $('#editDescription').val(blog.description);
                            $('#genreDropdown').val(blog.genre);
                        } else {
                            console.error('Error fetching blog data:', data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    },
                    complete: function() {
                        $('#editModal').modal('show');
                    }
                });
            });
        });
        
    </script>
</body>
</html>
