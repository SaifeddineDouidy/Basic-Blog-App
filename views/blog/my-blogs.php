<?php
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
</head>
<body>
    <div class="card-container ml-3">
        <h1 class="text-center my-4">My Blogs</h1>
        <div class="row">
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form action="deleteMyBlog.php" method="post" id="deleteForm">
                            <input type="hidden" name="blogId" id="blogIdInput">
                            <button type="submit" class="btn btn-danger" id="confirmAction">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <?php if (count($blogs) > 0):?>
                <?php foreach ($blogs as $blog):?>
                    <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title"><?= htmlspecialchars($blog->getTitle())?></h2>
                            <p class="card-text"><?= htmlspecialchars($blog->getDescription())?></p>
                            <p class="card-text">
                                <small class="text-muted">
                                    Posted on <?= htmlspecialchars(date('M d, Y', strtotime($blog->getCreatedAt())))?>
                                </small>
                            </p>
                            <a href="#" class="btn btn-primary">Read More</a>
                            <!-- delete Button -->
                            <button id="deleteButton<?= $blog->getId()?>" class="btn btn-danger delete-button" data-toggle="modal" data-target="#confirmModal" data-blog-id="<?= $blog->getId()?>">
                                Delete
                            </button>

                        </div>
                    </div>

                    </div>
                <?php endforeach;?>
            <?php else:?>
                <p class="text-center">You haven't created any blogs yet.</p>
            <?php endif;?>
        </div>
    </div>
    <!-- Include the footer -->
    <?php include 'views/footer.php';?>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
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
            data: { blogId: $(this).data('blogId') },
            
            success: function(response) {
                $('#confirmModal').modal('hide');
            },
            error: function(xhr, status, error) {
                console.error("Error deleting blog: ", error, status, xhr);
            }
        });
        
    });
});
</script>


</html>