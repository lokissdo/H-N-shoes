<?php
if(!isset($_POST['search']) || !isset($_POST['offset'])) {
    header("Location: ../");
    exit;
}
include "../connect.php";
$MaxProductsOnePage=8;
$offset=addslashes($_POST['offset']);
$sql="
SELECT * FROM `products_list` WHERE name LIKE '%".addslashes($_POST['search'])."%'
LIMIT $MaxProductsOnePage
OFFSET $offset
";
$res=mysqli_query($connect,$sql);
$res=mysqli_fetch_all($res,MYSQLI_ASSOC);
echo json_encode($res);