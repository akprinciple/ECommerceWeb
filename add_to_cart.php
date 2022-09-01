<?php  
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];


	$insert = mysqli_query($connect, "INSERT INTO cart (price, quantity) VALUES('$price', '$quantity')");
	if ($insert) {
		echo 1;
	}

?>