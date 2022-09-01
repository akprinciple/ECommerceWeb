	<?php 
	include 'inc/session.php'; 
	$msg = "";
	$product = $content = $msg = $keywords= "";
	
	if(isset($_POST['post'])) {
          $product = mysqli_real_escape_string($connect, $_POST['product']);
          $image = $_FILES['image']['name'];
          $tmp = $_FILES['image']['tmp_name'];
          
           $description = mysqli_real_escape_string($connect, $_POST['description']);
           $category = mysqli_real_escape_string($connect, $_POST['category']);
           $price = mysqli_real_escape_string($connect, $_POST['price']);
           $old_price = mysqli_real_escape_string($connect, $_POST['old_price']);
         $date = date('d/M/Y @ h:m:s');
              
                   
         $type = pathinfo("upload/$image", PATHINFO_EXTENSION);
              $select = "SELECT * FROM products WHERE product = '{$product}' && category = '{$category}'";
              $c_query = mysqli_query($connect, $select);
              $count = mysqli_num_rows($c_query);
              if ($count > 0) {
                $msg = "<div class='text-danger text-center p-2'>Product name is already existing for the chosen category</div>";
              }else{
               if ($category == "--Select one--") {
               $msg = "<div class='text-danger text-center p-2'>Select a category</div>";
             }
               elseif ($_FILES["image"]["size"] > 300000) {
   					$msg = "<div class='text-danger text-center p-2'>Sorry, your file is larger than 300kb.</div>";
    				}
            elseif ($type != "JPG" && $type != "jpg" && $type != "gif" && $type != "PNG" && $type != "png" && $type != "") {
               		$msg = "<div class='text-danger text-center p-2'>Only jpg, png and gif files are allowed</div>";
               	}else{


               					

         $sql = "INSERT INTO products (product, image, category, description, price, old_price, date) VALUES ('$product', '$image', '$category', '$description', '$price', '$old_price', '$date')";
         $query = mysqli_query($connect, $sql);
          
         if ($query) {
            $msg = "<div class='text-success text-center p-2'>Product has been Successfully Added </div>";
          move_uploaded_file($tmp, "../upload/$image");
         }
         else{
            $msg = "<div class='text-danger text-center p-2'>Try again</div>";
         }
         
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
			<h4 class="font-weight-bold border-bottom pl-3 pt-3 mb-5">Manage Products</h4>


				<!-- Show/Hide Button -->
			<a href="javascript:void(0)" id="click" class="float-right p-2 text-light text-decoration-none  rounded bg-success">Add New Products</a>
	<div class="clearfix"></div>
				<!--  ADD NEW PRODUCTS -->
  			<div class="border rounded p-3 mt-2" style="display: none;" id="reg">
  				<h4>Add New Product</h4><hr>
			<div class="col-md-9 m-auto  p-2 rounded">
			<div class="">

			<form action="" method="post" enctype="multipart/form-data">
			<b class="echo mb-3"><?php echo $msg; ?></b>
			<div class="mt-3">
			<!--------------------------------------- Product Name  ---------------------------------->

			<div class="form-group">
				<div class="font-weight-bold">Product Name</div>
				<div class=""><input type="text" placeholder="Product Name" name="product" required="required" class="form-control" value="<?php echo $product; ?>"></div>
			</div>
			<!--------------------------------------- Feature Image--------------------------------->

			<div class="form-group">

				<div class="">Product Image</div>
				<div>
					<input class="form-control" type="file" accept=".jpg,.png,.gif" name="image" placeholder="Image" required="required">
				</div>
			</div>


			<!--------------------------------------- Category  ---------------------------------->


			<div class="form-group">
				<div class="font-weight-bold">Category</div>
				<div class="">
					<select name="category" class="form-control">
					<option selected="selected">--Select one--</option>
					<?php 
					$sel = "SELECT * FROM categories";
					$ins = mysqli_query($connect, $sel);
					while ($rw = mysqli_fetch_array($ins)) {


					?>
			<option value="<?php echo $rw['id']; ?>"><?php echo $rw['category']; ?></option>
			<?php } ?>
			</select>
			</div>
			</div>



			<div class="row mx-0">
			<!--------------- Price  ----------------->
			<div class="form-group col-md-6">
				<div class="font-weight-bold">Actual Price</div>
				<div class=""><input type="number" min="1" placeholder="Actual Price in USD($)" name="price" required="required" class="form-control" value="<?php echo $price; ?>"></div>
			</div>
			<!--------------- Old Price  ----------------->
			<div class="form-group col-md-6">
				<div class="font-weight-bold">Old Price <span class="text-muted">(Not Compulsory)</span></div>
				<div class=""><input type="number" placeholder="Old Price in USD($)" name="old_price"  class="form-control" min="1" value="<?php echo $old_price; ?>"></div>
			</div>
			</div>
			<!--------------- Description  ----------------->

			<div class="form-group">
				<div class="font-weight-bold">Description</div>
				<textarea name="description" class="form-control" placeholder="Content" id="area"><?php echo $content; ?>
				</textarea>
			</div>
			

			<div class="mb-3">
			<input type="submit" name="post" value="Add Product" class="btn btn-success">
			<a href=""><button type="button" class="btn btn-danger">Discard Product</button></a>
			</div>
			</div>
			</form>
			</div>


		</div>
	</div>


				<!-- TABLE OF PRODUCTS -->
				<h4 class="mt-3">All Products</h4>

				<table class="table-striped table col-md-12 text-center table-bordered">
		<thead class="bg-success text-light">
			<tr>
				<!-- <th>Author</th> -->
				<th>Product Name</th>
				<th>Category</th>
				<th>Actions</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		if (isset($_GET['page_no']) && $_GET['page_no']!="") {
		$page_no = $_GET['page_no'];
		} else {
		$page_no = 1;
    	}
    	$total_records_per_page = 20;
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
		
			<!--------------------- PRODUCT NAME  ----------->
				<td class="w-50" title="<?php echo $title; ?>">
				<?php echo $product; ?>
					
				</td>
				

					<td>
						<?php
							$selt = mysqli_query($connect, "SELECT * FROM categories WHERE id = '{$category}'");
							while ($cat = mysqli_fetch_array($selt)) {
								# code...
						 	echo $cat['category']; 
							}

						 ?>
					</td>	 			
				<td>
				<a class="fas fa-eye text-decoration-none text-primary" onclick="location.href='viewproduct.php?product_id=<?php echo $row["id"]; ?>&&product=<?php echo $row["product"]; ?>'" href="javascript:void(0)" title="View Product">
				</a>
				<!----------- Edit Button  --------------->
				<a title="Edit post" class="fas fa-pen text-decoration-none text-secondary" onclick="location.href='editproduct.php?product_id=<?php echo $row["id"]; ?>&product=<?php echo $row["product"]; ?>'" href="javascript:void(0)">
				</a>
							 			
				<!--- Approval Button--------->
				<a class="text-decoration-none " onclick="location.href='approval.php?approve=<?php echo $row["id"]; ?>'" href="javascript:void(0)" 
				title="<?php if($row['status'] == 1){
				echo "Available for Sale";
				}
				else{
				echo "Not available";
				} ?>">
				<?php 
				if ($row['status']==1) {
				echo "<button class='btn btn-success border-0 fas fa-check'></button>";
				}
				else{
				echo "<button class='btn btn-warning border-0 text-light fas fa-check'></button>";
				} ?>
				</a>
							 	
				<!--------------------------- Delete Button  ---------------------------------->
				<a title="Delete" id="del<?php echo $row['id']; ?>" class="fas fa-times ml-3 text-danger text-underline_none "></a>
				
				</td>
				<!--------------------------- Date  ---------------------------------->

				<td class=""><?php echo $date; ?></td>
				</tr>
		
<?php } ?>
	</tbody>
</table>

								
<!------------------ For dividing the pages   --------->

<ul class="pagination">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    			
	<li <?php if($page_no <= 1){ echo "class='disable'"; } ?>>
	<a class="page-link" <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active page-link bg-dark'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter' class='page-link'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active page-link bg-dark'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter' class='page-link'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active bg-dark'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active bg-dark'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li  <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a class="page-link" <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages' class='page-link'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
		<!------------------------------  For the number of posts available -------------------------------->
		<li class="nav-link border border-secondary p-1 font-weight-bold ml-3 text-dark"><?php $try = "SELECT * FROM `products`";
										$rr = mysqli_query($connect, $try);
										$eee = mysqli_num_rows($rr);
										echo $eee; ?> Products avalaible</li>
</ul>

						</div>
					</div>
				</div>
			</div>


	</div>
</body>
</html>


<!---------------- Modal Deleting PRODUCTS ------------->

<?php 
 $u_sql = "SELECT * FROM products";
$u_query = mysqli_query($connect, $u_sql);
$n = 1;
while ($user = mysqli_fetch_array($u_query)) {
?>
<div id="fetch<?php echo $user['id']; ?>" class="w-100 position-absolute position-fixed" style="background-color: rgba(0,0,0,0.5); min-height: 100%; top: 0; z-index: 2; display: none;">
<div class=" bg-dark w-100 text-light text-center position-absolute p-2" style="bottom: 0; ">Are you sure you want to <b class="text-danger"> DELETE</b> <?php echo $user['product']; ?>  
  
  permanently?

<a href="delete.php?del_product=<?php echo $user['id']; ?>"><button class="btn-success btn">Yes</button></a>
<span id="clear<?php echo $user['id']; ?>"><button class="btn-danger btn">No</button></span>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $("#del<?php echo $user['id']; ?>").click(function(){
  $("#fetch<?php echo $user['id']; ?>").toggle("slow");
  })
  $("#clear<?php echo $user['id']; ?>").click(function(){
  $("#fetch<?php echo $user['id']; ?>").hide("slow"); 
})
})                     
</script>
<?php } ?>

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