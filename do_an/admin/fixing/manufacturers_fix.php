<?php
	$id = $_GET['d'];
	require_once '../../root/connect.php';
	$qry = "select * from manufactures where id = '$id'";
	$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));

echo "<div id='manu_info'>";
echo "<img id='manufactures_photo' src='".$result['photo']."'>";
echo "<form method=\"post\" action=\"update/manufactures_update.php\">
		<input type='hidden' name='id' value='".$id."'>
Tên nhà sản xuất: <input type='text' name='name' value='".$result['name']."'><br>
<div class=\"name_error\"></div>";
echo "Số điện thoại: <input type='text' name='phone' value='".$result['phone']."'><br>
<div class=\"phone_error\"></div>";
echo "Địa chỉ: <input type='text' name='address' value='".$result['address']."'><br>
<div class=\"address_error\"></div>";
echo "Mô tả: <textarea name='description' value='".$result['description']."'></textarea><br>";
echo "<button type=\"submit\" class='submit_form'>Sửa thông tin</button>";
echo "</form>";
echo "</div>";

mysqli_close($ket_noi);