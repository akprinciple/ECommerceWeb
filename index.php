<?php 
		include 'inc/session.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage | <?php 
        $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 7");
        $links = mysqli_fetch_array($link);
        echo $links['link'];
     ?></title>
     <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/popper.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="font/css/all.min.css">
	<?php include 'inc/link.php'; ?>
	<style type="text/css">
		.fa-globe{
			animation: globe 1s linear infinite;
		}
		@keyframes globe{
			from{
				transform: rotate(0deg);
			}
			to{
				transform: rotate(360deg);

			}
		}
		.phone{
			animation: phone .8s alternate-reverse infinite;
		}
		@keyframes phone{
		from{
				transform: scale(1);
			}
			to{
				transform: scale(.8);

			}
		}
		.shake{
    /* Start the shake animation and make the animation last for 0.5 seconds */
    animation: shake 4s;
    /* When the animation is finished, start again */
    animation-iteration-count: infinite;
}

@keyframes shake {
    0% { transform: translate(1px, 1px) rotate(0deg); }
    10% { transform: translate(-1px, -2px) rotate(-1deg); }
    20% { transform: translate(-3px, 0px) rotate(1deg); }
    30% { transform: translate(3px, 2px) rotate(0deg); }
    40% { transform: translate(1px, -1px) rotate(1deg); }
    50% { transform: translate(-1px, 2px) rotate(-1deg); }
    60% { transform: translate(-3px, 1px) rotate(0deg); }
    70% { transform: translate(3px, 1px) rotate(-1deg); }
    80% { transform: translate(-1px, -1px) rotate(1deg); }
    90% { transform: translate(1px, 2px) rotate(0deg); }
    100% { transform: translate(1px, -2px) rotate(-1deg); }
}
	</style>
	


</head>
<body class="" style="background-color: ghostwhite">
	<!-- Header -->
	<?php include 'inc/header.php'; ?>
		<!-- Body  -->
