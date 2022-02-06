<?php
	$id = $_GET['d'];
	require_once '../../root/connect.php';
	$qry = "select * from manufactures where id = $id";
	$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));

echo "<div id='manu_info'>";
echo "<div id= 'manu_info_column'>";
echo "<img id='manufactures_photo' src='".$result['photo']."'>";
echo "<div id='manufactures_detail'><h1>".$result['name']."</h1>";
echo "<label>Số điện thoại: </label><span>".$result['phone']."</span>";
echo "<label>Địa chỉ: </label><span>".$result['address']."</span>";
echo "<label>Mô tả: </label><span>".$result['description']."</span>";
echo "<button onclick=\"fix_page(".$id.")\">Sửa thông tin</button>";
echo "</div>";
echo "</div>";
echo "<div id='manufactures_right_detail_panel'>";
echo "<div id='manufactures_detail_products_list'></div>";
echo "<div></div>";
echo "<div></div>";
echo "</div>";
echo "</div>";
mysqli_close($ket_noi);