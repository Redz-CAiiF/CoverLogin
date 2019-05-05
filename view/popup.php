<?php
if(isset($_SESSION['invalid'])){
	?>
	<div id='overlay' onclick='closePopup();'>
		<div id='text'>
			<?php echo $_SESSION['message']?>
		</div>
	</div>
	<?php
}
?>