<?php
include "api/start.php";
include "api/connect.php";

$men="select * from products_list where
      gender=1 or gender=2";
$women="select * from products_list where
      gender=0 or gender=2";
$kids="select * from products_list where
      gender=3 ";
$resmen=mysqli_query($connect,$men);
$reswomen=mysqli_query($connect,$women);
$reskids=mysqli_query($connect,$kids);

?>
<html>
<head>
    <link rel="stylesheet" href="asset/itemhome.css">
    <link rel="stylesheet"  href="asset/grid.css">
</head>
<body>
   <div class="itemhome">
      <div class="men-container">
         <div class="grid wide">
           <div class="row">
           <?php foreach($resmen as $manitem ) {?>
               <div class="col m-4 c-6 l-3"> 
                  <div class="container_product">      
                     <div class="prod_container_pic">
                           <img src="<?php echo $manitem['photo']?>" alt="">
                     </div>
                       <div class="name_product">
                       <?php echo $manitem['name']?>
                       </div>
                       <h4># 171305V</h4>
                       <div class="price_product">
                       <?php echo $manitem['price']?>
                       </div>
                       <a href="./product.php?id=<?php echo $manitem['id']?> "></a>
                  </div>
                  
               </div>
               <?php }?>
           </div>
         </div>
      </div>
      <div class="women-container hide-container">
         <div class="grid wide">
           <div class="row">
           <?php foreach($reswomen as $womanitem ) {?>
               <div class="col m-4 c-6 l-3"> 
                  <div class="container_product">      
                     <div class="prod_container_pic">
                           <img src="<?php echo $womanitem['photo']?>" alt="">
                     </div>
                       <div class="name_product">
                       <?php echo $womanitem['name']?>
                       </div>
                       <h4># 171305V</h4>
                       <div class="price_product">
                       <?php echo $womanitem['price']?>
                       </div>
                       <a href="./product.php?id=<?php echo $womanitem['id']?> "></a>
                  </div>
                  
               </div>
               <?php }?>
           </div>
         </div>
      </div>
      <div class="kids-container hide-container">
         <div class="grid wide">
           <div class="row">
           <?php foreach($reskids as $kiditem ) {?>
               <div class="col m-4 c-6 l-3"> 
                  <div class="container_product">      
                     <div class="prod_container_pic">
                           <img src="<?php echo $kiditem['photo']?>" alt="">
                     </div>
                       <div class="name_product">
                       <?php echo $kiditem['name']?>
                       </div>
                       <h4># 171305V</h4>
                       <div class="price_product">
                       <?php echo $kiditem['price']?>
                       </div>
                       <a href="./product.php?id=<?php echo $kiditem['id']?> "></a>
                  </div>
                  
               </div>
               <?php }?>
           </div>
         </div>
      </div>
   </div>
   <script>
        var arrow=document.querySelector(".cate_arrow-down");
        var catemen=document.querySelector(".cate-men")
        var catewomen=document.querySelector(".cate-women")
        var catekid=document.querySelector(".cate-kid")
        var men=document.querySelector(".men-container")
        var women=document.querySelector(".women-container")
        var kid=document.querySelector(".kids-container")
        catemen.addEventListener('mouseover', event => {
            arrow.style['margin-left']="17%";
            men.classList.remove('hide-container');
            women.classList.add('hide-container')
            kid.classList.add('hide-container')

        })
        catewomen.addEventListener('mouseover', event => {
            arrow.style['margin-left']="45%";
            women.classList.remove('hide-container');
            men.classList.add('hide-container')
            kid.classList.add('hide-container')
        })
        catekid.addEventListener('mouseover', event => {
            arrow.style['margin-left']="75%";
            kid.classList.remove('hide-container');
            women.classList.add('hide-container')
            men.classList.add('hide-container')
        })
   </script>
<?php mysqli_close($connect)?>
</body>
</html>