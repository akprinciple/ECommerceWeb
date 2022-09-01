<?php include 'inc/session.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Users | Repamoderndtech.com</title>
	<?php include 'inc/link.php'; ?>
</head>
<body>
	<div class="row mx-0">
		<?php include 'inc/sidebar.php'; ?>
		<div class="col-md-10">

<h4  class=" font-weight-bold ">All Users</h4>
<hr>
<table class="table-responsive-xl m-auto table-striped mt-4 table text-center table-bordered font-weight-bold ">

<thead class="" style">
	<tr>
		<th class="">S/N</th>
		<th class="">Name</th>
		<th class="">Email</th>
		<th>Password</th>
		<th class="">Roles</th>
		

		<th class="">Actions</th>


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

	$result_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM `users`");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
	$total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1

		 $result = mysqli_query($connect, "SELECT * FROM `users` ORDER BY id DESC LIMIT $offset, $total_records_per_page");
		 


	$n = 1;
	while ($rw = mysqli_fetch_array($result)) {
	 	$date = $rw['date'];
	 	$firstname = $rw['firstname'];
	 	$lastname = $rw['lastname'];
	 	$id = $rw['id']; 
	 ?>
	<tr>
		<td class=""><?php echo $n++; ?></td>
<!------------------------------- Username ----------------------------->
		<td class=""><?php echo $firstname." ". $lastname; ?></td>


			<!------------------------------- Date ----------------------------->

		<td>
			<a href="mailto:<?php echo $rw['email']; ?>"><?php echo $rw['email']; ?></a>
		</td>
		<td><?php echo $rw['password']; ?></td>
		<td>
			<?php 
			if ($rw['level'] == 1) {
				echo "Admin";
			}else{
				echo "Customer";
			}
				 ?>
			</td>

		<td class="">
<!------------------------------- View Button ----------------------------->

			
<!------------------------------- Status Button  ----------------------------->

<!------------------------------- Delete Button ----------------------------->
	<!-- $row['level'] -->
	
		<span id="del<?php echo $rw['id']; ?>" class="fas fa-times text-danger" title="Delete"></span>
		</td>
 <!-- href="deletemember.php?delete=<?php echo $rw['id']; ?> -->

	</tr>
<?php } ?>
</tbody>
</table>


<ul class="pagination mt-3">
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
<!-------------------  For the number of posts available ---------------------->
<li class=" border border-secondary p-1 font-weight-bold ml-3"><?php $try = "SELECT * FROM `users`";
	$rr = mysqli_query($connect, $try);
	$eee = mysqli_num_rows($rr);
	echo $eee; ?> Users</li>
</ul>

</div>
		</div>
	</div>

</body>
</html>

<!---------------- Modal Deleting PRODUCTS ------------->

<?php 
 $u_sql = "SELECT * FROM users";
$u_query = mysqli_query($connect, $u_sql);
$n = 1;
while ($user = mysqli_fetch_array($u_query)) {
?>
<div id="fetch<?php echo $user['id']; ?>" class="w-100 position-absolute position-fixed" style="background-color: rgba(0,0,0,0.5); min-height: 100%; top: 0; z-index: 2; display: none;">
<div class=" bg-dark w-100 text-light text-center position-absolute p-2" style="bottom: 0; ">Are you sure you want to <b class="text-danger"> DELETE</b> <?php echo $user['firstname']. " " . $user['lastname']; ?>  
  
  permanently?

<a href="delete.php?del_user=<?php echo $user['id']; ?>"><button class="btn-success btn">Yes</button></a>
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