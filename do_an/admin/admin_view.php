<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login admin</title>
	<link rel="stylesheet" type="text/css" href="../root/overlay.css">

</head>
<body>
	<div id="main_div">
		<div id="nav_ver">
			<img src="//upload.wikimedia.org/wikipedia/vi/thumb/3/37/Bitis_logo.svg/501px-Bitis_logo.svg.png">
		<ul>
			<a href="#" class="active"><li>Danh sách</li></a>
			<a href="#"><li>Tổng quan</li></a>
		</ul>
		</div>
		
		<div id="compartment">
			<form>
				<input type="text" name="tim_kiem">
				<button>Tìm kiếm</button>
			</form>
		</div>
		
		<div id="nav_hor">
		<ul>
			<a href="admin_view.php?link=admin" class="active"><li>Admin</li></a>
			<a href="admin_view.php?link=manufacturers"><li>Nhà sản xuất</li></a>
			<a href="admin_view.php?link=client"><li>Khách hàng</li></a>
			<a href="admin_view.php?link=in"><li>Đơn nhập</li></a>
			<a href="admin_view.php?link=out"><li>Đơn xuất</li></a>
		</ul>
		</div>
		<div id="main_body">
			<div class="items"></div>
			<div class="items"></div>
			<div class="items"></div>
			<div class="items"></div>
			<div class="items"></div>
			<div class="items"></div>
			<div class="items"></div>
			<div class="items"></div>

			<div id="page"></div>
		</div>
		<div id="footer">
			
		</div>
	</div>
</body>
</html>