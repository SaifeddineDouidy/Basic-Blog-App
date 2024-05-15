<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <link href="public/css/signup.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body.signup-body {
            background-color: #508bfc;
        }
        .card {
            margin-top: 50px;
            border-radius: 1rem;
        }
        .notification {
            margin-bottom: 15px;
        }
        .containerLog{
          border:'none';
          width: 70%;
        }

    </style>
</head>
<body class="signup-body">
<section class="vh-100">
    <div id="containerLog" class="container h-100 d-flex justify-content-center align-items-center">
        <div class="col-md-8 col-lg-6 col-xl-10">
            <div class="card ">
                <div class="card-body p-5 text-center">
                    <h3 class="mb-5">Login</h3>
                    <form id="signup-form" method="post" action="index.php?route=login">

                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                        </div>
                        <div class="form-check d-flex justify-content-start mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" required>
                            <label class="form-check-label" for="form1Example3"> Remember password </label>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                        <hr class="my-4">
                        <div id="reg_link" class="text-center">
                            <a href="index.php?route=signup" class="text-info">Don't have an account? Signup here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa4RoGCh2RFi3sZ9AKRQ8KnvD" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-smHYKd7kzA0rGf3qNJ70mCHe9L+0b60Qp+W9cl3x4CmWwB1ZR+4K+z8oRJ6gGPG" crossorigin="anonymous"></script>
</body>
</html>
