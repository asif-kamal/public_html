<?php
    session_start();
    $_SESSION["RegState"] = 6;
    header("Location:../index.php");
    exit;
?>