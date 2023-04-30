<?php
    session_start();
    require_once("config.php");
    $Email = $_POST["inputEmail"];
    $Password = md5($_POST["inputPassword"]);
    print "Email = ($Email) Password = ($Password) </br>";
    $RememberMe = $_POST["rememberMe"];
    print "rememberMe = ($RememberMe) </br>";
    //Connect to DB
    $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
    if (!$con) {
        $_SESSION["RegState"] = -1;
        $_SESSION["Message"] = "Database connection failed: ".mysqli_error($con);
        header("Location:../index.php");
        exit();
    }
    print "Database connected <br/>";
    //Build a "select"
    $query = "SELECT * FROM Users WHERE Email='$Email' AND Password='$Password';";
    $result = mysqli_query($con, $query);
    if (!$result) {
        $_SESSION["RegState"] = -2;
        $_SESSION["Message"] = "Login query failed: ".mysqli_error($con);
        header("Location:../index.php");
        exit();
    } 
    $rows = mysqli_num_rows($result);
    if ($rows != 1) {
        $_SESSION["RegState"] = 0;
        $_SESSION["Message"] = "Email or password does not match.";
        header("Location:../index.php");
        exit();
    }
    //We have one row in $result
    $data = mysqli_fetch_assoc($result);
    if (isset($_POST["rememberMe"])) {
        $_SESSION["UID"] = $data["ID"];
    } else unset($_SESSION["UID"]);
    $_SESSION["RegState"] = 4;
    header("Location: ../dashboard.php");
    exit();
?>