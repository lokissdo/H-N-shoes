<?php
 session_start();  
 $_SESSION['page']="home"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/icongame.jpg" type="image/.jpg">
   <link rel="stylesheet"  href="asset/footer.css">
   <!-- media="(min-width:1024px)" -->
    <title>Store</title>
</head>
<body>
    <?php include "header.php" ?>
    <?php include "slider.php" ?>
    <?php include "category.php" ?>
    <div>
    <?php include "itemhome.php"?>
    </div>
    
    <?php require "footer.php" ?>
    
</body>
</html>