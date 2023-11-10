<?php
    session_start();
    include "db_con.php";
    if(isset($_POST['uname']) && isset($_POST['password'])) {

        function validate($data) {
            $data = trim($data);
            $data = stripslashes ($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header ("Location: ../login.php?error=Tài khoản không bỏ trống");
        exit();
    }
    else if(empty($pass)) {
        header("Location: ../login.php?error=Mật khẩu không bỏ trống");
        exit();
    }
    
    $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";

    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['permission'] = $row['permission'];
        header("Location: ../index.php");
        exit();
        // if($row['username'] === $uname && $row['password'] === $pass) {
        //     $_SESSION['username'] = $row['username'];
        //     $_SESSION['permission'] = $row['permission'];
        //     header("Location: ../index.php");
        //     exit();
        // }
    }
    else{
        header("Location: ../login.php?error=Sai tùm lum!");
        exit();
    }
?>