<?php include 'views/header.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h3 class='ml-2 mt-3'>Search Results for: <?= htmlspecialchars($searchQuery)?></h3>
    <?php if (count($blogs) > 0):?>
        <?php foreach ($blogs as $blog):?>
            <div class="card ml-2 mb-3 border-dark blog-post-card">
                <div class="card-body">
                    <h2 class="card-title"><?= htmlspecialchars($blog->getTitre())?></h2>
                    <p class="card-text"><?= htmlspecialchars($blog->getDescription())?></p>
                    <p class="card-text">
                        <small class="text-muted">
                            Posted on <?= htmlspecialchars(date('M d, Y', strtotime($blog->getCreatedAt())))?>
                            By <?= htmlspecialchars($blog->getAuthorName())?>
                        </small>
                    </p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        <?php endforeach;?>
    <?php else:?>
        <p>No results found for "<strong><?= htmlspecialchars($searchQuery)?></strong>".</p>
    <?php endif;?>

</body>
</html>
