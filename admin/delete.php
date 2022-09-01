<?php
include '../inc/config.php';

if (isset($_GET['del_user'])) {
$id = (int)$_GET['del_user'];
$sql = "DELETE FROM users WHERE id = '{$id}'";
$query = mysqli_query($connect, $sql);
header("location: users.php");
}

if (isset($_GET['del_product'])) {
$id = (int)$_GET['del_product'];
$sql = "DELETE FROM products WHERE id = '{$id}'";
$query = mysqli_query($connect, $sql);
header("location: products.php");
}

if (isset($_GET['del_trash'])) {
$id = $_GET['del_trash'];
$sql = "DELETE FROM categories WHERE md5(id) = '{$id}'";
$query = mysqli_query($connect, $sql);
header("location: categories.php");
}

if (isset($_GET['del_report'])) {
$id = (int)$_GET['del_report'];
$sql = "DELETE FROM scores WHERE id = '{$id}'";
$query = mysqli_query($connect, $sql);
header("location: results.php");
}
if (isset($_GET['del_material'])) {
$id = (int)$_GET['del_material'];
$select = "SELECT * FROM materials WHERE id = '{$id}'";
$d_query = mysqli_query($connect, $select);
while ($rw = mysqli_fetch_array($d_query)) {
$file = $rw['file'];

unlink("../materials/$file");
 
}
$sql = "DELETE FROM materials WHERE id = '{$id}'";
$query = mysqli_query($connect, $sql);


header("location: materials.php");
}
if (isset($_GET['del_report'])) {
$id = (int)$_GET['del_report'];
$sql = "DELETE FROM report WHERE id = '{$id}'";
$query = mysqli_query($connect, $sql);
header("location: results.php");
}
if (isset($_GET['del_project'])) {
$id = (int)$_GET['del_project'];
$sql = "DELETE FROM projects WHERE id = '{$id}'";
$query = mysqli_query($connect, $sql);
header("location: projects.php");
}

if (isset($_GET['del_submission'])) {
$id = (int)$_GET['del_submission'];
$sql = "DELETE FROM submissions WHERE id = '{$id}'";
$query = mysqli_query($connect, $sql);
header("location: submissions.php");
}
?>