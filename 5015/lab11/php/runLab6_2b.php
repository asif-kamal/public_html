<?php
	header('Access-Control-Allow-Origin: *');
	session_start();
	require_once("config.php");
	$Size = $_GET["Size"];
    $Repetitions = $_GET["Repetitions"];
	print "Size($Size) Repetitions($Repetitions) <br>";
	$command= escapeshellcmd("python/bestOrder.py ".$Size." ".$Repetitions." ".SERVER." "
		.USER." ".PASSWORD." ".DATABASE." 2>&1"); 
	$output = shell_exec($command);
	echo $output;
?>