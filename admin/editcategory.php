	<?php 
	include 'inc/session.php'; 
	$msg = "";
		if (isset($_GET['id']) && isset($_GET['category'])) {
					$id = $_GET['id'];
					$category = $_GET['category'];
					
	if (isset($_POST['submit'])) {
	$cat = mysqli_real_escape_string($connect, $_POST['category']);
	$description = mysqli_real_escape_string($connect, $_POST['description']);
	$sel = mysqli_query($connect, "UPDATE categories SET category = '{$cat}', description = '{$description}' WHERE md5(id) = '{$id}' && category = '{$category}'");
	if ($sel) {
		$msg = "<div class=' p-2 text-center text-success mb-2'>Category Updated successfully</div>";
	}
	else{
		$msg = "<div class='p-2 text-center text-danger mb-2'>Error! Try Again.</div>";
	}
}

if (isset($_POST['update'])) {
	$image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $type = pathinfo("upload/$image", PATHINFO_EXTENSION);
    $img = mysqli_query($connect, "SELECT * FROM categories WHERE image = '{$image}'");
	$counter = mysqli_num_rows($img);

    if ($_FILES["image"]["size"] > 300000) {
   					$msg = "<div class='text-danger p-2 text-center'>Sorry, your file is larger than 300kb large.</div>";
    				}
            elseif ($type != "JPG" && $type != "jpg" && $type != "PNG" && $type != "png") {
               		$msg = "<div class='p-2 text-danger text-center'>Only jpg and png files are allowed</div>";
               	}elseif($counter > 0){
               		$msg = "<div class='p-2 text-danger text-center'>Image name is already existing! Consider Renaming it.</div>";
               	}else{
               		$update = mysqli_query($connect, "UPDATE categories SET image = '{$image}'  WHERE md5(id) = '{$id}' && category = '{$category}'");
               		if ($update) {
			 		move_uploaded_file($tmp, "../cat_img/$image");

               			$msg = "<div class='p-2 text-success text-center'>Image successfully uploaded.</div>";
               		}
               		else{
					$msg = "<div class='p-2 text-center text-danger mb-2'>Error! Try Again.</div>";
	}
				}
			}
	


	

	?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Category | <?php 
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
			<h4 class="border-bottom p-2 font-weight-bold text-dark">Edit Product Category</h4>

			<?php echo $msg; ?>
			<?php 
				
			
					$select = mysqli_query($connect, "SELECT * FROM categories WHERE md5(id) = '{$id}' && category = '{$category}'");
					while ($row = mysqli_fetch_array($select)) {
					
					
					?>
					
					<div class="row mx-0 mt-3">
							<div class="col-md-8 m-auto border-right">
						<form method="post" enctype="multipart/form-data">
								
								<h4>Category Details</h4>
								<hr>
							
							<div class="form-group  mt-3">
								<label for="category" class="font-weight-bold">Category Name</label>
								<input type="text" name="category" required="required" id="category" class="form-control" value="<?php echo $category; ?>">
							</div>

							<div class="form-group mt-3">
								<label for="description" class="font-weight-bold">Description</label>
								<textarea class="form-control" name="description" id="description" rows="8"><?php echo $row['description']; ?></textarea>
								<center>
								<button type="submit" name="submit" class="btn btn-success mt-3  ">Update</button>
								<button type="Reset" class="btn btn-danger mt-3">Reset</button>
								</center>
								
							</div>
						</form>

						
						</div>
						<form enctype="multipart/form-data" method="post" class="col-md-4">
							<h4>Category Image</h4>
							<hr>
							<img class="card-img d-block" src="../cat_img/<?php echo $row['image']; ?>">
							<div>
								<input type="file" name="image" class="form-control  mt-3" accept=".jpg,.png" required="required">
								<center>
									<button type="submit" name="update" class="btn btn-success mt-3" >Submit</button>
								</center>
							</div>
						</form>
						</div>
					<?php
					}
			}
			 ?>
		</div>
	</div>
</body>
</html>