<?php 

		include 'inc/config.php';
		if (isset($_GET['approve'])) {
			$id = (int)$_GET['approve'];

			$sql = "SELECT * FROM products WHERE id = '{$id}'";
			$query = mysqli_query($connect, $sql);
			while ($row = mysqli_fetch_array($query)) {
				$status = $row['status'];
				if ($status == 0) {
		$sel = "UPDATE products SET status = 1 WHERE id = '{$id}'";
		$res = mysqli_query($connect, $sel);
							
				}
				else{
					$sel = "UPDATE products SET status = 0 WHERE id = '{$id}'";
		$res = mysqli_query($connect, $sel);
				}		
			}
			header('location:products.php');
		}

		

?>