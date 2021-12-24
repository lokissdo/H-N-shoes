<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search</title>
  <link rel="stylesheet" href="./asset/search.css">
  <link rel="icon" href="public/icongame.jpg" type="image/.jpg">
</head>
<body>
    <?php
    if (empty($_GET['search'])){
         header("Location: ./");
    }
    require "header.php";
    require "api/connect.php";
    $sql="
    SELECT * FROM `products_list` WHERE name LIKE '%".addslashes($_GET['search'])."%'
    limit 50 
    ";
    $res=mysqli_query($connect,$sql);
    ?>
    <img class="img_container"src="https://www.converse.com.vn/pictures/catalog/products/about.jpg" alt="">
   <h1 class="result-textheader"> Kết quả tìm kiếm </h1>
   <div class="result_container">
        <div class="result_section">
        <?php 
        if(mysqli_num_rows($res)>0){
        $i=1;
        foreach ($res as $item) {?>
            <div class="section-box">
                <a href="./product.php?id=<?php echo $item['id']?>"class="search-link">
                    <span class="number"> <?php echo $i?> </span>
                    <div class="item_search">
                        <div class="item-pic">
                            <img src="<?php echo $item['photo']?>" alt="">
                        </div>
                        <div class="item-text"><?php echo $item['name']?></div>
                    </div>
                </a>
            </div>
        <?php $i++; };
        }else {
            echo "<h1 align=\"center\"> Không có sản phẩm nào !</h1>";
        }
        ?>
        </div>
   </div>

  <script src="js/search.js"></script>
</body>
</html>