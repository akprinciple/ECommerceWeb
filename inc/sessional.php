<?php 

include('inc/config.php');
session_start();
date_default_timezone_set('Africa/Lagos');

	# code...

$user_check = $_SESSION['id'];

$ses_sql = mysqli_query($connect, "SELECT * FROM users WHERE id = '$user_check'");
$counts = mysqli_num_rows($ses_sql);
$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
$login_session = $row['id'];


$_SESSION['firstname'] = $row['firstname'];
		$_SESSION['lastname'] = $row['lastname'];
		$_SESSION['email'] = $row['email'];

		$_SESSION['date'] = $row['date'];
if ($counts < 1) {
header("location:login.php");

}

 
        
if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
$ip = $_SERVER['HTTP_CLIENT_IP'];
}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
$ip = $_SERVER['REMOTE_ADDR'];
}
            
if (isset($ip)) {
$date = date('d/M/Y');
$sql  = "SELECT * FROM visitors WHERE date = '{$date}'";
$query = mysqli_query($connect, $sql);
$count = mysqli_num_rows($query);
if ($count == 0) {
$ins = "INSERT INTO visitors (times, date) VALUES ('1', '$date')";
$i_query = mysqli_query($connect, $ins);
}
else{
$s_sql = "SELECT * FROM visitors WHERE date = '{$date}'";
$s_query = mysqli_query($connect, $s_sql);
while ($p = mysqli_fetch_array($s_query)) {
$plus = $p['times'] + 1;
$ins = "UPDATE visitors SET times = '{$plus}' WHERE date = '{$date}'";
$i_query = mysqli_query($connect, $ins);
}
              
}
}



     ?>