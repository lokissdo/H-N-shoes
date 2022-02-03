<?php
function getAllOrders(){
    include "connect.php";
   $sql="SELECT out_list.*,out_product.*,products_list.name,products_list.price,products_list.photo,receipt_history.receipt_stat FROM `out_list`
   Join receipt_history on receipt_history.out_id=out_list.id
   JOIN out_product ON   out_list.id=out_product.out_id
   Join products_list ON products_list.id=out_product.product_id
   WHERE out_list.client_id=$_SESSION[id]
   ORDER BY out_product.out_id DESC
   ";
  $res=mysqli_query($connect,$sql);
    $res=$res->fetch_all(MYSQLI_ASSOC);
    $finalRes=[];
    // extract bills from query
    foreach($res as $item ){
      if(!isset($finalRes[$item['id']])){
        $finalRes[$item['id']]['receiver_name']=$item['receiver_name'];
        $finalRes[$item['id']]['receiver_phone']=$item['receiver_phone'];
        $finalRes[$item['id']]['receiver_address']=$item['receiver_address'];
        $finalRes[$item['id']]['receipt_stat']=$item['receipt_stat'];
      }    
        $temp=[];
        $temp['name']=$item['name'];
        $temp['photo']=$item['photo'];
        $temp['price']=$item['price'];
        $temp['quantity']=$item['quantity'];
        $finalRes[$item['id']]['product'][]=$temp;
      
    } 
  return $finalRes;
 mysqli_close($connect);
}
function sliceBillsArr($arr,$offset,$num){
  $res=array();
  $i=0;
  $count=0;
  foreach($arr as $key=>$item){
    if($i < $offset) {
      $i++;
      continue;
    }
    $res[$key]=$item;
    ++$count;
    if($count ===$num) break;
  }
  return $res;
}
function getListOrders($offset){
  $arrAll=getAllOrders();
   $MaxBillOnePage=8;
   $res=sliceBillsArr($arrAll,$offset,$MaxBillOnePage);
  return $res;
}

?>