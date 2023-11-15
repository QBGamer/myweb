<?php
// var_dump($_FILES['img']);
$img=$_FILES['img']['name'];
$img_loc=$_FILES['img']['tmp_name'];
$save="../product_image/";
move_uploaded_file($img_loc,$save.$img);