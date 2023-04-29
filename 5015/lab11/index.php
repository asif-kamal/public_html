<?php
    session_start();
    if (!isset($_SESSION["RegState"])) {
      $_SESSION["RegState"] = 0;
    }
    if ($_SESSION["RegState"] == 4) header("Location:dashboard.php");
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Asif Kamal based on Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Asif's Lab 11 - Web Access of Local Applications</title>



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
  <link href="css/strength-indicator.css" type="text/css" rel="stylesheet">
  <script src="js/jquery-3.6.4.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/passwordChecker.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body class="text-center">
<?php
	if (($_SESSION["RegState"] <= 0) || ($_SESSION["RegState"] == 2)){
?>
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
      <?php
        print $_SESSION["Message"];
        $_SESSION["Message"] = "";
    ?>
    </div>
    <br />
    <a href="php/register0.php">Register</a> | <a href="php/resetPassword0.php">Forget?</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
  </form>

<?php
	    } 
	    if ($_SESSION["RegState"] == 1) {  // When "register" is clicked
?>
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
    <div class="g-recaptcha" data-sitekey="6Ld-JX4UAAAAAPK_rjQITUhqEI32hk4I1QUJlrRm"></div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    <div class="alert alert-info mt-2" id="RmessageBox">
      <?php
        print $_SESSION["Message"];
        $_SESSION["Message"] = "";
      ?>
    </div>
    <br />
    <a href="php/returnBtn.php">
      <button type="button" id="returnButton">Return</button>
    </a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
  </form>

<?php
	    }
	    if ($_SESSION["RegState"] == 3) { // after email is authenticated
?>
  <!-- Set Password Form -->
  <form class="form-signin" id="setPasswordForm" action="php/setPassword.php" method="POST">
    <img class="mb-4" src="images/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">CIS5015 Project</h1>
    <div id="pwd_strength_wrap">
    <div id="passwordDescription">Password not entered</div>
    <div id="passwordStrength" class="strength0"></div>
    <div id="pswd_info">
      <strong>Strong Password Tips:</strong>
      <ul>
        <li class="invalid" id="length">At least 6 characters</li>
        <li class="invalid" id="pnum">At least one number</li>
        <li class="invalid" id="capital">At least one lowercase &amp; one uppercase letter</li>
        <li class="invalid" id="spchar">At least one special character</li>
      </ul>
    </div><!-- END pswd_info -->
  </div><!-- END pwd_strength_wrap -->
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="inputPassword" id="pwd" class="form-control" style="width: 100%" placeholder="Password"
      required>
    <div id="pwd_strength_wrap">
      <div id="passwordDescription">Password not entered</div>
      <div id="passwordStrength" class="strength0"></div>
      <div id="pswd_info">
        <strong>Strong Password Tips:</strong>
        <ul>
          <li class="invalid" id="length">At least 6 characters</li>
          <li class="invalid" id="pnum">At least one number</li>
          <li class="invalid" id="capital">At least one lowercase &amp; one uppercase letter</li>
          <li class="invalid" id="spchar">At least one special character</li>
        </ul>
      </div><!-- END pswd_info -->
    </div><!-- END pwd_strength_wrap -->
    <button class="btn btn-lg btn-primary btn-block" type="submit">Set Password</button>
    <div class="alert alert-info mt-2" id="SPmessageBox">
      <?php
        print $_SESSION["Message"];
        $_SESSION["Message"] = "";
      ?>
    </div>
    <br />
    <a href="php/clearAll.php">
      <button type="button" id="loginButton">Login</button>
    </a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
  </form>
<?php
	    } 
	if ($_SESSION["RegState"] == 6) { // when "forget" is clicked
?>
  <form action="php/resetPassword.php" method="get" class="col form-signin">
    <img class="mb-4" src="images/bootstrap-solid.svg" alt="" width="72"
      height="72">
    <h1 class="h3 mb-3 font-weight-normal">CIS5015 Project</h1>
    <h3 class="h4 mb-3 font-weight-normal">Reset Password</h3>
    <label for="inputEmail" class="sr-only">Registered Email address</label>
    <input type="email" id="inputEmail" name="Email" class="form-control" placeholder="Registered email address"
      required autofocus>
    <button type="submit" class="btn btn-lg btn-primary btn-block" type="submit">
      Authenticate
    </button>
    <div id="messageResetPassword" class="alert alert-info mt-2" role="alert">
    <?php
        print $_SESSION["Message"];
        $_SESSION["Message"] = "";
      ?>
    </div>
    <a href="php/clearAll.php"><button type="button" class="mt-2">Return</button></a>
  </form>
<?php
	  } 
?>

</body>

</html>