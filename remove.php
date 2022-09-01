<?php 
include 'inc/config.php';
	$id = $_GET['del'];
	$update = mysqli_query($connect, "UPDATE cart SET status = 0 WHERE id = '{$id}'");
	$updater = mysqli_query($connect, "UPDATE guestcart SET status = 0 WHERE id = '{$id}'");
	

 ?>