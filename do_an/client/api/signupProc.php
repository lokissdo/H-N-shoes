<?php


// -1. Loi he thong
// 0. Tài khoản đã tồn tại 
// 1. Thành công
function createNewUser($password,$name,$gender,$email,$phone,$birthday){
    require_once "connect.php";
    $sqll="select email from cli_list";
    $result=mysqli_query($connect, $sqll);
        while ($row = $result->fetch_assoc()) {
            if($row['email']===$email){
                mysqli_close($connect);
                return 0;
            }
    }
    //echo "$password,$name,$gender,$email,$phone,  $birthday ";
    $hash = password_hash($password, PASSWORD_DEFAULT);
    if($birthday) 
    {
        $dob = date('Y-m-d', strtotime($birthday));
        $sqlAddUser=" INSERT INTO cli_list (`name`,`gender`,`address`,`email`,`phone`,`photo`,`password`,`birthday`)
        VALUES ('$name',b'$gender','','$email','$phone','','$hash','$dob');";
    }
    else {
        $sqlAddUser=" INSERT INTO cli_list (`name`,`gender`,`address`,`email`,`phone`,`photo`,`password`)
        VALUES ('$name',b'$gender','','$email','$phone','','$hash');";
    }
  
    mysqli_query($connect,$sqlAddUser);
    $loi=mysqli_error($connect);
    if($loi) {
        echo '<script>';
        echo 'console.log('. json_encode($loi, JSON_HEX_TAG) .')';
        echo '</script>';
        mysqli_close($connect);
        return -1;
    }
    mysqli_close($connect);
    return 1;
}
