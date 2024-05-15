<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="public/css/signup.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body.signup-body {
            background-color: #508bfc;
        }
        .card {
            margin-top: 50px;
        }
        .notification {
            margin-bottom: 15px;
        }
    </style>
</head>
<body class="signup-body">
    <div class="container">
        <div class="card">
            <div class="card-body p-5 text-center">
                <h3 class="mb-5">Sign up</h3>
                <form method="post" action="index.php?route=register" class="col-md-12">
                    <?php if (isset($_SESSION['message'])): ?>
                        <div class="notification <?= $_SESSION['message_type'] ?>"><?= $_SESSION['message'] ?></div>
                        <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
                    <?php endif; ?>
                    <div class="form-group">
                        <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Signup</button>
                    <hr class="my-4">
                    <div id="reg_link" class="text-center">
                        <a href="views/auth/login.php" class="text-info">Already have an account? Login here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa4RoGCh2RFi3sZ9AKRQ8KnvD" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-smHYKd7kzA0rGf3qNJ70mCHe9L+0b60Qp+W9cl3x4CmWwB1ZR+4K+z8oRJ6gGPG" crossorigin="anonymous"></script>
</body>
</html>
