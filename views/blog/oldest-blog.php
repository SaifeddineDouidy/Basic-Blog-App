<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oldest Post</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'views/header.php'; ?>
    <div class="container mt-5">
        <h2>Oldest Post</h2>
        <?php if ($oldestBlog): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($oldestBlog->getTitre()) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($oldestBlog->getDescription()) ?></p>
                    <p class="card-text"><small class="text-muted">Posted on <?= htmlspecialchars(date('M d, Y', strtotime($oldestBlog->created_at))) ?></small></p>
                    <p class="card-text"><small class="text-muted">By <?= htmlspecialchars($oldestBlog->getAuthorName())?>
                    <p class="card-text"><small class="text-muted">Genre: <?= htmlspecialchars($oldestBlog->getGenre()) ?></small></p>
                </div>
            </div>
        <?php else: ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </div>
    <?php include 'views/footer.php'; ?>
</body>
</html>