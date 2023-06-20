<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - PUPAA ADMIN</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/plugins/datatables/dataTables.bootstrap5.min.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css"
    />
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<div id="login-page">
      <div class="login">
        <h2 class="login-title">Admin Login</h2>
        <p class="notice">Please login to access the system</p>
        <form class="form-login">
          <label for="email">E-mail</label>
          <div class="input-email">
            <i class="fas fa-envelope icon"></i>
            <input class="form-control form-control-user" type="email" id="username" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
          </div>
          <label for="password">Password</label>
          <div class="input-password">
            <i class="fas fa-lock icon"></i>
            <input class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password">
          </div>
          <div class="checkbox">
            <label for="remember">
              <input type="checkbox" name="remember" />
              Remember me
            </label>
          </div>
          <button type="button" onclick="Login.login();">
            <i class="fas fa-door-open"></i>
            Sign in
          </button>
        </form>
        <a href="#">Forgot your password?</a>
      </div>
      <div class="background"></div>
    </div>
    <?php include_once('scripts.php'); ?>
</body>

</html>