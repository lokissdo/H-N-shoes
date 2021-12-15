<?php
// 0. Thông tin đăng nhập chưa chính xác
// 1. Thành công
function verifyUser($username, $password){
    require_once "connect.php";
    $sqll="select email,password from cli_list";
    echo gettype($password);
    $result=mysqli_query($connect, $sqll);
        while ($row = $result->fetch_assoc()) {
            if($row['email']===$username){
               $res= password_verify($password,$row['password']);
                return $res;
            }
    }
    mysqli_close($connect);
}
?>