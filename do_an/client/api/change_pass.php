<?php 
include "authenticate.php";
 if(!Authenticate() || empty($_POST) ){
    echo json_encode(0);
     header("Location: ../");
     exit;
 }
include "connect.php";
foreach($_POST as $key=>$val){
    if(empty($val)){
        echo json_encode(0);
        exit;
    }
}
// -2. Trùng pass mới và pass mới again
// -1. Loi không mật khẩu cũ chính xác
// 0. Thiếu thông tin
// 1. Thành công
$sql="SELECT `password` FROM `cli_list` WHERE `id`=$_SESSION[id]";
$res=mysqli_query($connect,$sql);
$res=mysqli_fetch_assoc($res);
if (!password_verify($_POST['password'],$res['password'])){
    echo json_encode(-1);
    exit;
}
$hash=password_hash($_POST['new_password'],PASSWORD_DEFAULT);
$sql="UPDATE `cli_list` SET `password`='$hash' WHERE `id` = $_SESSION[id]";

$res=mysqli_query($connect,$sql);
$loi=mysqli_error($connect);
if ($loi){
    echo $loi;
}else {
    echo json_encode(1);
}