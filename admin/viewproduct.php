<?php  
		include 'inc/session.php';
		if (isset($_GET['product'])&& isset($_GET['product_id'])) {
			$product = $_GET['product'];
			$product_id = $_GET['product_id'];
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Products</title>
	<?php include 'inc/link.php'; ?>
</head>
<body>
	<div class="row mx-0">
		<?php include 'inc/sidebar.php'; ?>
		<div class="col-md-10">
			<h4 class="font-weight-bold border-bottom pl-3 pt-3 mb-5">View Products</h4>

			<?php 
				$sql = mysqli_query($connect, "SELECT * FROM products WHERE id = '{$product_id}' AND product = '{$product}'");
				while ($row = mysqli_fetch_array($sql)) {
					
				
			 ?>
			 <div class="col-md-3 m-auto" >
			<img src="../upload/<?php echo $row['image'] ?>" class="w-100">
			<h4 class="text-center"><?php echo $row['product']; ?></h4>

			<div class="text-center">
				<b>Category:</b> <?php 
				$category = $row['category'];
				$selt = mysqli_query($connect, "SELECT * FROM categories WHERE id = '{$category}'");
							while ($cat = mysqli_fetch_array($selt)) {
								# code...
						 	echo $cat['category']; 
							}


				 ?>
			</div>
			<div class="text-center">
				<b>Actual Price</b>: <?php echo $row['price']; ?>
			</div>
			<div class="text-center text-danger">
				<b>Old Price</b>: <span class=""><?php echo $row['old_price']; ?></span>
			</div>
			</div>
				<h5 class="text-center mt-2">Description:</h5>
			<div class="border p-2 col-md-10 m-auto">
				<?php echo $row['description']; ?>
			</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>