<?php
    session_start();
    $Email = $_POST["inputEmail"];
    $Password = md5($_POST["inputPassword"]);
    // print "Email = ($Email) Password = ($Password) </br>";
    $RememberMe = $_POST["rememberMe"];
    // print "rememberMe = ($RememberMe) </br>";
    header("Location: ../dashboard.php");
    exit();
?>