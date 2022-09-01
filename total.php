<?php 
	include 'inc/session.php';
	if (isset($_SESSION['id'])) {
		# code...
	
		$total = mysqli_query($connect, "SELECT SUM(quantity*price) AS total FROM cart WHERE user = '{$_SESSION['id']}' && status = 1");
		while ($rows = mysqli_fetch_array($total)) {
						echo $rows['total'];
					}
				}
				if (isset($_SESSION['identity']) && !isset($_SESSION['id'])) {
		$date = date('d/M/Y');
	
		$total = mysqli_query($connect, "SELECT SUM(quantity*price) AS total FROM guestcart WHERE user = '{$_SESSION['identity']}' && status = 1 AND date = '{$date}'");
		while ($rows = mysqli_fetch_array($total)) {
						echo $rows['total'];
					}
				}
 ?>