<?php
session_start();
if(isset($_SESSION['permission'])){
    include "../../handle/db_con.php";
    include "../../handle/handle_sqldata.php";

    if(isset($_GET['del'])){
        $id=$_GET['id'];
        $sql="DELETE FROM product WHERE prd_id=$id";
        // var_dump($sql);
        mysqli_query($conn,$sql);
    }

    if(isset($_POST['name'])){
        $pname=$_POST['name'];
        $fname=$_FILES['img']['name'];
        $brand=$_POST['brand'];
        $type=$_POST['type'];
        $price=$_POST['price'];
        $km=$_POST['newprice'];
        $special=$_POST['special'];
        $size1=$_POST['size1'];
        $size2=$_POST['size2'];
        $size=$size1."x".$size2;
        $inverter=$_POST['inverter'];
        $color=$_POST['color'];
        $vol=$_POST['vol'];
        $wind=$_POST['wind'];

        $img=$_FILES['img']['name'];
        $img_loc=$_FILES['img']['tmp_name'];
        $save="../../product_image/";
        move_uploaded_file($img_loc,$save.$img);

        if(!empty($_POST['id'])){
            $id=$_POST['id'];
            $sql="UPDATE product SET";
                if(empty($_POST['name']))
                    $sql.=" prd_name=prd_name";
                else $sql.=" prd_name='$pname'";
                if(!empty($_FILES['img']['name'])){
                    $sql.=" ,picture='$fname'";
                    $img=$_FILES['img']['name'];
                    $img_loc=$_FILES['img']['tmp_name'];
                    $save="../../product_image/";
                    move_uploaded_file($img_loc,$save.$img);
                }
                if(!empty($_POST['brand']))
                    $sql.=" ,brand_id='$brand'";
                    // $brand="brand_id";
                if(!empty($_POST['type']))
                    $sql.=" ,type_id='$type'";
                    // $type="type_id";
                if(!empty($_POST['price']))
                    $sql.=" ,prd_price='$price'";
                    // $price="prd_price";
                if(!empty($_POST['newprice']))
                    $sql.=" ,prd_pricenew='$km'";
                    // $km="prd_pricenew";
                if(!empty($_POST['special']))
                    $sql.=" ,prd_special='$special'";
                    // $special="prd_special";
                if(!empty($_POST['size1'])&&!empty($_POST['size2'])){
                    $size1=$_POST['size1'];
                    $size2=$_POST['size2'];
                    $size=$size1."x".$size2;
                    $sql.=" ,prd_size='$size'";
                }
                if(!empty($_POST['inverter']))
                    $sql.=" ,prd_inverter='$inverter'";
                    // $inverter="prd_inverter";
                if(!empty($_POST['color']))
                    $sql.=" ,prd_color='$color'";
                    // $color="prd_color";
                if(!empty($_POST['vol']))
                    $sql.=" ,prd_vol='$vol'";
                    // $vol="prd_vol";
                if(!empty($_POST['wind']))
                    $sql.=" ,prd_speedlvl='$wind'";
                    // $wind="prd_speedlvl";
            // $sql="UPDATE product SET prd_name=$pname,prd_price=$price,prd_pricenew=$km,prd_special=$special,prd_size=$size
            //,prd_inverter=$inverter,prd_color=$color,prd_vol=$vol,prd_speedlvl=$wind,picture=$fname,brand_id=$brand,type_id=$type WHERE prd_id=$id";
            $sql.=" WHERE prd_id=$id";
        }else{
            $sql="INSERT INTO product (prd_name,prd_price,prd_pricenew,prd_special,prd_size,prd_inverter,prd_color,
            prd_vol,prd_speedlvl,picture,brand_id,type_id) VALUES ('$pname','$price','$km','$special','$size','$inverter','$color','$vol'
            ,'$wind','$fname','$brand','$type')";
        }
        // var_dump($sql);
        mysqli_query($conn,$sql);
        header("Location: ../admin_product.php");
        exit();
    }

    $allproduct=getallproduct();
    $allbrand=getallbrand(0);
    $alltype=getalltype(0);
        
   
    foreach($allproduct as $item){
        $brand=mysqli_fetch_array(getallbrand($item['brand_id']));
        $type=mysqli_fetch_array(getalltype($item['type_id']));
        echo '<div class="row py-3">
                <div class="col text-center align-self-center"><button type="button" class="btn btn-danger" data-id="'.$item['prd_id'].'" onclick="delProduct(this)">X</button></div>
                <div class="col align-self-center">'.$item['prd_id'].'</div>
                <div id="#product-box" class="col-2 align-self-center"><img id="tableimg" class="border" src="../product_image/'.$item['picture'].'">'.$item['prd_name'].'</div>
                <div class="col align-self-center">'.$brand['brand_name'].'</div>
                <div class="col align-self-center">'.$type['type_name'].'</div>
                <div class="col align-self-center">'.number_format($item['prd_price']).'</div>
                <div class="col-2 align-self-center">'.$item['prd_special'].'</div>
                <div class="col align-self-center">'.$item['prd_size'].'</div>
                <div class="col align-self-center">'.$item['prd_inverter'].'</div>
                <div class="col align-self-center">'.$item['prd_color'].'</div>
                <div class="col align-self-center">'.$item['prd_vol'].'</div>
                <div class="col align-self-center">'.$item['prd_speedlvl'].'</div>
                <div class="col align-self-center">'.$item['views'].'</div>
            </div>';
    }
    echo '</div>';
}
?>