<?php 
	include 'inc/session.php';
	// $up = mysqli_query($connect, "SELECT SUM(quantity) AS quantity FROM cart WHERE level = 1");
	// while ($row = mysqli_fetch_array($up)) {
	// 	echo $row['quantity'];
	// }
 ?>

  <?php 
				if (isset($_SESSION['id'])) {
					
				
					$cart = mysqli_query($connect, "SELECT SUM(quantity) AS quantity FROM cart WHERE user = '{$_SESSION['id']}' && status = 1");
					
					while ($rows = mysqli_fetch_array($cart)) {
						if ($rows['quantity'] != "") {
							# code...
						echo "(".$rows['quantity']. " items)";
						}
						else{
							echo "(0 item)";
						}
					}
				}elseif (isset($_SESSION['identity']) && !isset($_SESSION['id'])) {
					
					$date = date('d/M/Y');
					$cart = mysqli_query($connect, "SELECT SUM(quantity) AS quantity FROM guestcart WHERE user = '{$_SESSION['identity']}' && status = 1 && date = '{$date}'");
					
					while ($rows = mysqli_fetch_array($cart)) {
						if ($rows['quantity'] != "") {
							# code...
						echo "(".$rows['quantity']. " items)";
						}
						else{
							echo "(0 item)";
						}
					}
				}
				else{
					echo 0;	
				}
				 ?>
				