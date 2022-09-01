<?php 
	include 'inc/config.php';

	session_start();
			$msg = $username = "";

			if (isset($_POST['submit'])) {
				$email = mysqli_real_escape_string($connect, $_POST['email']);
				$password = mysqli_real_escape_string($connect, $_POST['password']);

				$sql = "SELECT * FROM  users WHERE email = '{$email}' AND password = '{$password}'";
				$query = mysqli_query($connect, $sql);
				$row = mysqli_fetch_array($query);
				$count = mysqli_num_rows($query);
				if ($count > 0) {
					$_SESSION['id'] = $row['id'];
					if ($row['level'] == 0) {
						# code...
					header('location:index.php');
					}elseif ($row['level'] == 1) {
					header('location:admin/index.php');
						
					}
				}
				else{
					$msg = "Wrong Username/Password";
				}
			}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Account | <?php 
        $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 7");
        $links = mysqli_fetch_array($link);
        echo $links['link'];
     ?></title>
	<?php include 'inc/link.php'; ?>
</head>
<body style="background-color: ghostwhite;">

	<?php include 'inc/header.php'; ?>
	<div class="px-5 bg-white">
		<h3 class="text-center pt-2 pb-4 border-bottom">
			<span class="border-bottom border-danger mt-2">ACCOUNT</span>
		</h3>

		<div class="row mt-5">
			<div class="col-md-5 pl-5 ">
				<h3 class="">New Customer</h3>
				<p class="font-weight-bold">Register Account</p>
				<p class="text-justify">
					By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.
				</p>
				<p class="my-3">
				<a href="register.php" class="btn-danger btn text-light text-decoration-none" style="border-radius: 30px; ">Register</a>
			</p>
			</div>
			<div class="col-md-5">
				<h3>Returning Customer</h3>
				<b>I am a returning customer</b>
				<div><?php echo $msg; ?></div>
				<form method="post" enctype="multipart/form-data" class="mt-4 form-group">
					<label for="email"><span class="text-danger font-weight-bold">*</span> E-mail:</label>
					<input type="email" name="email" placeholder="E-mail" required="required" class="form-control" id="email">

					<label for="password" class="mt-3"><span class="text-danger font-weight-bold">*</span> Password</label>
					<input type="password" name="password" placeholder="*****" required="required" class="form-control" id="password">


					<input type="submit" name="submit" class="btn btn-danger mt-3 float-right" style="border-radius: 30px">
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
			<?php include 'inc/footer.php'; ?>
