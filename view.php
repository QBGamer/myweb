<?php
    session_start();
    include "./handle/db_con.php";
    include "./handle/handle_sqldata.php";
    require "./web/echoHTML.php";

    if(!isset($_GET['id'])){
        header("Location: ./shop.php");
        exit();
    }
    $id=$_GET['id'];
    $sql="UPDATE product SET views=views+1 WHERE prd_id=$id";
    mysqli_query($conn, $sql);
    $productdata=mysqli_fetch_all(getproduct($id),MYSQLI_ASSOC)[0];
    $brand=mysqli_fetch_all(getallbrand($productdata['brand_id']),MYSQLI_ASSOC)[0];
    $type=mysqli_fetch_all(getalltype($productdata['type_id']),MYSQLI_ASSOC)[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máy lạnh Hoàng Bình</title>
    <link rel="icon" href="./images/logo.png">

    <link rel="stylesheet" href="./css/style.css">
    <!-- <script src="./js/website.js"></script> -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" type="text/javascript"></script>
</head>
<body>
<?php
    addHeader();
?>
<div id="item-view" class="container-fluid bg-white">
    <div id="main" class="container">
        <div class="card mt-3">
            <div class="row g-0">
                <div class="col-4 m-3">
                    <?php
                        echo    '<img id="img-view" src="./product_image/'.$productdata['picture'].'" class="border">
                                </div>
                                <div class="col-7">
                                    <div class="card-body">
                                        <div class="fs-2">'.$productdata['prd_name'].'</div>
                                        <div class="js-5">Lượt quan tâm:'.$productdata['views'].'</div>
                                        <div class="ps-3 py-1 fs-2 bg-light-subtle text-danger">'.number_format($productdata['prd_price']).' đ</div>';
                    ?>
                        <div class="my-1 fs-4">
                            <div id="number-box" class="input-group d-flex justify-content-center">
                                Số lượng:
                                <button class="ms-5 input-group-text btn btn-outline-secondary" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                                <input id="quantity" type="number" class="form-control" min="1" value="1">
                                <button class="input-group-text btn btn-outline-secondary" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                            </div>
                        </div>
                    <?php
                        echo '<button type="button" class="btn btn-danger mt-5 fs-3 btn-addcart" data-id='.$id.'>Thêm vào giỏ</button>';
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="detail" class="container fs-4">
        <div class="bg-light p-2 fs-2">CHI TIẾT SẢN PHẨM</div>
        <?php
            echo    '<div>Thương hiệu: '.$brand['brand_name'].'</div>
                    <div>Loại: '.$type['type_name'].'</div>
                    <div>Tính năng nổi bật: '.$productdata['prd_special'].'</div>
                    <div>Kích thước: '.$productdata['prd_size'].'</div>
                    <div>Màu: '.$productdata['prd_color'].'</div>
                    <div>Điện áp tiêu thụ: '.$productdata['prd_vol'].'</div>
                    <div>Cấp làm mát: '.$productdata['prd_speedlvl'].' cấp</div>
                    <div>Công nghệ Inverter: '.$productdata['prd_inverter'].'</div>';
        ?>
    </div>
</div>
<?php
    addFooter();
?>
<script>
    $('.btn-addcart').click(function() {
        var id=this.dataset.id;
        var quantity=document.getElementById('quantity').value;
        var xmlhttp = new XMLHttpRequest();
        // xmlhttp.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {
        //     document.getElementById("cart-data-block").innerHTML = this.responseText;
        //     }
        // };
        xmlhttp.open("GET","./handle/cart/add_to_cart.php?id="+id+"&quantity="+quantity,true);
        xmlhttp.send();
    });
</script>
</body>
</html>