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

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" type="text/javascript"></script>
</head>
<body>
<!-- Button trigger modal -->
<div data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</div>

<!-- Modal -->
<div class="modal fade" id="Modal'.$item['prd_id'].'" tabindex="-1" aria-labelledby="ModalLabel'.$item['prd_id'].'" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalLabel'.$item['prd_id'].'">'.$item['prd_id'].'/'.$item['prd_name'].'</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3 m-5">
                            <div class="col">
                                <div class="fs-5">Tên sản phẩm:</div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tên">
                                </div>
                            </div>
                            <div class="col">
                                <div class="fs-5">Chọn ảnh:</div>
                                <div class="input-group">
                                    <input class="form-control" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="col">
                                <div class="fs-5">Thương hiệu:</div>
                                <select class="form-select">';
                                    foreach($allbrand as $ibrand){
                                        echo '<option>'.$ibrand['brand_name'].'</option>';
                                    }
                                '</select>
                            </div>
                            <div class="col">
                            <div class="fs-5">Loại:</div>
                                <select class="form-select">';
                                    foreach($alltype as $itype){
                                        echo '<option>'.$itype['type_name'].'</option>';
                                    }
                                '</select>
                            </div>
                            <div class="col">
                                <div class="fs-5">Giá sản phẩm:</div>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="Giá">
                                    </div>
                            </div>
                            <div class="col">
                                <div class="fs-5">Giá khuyến mãi sản phẩm:</div>
                                <div class="input-group">
                                    <input type="number" max="100" class="form-control" placeholder="%Khuyến mãi">
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 m-5">
                            <div class="col">
                                <div class="fs-5">Tính năng sản phẩm:</div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tính Năng">
                                </div>
                            </div>
                            <div class="col">
                                <div class="fs-5">Kích cỡ:</div>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Chiều dài">
                                    <input type="number" class="form-control" placeholder="Chiều rộng">
                                </div>
                            </div>
                            <div class="col">
                                <div class="fs-5">Inverter:</div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Inverter">
                                </div>
                            </div>
                            <div class="col">
                                <div class="fs-5">Màu:</div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Màu">
                                </div>
                            </div>
                            <div class="col">
                                <div class="fs-5">Điện năng tiêu thụ:</div>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Điện năng tiêu thụ(Vol)">
                                </div>
                            </div>
                            <div class="col">
                                <div class="fs-5">Tốc độ:</div>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Cấp tốc độ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary data-type=2 data-id='.$item['prd_id'].'">Sửa</button>
                        <button type="button" class="btn btn-danger" data-type=3 data-id='.$item['prd_id'].'>Xóa</button>
                    </div>
                    </div>
                </div>
            </div>
</body>
</html>