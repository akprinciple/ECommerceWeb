<?php 
	include 'inc/session.php';
	if (isset($_SESSION['id'])) {
		# code...
		$user = $_SESSION['id'];
	}else{
		$user = $_SESSION['identity'];
	}

ob_start();
	if (isset($_GET['product_id'])&& isset($_GET['product'])) {
		$id = (int)$_GET['product_id'];
		$product = $_GET['product'];

		if (isset($_SESSION['id'])) {
					# code...
						
	$select = mysqli_query($connect, "SELECT * FROM cart WHERE user = '{$user}' && status = 1 && product = '$id'");
		$count = mysqli_num_rows($select);

	if (isset($_POST['submit'])) {
		$quantity = mysqli_real_escape_string($connect, $_POST['quantity']);
		$sql = mysqli_query($connect, "SELECT * FROM products WHERE id = '{$id}' && product = '{$product}'");
		while ($row = mysqli_fetch_array($sql)) {
			# code...
		$price = $row['price'];
	}
		$status = 1;
		$id = (int)$_GET['product_id'];

		$date = date("d/M/Y h:m:sa");
		
		if ($count > 0) {
			echo "<script>
					window.alert('Product Already in Cart');
			</script>";
		}else{
	$insert = mysqli_query($connect, "INSERT INTO cart (product, price, quantity, user, status, date) VALUES('$id', '$price', '$quantity', '$user', '$status', '$date')");

		if ($insert) {
			echo "<script>
					window.alert('Product Successfully Added to Cart');
			</script>";
		}else{
			// echo $price.$id.$quantity.$user.$id;
			echo "<script>
					window.alert('Error');
			</script>";
		}}
	}}elseif (!isset($_SESSION['id']) && isset($_SESSION['identity'])) {
		$select = mysqli_query($connect, "SELECT * FROM guestcart WHERE user = '{$user}' && status = 1 && product = '$id'");
		$counts = mysqli_num_rows($select);
		if (isset($_POST['cart'])) {
			# code...
		
		$quantity = mysqli_real_escape_string($connect, $_POST['quantity']);
		$sql = mysqli_query($connect, "SELECT * FROM products WHERE id = '{$id}' && product = '{$product}'");
		while ($row = mysqli_fetch_array($sql)) {
			
		$price = $row['price'];
	}
		$status = 1;
		$id = (int)$_GET['product_id'];

		$date = date("d/M/Y");
		
		if ($counts > 0) {
			echo "<script>
					window.alert('Product Already in Cart');
			</script>";
		}else{
	$insert = mysqli_query($connect, "INSERT INTO guestcart (product, price, quantity, user, status, date) VALUES('$id', '$price', '$quantity', '$user', '$status', '$date')");

		if ($insert) {
			echo "<script>
					window.alert('Product Successfully Added to Cart');
			</script>";
		}else{
			// echo $price.$id.$quantity.$user.$id;
			echo "<script>
					window.alert('Error');
			</script>";
		}}
	}
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Shop | <?php 
        $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 7");
        $links = mysqli_fetch_array($link);
        echo $links['link'];
     ?></title>
	<?php include 'inc/link.php'; ?>
</head>
<body style="background-color: ghostwhite;">

	<?php include 'inc/header.php'; ?>
	
	<div class="col-md-11 mx-auto row mt-4">
		<?php 
			$sql = mysqli_query($connect, "SELECT * FROM products WHERE id = '{$id}' && product = '{$product}'");
		while ($row = mysqli_fetch_array($sql)) {
			# code...
		
		 ?>
		<!-- All Categories -->
		<h2 class=" pt-3 mb-2 col-md-8">
			<?php echo $row['product']; ?>
			<hr>
		</h2>
		<div class="col-md-4">
			<?php 
				if ($row['old_price'] > 0) {
				
			 ?>
			<div class="border  m-3 p-3 text-center">
				<span class="text-muted ">Old price --------------------->$<?php echo $row['old_price']; ?></span><br>
				<span class="mt-2 d-block"><span class="text-light bg-danger p-1" style="border-radius: 3px">Final price</span> --------------------->$<?php echo $row['price']; ?></span>
			
				<div class="bg-dark text-light text-center mt-3"><i class="fas fa-clock"></i> Limited Time Offer</div>
			</div>
		<?php } ?>
		</div>
		<div class="col-md-12">
			
		</div>
		<div class="col-md-5 p-3 ">
				<div class="bg-white">
					<img src="upload/<?php echo $row['image'] ?>" class="card-img">
				</div>
				</div>
				<div class="col-md-7 p-3 bg-white">
					
						
					<b class="mt-2 mb-5 d-block">
							<?php if ($row['status']==1) {
								
							?>
						<span class="fas fa-check bg-danger rounded-circle text-light p-1"></span>
						In Stock!
					<?php }else{ ?>
						<span class="fas fa-times bg-danger rounded-circle text-light p-1"></span>
						Out of Stock!
						<?php } ?>
						</b>
							<span class="d-block">Category: <?php $query = mysqli_query($connect, "SELECT * FROM categories WHERE id = '{$row['category']}'");
				while ($rw = mysqli_fetch_array($query)) {
					
				 ?>
			<a href="shop.php?id=<?php echo $rw['id']; ?>&&category=<?php echo $rw['category']; ?>" class="bg-danger ml-2 text-light p-2 rounded"><?php echo $rw['category']; ?></a>
				 <?php
				}
			 ?></span>
						<script type="text/javascript">
							function showUser(str) {
								// body...
						if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
						} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
						document.getElementById("txtHint").innerHTML = this.responseText;
						}
						};
						xmlhttp.open("GET","multiply.php?id=<?php echo $row['id']; ?>&price=<?php echo $row['price']; ?>&q="+str,true);
						xmlhttp.send();
							}

						</script>
						<form method="post" action="" enctype="multipart/form-data">
							<p class="mb-5">Price : <span id="txtHint"><?php echo number_format($row['price'],2); ?></span></p>
							<label>Quantity:</label>
							<input type="number" onchange="showUser(this.value)" name="quantity" min="1" size="10" value="<?php if(!isset($_POST['quantity'])){echo 1;}else{echo $_POST['quantity'];} ?>" class="form-control w-50">
						<div class="float-right mt-3">
							<?php 
								
							 ?>
							
							 <?php 
							 // Buttons for Guest Users
							 	if (!isset($_SESSION['id']) && isset($_SESSION['identity'])) {
							 	
							  ?>
							 <!-- Add to cart Button for Guest Users -->
							  	<button class="btn btn-danger mb-2 <?php if($counts > 0 || isset($insert)){echo "d-none";} ?>" type="submit" name="cart">Add to cart</button>

							<?php }elseif($count < 1 && !isset($insert) && isset($_SESSION['id'])){ 
								
							?>
							<!-- Buttons for Registered Users -->
							<button class="btn btn-danger mb-2 <?php if(!isset($_SESSION['id'])){echo "d-none"; } ?>" type="submit" name="<?php if(isset($_SESSION['id'])){echo "submit"; } ?>" onclick="loadDoc()">Add to cart <span class="fas fa-plus"></span></button>
							<?php } ?>
							
							
							<!-- Proceed to cart button -->
							<a href="cart.php"><button class="btn btn-success mb-2" type="button" >Proceed to Cart</button></a>  
								<!-- Continue Shopping Button -->
							<a href="shop.php"><button class="btn btn-primary mb-2" type="button" >Continue Shopping</button></a>
						</div>
						<div class="clearfix"></div>
						</form>
						<div >
							
						</div>
				</div>
				<div class="col-md-2"></div>

				<div class="col-md-12">
					<h2 class="text-center border-bottom p-2"> Product Description</h2>
					<p class="p-3">
						<i class="mt-2 d-block text-justify"><?php echo $row['description']; ?></i>
						
					</p>
				</div>

				<div class="col-md-12">
					<h3 class="text-center mb-5 border-bottom pb-1"><span class="border-bottom border-danger">Related Products</span></h3>
					<div class="row mx-0">
					<?php 
						$sel = mysqli_query($connect, "SELECT * FROM products WHERE category = '{$row['category']}' && id != '{$id}' ORDER BY RAND()");
						while($sl = mysqli_fetch_array($sel)){

					 ?>
					 	<div class=" mx-0 col-md-3 mb-3 shadow p-2 bg-white">
				<div class=" border-bottom p-3">
					<img src="upload/<?php echo $sl['image'] ?>" class="card-img" style="height: 200px;">
				</div>
				<div class=" pl-3">
					<a href="collections.php?product_id=<?php echo $sl['id']; ?>&&product=<?php echo $sl['product']; ?>" class="nav-link">
						<h5 class=" pt-3 mb-2">
							<?php echo $sl['product']; ?>
						</h5>
						
					</a>
					<b class="mt-2 d-block">
							<?php if ($sl['status']==1) {
								
							?>
						<span class="fas fa-check bg-danger rounded-circle text-light p-1"></span>
						In Stock!
					<?php }else{ ?>
						<span class="fas fa-times bg-danger rounded-circle text-light p-1"></span>
						Out of Stock!
						<?php } ?>
						</b>

						
						<!-- <i class=" d-block"><?php echo substr($row['description'], 0, 50); ?>...</i> -->
						<a href="collections.php?product_id=<?php echo $sl['id']; ?>&product=<?php echo $sl['product']; ?>" class="text-uppercase">+ See full details here</a>
						<br>
						<div class="float-left mt-3">
						
						<h5 class="d-inline-block text-danger" style="line-height: 25px;">$<?php echo $sl['price']; ?></h5>
						</div>
						<div class="float-right mt-3">
							<a href="collections.php?product_id=<?php echo $sl['id'] ?>&product=<?php echo $sl['product'] ?>"><button class="btn btn-danger">View Product</button></a>
						</div>
						<div class="clearfix"></div>
						<div >
							
						</div>
				</div>
			</div>
					 <?php } ?>
			<?php } ?>
			</div>
				</div>

		</div>

	

	<?php include 'inc/footer.php'; ?>

			