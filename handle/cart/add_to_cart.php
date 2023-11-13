<?php
    session_start();
    require "../db_con.php";
    if(isset($_SESSION["username"])){
        include "../handle_sqldata.php";
        $id=$_GET['id'];
        $quantity=$_GET['quantity'];
        $uname=$_SESSION["username"];
        $result=getusercart($uname,$id);
        if(mysqli_num_rows($result)==1){
            $sql="UPDATE cart SET num=num+$quantity WHERE username='$uname' AND prd_id=$id";
        }else{
            $sql="INSERT INTO cart (username, prd_id, num) VALUES ('$uname', '$id', '$quantity')";
        }
        // var_dump($sql);
        mysqli_query($conn,$sql);
    }
?>