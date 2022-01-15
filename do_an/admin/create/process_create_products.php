<?php
	require_once '../../root/connect.php';
	$name = mysqli_real_escape_string($ket_noi,$_POST['name']);
	$gender = mysqli_real_escape_string($ket_noi,$_POST['gender']);
	$category = mysqli_real_escape_string($ket_noi,$_POST['category']);
	$manufactures = mysqli_real_escape_string($ket_noi,$_POST['manufactures']);
	$price = (int)(mysqli_real_escape_string($ket_noi,$_POST['price']));
	$quantity = (int)(mysqli_real_escape_string($ket_noi,$_POST['quantity']));
	$description = mysqli_real_escape_string($ket_noi,$_POST['description']);
	$photo = mysqli_real_escape_string($ket_noi,$_POST['photo']);

	$regex_name = "/^[A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}(?: [\w\(\)\-\[\]\.\,]{0,15}){0,10}$/";
	if (preg_match($regex_name, $name) == 1 && $price > 0 && $quantity > 0) {
	$insert = "insert into products_list (name,gender_id,category_id,manufacturers_id,price,quantity,description,photo)
				values ('$name','$gender','$category','$manufactures','$price','$quantity','$description','$photo')";
	mysqli_query($ket_noi,$insert);
}
	mysqli_close($ket_noi);
	header('location:../admin_view.php?link=product');