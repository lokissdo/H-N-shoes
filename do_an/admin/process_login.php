<?php

$email = $_POST['email'];
$password = $_POST['password'];

require_once '../root/connect.php';

$sql = "select * from adm_list 
where email = '$email' and  password = '$password'";

$result = mysqli_query($ket_noi,$sql);
if(mysqli_num_rows($result) == 1){
	$each = mysqli_fetch_array($result);
	session_start();
	$_SESSION['id'] = $each['id'];
	$_SESSION['name'] = $each['name'];
	$_SESSION['access'] = $each['access'];
	header('location:admin_view.php');
	exit();
}
header('location:admin_view.php');