<?php  
		include 'inc/session.php';
		$msg = "";
		if (isset($_GET['product_id'])&& isset($_GET['product'])) {
			$product = $_GET['product'];
			$product_id = $_GET['product_id'];
		}

		if (isset($_POST['update'])) {
			$image = $_FILES['image']['name'];
			$tmp = $_FILES['image']['tmp_name'];
			$type = pathinfo("upload/$image", PATHINFO_EXTENSION);


		if ($type != "JPG" && $type != "jpg" && $type != "gif" && $type != "PNG" && $type != "png" && $type != "") {
			$msg = "<div class='text-center text-danger'>Only jpg, png and gif files are allowed</div>";
		}

		elseif ($_FILES['image']['size'] > 300000) {
		$msg = "<div class='text-center text-danger'>file size is too large</div>";
		}
		else{
		$insert= "UPDATE products SET image = '$image' WHERE id = '{$product_id}'";
		$ins = mysqli_query($connect, $insert);
		if ($ins AND move_uploaded_file($tmp, "../upload/$image")) {
		$msg = "<div class='text-center text-success'>Image successfully Updated</div>";
		}

		}
		}

		if (isset($_POST['submit'])) {
				$product = mysqli_real_escape_string($connect, $_POST['product']);
				$description = mysqli_real_escape_string($connect, $_POST['description']);
				$category = mysqli_real_escape_string($connect, $_POST['category']);
				$price = mysqli_real_escape_string($connect, $_POST['price']);
				$old_price = mysqli_real_escape_string($connect, $_POST['old_price']);

				$sql = "UPDATE products SET product = '{$product}', description = '{$description}', category = '{$category}', price = '{$price}', old_price= '{$old_price}' WHERE id = '{$product_id}' ";
				$query = mysqli_query($connect, $sql);
				if ($query) {
					$msg = "<div class='text-center text-success'>Product successfully Updated</div>";
				}
			}
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Products</title>
	<?php include 'inc/link.php'; ?>
</head>
<body>
	<div class="row mx-0">
		<?php include 'inc/sidebar.php'; ?>
		<div class="col-md-10">
			<h4 class="font-weight-bold border-bottom pl-3 pt-3 mb-5">Edit Product</h4>

			<?php 
				$sql = mysqli_query($connect, "SELECT * FROM products WHERE id = '{$product_id}' AND product = '{$product}'");
				while ($row = mysqli_fetch_array($sql)) {
					
				
			 ?>
			 <?php echo $msg; ?>
			 <div class="col-md-4 m-auto" >
			<img src="../upload/<?php echo $row['image'] ?>" class="w-100">
			<form method="post" enctype="multipart/form-data" >
				<div class="form-group">
					<label class="font-weight-bold">Change Image:</label>
					<input type="file" name="image" class="form-control mb-2" required="required" accept=".jpg,.png,.gif">
					<button class="btn btn-danger float-right" type="submit" name="update">Update Image</button>
					<div class="clearfix"></div>
				</div>
			</form>
			</div>

			<form method="post" enctype="multipart/form-data" class="row mx-0">
			<div class="form-group col-md-6">
					<label class="font-weight-bold">Product Name:</label>
					<input type="text" name="product"  class="form-control mb-2" value="<?php echo $row['product']; ?>">
			</div>
			<div class="form-group col-md-6">
					<label class="font-weight-bold">Category:</label>
					<select class="form-control mb-2" name="category">
						<option value="<?php echo $row['category'] ?>">
							<?php 
								$category = $row['category'];
								$selt = mysqli_query($connect, "SELECT * FROM categories WHERE id = '{$category}'");
							while ($cat = mysqli_fetch_array($selt)) {
								# code...
						 	echo $cat['category']; 
							}
							 ?>
						</option>
						<?php 
					$sel = "SELECT * FROM categories";
					$ins = mysqli_query($connect, $sel);
					while ($rw = mysqli_fetch_array($ins)) {


					?>
			<option class="<?php if($rw['id'] == $category){echo "d-none";} ?>" value="<?php echo $rw['id']; ?>"><?php echo $rw['category']; ?></option>
			<?php } ?>
					</select>
					
			</div>
			<div class="form-group col-md-6">
					<label class="font-weight-bold">Actual Price:</label>
					<input type="number" name="price"  class="form-control mb-2" value="<?php echo $row['price']; ?>">
			</div>

			<div class="form-group col-md-6">
					<label class="font-weight-bold text-danger">Old Price:</label>
					<input type="number" name="old_price"  class="form-control mb-2" value="<?php echo $row['old_price']; ?>">
			</div>
			<div class="col-md-12 form-group">
			
				<label class="font-weight-bold">Description:</label>
			<textarea class="form-control" name="description" id="area" rows="8"><?php echo $row['description']; ?></textarea>
			</div>
			<div class="col-md-3 mb-3 mx-auto">
			<button class="btn btn-success" type="submit" name="submit">Submit</button>
			<a href="products.php"><button class="btn btn-danger ml-2" type="button">Go back</button></a>
			</div>
		</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>

<script src='tinymce/js/tinymce/tinymce.min.js'></script>
<script type="text/javascript">
	
tinymce.init({
    selector: '#area',
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,
    /*content_css: '//www.tiny.cloud/css/codepen.min.css',*/
    link_list: [
        { title: 'My page 1', value: 'https://www.codexworld.com' },
        { title: 'My page 2', value: 'https://www.xwebtools.com' }
    ],
    image_list: [
        { title: 'My page 1', value: 'https://www.codexworld.com' },
        { title: 'My page 2', value: 'https://www.xwebtools.com' }
    ],
    image_class_list: [
        { title: 'None', value: '' },
        { title: 'Some class', value: 'class-name' }
    ],
    importcss_append: true,
    file_picker_callback: function (callback, value, meta) {
        /* Provide file and text for the link dialog */
        if (meta.filetype === 'file') {
            callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
        }
    
        /* Provide image and alt text for the image dialog */
        if (meta.filetype === 'image') {
            callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
        }
    
        /* Provide alternative source and posted for the media dialog */
        if (meta.filetype === 'media') {
            callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
        }
    },
    templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
        { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
        { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 250,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: "mceNonEditable",
    toolbar_mode: 'sliding',
    contextmenu: "link image imagetools table",
});
</script>