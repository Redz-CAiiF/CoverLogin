<?php
$configPath = "./config.ini";
$errorPath = "index.html";
$successPath = "success.html";

if(isset($_POST['submit'])){ //se non è null, quindi ha premuto submit dalla pagina precedente
	session_start();
	require_once 'DAOuser.php';

	$user_email =  $_POST['user-email'];
	$user_password =  hash('sha256',$_POST['user-password']);
	
	if(count(getUserByEmail($user_email, $configPath)) >= 1){//ho un riscontro qundi esiste gia un utente con quella mail
		$_SESSION['invalid'] = 'true';
		$_SESSION['message'] = 'Mail already used';
		
		header("Location: ".$errorPath); die();
	} else {
		//procedo ad inserire l'utente nel database
		//insertUser(new UserCredential($user_email,$user_password), $configPath);
		insertUser(new User(NULL,$_POST['user-DocumentoIdentita'],$_POST['user-Username'],$user_password,$_POST['user-Telefono'],$_POST['user-Nome'],$_POST['user-Cognome'],$user_email,$_POST['user-Fotografia']), $configPath);
		
		$_SESSION['email'] = $user_email;
		$_SESSION['password'] = $user_password;
		
		//echo("utente inserito");
		header("Location: ".$successPath); die();//apre la nuova pagina
	}
}
?>