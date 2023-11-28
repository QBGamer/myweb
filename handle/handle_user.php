<?php
session_start();
require "db_con.php";
if(isset($_SESSION["username"])){
  if(isset($_GET["sdt"])){
    $username = $_SESSION["username"];
    $sdt=$_GET['sdt'];
    $mail=$_GET['mail'];
    $dchi=$_GET['dchi'];
    $sql="UPDATE users SET phonenumber=$sdt,mail='$mail',address='$dchi' WHERE username='$username'";
    mysqli_query($conn, $sql);
  }
}
?>