<?php
    session_start();
    include "db_con.php";
    if(isset($_POST['uname']) && isset($_POST['password'])&&isset($_POST['phone']) && isset($_POST['mail']) && isset($_POST['address'])) {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes ($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $phonenum=validate($_POST['phone']);
    $mail=validate($_POST['mail']);
    $addr=validate($_POST['address']);

    if(strlen($pass)<8){
        header("Location: ../register.php?error=Mật khẩu quá ngắn!");
        exit();
    }

    if(strlen($phonenum)!=10){
        header("Location: ../register.php?error=Lỗi điện thoại!");
        exit();
    }

    if(!strpos($mail,"@")){
        header("Location: ../register.php?error=Mail sai định dạng!");
        exit();
    }

    if (empty($uname)) {
        header ("Location: ../register.php?error=Tài khoản không bỏ trống!");
        exit();
    }
    else if(empty($pass)) {
        header("Location: ../register.php?error=Mật khẩu không bỏ trống!");
        exit();
    }else if(empty($phonenum)){
        header("Location: ../register.php?error=Số điện thoại không bỏ trống!");
        exit();
    }else if(empty($mail)){
        header("Location: ../register.php?error=Mail không bỏ trống!");
        exit();
    }else if(empty($addr)){
        header("Location: ../register.php?error=Địa chỉ không bỏ trống!");
        exit();
    }
    
    $sql = "SELECT * FROM users WHERE username='$uname'";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1){
        header("Location: ../register.php?error=Trùng tài khoản!");
        exit();
    }

    $sql="SELECT * FROM users WHERE phonenumber='$phonenum'";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1){
        header("Location: ../register.php?error=Trùng số điện thoại!");
        exit();
    }
    

    $sql="SELECT * FROM users WHERE mail='$mail'";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==1){
        header("Location: ../register.php?error=Trùng mail!");
        exit();
    }
    $pass=md5($pass);
    $sql="INSERT INTO users (username,password,phonenumber,mail,address) VALUES ('$uname', '$pass', '$phonenum','$mail','$addr')";
    mysqli_query($conn, $sql);
    header("Location: ../login.php");
?>