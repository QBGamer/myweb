<?php
  session_start();
  include "./handle/db_con.php";
  include "./handle/handle_sqldata.php";
  require "./web/echoHTML.php";

  $productdata=getallproduct(FALSE);
  $branddata=getallbrand();
  $typedata=getalltype();
  $test=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máy lạnh Hoàng Bình</title>
    <link rel="icon" href="./images/logo.png">

    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/website.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>
<body>
<?php
    addHeader();
?>
<div class="container-fluid">
  <div class="row flex-nowrap">
      <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark-subtle">
          <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-dark min-vh-100">
              <h1><i class="bi-list"></i> Danh mục</h1>
              <ul class="nav nav-pills flex-column">
                  <li>
                    <p class="fs-3 mt-1">Thương hiệu</p>
                    <ul class="nav flex-column">
                      <?php
                        foreach($branddata as $brddata){
                          echo '<li>
                                  <button id="brand'.$brddata['brand-id'].'" type="button" class="btn"><i class="bi-caret-right"></i> '.$brddata['brand-name'].'</button>
                                </li>';
                        }
                      ?>
                    </ul>
                  </li>
                  <li>
                    <p class="fs-3 mt-4">Loại</p>
                    <ul class="nav flex-column">
                      <?php
                        foreach($typedata as $tdata){
                          echo '<li>
                              <button type="button" class="btn"><i class="bi-caret-right"></i> '.$tdata["type_name"].'</button>
                            </li>';
                        }
                      ?>
                    </ul>
                  </li>
                  <li>
                    <p class="fs-3 mt-4">Giá cả</p>
                    <ul class="nav flex-column">
                      <li>
                        <div class="input-group">
                          <span class="input-group-text">Từ</span>
                          <input type="text" class="form-control" placeholder="vd: 100.000 đ">
                        </div>
                        <div class="input-group">
                          <span class="input-group-text">Đến</span>
                          <input type="text" class="form-control" placeholder="vd: 1.100.000 đ">
                        </div>
                        <button type="button" class="btn btn-danger float-end mt-2">Tìm kiếm</button>
                      </li>
                    </ul>
                  </li>
              </ul>
          </div>
      </div>
      <div class="col py-3">

        <!-- item trang shop here -->
        <div id="shop-product" class="py-5 bg-light">
          <div class="container">
              <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-lg-4 g-3">
                  <?php
                    foreach($productdata as $item){
                      echo '<div class="col">
                            <div class="card">
                                <div id="product-box" class="card-img-top bg-img hover-zoom">
                                    <img class="img-fluid" src="./product_image/'.$item['picture'].'">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">'.$item['prd_name'].'</h5>
                                    <p class="card-text text-danger">'.number_format($item['prd_price']).' đ</p>
                                </div>
                            </div>
                        </div>';
                    }
                  ?>
              </div>
          </div>
      </div>

      </div>
  </div>
</div>
<?php
  addFooter();
?>
</body>