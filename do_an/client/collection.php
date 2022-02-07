<?php
  include "./api/start.php";
   $url=$_SERVER['REQUEST_URI'];
   function getSlug($url){
    $arr=explode("/",$url);
    return $arr[count($arr)-1];
   }  
   const MaxProductsOnePage=8;
   $slug=getSlug($url);
   $genderArr=array(
    "men"=>array('Nam','https://file.hstatic.net/1000230642/collection/banner_2_5bb1ad24c8614286a924e55e5d04ee5c_master.jpg'),
    "women"=>array('Nữ','https://file.hstatic.net/1000230642/collection/banner_1_06ad51b53c88417ba2dc77d0653438e2_master.jpg'),
    "kids"=>array('Trẻ em','https://static.nike.com/a/images/f_auto/dpr_1.3,cs_srgb/w_1364,c_limit/8166ef8b-915a-4b87-9f7c-776c9feda452/nike-kids.png')
   );
   if(empty($genderArr[$slug])){
        header('location:../');
        exit;
    }
    $gender=$genderArr[$slug];
    echo " <script> 
    const genderPage='$gender[0]';
        </script> ";
    include "./api/connect.php";
    if($gender[0]=='Nam' || $gender[0]=='Nữ') $sqlGender="n'$gender[0]' or gender=n'Nam, Nữ'";
    else $sqlGender="n'$gender[0]'";
    $sql="SELECT products_list.id,products_list.name,products_list.price,products_list.photo,products_category.category,products_gender.gender,manufactures.name as manu_name
    FROM products_list
    INNER JOIN products_gender ON products_gender.id=products_list.gender_id
    INNER JOIN products_category ON products_category.id=products_list.category_id 
    INNER JOIN manufactures ON manufactures.id=products_list.manufacturers_id
    WHERE gender=$sqlGender
     ";
    // die($sql);
    $sqlCate="SELECT * FROM `products_category` WHERE 1";
    $res=mysqli_query($connect,$sql);

    // Set All Star Products
    $res=mysqli_fetch_all($res,MYSQLI_ASSOC);
    $resAllStar=array_slice($res,0,MaxProductsOnePage);
    $resCate=mysqli_query($connect,$sqlCate);
    $resCate=mysqli_fetch_all($resCate,MYSQLI_ASSOC);
    $cateArr=array();

    
    // Array: products by category 
    foreach ($res as $key=>$item  ){
        if(empty($cateArr[$item['category']])) $cateArr[$item['category']]=array();
        if(count($cateArr[$item['category']]) < MaxProductsOnePage)  array_push($cateArr[$item['category']],$item);
        $check=1;
        foreach($cateArr as $tempA){
            if(count($tempA) < 8) {
                $check=0;
                break;
            }
        }
        if($check===1) break;
    }
    // Set chosen category
    if(isset($_SESSION['cate'])){
        //echo $_SESSION['cate'];
        echo " <script> 
        window.onload=()=>{
            hasCate(\"$_SESSION[cate]\")
            if($(\"#manufactures\").value!='null' || $(\"#price\").value!='null') 
            changeFilter();
        }
            </script> ";
            unset($_SESSION['cate']);
    }
    else{
        echo " <script> 
        window.onload=()=>{
            if($(\"#manufactures\").value!='null' || $(\"#price\").value!='null') 
            changeFilter();
        }
            </script> ";
    }
    // select manufactures
    $sqlManu="SELECT * FROM `manufactures` WHERE 1";
    $resManu=mysqli_query($connect,$sqlManu);
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
    <div class="sort">    
        <div class="sort_price">
            <label for="price">Sắp xếp theo giá:</label>
            <select name="price" id="price">
                <option value="null">Mặc định</option>
                <option value="DESC">Giảm dần</option>
                <option value="ASC">Tăng dần</option>     
            </select>
        </div>
        <div class="sort_manufactures">
            <label for="manufactures">Nhà sản xuất:</label>
            <select name="manufactures" id="manufactures">
                <option value="null">Tất cả</option>
                <?php foreach($resManu as $oneManu){?>
                <option value="<?php echo $oneManu['name']?>"> <?php echo strtoupper($oneManu['name'])?></option>
                <?php }?>      
            </select>
                        
        </div>
    </div>
    <!-- display items -->
    <div class="grid wide">
        <?php
        array_push($resCate,'AllStar');
         foreach($resCate as $key=> $itemCate ) {?>
                <div class="row <?php  if($itemCate!='AllStar') echo"hide-container "; echo $key ?> ">
                <?php
                    if($itemCate=='AllStar') $productsByCategory=$resAllStar;
                    else if (empty($cateArr[$itemCate['category']])) {
                        echo "<h1>KHÔNG CÓ SẢN PHẨM</h1></div>";
                        continue;
                    }
                     else $productsByCategory=$cateArr[$itemCate['category']];
                    foreach( $productsByCategory as $oneProduct ) {?>
                            <div class="col m-4 c-6 l-3"> 
                               <div class="container_product">      
                                  <div class="prod_container_pic">
                                        <img src=" <?php echo $oneProduct['photo']?>" alt="">
                                  </div>
                                    <div class="name_product">
                                        <?php echo $oneProduct['name']?>
                                    </div>
                                    <h4># 171305V</h4>
                                    <div class="price_product">
                                        <?php  echo  number_format($oneProduct['price'])." VND"?> 
                                    </div>
                                    <a href="../product.php?id=<?php echo $oneProduct['id']?> "></a>
                               </div>
                            </div>
                    <?php }?>
                </div>

            <?php }?>
    </div>
    <div class="load-more"> Xem thêm</div>
         <script src="../js/collection.js"></script>
<?php mysqli_close($connect);?>
</body>
</html>