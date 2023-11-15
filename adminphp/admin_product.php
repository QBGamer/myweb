<?php
    session_start();
    if(!isset($_SESSION['permission'])){
        header("Location: ./index.php");
        exit();
    }
    include "../handle/db_con.php";
    include "../handle/handle_sqldata.php";
    $allbrand=getallbrand(0);
    $alltype=getalltype(0);
    $allprod=getallproduct();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../css/stylemenu.css">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        
        <!-- Bootstrap -->
        <script src="../js/bootstrap.bundle.js"></script>
        <link rel="stylesheet" href="../css/bootstrap.css">

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" type="text/javascript"></script>

        <title>Chào Admin</title> 
    </head>
    <body>
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="logo12.png" alt="">
                    </span>
                    
                    <div class="text logo-text">
                        <span class="name">ShopMayLanh</span>
                        <span class="profession">HoangBinh</span>
                    </div>
                </div>
            
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        
        <div class="menu-bar">
            <div class="menu">
                
                <ul class="menu-links p-0">
                    <li class="nav-link">
                        <a href="./index.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Trang Chủ</span>
                        </a>
                    </li>
                    
                    <li class="nav-link qlsp">
                        <a>
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Quản Lí Sản Phẩm</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Thông Báo</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-shopping-bag icon'></i>
                            <span class="text nav-text">Quản Lí Đơn Hàng</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-cart icon'></i>
                            <span class="text nav-text">Giỏ Hàng</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Quản Lí Thanh Toán</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
            
            <div class="bottom-content">
                <li class="">
                    <a href="../handle/handle_logout.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
                
                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text"></span>
                    
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>
        
    </nav>
    <section class="home">
        <div class="container-fluid">
            <div class="container-fluid bg-light px-3 mt-5">
                <div class="row border">
                    <div class="col text-center align-self-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bx bx-cog"></i></button>
                        <!-- Modal -->
                        <form action="./handle/product_control.php" method="post" enctype="multipart/form-data">
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm/Chỉnh sửa sản phẩm</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="mb-3">
                                                <div class="form-label text-start">ID(để trống nếu thêm sản phẩm):</div>
                                                <select class="form-select" name="id" id="id-box">
                                                    <option value="" selected></option>
                                                    <?php
                                                        foreach($allprod as $iprod)
                                                            echo '<option value='.$iprod['prd_id'].'>'.$iprod['prd_id'].'</option>';
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-label text-start">Tên sản phẩm:</div>
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                                <div class="col">
                                                    <div class="form-label text-start">Ảnh sản phẩm:</div>
                                                    <input type="file" class="form-control" name="img" accept=".png,.jpg,.jpeg">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-label text-start">Thương hiệu:</div>
                                                    <select class="form-select" name="brand">
                                                        <?php
                                                            foreach($allbrand as $ibrand)
                                                                echo '<option value='.$ibrand['brand_id'].'>'.$ibrand['brand_name'].'</option>';
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <div class="form-label text-start">Loại:</div>
                                                    <select class="form-select" name="type">
                                                    <?php
                                                            foreach($alltype as $itype)
                                                                echo '<option value='.$itype['type_id'].'>'.$itype['type_name'].'</option>';
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-label text-start">Giá:</div>
                                                    <input type="number" min=0 class="form-control" name="price">
                                                </div>
                                                <div class="col">
                                                    <div class="form-label text-start">%Khuyến mãi:</div>
                                                    <input type="number" min=0 max=100 class="form-control" name="newprice">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-label text-start">Tính năng:</div>
                                                    <input type="text" class="form-control" name="special">
                                                </div>
                                                <div class="col">
                                                    <div class="form-label text-start">Kích thước:</div>
                                                    <div id="search-box" class="input-group d-flex justify-content-center">
                                                        <input type="number" min=0 class="form-control" name="size1">
                                                        <input type="number" min=0 class="form-control" name="size2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-label text-start">Inverter:</div>
                                                    <input type="text" class="form-control" name="inverter">
                                                </div>
                                                <div class="col">
                                                    <div class="form-label text-start">Màu:</div>
                                                    <input type="text" class="form-control" name="color">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-label text-start">Điện năng:</div>
                                                    <input type="number" class="form-control" name="vol">
                                                </div>
                                                <div class="col">
                                                    <div class="form-label text-start">Cấp gió:</div>
                                                    <input type="number" min=1 class="form-control" name="wind">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Thêm/Chỉnh sửa</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col align-self-center">ID</div>
                    <div class="col-2 text-center align-self-center">Sản Phẩm</div>
                    <div class="col align-self-center">Thương Hiệu</div>
                    <div class="col align-self-center">Loại</div>
                    <div class="col align-self-center">Giá</div>
                    <div class="col align-self-center">%KM</div>
                    <div class="col-2 text-center align-self-center">Tính Năng Đặt Biệt</div>
                    <div class="col text-center align-self-center">Kích Thước</div>
                    <div class="col text-center align-self-center">Inverter</div>
                    <div class="col text-center align-self-center">Màu</div>
                    <div class="col text-center align-self-center">Điện Năng</div>
                    <div class="col text-center align-self-center">Cấp Gió</div>
                    <div class="col text-center align-self-center">Lượt Xem</div>
                </div>
            <div id="datahere"></div>
        </div>
    </section>
    <script src="../js/scriptmenu.js"></script>
    <!-- <script src="/handle/admin/product_control.php"></script> -->
    <script>
        $(document).ready(function(){
            showProduct();
        });
        function showProduct(){
            // var id=this.dataset.id;
            // var quantity=document.getElementById('quantity').value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("datahere").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","./handle/product_control.php",true);
            xmlhttp.send();
        }
        function delProduct(e){
            // console.log("click");
            var id=e.dataset.id;
            // var sendthis="del=1&id="+id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("datahere").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","./handle/product_control.php?del=1&id="+id,true);
            xmlhttp.send();
        }
        //     function controlCart(obj){
        //     var type=obj.dataset.type;
        //     var id=obj.dataset.id;
        //     var xmlhttp = new XMLHttpRequest();
        //     xmlhttp.onreadystatechange = function() {
        //         if (this.readyState == 4 && this.status == 200) {
        //         document.getElementById("cart-data-block").innerHTML = this.responseText;
        //         }
        //     };
        //     xmlhttp.open("GET","./handle/cart/handle_cart.php?id="+id+"&type="+type,true);
        //     xmlhttp.send();
        // };
    </script>
</body>
</html>