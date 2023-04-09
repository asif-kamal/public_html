<?php
  session_start();
  require_once("config.php");
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;

  require '../../PHPMailer-master/src/Exception.php';
  require '../../PHPMailer-master/src/PHPMailer.php';
  require '../../PHPMailer-master/src/SMTP.php';

  //get web data
  $FirstName = $_GET["inputFirstName"];
  $LastName = $_GET["inputLastName"];
  $Email = $_GET["inputEmail"];
  print "Web data ($Email) ($FirstName) ($LastName) <br/>";
  $con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
  if (!$con) {
    $_SESSION["RegState"] = -1;
    $_SESSION["Message"] = "Database Connection Failed: ".mysqli_error($con);
    header("location:../index.php");
    exit();
  }
  print "Database Connected <br />";
  //Build insert query
  $Acode = rand();
  $Rdatetime = date("Y-m-d h:i:s");
  $query = "Insert into Users (FirstName, LastName, Email, Acode, Rdatetime) values 
  ('$FirstName','$LastName','$Email','$Acode','$Rdatetime');";
  $result = mysqli_query($con, $query);
  if (!$result) {
    $_SESSION["RegState"] = -2;
    $_SESSION["Message"] = "Registration Insert Failed: ".mysqli_error($con);
    header("location:../index.php");
    exit();
  }
  $_SESSION["RegState"] = 1;
  print "Registration Successful. Ready to send email.";
  
  //Build the PHPMailer object:  
  $mail= new PHPMailer(true);  
  try {    
      $mail->SMTPDebug = 2; // Wants to see all errors   
      $mail->IsSMTP();   
      $mail->Host="smtp.gmail.com";   
      $mail->SMTPAuth=true;   
      $mail->Username="XXXXXXX@gmail.com";   
      $mail->Password = "YYYYYYYY"; // gmail AppPassword   
      $mail->SMTPSecure = "ssl";   
      $mail->Port=465;   
      $mail->SMTPKeepAlive = true;   
      $mail->Mailer = "smtp";   
      $mail->setFrom("tua90776@temple.edu", "CIS5015 Dev");   
      $mail->addReplyTo("tua90776@temple.edu","CIS5015 Dev");   
      $msg = "Please click link to authenticate: 
      http://cis-linux2.temple.edu/~yourID/5015/lab10/php/authenticate.php?Email=$toEmail&Acode=$Acode";   
      $mail->addAddress($Email,"$FirstName $LastName"); //Modified $ToEmailAddress to $Email  
      $mail->Subject = "Welcome";   
      $mail->Body = $msg;   
      $mail->send();   
      print "Email sent to ($Email)... <br>";   
      $_SESSION["RegState"] = 2;   
      $_SESSION["Message"] = "Email sent.";   
    } catch (phpmailerException $e) {   
      $_SESSION["Message"] = "Mailer error: ".$e->errorMessage();   
      $_SESSION["RegState"] = 1;   
      print "Mail send failed: ".$e->errorMessage;    
    }  
    // header("location:../index.php");  
    exit(); 
?>