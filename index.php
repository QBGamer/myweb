<?php
    session_start();
    include "./handle/db_con.php";
    include "./handle/handle_sqldata.php";
    require "./web/echoHTML.php";


    $newproductdata=getallproduct();
    $hotproductdata=getallproduct(['views'=>1]);
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

</head>
<body>
<?php
    addHeader();
?>
<div id="banner-box">
    <div id="banner" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#banner" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#banner" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#banner" data-bs-slide-to="2"></button>
        </div>
        
        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img id="banner-img" src="images/banner1.jpg" class="d-block">
            <div class="carousel-caption">
              <h3>Sự thoải mái của bạn là sứ mệnh của chúng tôi!</h3>
            </div>
          </div>
          <div class="carousel-item">
            <img id="banner-img" src="images/banner2.png" class="d-block">
            <div class="carousel-caption">
              <h3>Chuyên gia thời tiết trong nhà của bạn!</h3>
            </div> 
          </div>
          <div class="carousel-item">
            <img id="banner-img" src="images/banner3.jpg" class="d-block">
            <div class="carousel-caption">
              <h3>Chúng tôi không hài lòng cho đến khi bạn cảm thấy thoải mái!</h3>
            </div>  
          </div>
        </div>
        
        <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#banner" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#banner" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
<div id="hot-product" class="py-5 bg-light">
    <h1 class="text-center pb-3">Các sản phẩm được quan tâm</h1>
    <div class="container">
        <div class="row row-cols-1 row-cols-2 row-cols-3 g-3">
            <div class="col">
                <div class="card">
                <?php
                    echo '<div id="product-box" class="card-img-top bg-img hover-zoom">
                            <img class="img-fluid" src="./product_image/'.$hotproductdata[0]['picture'].'">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">'.$hotproductdata[0]['prd_name'].'</h5>
                            <p class="card-text text-danger">'.number_format($hotproductdata[0]['prd_price']).' đ</p>
                        </div>';
                ?>
                </div>
            </div>
            <div class="col">
                <div class="card">
                <?php
                    echo '<div id="product-box" class="card-img-top bg-img hover-zoom">
                            <img class="img-fluid" src="./product_image/'.$hotproductdata[1]['picture'].'">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">'.$hotproductdata[1]['prd_name'].'</h5>
                            <p class="card-text text-danger">'.number_format($hotproductdata[1]['prd_price']).' đ</p>
                        </div>';
                ?>
                </div>
            </div>
            <div class="col">
                <div class="card">
                <?php
                    echo '<div id="product-box" class="card-img-top bg-img hover-zoom">
                            <img class="img-fluid" src="./product_image/'.$hotproductdata[2]['picture'].'">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">'.$hotproductdata[2]['prd_name'].'</h5>
                            <p class="card-text text-danger">'.number_format($hotproductdata[2]['prd_price']).' đ</p>
                        </div>';
                ?>
                </div>
            </div>
        </div>
        <button id="btn-hot-product" type="button" class="btn btn-light my-2 float-end">Xem thêm</button>
    </div>
</div>
<div id="new-product" class="py-5 bg-light">
    <h1 class="text-center pb-3">Các sản phẩm mới</h1>
    <div class="container">
        <div class="row row-cols-1 row-cols-2 row-cols-3 g-3">
            <div class="col">
                <div class="card">
                <?php
                    echo '<div id="product-box" class="card-img-top">
                        <img class="img-fluid" src="./product_image/'.$newproductdata[0]['picture'].'">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">'.$newproductdata[0]['prd_name'].'</h5>
                        <p class="card-text text-danger">'.number_format($hotproductdata[0]['prd_price']).' đ</p>
                    </div>';
                ?>
                </div>
            </div>
            <div class="col">
                <div class="card">
                <?php
                    echo '<div id="product-box" class="card-img-top">
                        <img class="img-fluid" src="./product_image/'.$newproductdata[1]['picture'].'">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">'.$newproductdata[1]['prd_name'].'</h5>
                        <p class="card-text text-danger">'.number_format($hotproductdata[1]['prd_price']).' đ</p>
                    </div>';
                ?>
                </div>
            </div>
            <div class="col">
                <div class="card">
                <?php
                    echo '<div id="product-box" class="card-img-top">
                        <img class="img-fluid" src="./product_image/'.$newproductdata[2]['picture'].'">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">'.$newproductdata[2]['prd_name'].'</h5>
                        <p class="card-text text-danger">'.number_format($hotproductdata[2]['prd_price']).' đ</p>
                    </div>';
                ?>
                </div>
            </div>
        </div>
        <button id="btn-new-product" type="button" class="btn btn-light mt-2 float-end">Xem thêm</button>
    </div>
</div>
<?php
    addFooter();
?>
</body>
</html>