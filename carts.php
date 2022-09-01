<?php 
	include 'inc/session.php';
	// echo $_SESSION['identity'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart | <?php 
        $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 7");
        $links = mysqli_fetch_array($link);
        echo $links['link'];
     ?></title>
	<?php include 'inc/link.php'; ?>
</head>
<body style="background-color: ghostwhite; font-family:  Open Sans,sans-serif">

	<?php include 'inc/header.php'; ?>
	
	<div class="px-5 bg-white">
		<h3 class="text-center pt-2 pb-4 ">
			<span class="border-bottom border-danger mt-2">YOUR CART</span>
		</h3>

<h4 class="text-center"> 
	<?php 
	if (isset($_SESSION['id']) && !isset($_SESSION['cart'])) {
		# code...
	
			$cart = mysqli_query($connect, "SELECT SUM(quantity) AS quantity FROM cart WHERE user = '{$_SESSION['id']}' && status = 1");
					
					while ($rows = mysqli_fetch_array($cart)) {
						if ($rows['quantity'] == "" || $rows['quantity'] < 1) {
							# code...
						echo "Your Cart is Empty <span class='fas fa-battery-empty'></span>";
						}
					}}
	 ?>
</h4>
		<table class="table col-md-12 table-responsive-xl text-center" style="font-family:  Open Sans,sans-serif">
			
				<tr>
					<td>IMAGE</td>
					<td>PRODUCT NAME</td>
					<td>QUANTITY</td>
					<td>UNIT PRICE</td>
					<td>SUB TOTAL</td>
					<td>ACTION</td>
				</tr>
				<tbody class="tbody">
					<!-- This is When the user log in. There is no Problem with this Place -->
				<?php
				if (isset($_SESSION['id'])) { 
					$sql = mysqli_query($connect, "SELECT * FROM cart WHERE user = '{$_SESSION['id']}' AND status = 1");
					while ($row = mysqli_fetch_array($sql)) {
						# code...
					
				 ?>
				 <tr id="remove<?php echo $row['id']; ?>">
					<td>
						<?php 
						$query = mysqli_query($connect, "SELECT image FROM products WHERE id = '{$row['product']}'");
						while ($rw = mysqli_fetch_array($query)) {
							
						
						?> 
						<img src="upload/<?php echo $rw['image']; ?>" width="60px">
						<?php } ?>
					</td>
					<td><?php 
						$query = mysqli_query($connect, "SELECT product FROM products WHERE id = '{$row['product']}'");
						while ($rw = mysqli_fetch_array($query)) {
						echo $rw['product'];	
						}
						?> </td>
					<td><input type="number" name="q" onkeypress="showUser<?php echo $row['id']; ?>(this.value),update(this.value),total(this.value)" onchange="showUser<?php echo $row['id']; ?>(this.value),update(this.value),total(this.value)" min="1" value="<?php echo $row['quantity']; ?>" class="form-control" style="width: 70px"></td>
					<td><?php echo  $row['price']; ?></td>
					<td><span id="txtHint<?php echo $row['id']; ?>"><?php echo $row['price']*$row['quantity']; ?></span></td>
					<!-- Delete Button -->
					<td><span class="text-danger fas fa-times" onclick="remove<?php echo $row['id']; ?>(this.value),update(),total()" title="Remove from Cart"></span></td>
				 	
				 </tr>
				 <script type="text/javascript">
				 	// SCrpt for multiplying price and Quantity
							function showUser<?php echo $row['id']; ?>(str) {
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
						document.getElementById("txtHint<?php echo $row['id']; ?>").innerHTML = this.responseText;
						}
						};
						xmlhttp.open("GET","multiply.php?id=<?php echo $row['id']; ?>&price=<?php echo $row['price']; ?>&q="+str,true);
						xmlhttp.send();
							}
							// Script for Updating Cart

							function update() {
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
						document.getElementById("cart").innerHTML = this.responseText;
						document.getElementById("cart1").innerHTML = this.responseText;
						}
						};
						xmlhttp.open("GET","upcart.php",true);
						xmlhttp.send();
							}
							// Script For Over All Total
							function total() {
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
						document.getElementById("total").innerHTML = this.responseText;
						}
						};
						xmlhttp.open("GET","total.php",true);
						xmlhttp.send();
							}
							// Script for removing product from cart
							function remove<?php echo $row['id']; ?>() {
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
						document.getElementById("remove<?php echo $row['id']; ?>").innerHTML = this.responseText;
						}
						};
						xmlhttp.open("GET","remove.php?del=<?php echo $row['id']; ?>",true);
						xmlhttp.send();
							}
						</script>
				 <?php } ?>
				 <tr>
				 	<td colspan="2"><a href="shop.php" class="btn btn-primary ">Continue Shopping</a></td>
				 	<td colspan="2">Grand Total:</td>
				 	<td><span class="" id="total"><?php 
				 		$total = mysqli_query($connect, "SELECT SUM(quantity*price) AS total FROM cart WHERE user = '{$_SESSION['id']}' && status = 1");
		while ($rows = mysqli_fetch_array($total)) {
						echo $rows['total'];
					}
				 	 ?></span></td>
				 	<td><span id="<?php 
				 		$total = mysqli_query($connect, "SELECT SUM(quantity*price) AS total FROM cart WHERE user = '{$_SESSION['id']}' && status = 1");
		while ($rows = mysqli_fetch_array($total)) {
						if ($rows['total'] > 0) {
						 

						 	echo "checkout";
						 }
						 
					}
				 	 ?>" class="btn btn-danger">Checkout</span></td>
				 	
				 </tr>
				<?php } ?>


