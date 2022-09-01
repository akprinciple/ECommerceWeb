	<?php 
	include 'inc/session.php';
	ob_start();
	$msg ="";
	if (isset($_POST['submit'])) {
	
$file = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];
$type = pathinfo("upload/$file", PATHINFO_EXTENSION);



if ($type != "PNG" && $type != "jpg" && $type != "JPG" && $type != "png") {
$msg = "<div class='text-danger p-1 font-weight-bold mb-1 text-center'>File type must be jpg or png</div>";
				 	
}
elseif ($_FILES["file"]["size"] > 300000) {
$msg = "<div class='text-danger font-weight-bold rounded mb-3 text-center'>File size is larger than 500kb</div>";
}

else{
$sql = "UPDATE profile SET text = '{$file}' WHERE id = 1";
$query = mysqli_query($connect, $sql);
move_uploaded_file($tmp, "../images/$file");

if ($query) {
			
$msg = "<div class='text-success font-weight-bold rounded mb-2 text-center'>Upload Successful </div>";
// header('location: index.php');
                        
}
else{
$msg = "<div class='alert-primary p-2 font-weight-bold rounded mb-3 text-center'>Error</div>";
}
}

}
	 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard | <?php 
        $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 7");
        $links = mysqli_fetch_array($link);
        echo $links['link'];
     ?></title>
	<?php include 'inc/link.php'; ?>
</head>
<body>
	<div class="row mx-0">
		<?php include 'inc/sidebar.php'; ?>
		<div class="col-md-10">
			<b class="float-right pt-2"><?php echo date('d D/M/Y'); ?></b>
			<div class="clearfix"></div>
			<hr>
			<div class="row mx-0 mb-3">
				<!-- Users Count -->
<div class=" col-md-3 p-2 mt-2 mb-2">
<div class="position-relative">
<a href="users.php" class="text-dark">
<div class="p-2"><span class="fas fa-layer-group fa-3x float-right"></span></div>
<div class="clearfix"></div>
<div class="p-2 position-absolute col-md-12 text-light rounded" style="top: 0; background-color: rgba(255,0,0,0.5);">

<h3 class=""><?php  
	$sql = "SELECT * FROM users";
	$query = mysqli_query($connect, $sql);
	echo mysqli_num_rows($query);
	?></h3>
<b>users</b>
</div>
</a>
</div>
</div>

<!-- Product Count -->
<div class=" col-md-3 p-2 mt-2 mb-2">
<div class="position-relative">
<a href="products.php" class="text-dark">
<div class="p-2"><span class="fab fa-product-hunt fa-3x float-right"></span></div>
<div class="clearfix"></div>
<div class="p-2 position-absolute col-md-12 text-light rounded" style="top: 0; background-color: rgba(0,200,0,0.5);">

<h3 class=""><?php  
	$sql = "SELECT * FROM products";
	$query = mysqli_query($connect, $sql);
	echo mysqli_num_rows($query);
	?></h3>
<b>Products</b>
</div>
</a>
</div>
</div>

<!-- Category Count -->

<div class=" col-md-3 p-2 mt-2 mb-2">
<div class="position-relative">
<a href="categories.php" class="text-dark">
<div class="p-2"><span class="fas fa-layer-group fa-3x float-right"></span></div>
<div class="clearfix"></div>
<div class="p-2 position-absolute col-md-12 text-light rounded" style="top: 0; background-color: rgba(255,0,0,0.5);">

<h3 class=""><?php  
	$sql = "SELECT * FROM categories";
	$query = mysqli_query($connect, $sql);
	echo mysqli_num_rows($query);
	?></h3>
<b>categories</b>
</div>
</a>
</div>
</div>
<!-- Cart Count -->
<div class=" col-md-3 p-2 mt-2 mb-2">
<div class="position-relative">
<a href="cart.php" class="text-dark">
<div class="p-2"><span class="fas fa-shopping-cart fa-3x float-right"></span></div>
<div class="clearfix"></div>
<div class="p-2 position-absolute col-md-12 text-light rounded" style="top: 0; background-color: rgba(0,200,0,0.5);">

<h3 class=""><?php  
	$sql = "SELECT * FROM products";
	$query = mysqli_query($connect, $sql);
	echo mysqli_num_rows($query);
	?></h3>
<b>Products in Cart</b>
</div>
</a>
</div>
</div>
			</div>
			<div class="row mx-0 mt-2">
<div class="col-md-3">
	<h4 class="">Website Logo</h4>
	<hr>
	<?php echo $msg; ?>
	<?php  
	$sql = "SELECT * FROM profile WHERE id = 1";
	$query = mysqli_query($connect, $sql);
	while ($row = mysqli_fetch_array($query)) {
	
	
	?>	
	<img src="../images/<?php echo $row['text']; ?>" class="w-100" style="height: 200px;">
<?php } ?>
	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<input type="file" name="file" accept=".jpg, .png, .gif" class="form-control" required="required">
	<button type="submit" name="submit" class="col-md-6 float-right btn btn-success p-2 border-0 mb-3 outline text-light btn mt-1">Change</button>
	<div class="clearfix"></div>
		</div>
	</form>
</div>
<div class="col-md-9">
	<h4>Links</h4>
	<hr>
<table class="table table-striped table-responsive-xl table-bordered text-center bg">
	<thead class="bg-success text-light">
	<tr>
		<th>S/N</th>
		<th>Media</th>
		<th>Link</th>
		<th>Edit</th>
	</tr>
	</thead>
	<tbody>
	<?php  
	$l_sql = "SELECT * FROM links ORDER BY id DESC";
	$l_query = mysqli_query($connect, $l_sql);
	$n = 1;
	while ($link = mysqli_fetch_array($l_query)) {
		
	
	?>
	<tr>
	<td><?php echo $n++; ?></td>
	<td class="text-capitalize"><?php echo $link['media']; ?></td>
	<td><?php echo $link['link']; ?></td>
	<td>
	<span class="dropdown">

	<span class="dropdown-toggle w-100" data-toggle="dropdown"></span>
		<div class="dropdown-menu p-2">
			<form method="post" enctype="multipart/form-data">
			<b>Edit</b>
			<div class="form-group">
			<input type="text
			" name="link" class="form-control" value="<?php echo $link['link']; ?>">
			</div>
			<button type="submit" name="submit<?php echo $link['id']; ?>" class="w-100 btn-success text-light btn">Update</button>
	<div class="clearfix"></div>
			</form>
		</div>
	</span>
	</td>
	</tr>
	<?php  
	if (isset($_POST['submit'.$link['id']])) {
		$id = $link['id'];
		
		$linker = $_POST['link'];

		$u_sql = "UPDATE links SET link = '{$linker}' WHERE id = '{$id}'";
		$u_query = mysqli_query($connect, $u_sql);
		if ($u_query) {
			header('location: index.php');
// echo "<script>alert('Success')</script>"."<script type='text/javascript'>
// 	setTimeout(function() {
// 		window.location.href = 'members.php'}, 3000);
// </script>";


	
	}
	}
	?>
	<?php } ?>	
	</tbody>
	</table>

</div>
</div>
<div class="border">
<?php include 'inc/graph.php'; ?>
</div>
</div>
	</div>
</body>
</html>
<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/popper.min.js"></script>
<!-- <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script> -->
 <script type="text/javascript" src="../js/java.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/chart.min.js"></script>

