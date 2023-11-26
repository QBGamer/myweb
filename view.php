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
<!-- <div id="item-view" class="container-fluid bg-white">
    <div id="main" class="container">
        <div class="card mt-3">
            <div class="row g-0">
                <div class="col-4 m-3 d-flex align-items-center">
                    <?php
                        // echo    '<img id="img" class="rounded mx-auto d-block img border" src="./product_image/'.$productdata['picture'].'" class="border">
                        //         </div>
                        //         <div class="col-7">
                        //             <div class="card-body">
                        //                 <div class="fs-2">'.$productdata['prd_name'].'</div>
                        //                 <div class="js-5">Lượt quan tâm:'.$productdata['views'].'</div>
                        //                 <div class="ps-3 py-1 fs-2 bg-light-subtle text-danger">'.number_format($productdata['prd_price']).' đ</div>';
                    ?>
                        <div class="my-1 fs-4">
                            <div id="number-box" class="input-group d-flex justify-content-center">
                                Số lượng:
                                <button class="ms-5 input-group-text btn btn-outline-secondary" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</button>
                                <input id="inputbar" type="number" class="form-control" min="1" value="1">
                                <button class="input-group-text btn btn-outline-secondary" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</button>
                            </div>
                        </div>
                    <?php
                        // echo '<button type="button" class="btn btn-danger mt-5 fs-3 btn-addcart" data-id='.$id.'>Thêm vào giỏ</button>';
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="detail" class="container fs-4">
        <div class="bg-light p-2 fs-2">CHI TIẾT SẢN PHẨM</div>
        <?php
            // echo    '<div>Thương hiệu: '.$brand['brand_name'].'</div>
            //         <div>Loại: '.$type['type_name'].'</div>
            //         <div>Tính năng nổi bật: '.$productdata['prd_special'].'</div>
            //         <div>Kích thước: '.$productdata['prd_size'].'</div>
            //         <div>Màu: '.$productdata['prd_color'].'</div>
            //         <div>Điện áp tiêu thụ: '.$productdata['prd_vol'].'</div>
            //         <div>Cấp làm mát: '.$productdata['prd_speedlvl'].' cấp</div>
            //         <div>Công nghệ Inverter: '.$productdata['prd_inverter'].'</div>';
        ?>
    </div>
</div> -->
<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0 border" <?php echo 'src="./product_image/'.$productdata['picture'].'"'; ?>></div>
                    <div class="col-md-6">
                        <div class="small mb-1"></div>
                        <?php 
                        echo '<h1 class="display-5 fw-bolder">'.$productdata['prd_name'].'</h1>
                            <div class="js-5">Lượt quan tâm:'.number_format($productdata['views']).'</div>';
                        ?>
                        <div class="fs-5 mb-5">
                            <!-- <span class="text-decoration-line-through">$45.00</span>
                            <span>$40.00</span> -->
                            <?php
                                if($productdata['prd_pricenew']!=NULL)
                                    echo '<span class="fs-3 text-danger fw-bold">'.number_format($productdata['prd_price']-($productdata['prd_price']*$productdata['prd_pricenew']/100)).' đ </span><span class="text-decoration-line-through">'.number_format($productdata['prd_price']).' đ</span>';
                                else
                                    echo '<span class="color-danger fw-bold">'.number_format($productdata['prd_price']).' đ</span>';
                            ?>
                        </div>
                        <?php
                        echo    '<div class="row">
                                <div class="col-5 col-lg-4 fw-bold">Thương hiệu:</div>
                                <div class="col">'.$brand['brand_name'].'</div>
                            </div>
                            <div class="row">
                                <div class="col-5 col-lg-4 fw-bold">Loại:</div>
                                <div class="col">'.$type['type_name'].'</div>
                            </div>
                            <div class="row">
                                <div class="col-5 col-lg-4 fw-bold">Kích thước:</div>
                                <div class="col">'.$productdata['prd_size'].'</div>
                            </div>
                            <div class="row">
                                <div class="col-5 col-lg-4 fw-bold">Màu:</div>
                                <div class="col">'.$productdata['prd_color'].'</div>
                            </div>
                            <div class="row">
                                <div class="col-5 col-lg-4 fw-bold">Điện áp tiêu thụ:</div>
                                <div class="col">'.$productdata['prd_vol'].'</div>
                            </div>
                            <div class="row">
                                <div class="col-5 col-lg-4 fw-bold">Inverter:</div>
                                <div class="col">'.$productdata['prd_inverter'].'</div>
                            </div>
                            <div class="d-flex mt-3">
                                <input class="form-control text-center me-3" type="number" id="inputbar" min="1" value="1" value="1" style="max-width: 3rem" />
                                <button class="btn btn-outline-dark flex-shrink-0 btn-addcart" type="button" data-id='.$id.'>
                                    <i class="bi-cart-fill me-1"></i>
                                    Thêm giỏ hàng
                                </button>
                            </div>';
                        ?>
                    </div>
                </div>
            </div>
        </section>
<?php
    addFooter();
?>
<script>
    $('.btn-addcart').click(function() {
        var id=this.dataset.id;
        <?php
            if(!isset($_SESSION['username']))
                echo 'window.location="login.php"';
            else
                echo 'var quantity=document.getElementById("inputbar").value;
                var xmlhttp = new XMLHttpRequest();
                // xmlhttp.onreadystatechange = function() {
                //     if (this.readyState == 4 && this.status == 200) {
                //     document.getElementById("cart-data-block").innerHTML = this.responseText;
                //     }
                // };
                xmlhttp.open("GET","./handle/add_to_cart.php?id="+id+"&quantity="+quantity,true);
                xmlhttp.send();';
        ?>
    });
    $('.search-filter').click(function(){
        var thisurl=window.location.search;
        var linkget="&"+this.dataset.mtype+"="+this.dataset.mvalue;
        if(thisurl==""){
            thisurl+="?"+linkget;
        }else{
            if(thisurl.includes(this.dataset.mtype)){
                thisurl=thisurl.replace(linkget,'');
            }else{
              thisurl+=linkget;
            }
        }
        window.location.search=thisurl;
    });
</script>
</body>
</html>