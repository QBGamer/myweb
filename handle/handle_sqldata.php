<?php
include "db_con.php";

function getallproduct($sreach_array=['views']){
    $mapping = [
        'name' => 'prd_name',
        'min' => 'prd_price',
        'max' => 'prd_price',
        'brand' => 'brand_id',
        'type' => 'type_id',
        'views' => 'views'
    ];
    require "db_con.php";
    $sql="SELECT * FROM product";
    $sql.=" WHERE 1";
    foreach($sreach_array as $key => $value) {
        if($key === 'name') {
            $sql .= " AND $mapping[$key] LIKE '%$value%'";
        } else if($key === 'min') {
            $sql .= " AND $mapping[$key] >= $value";
        } else if($key === 'max') {
            $sql .= " AND $mapping[$key] <= $value";
        } else if($key === 'brand') {
            $sql .= " AND $mapping[$key] = $value";
        } else if($key === 'type') {
            $sql .= " AND $mapping[$key] = $value";
        } else if($key === 'views' and $value === '1') {
            // $sql .= " ORDER BY $mapping[$key] " . $value ? "DESC" : "ASC";
            $check=true;
        } else {
            $check=false;
        }
    }
    if(isset($check) && $check) {
        // $sql .= " ORDER BY $mapping[$key] " . $value ? "DESC" : "ASC";
        $sql .= " ORDER BY views DESC";
    } else {
        $sql .= " ORDER BY prd_id DESC";
    }
    // var_dump($sql);
    $result = mysqli_query($conn, $sql);
    $resultArray=mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $resultArray;
}

function getallbrand($id){
    require "db_con.php";
    $sql="SELECT * FROM brand";
    if($id){
        $sql.=" WHERE brand_id=$id";
    }
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getalltype($id){
    require "db_con.php";
    $sql="SELECT * FROM type";
    if($id){
        $sql.=" WHERE type_id=$id";
    }
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getusercart($uname,$id){
    require "db_con.php";
    // $sql="SELECT product.*,cart.num FROM cart,users,product WHERE users.username='$uname' AND users.username=cart.username AND product.prd_id=cart.prd_id";
    $sql="SELECT * FROM cart WHERE username='$uname' AND prd_id=$id";
    $result = mysqli_query($conn, $sql);
    // $resultArray=mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $result;
}

// function controlcart($type,$idcart){
//     session_start();
//     require "db_con.php";
//     $sql="SELECT * FROM usercart WHERE cart_id";
//     $result = mysqli_query($conn, $sql);
//     if($_SESSION["username"]);
// }

function getproduct($id){
    require "db_con.php";
    $sql="SELECT * FROM product WHERE prd_id=$id";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getuser(){
    require "db_con.php";
    $sql="SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
    return $result;
}
?>