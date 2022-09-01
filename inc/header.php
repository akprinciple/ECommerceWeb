	<script type="text/javascript">
          function find(val) {
               $.ajax({
                  type: "GET",
                  url: "search.php",
                  data: 'see='+val,
                  success: function (data) {
                        $('#search').html(data);
                  }
               })
          }
         
    </script>
    			<?php include 'search.php'; ?>
<header style="">
	<div style="background-color:ghostwhite; z-index: 1;<?php if (isset($_SESSION['id'])) {
		echo "display: none";
	} ?>">
	<!-- Big Screen Nav -->
		<a href="login.php" class="text-dark float-right py-1 px-2 over">Login</a>
		<a href="register.php" class="text-dark float-right py-1 px-2 border-right over">Register</a>
		<span class="fas fa-user float-right py-1 px-2"></span>
		<div class="clearfix"></div>
	</div>
	<div style="background-color:ghostwhite; z-index: 1;<?php if (!isset($_SESSION['id'])) {
		echo "display: none";
	} ?>">
		<a href="logout.php" class="text-danger float-right py-1 px-2 over text-decoration-none">Logout</a>
		<span class="fas fa-user float-right py-1 px-2"></span>
		<div class="clearfix"></div>
		
	</div>
		<div class="bg-white py-3 px-5 row mx-0 position-relative">
			<div class="col-md-2 p-0">
				<!-- <h5>
					REPA<span class="text-danger">MODERND</span>TECH
					<div class="float-right text-danger">.com</div>
					<div class="clearfix"></div>
				</h5> -->
				<center>
				<?php 
					$image = mysqli_query($connect, "SELECT * FROM profile WHERE id = 1");
					while ($rw = mysqli_fetch_array($image)) {
						
						?>
						<img src="images/<?php echo $rw['text'];  ?>" class="" width="50px">
						<?php
					}
				 ?></center>
			</div>
			<!-- Phone Number -->
			<div class="col-md-2 text-center" id="disp">
				<a href="tel:<?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 1");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?>" class="text-danger font-weight-bold text-decoration-none"><?php 
    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 1");
    $links = mysqli_fetch_array($link);
    echo $links['link'];
   ?></a>
				<div class="">Contact Us</div>
			</div>
			<!-- Big Screen Search Box -->
			<div class="col-md-6 px-0" id="disp">
				<div class="row mx-0" style="border: 1px groove #ededed;">
					<input type="text"  onkeyup="find(this.value)" class="p-2 border-0" style=" outline: none; width: 90%" placeholder="search...">
					<button class="fas fa-search p-2 border-0 " style="background-color: #ededed; width: 10%">
					</button>
				</div>
			</div>
			<div class="col-md-2 text-center" id="disp">
				<a href="cart.php" class="fas fa-shopping-cart text-danger text-decoration-none" id="cart">(<?php 
				if (isset($_SESSION['id'])) {
					
				
					$cart = mysqli_query($connect, "SELECT SUM(quantity) AS quantity FROM cart WHERE user = '{$_SESSION['id']}' && status = 1");
					
					while ($rows = mysqli_fetch_array($cart)) {
						if ($rows['quantity'] > 0) {
							# code...
						
						echo $rows['quantity'];
					}
					else{
						echo 0;
					}
					}
				}elseif (isset($_SESSION['identity'])) {
					$date = date('d/M/Y');
					$cart = mysqli_query($connect, "SELECT SUM(quantity) AS quantity FROM guestcart WHERE user = '{$_SESSION['identity']}' && status = 1 && date = '{$date}'");
					
					while ($rows = mysqli_fetch_array($cart)) {
						if ($rows['quantity'] > 0) {
							# code...
						
						echo $rows['quantity'];
					}
					else{
						echo 0;
					}
					}
				}
				else{
					echo 0;	
				}
				 ?>
				items)</a> 
			</div>
		</div>

		
		<div class="border-top bg-white py-1 px-2  mx-0" id="small">
			<i class="fas fa-bars p-1" style="width: 20%"></i>
			<i class="fas fa-search  p-1 text-center" id="click" style="width:50%"></i>
			<a href="cart.php" class=" text-danger text-decoration-none text-left" style="width: 30%">
				<span class="fas fa-shopping-cart"></span> 
				<span id="cart1">
				(<?php 
				if (isset($_SESSION['id'])) {
					
				
					$cart = mysqli_query($connect, "SELECT SUM(quantity) AS quantity FROM cart WHERE user = '{$_SESSION['id']}' && status = 1");
					
					while ($rows = mysqli_fetch_array($cart)) {
						if ($rows['quantity'] > 0) {
							# code...
						
						echo $rows['quantity'];
					}
					else{
						echo 0;
					}
					}
				}elseif (isset($_SESSION['cart'])) {
					echo count($_SESSION['cart']);
				}
				else{
					echo 0;	
				}
				 ?>
				items)</span>
			</a>
		</div>
<!-- Small Screen Search Box -->
		<div id="reg" class="position-absolute w-100" style="display: none; z-index: 2; overflow-y: scroll; height: 400px">
		<div class="row mx-0 " style="border: 1px groove #ededed; z-index: 3">
					<input type="text" class="p-2 border-0" style=" outline: none; width: 90%" placeholder="search..." onkeyup="find(this.value)">
					<button class="fas fa-search p-2 border-0 " type="submit" style="background-color: #ededed; width: 10%">
					</button>
				</div>
		</div>

				
				<!-- Small Screen Side Bar -->
		<div class=" bg-light position-absolute w-100 text-center slider" style="z-index: 1; display: none;">
			<a href="index.php" class="over text-dark nav-link border-bottom p-2 ">Home</a>
			<a href="shop.php" class="text-dark nav-link border-bottom p-2 over">Shop</a>
			<a href="about.php" class="text-dark nav-link border-bottom p-2 over">About Us</a>
			<a href="contact.php" class="text-dark nav-link p-2  over">Contact Us</a>
		</div>

	</header>
	<div class="bg-dark nav p-1" id="disp" style="position: sticky; top: 0; z-index: 4">
			<div class="col-md-4 m-auto nav">
			<a href="index.php" class="over text-light nav-link border-right ">Home</a>
			<a href="shop.php" class="text-light nav-link border-right over">Shop</a>
			<a href="about.php" class="text-light nav-link border-right over">About Us</a>
			<a href="contact.php" class="text-light nav-link  over">Contact Us</a>
			</div>
		</div>
			<div class="position-relative">
			<!-- Ajax Results for Big Screen -->
				<div id="search" class="position-absolute row mx-0 w-100 bg-white ajax_b_screen" style="top: 42px; z-index: 2; left: 0; "></div>
					<!-- Ajax Results -->
				<div id="search" class="w-100 bg-white mt-3 position-absolute"></div>
	</div>