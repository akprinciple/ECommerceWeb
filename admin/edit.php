<?php  
		include 'inc/config.php';
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
			<h4 class="font-weight-bold border-bottom pl-3 pt-3 mb-5">Edit Product</h4>

			<?php 
				$sql = mysqli_query($connect, "SELECT * FROM products WHERE id = '{$product_id}' AND product = '{$product}'");
				while ($row = mysqli_fetch_array($sql)) {
					
				
			 ?>
			 <div class="col-md-4 m-auto" >
			<img src="../upload/<?php echo $row['image'] ?>" class="w-100">
			<form method="post" enctype="multipart/form-data" >
				<div class="form-group">
					<label class="font-weight-bold">Change Image:</label>
					<input type="file" name="image" class="form-control mb-2">
					<button class="btn btn-danger float-right" type="submit" name="update">Update Image</button>
					<div class="clearfix"></div>
				</div>
			</form>
			</div>

			<form method="post" enctype="multipart/form-data" class="row mx-0">
			<div class="form-group col-md-6">
					<label class="font-weight-bold">Product Name:</label>
					<input type="text" name="product" class="form-control mb-2" value="<?php echo $row['product']; ?>">
			</div>
			<div class="form-group col-md-6">
					<label class="font-weight-bold">Category:</label>
					<select class="form-control mb-2">
						<option value="<?php echo $row['category'] ?>">
							<?php 
								$category = $row['category'];
								$selt = mysqli_query($connect, "SELECT * FROM categories WHERE id = '{$category}'");
							while ($cat = mysqli_fetch_array($selt)) {
								# code...
						 	echo $cat['category']; 
							}
							 ?>
						</option>
						<?php 
					$sel = "SELECT * FROM categories";
					$ins = mysqli_query($connect, $sel);
					while ($rw = mysqli_fetch_array($ins)) {


					?>
			<option value="<?php echo $rw['id']; ?>"><?php echo $rw['category']; ?></option>
			<?php } ?>
					</select>
					
			</div>
			

			<div class="col-md-12 form-group">
			
				<label class="font-weight-bold">Description:</label>
			<textarea class="form-control">
				<?php echo $row['description']; ?>
					
				</textarea>
			</div>
			<div class="col-md-3 mb-3 mx-auto">
			<button class="btn btn-success" type="submit" name="submit">Submit</button>
			<a href="products.php"><button class="btn btn-danger ml-2">Go back</button></a>
			</div>
		</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>