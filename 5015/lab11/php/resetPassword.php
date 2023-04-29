<?php
	session_start();
    require_once("config.php");
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

	require '../../PHPMailer-master/src/Exception.php';
	require '../../PHPMailer-master/src/PHPMailer.php';
	require '../../PHPMailer-master/src/SMTP.php';
	
    $Email=$_GET["Email"];
	print "Reset password Email=$Email <br>";
	$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
	if (!$con) {
		$_SESSION["Message"]="Database Connection Failure: ".mysqli_error($con);
		$_SESSION["RegState"] = -1;
		header("location:../index.php");
		exit();
	}
	print "Connection successful <br>";
	$Acode = rand();
	$Rdatetime = date("Y-m-d h:i:s");
	$query = "SELECT * FROM Users WHERE Email='$Email';";
	$result = mysqli_query($con, $query);
	if (!$result) {
		$_SESSION["Message"] = "Email checking query failed: ".mysqli_error($con);
		$_SESSION["RegState"] = -9;
		header("location:../index.php");
		exit();
	}
	if (mysqli_num_rows($result) != 1) {
		$_SESSION["Message"] = "Email does not match. Please try again";
		$_SESSION["RegState"] = 6;
		header("location:../index.php");
		exit();
	}
	$data = mysqli_fetch_assoc($result);
	$FirstName = $data["FirstName"];
	$LastName = $data["LastName"];
	$query = "UPDATE Users SET Acode='$Acode', Rdatetime='$Rdatetime' WHERE Email='$Email';";
	$result = mysqli_query($con, $query);
	print "Finished query ($FirstName,$LastName) <br>";

	if ($result) {
		// Build authentication email
		$mail= new PHPMailer(true);
		try { 
			$mail->SMTPDebug = 2;
			$mail->IsSMTP();
			$mail->Host="smtp.xxxxx.com";
			$mail->SMTPAuth=true;
			$mail->Username="xxxxx@xxxxx.com"; // Do NOT change
			$mail->Password = 'xxxxx'; // Do NOT change
			$mail->SMTPSecure = "ssl";
			$mail->Port=465;
			$mail->SMTPKeepAlive = true;
			$mail->Mailer = "smtp";
			$mail->setFrom("tua90776@temple.edu", "CIS5015 Dev"); // Change to your email and name
			$mail->addReplyTo("tua90776@temple.edu","A Kamal"); // Change to your email and name
			print "After setting up mail from and reply <br>"; 	
			$msg = "Please click link to reset password: https://cis-linux2.temple.edu/~tua90776/5015/lab11/php/authenticate.php?Email=$Email&Acode=$Acode";
			$mail->addAddress($Email,"$FirstName $LastName");
			$mail->Subject = "Reset Password";
			$mail->Body = $msg;
			print "Email body:($msg) <br>"; 
			$mail->send();
		} catch (phpmailerException $e) {
			$_SESSION["Message"] = "Reset Password Mailer error: ".$e->errorMessage();
			$_SESSION["RegState"] = -4;
			print "Reset password email send failed: ".$e->errorMessage;
			header("location:../index.php");
			exit();
		}
	
		$_SESSION["RegState"] = 2;
		$_SESSION["Message"] = "Email found. Check your inbox.";
		header("Location:../index.php");
		exit();
	} 
	$_SESSION["RegState"] = 0; // Force to landing view
	$_SESSION["Message"] = "Reset password query failure: ".mysqli_error($con);
	header("Location:../index.php");
	exit();
?>