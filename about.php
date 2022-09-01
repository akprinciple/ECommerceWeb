<?php 
	include 'inc/session.php';

	

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>About Us | <?php 
        $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 7");
        $links = mysqli_fetch_array($link);
        echo $links['link'];
     ?></title>
	<?php include 'inc/link.php'; ?>
</head>
<body style="background-color: ghostwhite;">
	<?php include 'inc/header.php'; ?>

	<div class="px-5 bg-white">
		<h3 class="text-center pt-2 mb-4 border-bottom">
			<span class="border-bottom border-danger mt-2">ABOUT US</span>
		</h3>

		<div class="mb-3 row mx-0 mt-4">
			<div class="col-md-5">
				<?php 
					$image = mysqli_query($connect, "SELECT * FROM profile WHERE id = 1");
					while ($rw = mysqli_fetch_array($image)) {
						
						?>
						<img src="images/<?php echo $rw['text'];  ?>" class="card-img">
						<?php
					}
				 ?>
			</div>
			<div class="col-md-6 px-3">
				<?php
				$select = mysqli_query($connect, "SELECT * FROM pages WHERE id = 2");
					while ($row = mysqli_fetch_array($select)) {
						
						?>
						<div>
						<p class="text-right text-muted border-bottom">Last Update: <?php echo $row['date']; ?></p>

						<p>
							<?php echo $row['content']; ?>
						</p>
						</div>
					<?php } ?>
			</div>
		</div>

	</div>


		<?php include 'inc/footer.php'; ?>
