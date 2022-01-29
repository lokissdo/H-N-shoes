<?php
require "start.php";
if(empty($_POST['search'])){
    header("Location: ../");
    exit;
}
$in4=addslashes($_POST['search']);
require "connect.php";
$sql="
SELECT * FROM `products_list` WHERE name LIKE '%".$in4."%'
limit 7
";
$res=mysqli_query($connect,$sql);
$res=mysqli_fetch_all($res,MYSQLI_ASSOC);
echo json_encode($res);
