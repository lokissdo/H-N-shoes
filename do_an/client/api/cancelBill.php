<?php
include "authenticate.php";
 if(!Authenticate()|| !isset($_POST['id']) ){
    echo json_encode(0);
     header("Location: ../");
     exit;
 }

 include "connect.php";
 $sqlcheck="SELECT COUNT(*) as count FROM `out_list` 
 JOIN receipt_history on out_list.id=receipt_history.out_id
 WHERE receipt_history.receipt_stat='Mới' and out_list.id=$_POST[id] and out_list.client_id=$_SESSION[id]";
 $resTemp=mysqli_query($connect,$sqlcheck);
if($resTemp->fetch_row()[0]!=1) {
    echo json_encode(0);
    exit;
}
else echo json_encode(1);
$sql="UPDATE `receipt_history` SET `receipt_stat` = 'Đã hủy' WHERE `receipt_history`.`out_id` = $_POST[id] ";
$res=mysqli_query($connect,$sql);
mysqli_close($connect);
 ?>