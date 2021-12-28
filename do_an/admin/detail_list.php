		<div id="main_list">
			<?php 
			switch ($link) {
				case 'product':
				?>
				<div class="list_items">
					<div>Tên sản phẩm</div>
					<div>Giá sản phẩm</div>
					<div>Nhà sản xuất</div>
					<div>Mô tả</div>
				</div>
				<?php
				foreach ($ket_qua as $each) {
					?>
					<div class="list_items">
						<div><?php echo $each['name']; ?></div>
						<div><?php echo $each['price']; ?></div>
						<div><?php echo $each['manufactures_name'];?></div>
						<div><?php echo $each['description'];?></div>
					</div>
				<?php 	};	
				break;
				case 'out':
				?>
				<div class="list_items">
					<div>Thông tin người đặt hàng</div>
					<div>Thông tin người nhận hàng</div>
					<div>Thời gian đặt hàng</div>
					<div>Tình trạng</div>
				</div>
				<?php 
				foreach ($ket_qua as $each) {
					?>
					<div class="list_items">
						<div>
							<?php echo "Tên: ".$each['name'];?><br>
							<?php echo "Địa chỉ: ".$each['address'];?><br>
							<?php echo "Số điện thoại: ".$each['phone']; ?>
						</div>
						<div>
							<?php echo "Tên người nhận: ".$each['receiver_name'];?><br>
							<?php echo "Địa chỉ người nhận: ".$each['receiver_address'];?><br>
							<?php echo "Số điện thoại người đặt: ".$each['receiver_phone']; ?>
						</div>
						<div><?php echo $each['order_time'];?></div>
						<div><?php echo $each['note'];?></div>
					</div>
				<?php 	};	
				break;
				case 'manufacturers':
				if($_SESSION['accesss'] == 1) {
				?>
				<div class="list_items">
					<div>Tên nhà sản xuất</div>
					<div>Mô tả về nhà sản xuất</div>
					<div>Số điện thoại</div>
					<div>Địa chỉ</div>
				</div>
				<?php 
				foreach ($ket_qua as $each) {
					?>
					<div class="list_items">
						<div><?php echo $each['name']; ?></div>
						<div><?php echo $each['description']; ?></div>
						<div><?php echo $each['phone'];?></div>
						<div><?php echo $each['address'];?></div>
					</div>
				<?php };
				} else{header('location:logout.php');};
				break;
				default:
				header('location:logout.php');
				exit();
			}
			?>
			<div id="page_list">
				<?php for ($i=1 ; $i <= $max_page ; $i++) 
				{ ?>
					<a href="?link=<?php echo $link?><?php echo ($tim_kiem) ? "&tim_kiem=$tim_kiem" : "" ?>&page=<?php echo $i?>"><?php echo $i ?></a>	
				<?php }; ?>
			</div>
		</div>