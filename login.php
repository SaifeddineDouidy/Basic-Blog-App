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
    </style>
</head>
<body class='login-body'>
<div class="container-fluid ps-md-0">
  <div class="row g-0">
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">

              <!-- Wrap the form in a Bootstrap card -->
              <div class="card shadow-lg border-0 rounded-lg mt-4">
                <div class="card-header"><h3 class="text-center font-weight-light">Welcome back!</h3></div>
                <div class="card-body">

                  <form action="logincontrol.php" method="post">
                  <label>Email:</label><br>
                  <input type="email" name="email" required><br>
                  <label>Password:</label><br>
                  <input type="password" name="password" required><br><br>
                  <input type="submit" value="login">
                  </form>
                      <div class="text-center">
                        <a class="small" href="#">Forgot password?</a>
                      </div>
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
