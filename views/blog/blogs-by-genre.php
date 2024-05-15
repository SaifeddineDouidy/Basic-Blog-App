<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs by Genre: <?= htmlspecialchars($genre) ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'views/header.php'; ?>
    <div class="container mt-5">
        <h2>Blogs in Genre: <?= htmlspecialchars($genre) ?></h2>
        <?php if (count($blogs) > 0): ?>
            <?php foreach ($blogs as $blog): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($blog->getTitre()) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($blog->getDescription()) ?></p>
                        <p class="card-text"><small class="text-muted">Posted on <?= htmlspecialchars(date('M d, Y', strtotime($blog->created_at))) ?></small></p>
                        <p class="card-text"><small class="text-muted">By <?= htmlspecialchars($blog->getAuthorName())?>
                        <p class="card-text"><small class="text-muted">Genre: <?= htmlspecialchars($blog->getGenre()) ?></small></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No blogs found in this genre.</p>
        <?php endif; ?>
    </div>
    <?php include 'views/footer.php'; ?>
</body>
</html>
