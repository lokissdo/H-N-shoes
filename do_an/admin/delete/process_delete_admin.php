<?php 
	require_once '../../root/connect.php';
	$id = mysqli_real_escape_string($ket_noi,$_POST['id']);

	$delete_sql = "delete from adm_list where (id = '$id') and (access == 0)";
	mysqli_query($ket_noi,$delete_sql);
	mysqli_close($ket_noi);
	header('location:../admin_view.php?link=admin');