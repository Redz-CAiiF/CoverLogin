<?php
session_start();
if(isset($_SESSION['invalid'])){
	echo("<div id='overlay' onclick='closePopup();'><div id='text'>".$_SESSION['message']."</div></div>");
}
unset($_SESSION['invalid']);
unset($_SESSION['message']);
//session_destroy();
?>