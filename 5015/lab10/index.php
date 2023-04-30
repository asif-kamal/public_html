<?php
  session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Asif Kamal based on Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Lab 10: Information Authentication and Security</title>



  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="css/signin.css" rel="stylesheet">
  <script src="js/jquery-3.6.4.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(() => {
      $("#loginForm").hide();
      $("#setPasswordForm").hide();
    });
  </script>
</head>

<body class="text-center">
  <!-- Login Form -->
  <form class="form-signin" id="loginForm" action="php/login.php" method="POST">
    <img class="mb-4" src="images/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">CIS5015 Project</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="rememberMe" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <div class="alert alert-info mt-2" id="messageBox">
    </div>
    <br />
    <a href="php/register.php">Register</a> | <a href="php/forget.php">Forget?</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
  </form>

  <!-- Registration Form -->
  <form class="form-signin" id="registerForm" action="php/register.php" method="GET">
    <img class="mb-4" src="images/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">CIS5015 Project</h1>
    <label for="inputFirstName" class="sr-only">First Name</label>
    <input type="text" name="inputFirstName" class="form-control" placeholder="First Name" required autofocus>
    <label for="inputLastName" class="sr-only">Last Name</label>
    <input type="text" name="inputLastName" class="form-control" placeholder="Last Name" required autofocus>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    <div class="alert alert-info mt-2" id="RmessageBox">
    <?php
        print $_SESSION["Message"];
        $_SESSION["Message"] = "";
      ?>
    </div>
    <br />
    <button type="button" id="returnButton">Return</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
  </form>

  <!-- Set Password Form -->
  <form class="form-signin" id="setPasswordForm" action="php/setPassword.php" method="POST">
    <img class="mb-4" src="images/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">CIS5015 Project</h1>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
    <!-- <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus> -->
    <button class="btn btn-lg btn-primary btn-block" type="submit">Set Password</button>
    <div class="alert alert-info mt-2" id="SPmessageBox"></div>
    <br />
    <button type="button" id="loginButton">Login</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
  </form>

</body>

</html>