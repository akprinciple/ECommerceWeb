<?php  
	include 'inc/session.php';
	if (isset($_GET['q']) && isset($_GET['price']) && isset($_GET['id'])) {
		$q = intval($_GET['q']);
		$price = $_GET['price'];
		$id = $_GET['id'];

		echo $q * $price;
		if (isset($_SESSION['id'])) {
			# code...
		$update = mysqli_query($connect, "UPDATE cart SET quantity = '{$q}' WHERE id = '{$id}'");
		}
		if (isset($_SESSION['identity'])) {
			# code...
		$update = mysqli_query($connect, "UPDATE guestcart SET quantity = '{$q}' WHERE id = '{$id}'");
		}
	}

?>