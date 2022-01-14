<?php 
include "authenticate.php";
 if(!Authenticate() || empty($_POST) ){
    echo json_encode(0);
     header("Location: ../");
     exit;
 }
include "connect.php";
foreach($_POST as $key=>$val){
    if(empty($val) && $key!="gender"){
        echo json_encode(0);
        exit;
    }
}
$name=addslashes($_POST['name']);
$gender=addslashes($_POST['gender']);
if($gender!= "0" && $gender!= "1") {
    echo json_encode(0);
    exit;
}
$phone_number=addslashes($_POST['phone_number']);
$birthday=date('Y-m-d', strtotime($_POST['birthday']));
$address_detail=addslashes($_POST['address_detail'].", ".$_POST['address_province']);
$sql="UPDATE `cli_list` SET `name` = '$name', `gender` = b'$gender',`phone`='$phone_number', `address` = '$address_detail', `birthday` = '$birthday' WHERE `cli_list`.`id` = $_SESSION[id]";

$res=mysqli_query($connect,$sql);
$loi=mysqli_error($connect);
if($loi) { 
    echo json_encode($sql);
}
else  echo json_encode(1);