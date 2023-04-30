<?php
    session_start();
    //Email is saved in $_SESSION["Email"]
    require_once("config.php");
    //Fetch web data: password
    $Password = md5($_POST["inputPassword"]);
    print "Fetched password($Password) email = (".$_SESSION["Email"].")<br/>";
    $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
    if (!$con) {
        $_SESSION["RegState"] = -1;
        $_SESSION["Message"] = "Connection Failed ".mysqli_error($con);
        header("location:../index.php");
        exit();
    }
    print "DB connected. <br/>";
    //Create update query
    $query = "UPDATE Users SET Password='$Password' WHERE Email='".$_SESSION["Email"]."';";
    $result = mysqli_query($con, $query);
    if ($result) print "Query worked. <br/>";
    else print "Query failed. <br>";
    if (!$result) {
        $_SESSION["RegState"] = -2;
        $_SESSION["Message"] = "Passwrod update failure: ".mysqli_error($con);
        header("location:../index.php");
        exit();
    }
    $_SESSION["RegState"] = 0;
    $_SESSION["Message"] = "Password set. You can now login";
    header("location:../index.php");
    exit();
?>