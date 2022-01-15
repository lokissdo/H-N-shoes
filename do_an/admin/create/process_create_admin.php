<?php
require_once '../../root/connect.php';
$name = mysqli_real_escape_string($ket_noi,$_POST['name']);
$phone = mysqli_real_escape_string($ket_noi,$_POST['phone']);
$address = mysqli_real_escape_string($ket_noi,$_POST['address']);
$gender = mysqli_real_escape_string($ket_noi,$_POST['gender']);
$birthday = mysqli_real_escape_string($ket_noi,$_POST['birthday']);
$email = mysqli_real_escape_string($ket_noi,$_POST['email']);
$photo = mysqli_real_escape_string($ket_noi,$_POST['photo']);
$password = mysqli_real_escape_string($ket_noi,$_POST['password']);
$access = mysqli_real_escape_string($ket_noi,$_POST['access']);

$regex_name = "/^[A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}(?: [A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}){0,8}$/";
$regex_phone = "/(84|0[3|5|7|8|9])+([0-9]{8})\b/";
$regex_address = "/^(?:Tỉnh|Thành phố) [A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zyàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}(?: [A-ZÀÁẢÃẠĂẮẰẲẴẶÂẤẦẨẪẬẸẺẼÈÉÊỀẾỂỄỆÌÍỈỊĨÒÓỌỎÕÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦĐƯỨỪỬỮỰỲỴÝỶỸ][a-zàáảãạăắằẳẵặâấầẩẫậẹẻẽèéêềếểễệìíỉịĩòóọỏõôốồổỗộơớờởỡợùúũụủđưứừửữựỳỵýỷỹ]{0,6}){0,3}$/";
$regex_email = "/^[\w\-\.]+@(?:[\w-]+\.)+[\w-]{2,4}$/";
$regex_password = "/^((?=.*[A-Z])(?=.*[0-9]).{8,}|(abc))$/";



if (preg_match($regex_email, $email) == 1 && preg_match($regex_password, $password) == 1 && preg_match($regex_name, $name) == 1 && preg_match($regex_phone, $phone) == 1 && preg_match($regex_address, $address) == 1){

	$insert = "insert into adm_list (name,phone,address,gender,birthday,email,photo,password,access)
	values ('$name','$phone','$address',b'$gender','$birthday','$email','$photo','$password',b'$access')";
	mysqli_query($ket_noi,$insert);
}
	mysqli_close($ket_noi);
	header('location:../admin_view.php?link=admin');
