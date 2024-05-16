<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Last Post</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'views/header.php'; ?>
    <div class="container mt-5">
        <h2>Last Post</h2>
        <?php if ($lastBlog): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($lastBlog->getTitre()) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($lastBlog->getDescription()) ?></p>
                    <p class="card-text"><small class="text-muted">Posted on <?= htmlspecialchars(date('M d, Y', strtotime($lastBlog->getCreatedAt()))) ?></small></p>
                    <p class="card-text"><small class="text-muted">By <?= htmlspecialchars($lastBlog->getAuthorName())?>
                    <p class="card-text"><small class="text-muted">Genre: <?= htmlspecialchars($lastBlog->getGenre()) ?></small></p>
                </div>
            </div>
        <?php else: ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </div>
    <?php include 'views/footer.php'; ?>
</body>
</html>