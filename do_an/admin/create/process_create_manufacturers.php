<?php
	$name = strip_tags($_POST['name']);
	$phone = strip_tags($_POST['phone']);
	$address = strip_tags($_POST['address']);
	$description = strip_tags($_POST['description']);
	$photo = strip_tags($_POST['photo']);

	require_once '../../root/connect.php';
	$insert = "insert into manufactures (name,phone,address,description,photo)
				values ('$name','$phone','$address','$description','$photo')";
	mysqli_query($ket_noi,$insert);
	mysqli_close($ket_noi);
	header('location:../admin_view.php?link=manufacturers');