<!-- carousel indicator -->
		<div id="mycarousel" class="carousel slide" data-ride="carousel">
			
			<!-- carousel wrapper -->
			<div class="carousel-inner">
				<div class="carousel-item active"  >
					<div style="background: linear-gradient(to left, rgba(0,0,0,0.4),rgba(0,0,0,0.6)), url('images/camera.jpg')center center;" class="caro p-2 text-light  " alt="slide 1">
						<h1 class="mt-5 txt">Discover the appeal of Pictures</h1>
						<h1 class="h">Take a Photograph Today</h1>
						<a href="http://localhost/repamoderndtech/shop.php?id=1&&category=Cameras" class="btn btn-dark text-decoration-none mt-3 btn-lg">Shop Now</a>
						
					</div>
					<!-- <img src="images/" class="card-img">
					<div class="caro text-light position-absolute w-100"> -->
					
				</div>
				<div class="carousel-item">
					<div style="background: linear-gradient(to left, rgba(0,0,0,0.4),rgba(0,0,0,0.6)), url('images/drone.jpg')center center;" class="caro p-2 text-light " alt="slide 2">
						<h1 class="mt-5 txt">Never stop exploring your World </h1>
						
						<h1 class="h"><span class="fas fa-globe"></span></h1>
						<a href="shop.php?id=7&&category=Drones" class="btn btn-dark text-decoration-none mt-3 btn-lg">See more</a>
						
					</div>
				</div>

				<div class="carousel-item" >
					<div style="background: linear-gradient(to left, rgba(0,0,0,.4),rgba(0,0,0,.6)), url('images/laptop.jpg')center center;" class="caro p-2 pl-3 text-light " alt="slide 2">
						<h1 class="mt-5 text-left txt pt-3">Get Closer Without Taking a Step </h1>
						<a href="shop.php?id=6&&category=Laptops" class="d-block text-left mt-3"><button class="btn btn-danger btn-lg text-decoration-none">Explore Now</button>
						 </a>
						
					</div>

			</div>
			<!-- carousel controls -->
			<a class="carousel-control-prev" href="#mycarousel" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#mycarousel" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
			
		</div>
		<div>
			<h4 class="text-center text-dark m-3">Categories</h4>
			<!-- Categories -->
			<div class="row mx-0 col-md-11 m-auto border-top p-2 ">
					<?php 
						$sql = mysqli_query($connect, "SELECT * FROM categories ORDER BY RAND() LIMIT 8");
						while ($row = mysqli_fetch_array($sql)) {
							
						
					 ?>
				<a href="shop.php?id=<?php echo $row['id']; ?>&&category=<?php echo $row['category']; ?>" class="col-md-3 mt-2 text-dark text-decoration-none">
					<div class="bg-white py-2 box">
						<div class="image_box">
					<img src="cat_img/<?php echo $row['image'] ?>" class="w-100 img">
				</div>
					<h5 class="text-center mt-2"><span class="border-bottom border-danger"><?php echo $row['category'] ?></span></h5>
				</div>
				</a>
				<?php } ?>
				


			</div>
			<!--  -->
			<div class="col-md-11 mx-auto mt-3 bg-dark p-4 text-light">
			<div class="row mx-0">
				<div class="pt-4 text-justify position-relative col-md-7 mb-4"> 
			<h5 class="text-light">	OUR CUSTOMER CARE REPRESENTATIVES ARE HERE TO HELP<span class="fas fa-phone phone"></span></h5>
					Our Customer care representatives are here to help you with every aspect of buying and selling on this website. Whether making a new purchase, trading up, or looking to turn old gear into cash, we're here to answer your questions, give you the best advice, and even help place your order.
					<hr>
					<div class="mt-5 mb-3">
						CALL OR CHAT WITH US @
							<a href="tel:<?php 
						    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 1");
						    $links = mysqli_fetch_array($link);
						    echo $links['link'];
						   ?>" class="text-light font-weight-bold text-decoration-none"><?php 
						    $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 1");
						    $links = mysqli_fetch_array($link);
						    echo $links['link'];
						   ?></a>

						<a href="contact.php" class="btn border border-danger text-light">Contact us Now</a>
					</div>
				</div>
					
				<div class="p-4 bg-white col-md-5">
					<img src="images/mac.jpg" class="w-100 shake">
				</div>
				</div>
			</div>

			<!-- Newest Products -->
			<h4 class="text-center mt-3">Latest Products</h4>
			<div class="row mx-0 col-md-11 m-auto p-2 border-top">
				<?php 
					$query = mysqli_query($connect, "SELECT * FROM products WHERE status = 1 ORDER BY id DESC LIMIT 3");
					while ($pro = mysqli_fetch_array($query)) {
						
					
				 ?>
				 <a href="collections.php?product_id=<?php echo $pro['id']; ?>&&product=<?php echo $pro['product']; ?>">
				<div class="col-md-4 mt-2">
					<div class="bg-white p-2 shadow text-center">
						<div class="img_box">
					<img src="upload/<?php echo $pro['image']; ?>" class="w-100 image">
				</div>
					<a href="collections.php?product_id=<?php echo $pro['id']; ?>&&product=<?php echo $pro['product']; ?>" class="text-center text-dark text-decoration-none"><span class="font-weight-bold"><?php echo $pro['product']; ?></span></a><br>
					<span>$<?php echo number_format($pro['price']); ?></span> 
					<a href="collections.php?product_id=<?php echo $pro['id']; ?>&&product=<?php echo $pro['product']; ?>" class="text-center text-dark text-decoration-none">
					<div class="col-md-6 text-center m-auto border rad">View Product</div>
				</a>
				</div>
				</div>
			</a>
				<?php } ?>

				

				
			</div>
		</div>
		<!-- About Us -->
		<div class="bg-white px-5 py-3 mt-3 text-center">
			We have a long years of Sales and we are highly trustworthy.
			You will be glad when you know more about us. Read About us here <a href="about.php" class="btn-danger btn btn-lg">About  Us</a>

		</div>
		<!-- Fixed Button -->
		<a href="shop.php" class="text-decoration-none btn btn-danger position-fixed mb-5 ml-5" style="bottom: 0; left 0; z-index: 5; ">Visit our Shop Now</a>
			<?php include 'inc/footer.php'; ?>


