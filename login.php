<?php
$configPath = "./config.ini";
$errorPath = "index.html";
$successPath = "success.html";

if(isset($_POST['submit'])){ //se non è null, quindi ha premuto submit dalla pagina precedente
	session_start();
	require_once 'DAOuser.php';

	$user_email =  $_POST['user-email'];
	$user_password =  hash('sha256',$_POST['user-password']);

	if(count(getUserByEmailPassword($user_email, $user_password, $configPath)) == 1){//ho un riscontro

		$_SESSION['email'] = $user_email;
		$_SESSION['password'] = $user_password;
		
		var_dump($_REQUEST);
		
		header("Location: ".$successPath); die();

		//echo hash('sha256', $_POST['password']);
	} else {
		//echo("Invalid username and password");
		
		$_SESSION['invalid'] = 'true';
		$_SESSION['message'] = 'Invalid email and password';
		
		header("Location: ".$errorPath); die();
		//header("Location: ..");
		//include("../index.php");
		//echo("<div id='overlay' onclick='closePopup();'><div id='text'>Invalid username and password/div></div>");
	}
}
?>
