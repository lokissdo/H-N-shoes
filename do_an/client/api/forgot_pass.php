<?php 
include "start.php";
if (empty($_POST['email'])) {
    echo json_encode(-4);exit;
} 
$email=addslashes($_POST['email']);
include "connect.php";
$sql="SELECT id FROM `cli_list` WHERE email='$email'";
$res=mysqli_query($connect,$sql);
$res=mysqli_fetch_assoc($res);
//print_r($res);
if(empty($res['id'])){
    echo json_encode(0);
    exit;
}
else{
    $id=$res['id'];
}
$sql="SELECT cli_list.*,cli_forgot.* FROM `cli_forgot`
RIGHT JOIN cli_list ON cli_list.id=cli_forgot.cli_id
WHERE cli_list.email='$email' and cli_forgot.created_at>CURRENT_TIMESTAMP()-86400 ";
//die($sql);
$res=mysqli_query($connect,$sql);
$res=mysqli_fetch_all($res,MYSQLI_ASSOC);
//print_r($res);
if (count($res) > 1){
    echo json_encode(-1);
    exit;
}
include "mail.php";
$code=substr(md5(uniqid(mt_rand(), true)) , 0, 8);
date_default_timezone_set("Asia/Ho_Chi_Minh");
$time_insert=date('Y-m-d H:i:s',time());
$sql="INSERT INTO `cli_forgot` (`cli_id`, `code`,`created_at`) VALUES ('$id', '$code','$time_insert');";
$res=mysqli_query($connect,$sql);
echo json_encode(1);
if(!sendMail("Khôi phục mật khẩu", "Mã xác nhận của bạn là: <strong> $code </strong>",$email)) exit;

//die($sql);
//$res=mysqli_query($connect,$sql);
