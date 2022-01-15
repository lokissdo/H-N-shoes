<?php 
	require_once '../../root/connect.php';
	$id = mysqli_real_escape_string($ket_noi,$_POST['id']);

	$delete_sql = "delete from products_list where id = '$id'";
	mysqli_query($ket_noi,$delete_sql);
	mysqli_close($ket_noi);
	header('location:../admin_view.php?link=product');