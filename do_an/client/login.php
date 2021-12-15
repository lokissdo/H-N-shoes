<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="public/icongame.jpg" type="image/.jpg">
    <link rel="stylesheet" href="asset/login.css">
</head>
<body>
    <div class="box-form">
        <div class="intro">
            <div class="intro_overlay">
                <div class="intro_container">
                    <div class="intro_title">H&N SHOP</div>
                    <div class="intro_description">Chào mừng các bạn đến với website của chúng tôi! Hãy đăng nhập để có những trải nghiệm tốt nhất</div>
                    <div class="intro_text_sociallogin">Login with social media</div>
                    <div class="intro_sociallogin">
                        <a href="https://www.facebook.com"><img class="sociallogin-icon" src="https://img.icons8.com/fluency/40/000000/facebook-new.png"/></a>
                        <a href="https://www.facebook.com"><img class="sociallogin-icon" src="https://img.icons8.com/color/40/000000/gmail-new.png"/></a>
                        <a href="https://www.facebook.com"><img class="sociallogin-icon" src="https://img.icons8.com/fluency/40/000000/twitter.png"/></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="loginform">
            <div class="loginform_container">
                <div class="loginform_title">Login</div>
                <div class="loginform_instruct">
                    Don't have an account? 
                    <a href="./signup.php"class="signup">Creat Your Account</a> it takes less than a minute
                </div>
                <div id="warning_signin">
                <?php
                    if (isset($_POST['email'])){
                        require_once "api/signinProc.php";
                        $email=$_POST['email'];
                        $password=$_POST['password'];
                        $res=verifyUser($email,$password);
                       // echo "$email $password";
                        if(!$res){
                            echo "  <script > 
                                        window.onload=()=>{error(); }
                                    </script>";
                        }
                        else {
                            header("Location: ./home.php");
                        }
                    }; 
                        ?>
                    </div>
                <form action="./login.php" method="POST">
                    <div  class="mainform">
                        <input id="login_username" placeholder="username" type="text" name="email">
                        <input id="login_password" placeholder="password" type="password" name="password">
                    </div>
                    <div class="loginform_saved_forgotpassword">
                        <div class="savedpassword">
                            <input type="checkbox" id="checkbox"> 
                            <label for="checkbox">Nhớ mật khẩu</label>         
                        </div>
                        <div class="forgotpassword"> Quên mật khẩu</div>
                    </div>
                    <button id="button_login" class="buttonlogin">Login</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    <script src="./js/signin.js"></script>
</body>
</html>