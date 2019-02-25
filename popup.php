<?php
session_start();
if(isset($_SESSION['invalid'])){
	echo("<div id='overlay' onclick='closePopup();'><div id='text'>".$_SESSION['message']."</div></div>");
}
session_destroy();
?>