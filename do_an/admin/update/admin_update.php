<?php 
	require_once '../../root/connect.php';
	$id = mysqli_real_escape_string($ket_noi,$_POST['id']);
	$name = mysqli_real_escape_string($ket_noi,$_POST['name']);
	$phone = mysqli_real_escape_string($ket_noi,$_POST['phone']);
	$address = mysqli_real_escape_string($ket_noi,$_POST['address']);
	$gender = (mysqli_real_escape_string($ket_noi,$_POST['gender']) === 'Nam' ? 1 : 0);
	$birthday = mysqli_real_escape_string($ket_noi,$_POST['birthday']);

	$regex_name = "/^[A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}(?: [A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}){0,8}$/";
	$regex_phone = "/(84|0[3|5|7|8|9])+([0-9]{8})\b/";
	$regex_address = "/^(?:Tỉnh|Thành phố) [A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zyàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}(?: [A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}){0,3}$/";
	
	if (preg_match($regex_name, $name) == 1 && preg_match($regex_phone, $phone) == 1 && preg_match($regex_address, $address) == 1) {
	$update_sql = "update adm_list 
	set 
	name = '$name', 
	phone = '$phone', 
	address = '$address', 
	gender = b'$gender', 
	birthday = '$birthday' 
	where id = '$id'";
	
	mysqli_query($ket_noi,$update_sql);
}
	mysqli_close($ket_noi);
	header("location:../admin_view.php?link=admin");
