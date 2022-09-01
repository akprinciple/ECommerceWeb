<div class="card m-0 p-0" >
<div class="card-header bg-leo p-0 m-0">
				<div class="float-left wide"><img src="images/leoportal2.jpg" class="card-img"></div>

				
				<nav class="nav float-right pt-4 col-md-7">
					
				<li class=" clear  text-light fas fa-caret-up fa-2x float-right"></li>
					
					<!-------------------------------- Home ------------------------------------------->

					<a href="index.php" class="nav-link  text-light m-top">Home</a>
					<!-------------------------------- Category ------------------------------------------->

					<li id="drop" class="nav-link text-light pointer" style="cursor: pointer;">
						Categories <i class="fas fa-caret-down"></i>
						
					</li>

					<!-------------------------------- Dropdown Content ------------------------------------------->

					<div id="content" class="position-absolute w-100 mt-5 right-0" style="">
						<div class=" mb-2 p-2">
							<span class="fas fa-times float-right fa-2x text-light" id="cancel"></span>
						</div>
						<?php 
								$sql = "SELECT * FROM category ORDER BY category ASC";
										$query = mysqli_query($connect, $sql);
										while ($rw = mysqli_fetch_array($query)) {
						 ?>
							<a class="mb-2  text-light border-light" href="category.php?catid=<?php echo $rw['id'] ?>">
								<li class="border-bottom p-2 text-capitalize">
									<?php echo $rw['category']; ?>
										<span class="fas fa-caret-right float-right ml-5"></span>
									</li>
							</a>
							<?php } ?>
						</div>
						<a href="aboutus.php" class="nav-link text-light">About Us</a>
						<a href="contactus.php" class="nav-link text-light">Contact Us</a>
						
					<!-- <a href="gossip.php" class="nav-link text-light">Gossip</a>
					<a href="jokes.php" class="nav-link text-light">Jokes</a>
					<a href="stories.php" class="nav-link text-light">Stories</a>
					<a href="trending.php" class="nav-link text-light">Trending</a>
					<a href="faith.php" class="nav-link text-light">Faith</a>
					<a href="arithmetic.php" class="nav-link text-light">Arithmetic</a>
					 -->
					 <li class="nav-link">
							<form action="search.php">
							<input type="search" name="search" required="required" class="rounded w-50 border-0 fas p-2" placeholder="&#xf002"><button type="search" class="btn btn-primary border-0">Search</button>
						</form>

					</li>


					
				</nav>
				<span class="navbar-light navbar-expand-lg float-right text-decoration-none p-3" style="z-index: 1030;">
  							<div class="navbar-toggler bg-light">
							<div class="navbar-toggler-icon">
								</div>
							</div>
						</span>
				
			</div>

				<!--------------------------------------- Body  ---------------------------------->
							<div class="card-body">
										
		<!--------------------------------------- Advert Space  ---------------------------------->

			<div class="p-3 border col-md-6 m-auto text-center">
				<h3>Place your Advert Here</h3>
			</div>
			<script type="text/javascript">
				$(document).ready(function() {
						$("#drop").click(function(){
							$("#content").slideToggle("slow");

						})
						$("#cancel").click(function(){
							$("#content").hide("slow");

						})

						$(".navbar-toggler").click(function(){
							$(".nav").slideToggle("slow").css("background-color", "rgba(0,0,0,0.9)").css("position", "absolute").css("z-index", "1").css("height", "1000px");
						$(".clear").click(function(){
							$(".nav").slideUp("slow");
							$("#content").slideUp("slow");
						})
							 
							
						})
						
					})
			</script>
			<div class="row mt-5">
									
									
									<div class="col-md-8">