<?php
 include "../authenticate.php";
 if(!Authenticate() || !isset($_POST['offset'])) {
      header("Location: ../");
      exit;
 }
$offset=addslashes($_POST['offset']);
 include "../getbill.php";
 $res=getListOrders($offset);
echo json_encode($res);
?>