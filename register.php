<?php 
	include 'inc/config.php';
	$msg = "";
	if (isset($_POST['submit'])) {
				$firstname = mysqli_real_escape_string($connect, $_POST['firstname']);
				$lastname = mysqli_real_escape_string($connect, $_POST['lastname']);
				$password = mysqli_real_escape_string($connect, $_POST['password']);
				$confirm_password = mysqli_real_escape_string($connect, $_POST['confirm_password']);
				$email = mysqli_real_escape_string($connect, $_POST['email']);
			
				$date = date('Y-m-d h:ma');
					// date_default_timezone_get();
					
				if ($password != $confirm_password) {
					$msg = "Re-confirm your password";
				}
				else{
					$sel = "SELECT * FROM users WHERE email = '$email'";
					$res = mysqli_query($connect, $sel);
					$count = mysqli_num_rows($res);
					if ($count > 0) {
						$msg = "<b class='text-danger'>Email already exist</b>";
						}
						else{
						$sql = "INSERT INTO users (firstname, lastname, password, email, date) VALUES ('$firstname', '$lastname', '$password', '$email', '$date')";
						$query = mysqli_query($connect, $sql);
						if ($query) {
							// header('location:login.php');
							$msg = "Registration Successful";
						}
						else{
							$msg = "Try again";
						}
						}
						}
					}
						



 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Account | <?php 
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
			<span class="border-bottom border-danger mt-2">CREATE ACCOUNT</span>
		</h3>

		
			<div class="col-md-7 m-auto">
				<p>If you already have an account with us, click <a href="login.php">here</a> to login</p>
				<h3>Your Personal Details</h3>
				<div class="text-center">
					<?php echo $msg; ?>
				</div>
				<form method="post" enctype="multipart/form-data" class="mt-4 form-group">
					<label for="firstname"><span class="text-danger font-weight-bold">*</span> First Name:</label>
					<input type="text" name="firstname" placeholder="First Name" required="required" class="form-control mb-3" id="firstname">

					<label for="lastname"><span class="text-danger font-weight-bold">*</span> Last Name:</label>
					<input type="text" name="lastname" placeholder="Last Name" required="required" class="form-control mb-3" id="lastname">

					<label for="email"><span class="text-danger font-weight-bold">*</span> E-mail:</label>
					<input type="email" name="email" placeholder="E-mail" required="required" class="form-control" id="email">

					<label for="password" class="mt-3"><span class="text-danger font-weight-bold">*</span> Password</label>
					<input type="password" name="password" placeholder="*****" required="required" class="form-control" id="password">

					<label for="confirm_password" class="mt-3"><span class="text-danger font-weight-bold">*</span>Confirm Password</label>
					<input type="password" name="confirm_password" placeholder="Re-type your Password" required="required" class="form-control" id="confirm_password">


					<input type="submit" name="submit" class="btn btn-danger mt-3 float-right" style="border-radius: 30px">
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	
		<?php include 'inc/footer.php'; ?>
