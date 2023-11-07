<?php
include "db_con.php";
function getallproduct(){
    require "db_con.php";
    $sql="SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
    return $result;
}
?>