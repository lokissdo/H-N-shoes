<?php
if(!isset($_POST['gender']) || !isset($_POST['offset'])||!isset($_POST['cate'])|| !isset($_POST['price'])||!isset($_POST['manufacture'])) {
    header("Location: ../");
    exit;
}
include "../connect.php";
$gender=addslashes($_POST['gender']);
$cate=addslashes($_POST['cate']);
$offset=addslashes($_POST['offset']);
$sortPrice=addslashes($_POST['price']);
$manufacture=addslashes($_POST['manufacture']);

$MaxProductsOnePage=8;
if($gender=='Nam' || $gender=='Nữ') $sqlGender="n'$gender' or gender=n'Nam, Nữ'";
else $sqlGender="n'$gender'";
$sql="SELECT products_list.*,products_category.category,products_gender.gender,manufactures.name as manu_name
FROM products_list
INNER JOIN products_gender ON products_gender.id=products_list.gender_id
INNER JOIN products_category ON products_category.id=products_list.category_id
INNER JOIN manufactures ON manufactures.id=products_list.manufacturers_id
 ";
    if($manufacture=='null'){
        if($cate=="All Star") $sql.="WHERE gender=$sqlGender ";
         else  $sql.="WHERE (gender=$sqlGender) and products_category.category=n'$cate' ";
    }
    else{
        if($cate=="All Star")
            $sql.="WHERE (gender=$sqlGender) and manufactures.name='$manufacture' ";
         else  $sql.="WHERE (gender=$sqlGender) and products_category.category=n'$cate' and manufactures.name='$manufacture' ";   
    }
    if($sortPrice != 'null')
    $sql.=" ORDER BY products_list.price $sortPrice ";
    $sql.=" 
    LIMIT $MaxProductsOnePage
    OFFSET $offset ";

    

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