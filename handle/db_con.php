<?php
    $localhost="localhost";
    $user="root";
    $pass="";
    $db_name="maylanh";

    $conn=mysqli_connect($localhost,$user,$pass,$db_name);
    if(!$conn){
        echo "Lỗi kết nối";
}
?>