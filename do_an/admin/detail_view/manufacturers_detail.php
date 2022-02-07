<?php
	$id = $_GET['d'];
	require_once '../../root/connect.php';
	$qry = "select * from manufactures where id = $id";
	$result = mysqli_fetch_array(mysqli_query($ket_noi,$qry));

echo "<div id='manu_info'>";
echo 	"<div id= 'manu_info_column'>";
echo 		"<img id='manufactures_info_photo' src='".$result['photo']."'>";
echo 		"<div id='manufactures_info_detail'><h1>".$result['name']."</h1>";
echo 				"<label>Số điện thoại: </label><span>".$result['phone']."</span>";
echo 				"<label>Địa chỉ: </label><span>".$result['address']."</span>";
echo 				"<label>Mô tả: </label><span>".$result['description']."</span>";
echo 				"<button onclick=\"fix_page(".$id.")\">Sửa thông tin</button>";
echo 		"</div>";
echo 	"</div>";

	$qry_list = "select * from out_product left join products_list on out_product.product_id = products_list.id left join manufactures on products_list.manufacturers_id = manufactures.id left join out_list on out_list.id = out_product.out_id where manufactures.id = 1 && datediff(NOW(),out_list.order_time) >= 0 && datediff(NOW(),out_list.order_time) <= ?;";
	$stmt = $ket_noi->prepare($qry_list);
	$stmt->bind_param("i", 30);
	$stmt

echo 	"<div id='manufactures_right_detail_panel'>";
echo 		"<div id='manufactures_info_detail_products_list'>";
echo 			"<div class='manufactures_info_detail_products_list_header'>
					<h1>Thống kê sản phẩm của ".$result['name']."</h1>
				</div>";
echo 			"<div class='manufactures_info_detail_products_list_rows'>
					<div class=\"align_center\">Tên sản phẩm</div>
					<div class=\"align_center\">Tổng số sản phẩm theo tuần</div>
					<div class=\"align_center\">Tổng số sản phẩm theo tháng</div>
				</div>";				
echo		"</div>";
echo 		"<div></div>";
echo 		"<div></div>";
echo 	"</div>";
echo "</div>";
mysqli_close($ket_noi);