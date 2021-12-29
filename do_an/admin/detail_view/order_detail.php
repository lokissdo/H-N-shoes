<?php 
	$id = $_GET['d'];
	require_once '../../root/connect.php';
	$qry = "select out_list.*,cli_list.*,receipt_history.*,adm_list.name as adm_name from out_list join cli_list on out_list.client_id = cli_list.id join receipt_history on out_list.id = receipt_history.out_id left join adm_list on receipt_history.adm_id = adm_list.id where out_list.id = $id";
	$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));
	print_r($result);
	echo "<br>";
	$sql_order = "select out_list.*,out_product.*,products_list.name as product_name from out_list join out_product on out_list.id = out_product.out_id join products_list on out_product.product_id = products_list.id where out_list.id = $id";
	$full_order = mysqli_fetch_array(mysqli_query($ket_noi,$sql_order));
	print_r($result);