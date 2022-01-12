<<<<<<< HEAD
<<<<<<< HEAD
<?php 
	$id = $_POST['id'];

	require_once '../../root/connect.php';

	$delete_sql = "delete from products_list where id = '$id'";
	mysqli_query($ket_noi,$delete_sql);
	mysqli_close($ket_noi);
=======
=======
>>>>>>> dd59bda (update main to hung)
<?php 
	$id = $_POST['id'];

	require_once '../../root/connect.php';

	$delete_sql = "delete from products_list where id = '$id'";
	mysqli_query($ket_noi,$delete_sql);
	mysqli_close($ket_noi);
<<<<<<< HEAD
>>>>>>> dd59bda (update main to hung)
=======
>>>>>>> dd59bda (update main to hung)
	header('location:../admin_view.php?link=product');