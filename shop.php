<?php 
	include 'inc/session.php';

	

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
		<!-- All Categories -->
		<div class="col-md-3">
			<div class=" bg-white">
				<h5 class="bg-light text-dark text-white py-2 border-top border-bottom border-danger" style="border-to: 5px solid #dc3545;"><span class="p-2">Categories <span class="fas fa-caret-down float-right px text-danger px-2"></span></span>
				</h5>
				<?php 
				$sql = mysqli_query($connect, "SELECT * FROM categories");
				while ($row = mysqli_fetch_array($sql)) {
					
				
				?>
				<a href="?id=<?php echo $row['id'] ?>&&category=<?php echo $row['category'] ?>" class="text-dark">
					<h6 class="p-3 border-bottom border-danger">
						<?php echo $row['category']; ?>
						<span class="fas fa-caret-right float-right text-danger"></span>
					</h6>
				</a>
				<?php } ?>
			</div>
		</div>
		<!--  Collections By Category -->

		<div class="col-md-9 p-2">
			<?php 
				if (isset($_GET['id']) && isset($_GET['category'])) {
					$id = (int)$_GET['id'];
					$category = $_GET['category'];
					?>
					<h5><?php echo $category; ?></h5>
					<hr>
					<?php 
		if (isset($_GET['page_no']) && $_GET['page_no']!="") {
		$page_no = $_GET['page_no'];
		} else {
		$page_no = 1;
    	}
    	$total_records_per_page = 10;
   	 	$offset = ($page_no-1) * $total_records_per_page;
		$previous_page = $page_no - 1;
		$next_page = $page_no + 1;
		$adjacents = "2"; 
		$result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM `products` WHERE category = '{$id}'");
		$total_records = mysqli_fetch_array($result_count);
		$total_records = $total_records['total_records'];
    	$total_no_of_pages = ceil($total_records / $total_records_per_page);
		$second_last = $total_no_of_pages - 1; // total page minus 1
		$result = mysqli_query($connect, "SELECT * FROM `products` WHERE category = '{$id}' ORDER BY id DESC LIMIT $offset, $total_records_per_page");
  		while ($row = mysqli_fetch_array($result)) {
		$image = $row['image'];
		$product = $row['product'];
		$description = $row['description'];
		$date = $row['date'];
		$category = $row['category'];
		$id_post = $row['id']; 
		?>
		
			<!--------------------- PRODUCT DESIGN  ----------->
			<div class="row mx-0 group mb-3 shadow p-2 bg-white">
				<div class="col-md-4 mt-4 p-3">
					<img src="upload/<?php echo $row['image'] ?>" class="card-img">
				</div>
				<div class="col-md-8 pl-3">
					<a href="collections.php?product_id=<?php echo $row['id']; ?>&&product=<?php echo $row['product']; ?>" class="nav-link">
						<h3 class=" pt-3 mb-2">
							<?php echo $row['product']; ?>
						</h3>
						
					</a>
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

						
						
						<a href="collections.php?product_id=<?php echo $row['id']; ?>&product=<?php echo $row['product']; ?>" class="text-uppercase">+ See full details here</a>
						<br>
						<div class="float-left mt-3">
							<?php if ($row['old_price'] > 0): ?>
								
						<h4 class="d-inline-block" style="text-decoration: line-through;">$<?php echo number_format($row['old_price'],2); ?></h4>
							<?php endif ?>
						<h2 class="d-inline-block text-danger" style="line-height: 25px;">$<?php echo number_format($row['price'],2); ?></h2>						</div>
						<div class="float-right mt-3">
							<a href="collections.php?product_id=<?php echo $row['id'] ?>&product=<?php echo $row['product'] ?>"><button class="btn btn-danger">View Product</button></a>
						</div>
						<div class="clearfix"></div>
						<div >
							
						</div>
				</div>
			</div>
				
				
		
<?php } ?>
<ul class="pagination">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    			
	<li class="border-danger border" <?php if($page_no <= 1){ echo "class='disable'"; } ?>>
	<a class="page-link" <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>><span class="fas fa-caret-left text-danger " title="Previous"></span></a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active page-link text-light bg-danger border border-danger'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter' class='page-link  text-danger border border-danger'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active page-link  text-light bg-danger border border-danger'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter' class='page-link  text-danger border border-danger'>$counter</a></li>";
				}
        }
		echo "<li class=' text-danger border border-danger'><a>...</a></li>";
		echo "<li class='border border-danger'><a href='?page_no=$second_last' class='text-danger'>$second_last</a></li>";
		echo "<li class='border border-danger'><a href='?page_no=$total_no_of_pages' class='text-danger'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li class='border border-danger'><a class='text-danger' href='?page_no=1'>1</a></li>";
		echo "<li class='border border-danger'><a class='text-danger' href='?page_no=2'>2</a></li>";
        echo "<li class='border border-danger'><a class='text-danger'>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active text-light bg-danger border border-danger'><a>$counter</a></li>";	
				}else{
           echo "<li class='border border-danger'><a class='text-danger' href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li class='border border-danger' text-danger><a>...</a></li>";
	   echo "<li class='border border-danger'><a class='text-danger' href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li class='border border-danger'><a class='text-danger-danger' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li class='border border-danger'><a class='text-danger' href='?page_no=1'>1</a></li>";
		echo "<li class='border border-danger'><a class='text-danger' href='?page_no=2'>2</a></li>";
        echo "<li class='border border-danger text-danger'><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active bg-danger text-light'><a>$counter</a></li>";	
				}else{
           echo "<li class='border border-danger'><a class='text-danger' href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li class=''  <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a title="Next" class="page-link border border-danger text-danger" <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>><span class="fas fa-caret-right"></span></a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li class=''><a href='?page_no=$total_no_of_pages' class='page-link text-danger border border-danger' title='Last'><span class='fas fa-caret-right'></span><span class='fas fa-caret-right'></span><span class='fas fa-caret-right'></span></a></li>";
		} ?>
		<!------------------------------  For the number of posts available -------------------------------->