<!-- ------------------------------------------------------------------------------------------------------- -->







					<!-- For this area, the product Id was generated from session throug php
						what i want now is for the grand total to be calculated onchange of 
						quantity.
					 -->





				<!-- Section for Guest Users -->
				<?php if (isset($_SESSION['cart'])) {
					$sql = mysqli_query($connect, "SELECT * FROM products WHERE id IN (".implode(',',$_SESSION['cart']).")");
					while ($ro = mysqli_fetch_array($sql)) {
						# code...


						?>
							<tr class="span">
								<td>
						 
						
						<img src="upload/<?php echo $ro['image']; ?>" width="60px">
						
					</td>
					<td><?php 
						
						echo $ro['product'];
						 // echo count($_SESSION['cart']);	
						
						?> </td>
						<!-- product Quantity -->
					<td><input type="number" name="q" onkeypress="showUser<?php echo $ro['id']; ?>(this.value),update(this.value),total(this.value)" onchange="showUser<?php echo $ro['id']; ?>(this.value)" min="1" value="<?php echo array_count_values($_SESSION['cart'])[$ro['id']]; ?>" class="form-control" style="width: 70px"></td>
					<!-- price -->
					<td><?php echo  $ro['price']; ?></td>
					<!-- Subtotal -->
					<td class="price"><span class="" onchange="cartTotal()" id="txtHint<?php echo $ro['id']; ?>"><?php echo $ro['price']* array_count_values($_SESSION['cart'])[$ro['id']]; ?></span></td>
					<!-- Delete Button -->
					<td>

						<span class="text-danger fas fa-times" onclick="remove<?php echo $ro['id']; ?>(this.value),update(),total()" title="Remove from Cart"></span></td> 
				 	
				 </tr>
					</tbody>

							<script type="text/javascript">
				 	// SCrpt for multiplying price and Quantity
							function showUser<?php echo $ro['id']; ?>(str) {
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
						document.getElementById("txtHint<?php echo $ro['id']; ?>").innerHTML = this.responseText;
						}
						};
						xmlhttp.open("GET","multiply.php?id=<?php echo $ro['id']; ?>&price=<?php echo $ro['price']; ?>&q="+str,true);
						xmlhttp.send();
							}


							// Script for Updating cart Grand Total
							
						</script>
						<script type="text/javascript">
			// function cartTotal(){
					var container = document.getElementsByClassName('tbody')[0];
					var cartrows = container.getElementsByClassName('span')
					var total = 0
					for (var i = 0; i <cartrows.length; i++) {
						var cartrow = cartrows[i]
						var priceElement = cartrow.getElementsByClassName('price')[0]
						var price = priceElement.innerText

						total = total + price
						console.log(price)
					console.log(total)
					}
					document.getElementsByClassName(total).innerText = '$'. total
								// var total =
							// }
		</script>
						<?php

					} ?>
					 <tr>
				 	<td colspan="2"><a href="shop.php" class="btn btn-primary ">Continue Shopping</a></td>
				 	<!-- Grand Total -->
				 	<td colspan="2">Grand Total:</td>
				 	<td><span class="" id="total"></span></td>
				 	<td>
						<div id="checkout" class="btn btn-danger float-right">Checkout as Guest</div>
				 	</td>
				 </tr>
					
					<?php
				} ?>
			
		</table>
						<!-- <span class="total btn-danger text-light p-4"></span> -->

						<!-- <div class="clearfix"></div> -->

	</div>
	

	<?php include 'inc/footer.php'; ?>

<div id="fetch" class="w-100 position-absolute position-fixed" style="background-color: rgba(0,0,0,0.5); min-height: 100%; top: 0; z-index: 5; display: none;">

	<div class="col-md-5 mx-auto text-cente
</script>r ">
		<div class="bg-white p-3">
			<i><h3 class="mt-5 px-5">We can't accept online orders right now</h3></i>

		<i class="mt-4 d-block">
		Please contact us in one of the channels below to complete your purchase.
	</i>

	<div class="row mx-0 p-2">
          <div class="col-md-6">
          <a href="contact.php" class="fas fa-map mb-2 text-dark w-100 text-decoration-none">&nbsp; Contact Page</a>
          <a href="tel:<?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 1");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?>" class="fas fa-phone mb-2 text-dark w-100 text-decoration-none">&nbsp; <?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 1");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?></a>
          <a href="mailto:<?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 4");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?>" class="fas fa-envelope text-dark mb-2 w-100 text-decoration-none">&nbsp; <?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 4");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?></a>
            
          </div>
          <div class="col-md-6">
          <a href="<?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 3");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?>" class="fab fa-twitter mb-2 text-dark w-100 text-decoration-none">&nbsp; Twitter</a>
          <a href="<?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 2");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?>" class="fab fa-facebook mb-2 text-dark w-100 text-decoration-none">&nbsp; facebook</a>
          <a href="<?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 5");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?>" class="fab fa-instagram mb-2 text-dark w-100 text-decoration-none">&nbsp; Instagram</a>

 
          </div>
        </div>
        <center>
<span id="clear"><button class="btn-dark btn">Got it</button></span>
</center>

        </div>
		</div>
	</div>


</div>
<script type="text/javascript">
$(document).ready(function() {
  $("#checkout").click(function(){
  $("#fetch").fadeIn("slow");
  })
  $("#clear").click(function(){
  $("#fetch").hide("slow"); 
})
})                     
</script>

			