<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/styles.css" rel="stylesheet">
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <title>Login Page</title>
</head>
<body>
<div class="container-fluid ps-md-0">
  <div class="row g-0">
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Welcome back!</h3>

              <form>
                <div class="form-floating mb-3">
                    <label for="floatingInput">Email address</label>
                  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                  
                </div>
                <div class="form-floating mb-3">
                  <label for="floatingPassword">Password</label>
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                  
                </div>

                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                  <label class="form-check-label" for="rememberPasswordCheck">
                    Remember password
                  </label>
                </div>

                <div class="d-grid">
                  <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Sign in</button>
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

</body>
<script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.bundle.min.js"></script>
</html>