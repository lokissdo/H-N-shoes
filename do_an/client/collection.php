<?php
  include "./api/start.php";
   $url=$_SERVER['REQUEST_URI'];
   function getSlug($url){
    $arr=explode("/",$url);
    return $arr[count($arr)-1];
   }  
   $slug=getSlug($url);
   $genderArr=array(
    "men"=>array('Nam','https://file.hstatic.net/1000230642/collection/banner_2_5bb1ad24c8614286a924e55e5d04ee5c_master.jpg'),
    "women"=>array('Nữ','https://file.hstatic.net/1000230642/collection/banner_1_06ad51b53c88417ba2dc77d0653438e2_master.jpg'),
    "kids"=>array('Trẻ em','https://converse.com.vn/pictures/catalog/banner/kids/FH19CTASCOREMIXEDGROUP2.jpg')
   );
   if(empty($genderArr[$slug])){
        header('location:../');
        exit;
    }
    $gender=$genderArr[$slug];
    include "./api/connect.php";

    $sql="SELECT products_list.id,products_list.name,products_list.price,products_list.photo,products_category.category,products_gender.gender
    FROM products_list
    INNER JOIN products_gender ON products_gender.id=products_list.gender_id
    INNER JOIN products_category ON products_category.id=products_list.category_id 
    WHERE gender=\"$gender[0]\"
     ";
    $sqlCate="SELECT * FROM `products_category` WHERE 1";
    $res=mysqli_query($connect,$sql);
    //$res=mysqli_fetch_all($res);
    $resCate=mysqli_query($connect,$sqlCate);
    $resCate=mysqli_fetch_all($resCate,MYSQLI_ASSOC);
    $cateArr=array();
    foreach ($res as $key=>$item  ){
        if(empty($cateArr[$item['category']])) $cateArr[$item['category']]=array();
       array_push($cateArr[$item['category']],$item);
    }

    if(isset($_SESSION['cate'])){
        echo " <script> 
        window.onload=()=>{hasCate(\"$_SESSION[cate]\")}
            </script> ";
            unset($_SESSION['cate']);
    }

    //print_r($_SESSION['cate']);
   // print_r(mysqli_fetch_all($res));
   // exit;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../public/icongame.jpg" type="image/.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/header.css">
    <link rel="stylesheet"  href="../asset/grid.css">
    <link rel="stylesheet" href="../asset/collection.css">


    <title>Collection</title>
    
</head>
<body>
   <?php include "headerCo.php"?>
   <img class="img_container"src="<?php echo $gender[1]?>" alt="">
   <div class="cate_header">
        <?php 
          echo $gender[0];
        ?> 
    </div>
    <div class="cate">
        <div class="cate_itemLR"></div>
        <div class="cate_mid">
            <div id="<?php echo count($resCate) ?>" class="cate_mid_item chosen linked">
                All Star
            </div>
            <?php foreach($resCate as $key=> $cate) {?>
            <div id="<?php echo $key ?>" class="cate_mid_item  linked">
                <?php echo $cate['category'];?> 
            </div>
            <?php } ?>
        </div>
        <div class="cate_itemLR"></div>
    </div>

    <!-- display items -->
    <div class="grid wide">
        <?php
        array_push($resCate,'total');
         foreach($resCate as $key=> $itemCate ) {
             ?>
           <div class="row <?php  if($itemCate!='total') echo"hide-container "; echo $key ?> ">
           <?php
                if($itemCate=='total') $targetCate=$res;
                else if (empty($cateArr[$itemCate['category']])) {
                    echo "<h1>KHÔNG CÓ SẢN PHẨM</h1></div>";
                    continue;
                }
                else $targetCate=$cateArr[$itemCate['category']];
                 foreach( $targetCate as $kiditem ) {
                ?>
               <div class="col m-4 c-6 l-3"> 
                  <div class="container_product">      
                     <div class="prod_container_pic">
                           <img src=" <?php echo $kiditem['photo']?>" alt="">
                     </div>
                       <div class="name_product">
                       <?php echo $kiditem['name']?>
                       </div>
                       <h4># 171305V</h4>
                       <div class="price_product">
                       <?php  echo  number_format($kiditem['price'])." VND"?> 
                       </div>
                       <a href="../product.php?id=<?php echo $kiditem['id']?> "></a>
                  </div>
               </div>
               <?php }?>
           </div>
           <?php }?>
         </div>
         <script src="../js/collection.js"></script>
</body>
</html>