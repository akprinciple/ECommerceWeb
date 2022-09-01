</div>
<div class="col-md-4">

									



									

									<div class="col-md-12">
<!-------------------------------- Side ad' Section --------------------->

										<div class="rounded mb-5 border">
											
											<h5 class="card-header font-weight-bold">A<span class="border-bottom border-primary">dver</span>t</h5>
										
											<div class="h-25 p-2">
										<h3>Place your Advert Here</h3>
												
											</div>
											
										</div>
				<!-------------------------------- Jokes Section ------------------------------------------->
										<h3 class="text-center mb-2 mt-2">
											<i>J<span class="border-bottom border-primary">oke</span>s</i>
										</h3>

		<div id="mycarousel" class="carousel slide col-md-12 p-0 mb-4 rounded border" data-ride="carousel" style="height: 300px;">
     	<ul class="carousel-indicators">
     		<li data-target="mycarousel" data-slide="0" class="active"></li>
     		<li data-target="mycarousel" data-slide="1"></li>
     		<li data-target="mycarousel" data-slide="2"></li>
     		<li data-target="mycarousel" data-slide="3"></li>
     		
     	</ul>
     	
     	<div class="carousel-inner w-100 h-100">
     		<?php 
										$sql = "SELECT * FROM post WHERE category = 4 AND status = 1 ORDER BY id DESC LIMIT 1";
										$query = mysqli_query($connect, $sql);
										while ($row = mysqli_fetch_array($query)) {
										 	$image = $row['image'];
										 	$title = $row['title'];
										 	$content = $row['content'];

										  ?>
     		<div class="carousel-item active">
     			<center><div class="">
											<div class=" text-center card-header font-weight-bold"><?php echo $title; ?></div>
											<p class="p-2 text-justify"><?php echo $content; ?></p>
										</div>
										</center>

     		</div>
     		<?php } ?>
     		<?php 
										$sql = "SELECT * FROM post WHERE category = 4 AND status = 1 ORDER BY RAND() LIMIT 3";
										$query = mysqli_query($connect, $sql);
										while ($row = mysqli_fetch_array($query)) {
										 	$image = $row['image'];
										 	$title = $row['title'];
										 	$content = $row['content'];

										  ?>
										
									
     		<div class="carousel-item">
     			<center><div class="">
											<div class=" text-center card-header font-weight-bold"><?php echo $title; ?></div>
											<p class="p-2 text-justify"><?php echo $content; ?></p>
										</div>
										</center>
									</div>
								<?php } ?>
     		
     	</div>
     </div>
									

<!-------------------------------- --------------------------------->
										<div class="rounded  border">
											<div class="card-header font-weight-bold">Rec<span class="border-bottom border-primary">ent Stor</span>ies</div>

											<div class="card-body">
												<?php 
									$sql = "SELECT * FROM post WHERE category = 3 AND status = 1 ORDER BY RAND() LIMIT 3";
										$query = mysqli_query($connect, $sql);
										while ($row = mysqli_fetch_array($query)) {

												 ?>
												 <li><a href="viewpost.php?post=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></li>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							</div>
							</div>
					
								
									