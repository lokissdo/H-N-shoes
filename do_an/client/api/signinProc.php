<?php
// 0. Thông tin đăng nhập chưa chính xác
// 1. Thành công
function verifyUser($username, $password,&$id){
    require_once "connect.php";
    $sqll="select email,password,id from cli_list";
    $result=mysqli_query($connect, $sqll);
        while ($row = $result->fetch_assoc()) {
            if($row['email']===$username){
               $res= password_verify($password,$row['password']);
                mysqli_close($connect);
                if($res) $id=$row['id'];
                return $res;
            }
    }
    mysqli_close($connect);
    return 0;
}
?>