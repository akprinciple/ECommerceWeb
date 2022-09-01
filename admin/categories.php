	<?php 
	include 'inc/session.php'; 
	$msg = "";
	if (isset($_POST['submit'])) {
	$category = mysqli_real_escape_string($connect, $_POST['category']);
	$description = mysqli_real_escape_string($connect, $_POST['description']);
	$date = date('d M Y @ h:m:s');
	date_default_timezone_set('Africa/Lagos');
	$image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $type = pathinfo("upload/$image", PATHINFO_EXTENSION);


	$sql = "SELECT * FROM categories WHERE category = '$category'";
	$query = mysqli_query($connect, $sql);
	$count = mysqli_num_rows($query);
	$img = mysqli_query($connect, "SELECT * FROM categories WHERE image = '$image'");
	$counter = mysqli_num_rows($img);
	if ($count > 0) {
	
		$msg = "<div class=' p-2 rounded text-center text-danger mb-2'>Category already exists</div>";
	}elseif ($_FILES["image"]["size"] > 300000) {
   					$msg = "<div class='text-danger p-2'>Sorry, your file is larger than 300kb large.</div>";
    				}
            elseif ($type != "JPG" && $type != "jpg" && $type != "gif" && $type != "PNG" && $type != "png" && $type != "") {
               		$msg = "<div class='p-2 text-danger'>Only jpg, png and gif files are allowed</div>";
               	}elseif($counter > 0){
               		$msg = "<div class='p-2 text-danger text-center'>Image name is already existing! Consider Renaming it.</div>";
               	}else{
		$sel = "INSERT INTO categories (category, image, description, date) VALUES('$category', '$image', '$description', '$date')";
		$ins = mysqli_query($connect, $sel);
		if ($ins) {
			$msg = "<div class=' p-2 text-center text-success mb-2'>Category added successfully</div>";
			 move_uploaded_file($tmp, "../cat_img/$image");
		}
	}
}

	?>
<!DOCTYPE html>
<html>
<head>
	<title>Product Categories | <?php 
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
			<h4 class="border-bottom p-2 font-weight-bold text-dark">Manage Product Categories</h4>
<div class="p-3">
	<a href="javascript:void(0)" id="click" class="float-right p-2 text-light text-decoration-none  rounded bg-success">Add Categories</a>
	<div class="clearfix"></div>

	<?php echo $msg; ?>
	<!-- Add Product Categories -->
<div class="p-3 border rounded mt-2" style="display: none;" id="reg">
<h5 class="border-bottom font-weight-bold">Add Product category</h5>

<div class="mt-4 p-3">
<form method="post" enctype="multipart/form-data">

<!---------------- Category  --------------------->
<div class="form-group">
	<label for="category" class="font-weight-bold">Product Category</label>
								
	<input type="text" id="category" placeholder="input Category" required="required" name="category" class="form-control">

</div>
<div class="form-group">
<label class="font-weight-bold">Feature Image <span class="text-muted">(< 300kb)</span></label>
<input type="file" name="image" class="form-control" accept=".jpg,.png,.gif">
</div>
<!---------------- Category Description --------------------->
<div class="form-group">
	<label class="font-weight-bold">Category Description</label>
	<textarea name="description" rows="5" class="form-control" id="area" placeholder="Describe the category"></textarea>
</div>
<button type="submit" name="submit" class="btn btn-success">Submit</button>
</form>
</div>
			
		</div>

		<!-- Table of Already Added Categories -->
     <h3 class="mt-2">Product Categories</h3>

		<table class="col-md-12 table-striped table table-bordered text-center">
		<thead class="bg-success text-light">
			<tr>
			<th>S/N</th>
			<th>Category</th>
			<th>Description</th>
			<th>Image</th>
			<th>Date</th>
			<th>Actions</th>
			</tr>
	</thead>
	<tbody>
	<?php 
		$number = 1;
		$sql = "SELECT * FROM categories ORDER BY category ASC";
		$query = mysqli_query($connect, $sql);
		while ($row = mysqli_fetch_array($query)) {
		$category = $row['category'];
		$description = $row['description'];
		$date = $row['date'];
		$id = $row['id'];
		?>
		<tr>
			<td><?php echo $number++; ?></td>
			<td><?php echo $category; ?></td>
			<td class="text-truncate"><?php echo $description; ?></td>
			<td>
				<img src="../cat_img/<?php echo $row['image']; ?>" style="width: 100px;">
			</td>
			<td><?php echo $date; ?></td>
			<td>
				<a href="editcategory.php?id=<?php echo md5($id); ?>&&category=<?php echo $category; ?>" class="text-secondary fas fa-pen"></a>
				<a class="fas fa-trash-alt text-danger" title="Delete" onclick="location.href='delete.php?del_trash=<?php echo md5($id); ?>'" href="javascript:void(0)"></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
	</div>
</div>
</div>
</body>
</html>