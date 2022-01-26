<?php 
include "start.php";
if(empty($_POST)){
   exit;
}
foreach ($_POST as $val){
    if(empty($val)) {
        echo json_encode(-4);
        exit;
    }
}
$email=addslashes($_POST['email']);
$password=addslashes($_POST['password']);
$code=addslashes($_POST['code']);
include "connect.php";
$sql="SELECT * FROM `cli_forgot` 
JOIN cli_list ON cli_list.id=cli_forgot.cli_id
WHERE cli_list.email='$email' 
ORDER BY cli_forgot.id_forgot DESC
LIMIT 1;";
$res=mysqli_query($connect,$sql);
$res=mysqli_fetch_all($res,MYSQLI_ASSOC);

// if email doesn't exist
if(count($res)==0){
    echo json_encode(0);
    exit;
}

// if wrong code
if($res[0]['code']!=$code){
    echo json_encode(-3);
    exit;
}
const waiting_time=80;
const delay_time=10;
date_default_timezone_set("Asia/Ho_Chi_Minh");
$diff=time()-strtotime($res[0]['created_at']);
// if time is due

if($diff > waiting_time+delay_time){
    echo json_encode(-5);
    exit;
}

// update password
$id=$res[0]['id'];
$id_forgot=$res[0]['id_forgot'];
echo json_encode(1);
$hash=password_hash($password,PASSWORD_DEFAULT);
$sql="UPDATE `cli_list` SET `password`='$hash' WHERE `id` = '$id'";
$res=mysqli_query($connect,$sql);

// update forgot_cli
$time_update=date('Y-m-d H:i:s',time()-100);
$sql="UPDATE `cli_forgot` SET `created_at`='$time_update' WHERE `id_forgot` = '$id_forgot'";
$res=mysqli_query($connect,$sql);



