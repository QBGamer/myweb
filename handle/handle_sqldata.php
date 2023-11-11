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
        } else if($key === 'views') {
            // $sql .= " ORDER BY $mapping[$key] " . $value ? "DESC" : "ASC";
            $sql .= " ORDER BY views DESC";
        } else {
            $sql .= " ORDER BY prd_id DESC";
        }
    }
    // var_dump($sql);
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