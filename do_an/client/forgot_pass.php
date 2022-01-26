<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="icon" href="public/icongame.jpg" type="image/.jpg">
    <link rel="stylesheet" href="asset/forgot_pass.css">
</head>
<body>
    <div class="box-form">
        <div class="loginform">
            <div class="loginform_container">
                <div class="loginform_title">Quên mật khẩu</div>
                <div id="message" class="warning_signup">              
                </div>
                <form  id="forgot_pass"method="POST">
                    <div class="mainform">
                        <label for="signup_email"> Tên tài khoản(email) (*)</label>
                        <input id="signup_email" placeholder="email" type="email" name="email">
                        <label for="signup_password"> Mật khẩu mới (*)</label>
                        <input id="new_password" placeholder="password" type="password" name="password" >
                        <input id="new_password_again" placeholder="password again" type="password"  >
                       
                    </div>
                    <button id="button_forgot" class="buttonlogin">Gửi</button>
                </form>
                <form id="code" class="hidden"  method="POST">
                    <div>Vào mail của bạn để nhận mã</div>
                    <div class="timer-con">Mã còn hiệu lực trong:<span class="timer"> </span></div>
                    <div class="mainform">
                        <label for="password_code"> Mã xác nhận (*)</label>
                        <input id="password_code" placeholder="Mã xác nhận" type="text" name="code" >              
                    </div>
                    <button id="button_confirm" class="buttonlogin">Xác nhận</button>
                </form>
                <div class="bottomform">
                    <div class="required" ><span>*</span>: Bắt buộc</div>
                    <a href="./login.php">Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>
    <?php ?>
    <script src="./js/forgot_pass.js" ></script>
</body>
</html>
