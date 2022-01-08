<?php
	$name = strip_tags($_POST['name']);
	$phone = strip_tags($_POST['phone']);
	$address = strip_tags($_POST['address']);
	$gender = strip_tags($_POST['gender']);
	$birthday = strip_tags($_POST['birthday']);
	$email = strip_tags($_POST['email']);
	$photo = strip_tags($_POST['photo']);
	$password = strip_tags($_POST['password']);
	$access = strip_tags($_POST['access']);

	require_once '../../root/connect.php';

	$insert = "insert into adm_list (name,phone,address,gender,birthday,email,photo,password,access)
				values ('$name','$phone','$address',b'$gender','$birthday','$email','$photo','$password',b'$access')";
	mysqli_query($ket_noi,$insert);
	mysqli_close($ket_noi);
	header('location:../admin_view.php?link=admin');
