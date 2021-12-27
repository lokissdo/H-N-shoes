<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login admin</title>
	<link rel="stylesheet" type="text/css" href="../root/overlay_login.css">
</head>
<body>
	<div id="main_body">
		<div id="logo">
			<img src="//upload.wikimedia.org/wikipedia/vi/thumb/3/37/Bitis_logo.svg/501px-Bitis_logo.svg.png">
		</div>
		<form method="post" action="process_login.php">
			<div id="form_body">
				
				<h1>Đăng nhập</h1>
				<input type="email" class="form_margin input" name="email" placeholder="Email">
				<div id="username_error" class="form_margin error"></div>
				<input type="password" name="password" class="form_margin input" placeholder="Mật khẩu">
				<div id="password_error" class="form_margin"></div>
				<div class="form_margin">
					<input type="checkbox" name="remember" class="form_margin error">
					Nhớ mật khẩu?
				</div>
				<button type="submit" class="form_margin input">Đăng nhập</button>
				
			</div>
		</form>
	</div>
</body>
</html>