<?php
	$id = $_GET['d'];
	require_once '../../root/connect.php';
	$qry = "select * from adm_list where id = $id";
	$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));

if($result['access'] == 1){
	echo 'Bạn không có quyền truy cập hồ sơ này';
	sleep(20);
	echo "<script type='text/javascript'>location.reload()</script>" 
} else {
echo 	"<img id='adm_photo' src='".$result['photo']."'><br>";
echo 	"<div>
			Tên nhân viên: ".$result['name']."<br>";
echo	"Giói tính: ";
if ($result['gender'] == 1){
	echo "Nam";
} else {
	echo "Nữ";
}
echo  "<br>";
echo "Số điện thoại: ".$result['phone']."<br>";
echo	"Địa chỉ: ".$result['address']."<br>";
echo	"Sinh nhật: ".$result['birthday']."<br>";
}