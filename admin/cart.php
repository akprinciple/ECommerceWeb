	<?php 
	include 'inc/session.php'; 
	$msg = "";
	
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart Items | <?php 
        $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 7");
        $links = mysqli_fetch_array($link);
        echo $links['link'];
     ?></title>
     <style type="text/css">
     	/*.active{
     		background-color: green;
     	}*/
     </style>
	<?php include 'inc/link.php'; ?>
</head>
<body>
	<div class="row mx-0">
		<?php include 'inc/sidebar.php'; ?>
		<div class="col-md-10">
			<h4 class="border-bottom p-2 font-weight-bold text-dark">View Items in Shopping Cart</h4>
<div class="p-3">
	

	
<div class="mt-4 p-3">
	<?php echo $msg; ?>

			
		
<ul class="nav nav-pills mt-4">
  <li class="nav-item w-50">
    <a class="nav-link active " data-toggle="pill" href="#home"><div class="p-1 text-center">Cart Items of Registered Users</div></a>
  </li>
  <li class="nav-item w-50">
    <a class="nav-link " data-toggle="pill" href="#menu1"><div class="p-1 text-center">Cart Items Of Guest Users</div></a>
  </li>
 
</ul>


<div class="tab-content">
  <div id="home" class="tab-pane fadein active">
    	<h5 class="text-center mt-3">Cart Items By Registered Users</h5>

   <table class="col-md-12 table-striped table table-bordered text-center">
		<thead>
			<tr>
			<th>S/N</th>
			<th>Product Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Customer</th>
			<th>Date</th>
			<!-- <th>Actions</th> -->
			</tr>
	</thead>
	<tbody>
	<?php 
		$number = 1;
		$sql = "SELECT * FROM cart ORDER BY id DESC LIMIT 50";
		$query = mysqli_query($connect, $sql);
		while ($row = mysqli_fetch_array($query)) {
		$product = $row['product'];
		$quantity = $row['quantity'];
		$date = $row['date'];
		$price = $row['price'];
		$user = $row['user'];
		?>
		<tr>
			<td><?php echo $number++; ?></td>
			<td><?php 

						$que = mysqli_query($connect, "SELECT product FROM products WHERE id = '{$row['product']}'");
						while ($rw = mysqli_fetch_array($que)) {
						echo $rw['product'];	
						}
						
			 ?></td>
			<td><?php echo $quantity; ?></td>
			<td>
				<?php echo $price; ?>
			</td>
			<td><?php 
				$select = mysqli_query($connect, "SELECT * FROM users WHERE id = '{$user}'");
				while($r = mysqli_fetch_array($select)){
				echo $r['firstname']. " ". $r['lastname'];
			}
			 ?></td>
			<td><?php echo $date; ?></td>
			
		</tr>
		<?php } ?>
	</tbody>
</table>
  </div>
  <div id="menu1" class="tab-pane fade">
    <!-- Table of Items in cart -->
     
    	<h5 class="text-center mt-3">Cart Items By Guest Users</h5>
		<table class="col-md-12 table-striped table table-bordered text-center">
		<thead>
			<tr>
			<th>S/N</th>
			<th>Product Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Customer</th>
			<th>Date</th>
			<!-- <th>Actions</th> -->
			</tr>
	</thead>
	<tbody>
	<?php 
		$number = 1;
		$sql = "SELECT * FROM guestcart ORDER BY id DESC LIMIT 50";
		$query = mysqli_query($connect, $sql);
		while ($row = mysqli_fetch_array($query)) {
		$product = $row['product'];
		$quantity = $row['quantity'];
		$date = $row['date'];
		$price = $row['price'];
		$user = $row['user'];
		?>
		<tr>
			<td><?php echo $number++; ?></td>
			<td><?php 

						$que = mysqli_query($connect, "SELECT product FROM products WHERE id = '{$row['product']}'");
						while ($rw = mysqli_fetch_array($que)) {
						echo $rw['product'];	
						}
						
			 ?></td>
			<td><?php echo $quantity; ?></td>
			<td>
				<?php echo $price; ?>
			</td>
			<td>Guest-<?php 
				echo substr($user, 2);
			 ?></td>
			<td><?php echo $date; ?></td>
			
		</tr>
		<?php } ?>
	</tbody>
</table>
  </div>
  
</div>
		
	</div>
</div>
</div>


</body>
</html>