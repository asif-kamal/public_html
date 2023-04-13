<?php
    session_start();
    require_once("config.php");
    //Get Web Data: Email + Acode
    $Email = $_GET["Email"];
    $Acode = $_GET["Acode"];
    print "Webdata ($Email) ($Acode) <br />";
    //Connect to DB
    $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
    if (!$con) {
        $_SESSION["RegState"] = -1;
        $_SESSION["Message"] = "Database connection failed: ".mysqli_error($con);
        header("location:../index.php");
        exit();
    }
    print "Database connected <br />";
    //Check if Email and Acode in DB
    $query = "SELECT * FROM Users WHERE Email='$Email' AND Acode='$Acode';";
    $result = mysqli_query($con, $query);
     
    //If not report error
    if (!$result) {
        $_SESSION["RegState"] = -2;
        $_SESSION["Message"] = "Database query failed: ".mysqli_error($con);
        header("location:../index.php");l.
        exit();
    }
	print "Query executed ??? <br>";

    if (mysqli_num_rows($result) != 1) {
        $_SESSION["RegState"] = -3;
        $_SESSION["Message"] = "Authentication failure. Email or Acode don't match. ";
		print "Query failed num_rows=[".mysqli_num_rows($result)."]???<br>";
        header("location:../index.php");
        exit();
    }
    print "Authentication success! <br>";
    //Authentication success. Reset Acode
    $Acode = rand(); 
    $query = "UPDATE Users SET Acode='$Acode' WHERE Email='$Email';";
    $result = mysqli_query($con, $query);
    //If not report error
    if (!$result) {
        $_SESSION["RegState"] = -3;
        $_SESSION["Message"] = "Database update failed: ".mysqli_error($con);
        header("location:../index.php");
        exit();
    }
    if (mysqli_affected_rows($con) != 1) {
        $_SESSION["RegState"] = -4;
        $_SESSION["Message"] = "Acode update failed: ".mysqli_error($con);
        header("location:../index.php");
        exit();
    }
    print "Reset Acode successful. <br>";
    //Reset successful and then set password
    $_SESSION["RegState"] = 3;
    $_SESSION["Message"] = "Authentication Successful. Please set password.";
    $_SESSION["Email"] = $Email; //Save email to set password correctly
    header("location:../index.php");
    exit();
?>