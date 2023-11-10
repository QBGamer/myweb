<?php
include "db_con.php";
// function getallproduct($sreach_name,$minprice,$maxprice,$sreach_brand,$sreach_view){
function getallproduct($sreach_view){
    require "db_con.php";
    $sql="SELECT * FROM product";
    $sql.=" WHERE 1";
    // if($sreach_name!=0){
    //     $sql.=" AND prd_name LIKE '$'.$sreach_name.'$'";
    // }
    // if($minprice!=""){
    //     $sql.=" AND prd_price>='.$minprice.'";
    // }
    // if($maxprice!=""){
    //     $sql.=" AND prd_price<='.$maxprice.'";
    // }
    // if($sreach_brand!=""){
    //     $sql.=" AND brand_id='.$sreach_brand.'";
    // }
    if($sreach_view){
        $sql.=" ORDER BY views DESC";
    }else{
        $sql.=" ORDER BY prd_id DESC";
    }
    $result = mysqli_query($conn, $sql);
    $resultArray=mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $resultArray;
}



function getallbrand(){
    require "db_con.php";
    $sql="SELECT * FROM brand";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getalltype(){
    require "db_con.php";
    $sql="SELECT * FROM type";
    $result = mysqli_query($conn, $sql);
    return $result;
}
?>