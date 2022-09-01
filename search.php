<?php 
	include 'inc/config.php';
	
	if (isset($_GET['see']) && !empty($_GET['see'])) {
		$p = $_GET['see'];

			$select = mysqli_query($connect, "SELECT * FROM products WHERE product LIKE '%".$p."%' ORDER BY id DESC");
			$count = mysqli_num_rows($select);


	?>
	<!-- <div class="bg-white p-3 row mx-0  w-100 text-dark border" style="top: 0; display: flex;"> -->
		<div class="col-md-12 text-center bg-white mt-3">
			<img src="images/loader.gif">
			<p><?php echo $count; ?> Result(s) Found!</p>
			<?php 
				if ($count < 1) {
			echo "<h3 class='text-center'><center>Nothing is Found!</center></h3>";
		}
			 ?>
		</div>

		<?php 
		

			while ($search = mysqli_fetch_array($select)) {
			
			

		 ?>
		<div class="col-md-3 text-center p-2">
			<a href="collections.php?product_id=<?php echo $search['id']; ?>&product=<?php echo $search['product']; ?>" class="text-dark text-decoration-none">
			<div class="border">
				<div class="text-center" style="height: 200px; overflow: hidden;">
				<img src="cat_img/<?php echo $search['image']; ?>" style="width: 200px">
			</div>
				<?php echo $search['product']; ?><br>
				$<?php echo number_format($search['price'],2); ?>
				
			</div>
		</a>
		</div>
	

	<?php
	}
	}


 ?>
