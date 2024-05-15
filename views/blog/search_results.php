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
    <div style="border-style: solid; border-width: 5px; border-color: #6b63ff; margin: 10px; margin-right: 1100px; margin-left: 30px; border-radius: 10px; padding: 5px; text-align: center; ">
    <h3 class='' >Search Results for: <?= htmlspecialchars($searchQuery)?></h3></div>
    <?php if (count($blogs) > 0):?>
        <?php foreach ($blogs as $blog):?>
            <div class="card  border-dark " style="margin: 30px 150px; border-radius: 20px;">
                <div class="card-body">
                    <h2 class="card-title"><?= htmlspecialchars($blog->getTitre())?></h2>
                    <p class="card-text"><?= htmlspecialchars($blog->getDescription())?></p>
                    <p class="card-text">
                        <small class="text-muted">
                            Posted on <?= htmlspecialchars(date('M d, Y', strtotime($blog->getCreatedAt())))?>
                            By <?= htmlspecialchars($blog->getAuthorName())?>
                        </small>
                    </p>
                    <a href="#" class="btn" style="background-color: #6b63ff; color: white;">Read More</a>
                </div>
            </div>
        <?php endforeach;?>
    <?php else:?>
        <p>No results found for "<strong><?= htmlspecialchars($searchQuery)?></strong>".</p>
    <?php endif;?>

</body>
</html>