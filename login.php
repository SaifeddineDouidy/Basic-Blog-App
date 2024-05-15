<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/styles.css" rel="stylesheet">
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <title>Login Page</title>
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
        </div>
      </div>
    </div>
  </div>
</div>

</body>
<script src="public/js/jquery.min.js"></script>
<script src="public/js/bootstrap.bundle.min.js"></script>
</html>
