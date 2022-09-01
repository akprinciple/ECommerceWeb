<?php 

include('config.php');
function getUser(){
$sql  = "SELECT * FROM records";
$query = mysqli_query($connect, $sql);
echo "Good";
}


 ?>