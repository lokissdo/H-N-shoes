<?php
include "start.php";
if(isset($_POST['cate'])){
    $_SESSION['cate']=$_POST['cate'];
}
print_r($_SESSION['cate']);

?>