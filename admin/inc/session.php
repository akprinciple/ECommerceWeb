<?php 

    session_start();
  include('inc/config.php');
    $user_check = $_SESSION['id'];

    $ses_sql = mysqli_query($connect, "SELECT * FROM users WHERE id = '$user_check' && level = 1");
    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    // $login_session = $row['id'];
    $count = mysqli_num_rows($ses_sql);

    if (!isset($_SESSION['id'])) {
      header("location: ../login.php");

    }
     if ($count < 1) {
      header("location: ../login.php");

    }

    $_SESSION['firstname'] = $row['firstname'];
		$_SESSION['lastname'] = $row['lastname'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['date'] = $row['date'];
    // $_SESSION['gender'] = $row['gender'];
    // $_SESSION['phone'] = $row['phone'];
    // $_SESSION['address'] = $row['address'];
    // $_SESSION['nationality'] = $row['nationality'];

        // $_SESSION['username'] = $row['username'];
               ?>