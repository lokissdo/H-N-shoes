<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="icon" href="public/icongame.jpg" type="image/.jpg">
    <link rel="stylesheet" href="asset/signup.css">
</head>
<body>
    <div class="box-form">
        <div class="loginform">
            <div class="loginform_container">
                <div class="loginform_title">Đăng ký</div>
                <div class="signup_instruct"> Đăng ký tài khoản để có trải nghiệm tốt nhất tại H&N SHOP</div>
                <div id="warning_signup" class="warning_signup">
                   <?php
                    $Error=0;
                   if (isset($_SESSION['mess'])){
                       if($_SESSION['mess']===1)
                            echo "<script > 
                                    window.onload=()=>{success();}
                                </script>";
                        else if($_SESSION['mess']===0){
                            echo" <script >
                                    window.onload=()=>{error(\"Tài khoản đã tồn tại!\");}
                                </script>";
                                $Error=1;
                        }
                        else {echo"<script >
                                    window.onload=()=>{ error(\"Something goes wrong :(!\");}
                                </script>";
                                $Error=1;
                        }
                        unset($_SESSION['mess']);     
                   }
                    if (isset($_POST['email'])){
                        require_once "api/signupProc.php";
                        $email=addslashes($_POST['email']);
                        $password=addslashes($_POST['password']);
                        $phonenumber=addslashes($_POST['phonenumber']);
                        $gender=isset($_POST['male'])?1:0;
                        $fullname=addslashes($_POST['fullname']);
                        $birthday=isset($_POST['birthday'])?addslashes($_POST['birthday']):NULL;
                        $res=createNewUser($password,$fullname,$gender,$email,$phonenumber,$birthday);
                        unset($_POST);
                        if($res!=1){
                            $_SESSION['phonenumber']=$phonenumber;
                            $_SESSION['gender']=$gender;
                            $_SESSION['fullname']=$fullname;
                            $_SESSION['birthday']=$birthday;
                        }
                        $_SESSION['mess']=$res;
                        header('location:'.$_SERVER['REQUEST_URI'].'');
                     }
                    ?> 
                </div>
                <form action="./signup.php" method="POST">
                    <div class="mainform">
                        <label for="signup_email"> Tên tài khoản(email) (*)</label>
                        <input id="signup_email" placeholder="email" type="email" name="email">
                        <label for="signup_password"> Mật khẩu (*)</label>
                        <input id="signup_password" placeholder="password" type="password" name="password" >
                        <input id="signup_password_again" placeholder="password again" type="password"  >
                        <label for="signup_fullname"> Họ và Tên (*)</label>
                        <input id="signup_fullname" placeholder="full name" type="text" name="fullname"
                        <?php if($Error){ echo " value=$_SESSION[fullname]";}?>
                         >
                        <label > Giới tính (*)</label>
                        <div class="container_gender">
                            <div class="container_gender_wrap">
                                <input id="signup_gender_male" type="checkbox" name="male" value="male"
                                <?php if($Error && $_SESSION['gender']===1){ echo " checked";}?>>
                                <label for="signup_gender_male"> Nam</label>
                            </div>
                           <div class="container_gender_wrap">
                                <input id="signup_gender_female" type="checkbox" name="female" value="female" 
                                <?php if($Error && $_SESSION['gender']===0){ echo " checked";}?>
                                >
                                <label for="signup_gender_female"> Nữ</label>
                            </div>                            
                        </div> 
                        <label for="signup_birthday"> Ngày sinh</label>
                        <input id="signup_birthday" placeholder="Ngày sinh" type="date" name="birthday"
                        <?php if($Error ){ echo " value= $_SESSION[birthday]";}?>>
                        <label for="signup_phonenumber"> Số điện thoại (*)</label>
                        <input id="signup_phonenumber" placeholder="phonenumber" type="number" name="phonenumber" 
                        <?php if($Error){ echo " value=$_SESSION[phonenumber]";}?>
                        >
                    </div>
                    <button id="button_signup" class="buttonlogin">Đăng ký</button>
                </form>
                <div class="bottomform">
                    <div class="required" ><span>*</span>: Bắt buộc</div>
                    <a href="./login.php">Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    if( $Error){
        unset( $_SESSION['phonenumber'],
        $_SESSION['gender'],
        $_SESSION['fullname'],
        $_SESSION['birthday']);
    }
    ?>
    <script src="./js/signup.js" ></script>
</body>
</html>
