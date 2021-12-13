<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login admin</title>
	<link rel="stylesheet" type="text/css" href="../root/overlay.css">


</head>
<body>

	<?php 
	require_once '../root/connect.php';
	if(isset($_GET['link'])){
	$link = $_GET['link'];
	} else {
		$link = 'admin';
	}
	if(isset($_GET['tim_kiem'])){
		$tim_kiem = $_GET['tim_kiem'];
	} else {
		$tim_kiem = "";
	} 
	$attachment = '';
	switch ($link) {
		case 'admin':
			$table = 'adm_list';
			$list = 'ava_list';
			break;
		case 'manufacturers':
			$table = 'manufactures';
			$list = 'detail_list';
			break;
		case 'client':
			$table = 'cli_list';
			$list = 'detail_list';
			break;
		case 'product':
			$table = 'products_list';
			$list = 'detail_list';
			break;
		case 'out':
			$table = 'out_list';
			$list = 'detail_list';
			$attachment = "join cli_list on $table.client_id = cli_list.id";
			break;
	}
	$sql = "select * from $table $attachment where name = $tim_kiem";
	$ket_qua = mysqli_query($ket_noi,$sql);




	?>


	<div id="main_div">
		<div id="nav_ver">
			<img src="//upload.wikimedia.org/wikipedia/vi/thumb/3/37/Bitis_logo.svg/501px-Bitis_logo.svg.png">
		<ul>
			<a href="#" class="active"><li>Danh sách</li></a>
			<a href="#"><li>Tổng quan</li></a>
		</ul>
		</div>
		
		<div id="compartment">


			<form action="add_search.php">
				<input type="text" name="tim_kiem" value="<?php echo $tim_kiem ?>">
				<input type="text" name="link" value="<?php echo $link ?>" hidden >
				<button type="submit">Tìm kiếm tên</button>
			</form>
		</div>
		
		<div id="nav_hor">
		<ul>


			<a href="admin_view.php?link=admin<?php echo ($tim_kiem) ? "&tim_kiem=$tim_kiem" : "" ?>" <?php if ($link == 'admin') {echo 'class="active"';} ?>>
				<li>Admin</li>
			</a>
			<a href="admin_view.php?link=manufacturers<?php echo ($tim_kiem) ? "&tim_kiem=$tim_kiem" : "" ?>" <?php if ($link == 'manufacturers') {echo 'class="active"';} ?>>
				<li>Nhà sản xuất</li>
			</a>
			<a href="admin_view.php?link=client<?php echo ($tim_kiem) ? "&tim_kiem=$tim_kiem" : "" ?>" <?php if ($link == 'client') {echo 'class="active"';} ?>>
				<li>Khách hàng</li>
			</a>
			<a href="admin_view.php?link=product<?php echo ($tim_kiem) ? "&tim_kiem=$tim_kiem" : "" ?>" <?php if ($link == 'product') {echo 'class="active"';} ?>>
				<li>Sản phẩm</li>
			</a>
			<a href="admin_view.php?link=out<?php echo ($tim_kiem) ? "&tim_kiem=$tim_kiem" : "" ?>" <?php if ($link == 'out') {echo 'class="active"';} ?>>
				<li>Đơn hàng</li>
			</a>
		</ul>
		</div>
			
		<?php include "$list.php"; ?>
			

		<div id="footer">
			
		</div>
	</div>

	<?php mysqli_close($ket_noi); ?>
</body>
</html>