</ul>
</div>
					<?php

				}else{
			 ?>
			<h5>All Collections</h5>
			<hr>

			<?php 
		if (isset($_GET['page_no']) && $_GET['page_no']!="") {
		$page_no = $_GET['page_no'];
		} else {
		$page_no = 1;
    	}
    	$total_records_per_page = 10;
   	 	$offset = ($page_no-1) * $total_records_per_page;
		$previous_page = $page_no - 1;
		$next_page = $page_no + 1;
		$adjacents = "2"; 
		$result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM `products`");
		$total_records = mysqli_fetch_array($result_count);
		$total_records = $total_records['total_records'];
    	$total_no_of_pages = ceil($total_records / $total_records_per_page);
		$second_last = $total_no_of_pages - 1; // total page minus 1
		$result = mysqli_query($connect, "SELECT * FROM `products` ORDER BY id DESC LIMIT $offset, $total_records_per_page");
  		while ($row = mysqli_fetch_array($result)) {
		$image = $row['image'];
		$product = $row['product'];
		$description = $row['description'];
		$date = $row['date'];
		$category = $row['category'];
		$id_post = $row['id']; 
		?>
		
			<!--------------------- PRODUCT DESIGN  ----------->
			<div class="row mx-0 group mb-3 shadow p-2 bg-white">
				<div class="col-md-4 mt-4 p-3">
					<img src="upload/<?php echo $row['image'] ?>" class="card-img">
				</div>
				<div class="col-md-8 pl-3">
					<a href="collections.php?product_id=<?php echo $row['id']; ?>&&product=<?php echo $row['product']; ?>" class="nav-link">
						<h3 class=" pt-3 mb-2">
							<?php echo $row['product']; ?>
						</h3>
						
					</a>
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

						
						<!-- <i class="mt-2 d-block"><?php echo substr($row['description'], 0, 120); ?>...</i> -->
						<a href="collections.php?product_id=<?php echo $row['id']; ?>&&product=<?php echo $row['product']; ?>" class="text-uppercase">+ See full details here</a>
						<br>
						<div class="float-left mt-3">
						<?php if ($row['old_price'] > 0): ?>
								
						<h4 class="d-inline-block" style="text-decoration: line-through;">$<?php echo number_format($row['old_price'],2); ?></h4>
							<?php endif ?>
						<h2 class="d-inline-block text-danger" style="line-height: 25px;">$<?php echo number_format($row['price'],2); ?></h2>
						</div>
						<div class="float-right mt-3">
							<a href="collections.php?product_id=<?php echo $row['id'] ?>&product=<?php echo $row['product'] ?>"><button class="btn btn-danger">View Product</button></a>
						</div>
						<div class="clearfix"></div>
						<div >
							
						</div>
				</div>
			</div>
				
				
		
<?php } ?>
<ul class="pagination">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    			
	<li class="border-danger border" <?php if($page_no <= 1){ echo "class='disable'"; } ?>>
	<a class="page-link" <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>><span class="fas fa-caret-left text-danger " title="Previous"></span></a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active page-link text-light bg-danger border border-danger'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter' class='page-link  text-danger border border-danger'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active page-link  text-light bg-danger border border-danger'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter' class='page-link  text-danger border border-danger'>$counter</a></li>";
				}
        }
		echo "<li class=' text-danger border border-danger'><a>...</a></li>";
		echo "<li class='border border-danger'><a href='?page_no=$second_last' class='text-danger'>$second_last</a></li>";
		echo "<li class='border border-danger'><a href='?page_no=$total_no_of_pages' class='text-danger'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li class='border border-danger'><a class='text-danger' href='?page_no=1'>1</a></li>";
		echo "<li class='border border-danger'><a class='text-danger' href='?page_no=2'>2</a></li>";
        echo "<li class='border border-danger'><a class='text-danger'>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active text-light bg-danger border border-danger'><a>$counter</a></li>";	
				}else{
           echo "<li class='border border-danger'><a class='text-danger' href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li class='border border-danger' text-danger><a>...</a></li>";
	   echo "<li class='border border-danger'><a class='text-danger' href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li class='border border-danger'><a class='text-danger-danger' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li class='border border-danger'><a class='text-danger' href='?page_no=1'>1</a></li>";
		echo "<li class='border border-danger'><a class='text-danger' href='?page_no=2'>2</a></li>";
        echo "<li class='border border-danger text-danger'><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active bg-danger text-light'><a>$counter</a></li>";	
				}else{
           echo "<li class='border border-danger'><a class='text-danger' href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li class=''  <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a title="Next" class="page-link border border-danger text-danger" <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>><span class="fas fa-caret-right"></span></a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li class=''><a href='?page_no=$total_no_of_pages' class='page-link text-danger border border-danger' title='Last'><span class='fas fa-caret-right'></span><span class='fas fa-caret-right'></span><span class='fas fa-caret-right'></span></a></li>";
		} ?>
		<!------------------------------  For the number of posts available -------------------------------->
</ul>
		</div>
		<?php } ?>
	</div>
	<?php include 'inc/footer.php'; ?>
