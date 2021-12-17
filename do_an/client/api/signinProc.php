<?php
// 0. Thông tin đăng nhập chưa chính xác
// 1. Thành công
function verifyUser($username, $password,&$id){
    require "connect.php";
    $res=0;
    $sqll="select email,password,id from cli_list";
    $result=mysqli_query($connect, $sqll);
        while ($row = $result->fetch_assoc()) {
            if($row['email']===$username){
               $res= password_verify($password,$row['password']);              
                if($res) $id=$row['id'];
                break;
            }
        } 
    mysqli_close($connect);
    return $res;
}
function updateToken($token){
    require "connect.php";
    $sql = "UPDATE cli_list SET token='$token' where id=$_SESSION[id]";
   // echo 
    $result=mysqli_query($connect, $sql);
    $loi=mysqli_error($connect);
    if($loi) {
        echo '<script>';
        echo 'console.log('. json_encode($loi, JSON_HEX_TAG) .')';
        echo '</script>';
       // mysqli_close($connect);
    }
    mysqli_close($connect);
}
?>