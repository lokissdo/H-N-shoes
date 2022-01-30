<?php
if(!isset($_POST['gender']) || !isset($_POST['offset'])||!isset($_POST['cate'])) {
    header("Location: ../");
    exit;
}
include "../connect.php";
$gender=addslashes($_POST['gender']);
$cate=addslashes($_POST['cate']);
$offset=addslashes($_POST['offset']);
$MaxProductsOnePage=8;
if($gender=='Nam' || $gender=='Nữ') $sqlGender="n'$gender' or gender=n'Nam, Nữ'";
else $sqlGender="n'$gender'";
$sql="SELECT products_list.id,products_list.name,products_list.price,products_list.photo,products_category.category,products_gender.gender
FROM products_list
INNER JOIN products_gender ON products_gender.id=products_list.gender_id
INNER JOIN products_category ON products_category.id=products_list.category_id 
WHERE (gender=$sqlGender) and products_category.category=n'$cate'
LIMIT $MaxProductsOnePage
OFFSET $offset
 ";
 if($cate=="All Star"){
    $sql="SELECT products_list.id,products_list.name,products_list.price,products_list.photo,products_category.category,products_gender.gender
    FROM products_list
    INNER JOIN products_gender ON products_gender.id=products_list.gender_id
    INNER JOIN products_category ON products_category.id=products_list.category_id 
    WHERE gender=$sqlGender 
    LIMIT $MaxProductsOnePage
    OFFSET $offset
     ";
 }
 //die($sql);
$res=mysqli_query($connect,$sql);
$res=mysqli_fetch_all($res,MYSQLI_ASSOC);
if(count($res)==0) {
    echo json_encode(0);
    exit;
}
//print_r($_POST);
echo json_encode($res);

?>