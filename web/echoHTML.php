<?php
function addHeader(){
    echo '<div id="header" class="navbar navbar-expand bg-dark sticky-top">
    <div class="container-fluid d-flex justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="index.php" class="navbar-brand me-2 d-none d-lg-inline">
                    <img id="logo" src="./images/longlogo.png">
                </a>
                <a href="index.php" class="navbar-brand me-2 d-none d-sm-inline d-lg-none">
                    <img id="logosmall" src="./images/logo.png" alt="">
                </a>
            </li>
            <li class="nav-item mx-sm-1 mx-lg-5">
                <div id="search-box" class="input-group d-flex justify-content-center">
                    <input id="search-bar" type="text" class="form-control sreach_name_box" placeholder="Tìm kiếm tại đây!...">
                    <span id="search-bt" class="input-group-text btn sreach_name_btn bg-light"><i class="bi-search"></i></span>
                </div>
            </li>
            <li class="nav-item mx-sm-1 ms-lg-5 me-2">
                <a id="header-item" class="nav-link text-light" href="index.php">
                    <i class="bi-house"></i>
                    <p class="d-none d-lg-inline">Trang chủ</p></a>
              </a>
            </li>
            <li class="nav-item me-2">
                <a id="header-item" class="nav-link text-light" href="shop.php">
                    <i class="bi-shop"></i>
                    <p class="d-none d-lg-inline">Cửa hàng</p></a>
              </a>
            </li>
            <li class="nav-item me-2">
                <a id="header-item" class="nav-link text-light" href="cart.php">
                    <i class="bi-cart"></i>
                    <p class="d-none d-lg-inline">Giỏ hàng</p></a>
            </li>
            <li class="nav-item">';

            $uname="Tài khoản";

            echo '<dir class="dropdown p-0 m-0">
                <a id="header-item" class="dropdown-toggle nav-link text-light" href="#" data-bs-toggle="dropdown">
                    <i class="bi-person"></i>';
            if(isset($_SESSION["username"])){
                $uname=$_SESSION["username"];
                echo '<p class="d-none d-lg-inline">'.$uname.'</p></a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow position-absolute">';
                if(!isset($_SESSION['permisson']))
                {
                    echo '<li><a class="dropdown-item" href="admin.php">Admin</a></li>';
                }
                echo '<li><a class="dropdown-item" href="./handle/handle_logout.php">Đăng xuất</a></li>';
            }else{
                echo '<p class="d-none d-lg-inline">'.$uname.'</p></a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow position-absolute">
                        <li><a class="dropdown-item" href="login.php">Đăng nhập</a></li>
                        <li><a class="dropdown-item" href="register.php">Đăng ký</a></li>
                        </ul>
                    </div>';
            }
        echo '</li>
            </ul>
        </div>
    </div>';
}

function addFooter(){
    echo '<div id="footer" class="navbar navbar-expand-sm bg-dark mt-5">
    <div class="container-fluid justify-content-center pb-3">
        <ul class="navbar-nav">
            <li class="nav-item mx-5 my-3 text-white">
                <i class="bi-pin-map"></i>
                Địa chỉ:
                <p><i class="bi-geo-alt"></i>73 Nguyễn Huệ, Phường 2, TP, Vĩnh Long, Vietnam</p>
            </li>
            <li class="nav-item mx-5 my-3 text-white">
                <i class="bi-mailbox"></i>
                Mail:
                <p><i class="bi-envelope"></i>hoangbinh@gmail.com</p>
            </li>
            <li class="nav-item mx-5 my-3 text-white">
                <i class="bi-phone"></i>
                Số điện thoại:
                <p><i class="bi-telephone"></i> 0123456789</p>
            </li>
            <li class="nav-item mx-5 my-3">
                <i class="bi-globe text-white"></i>
                Theo dõi chúng tôi trên:
                <a href="https://www.facebook.com/" class="nav-link text-primary"><i class="bi-facebook"></i> Facebook</a>
                <a href="https://www.youtube.com/" class="nav-link text-danger"><i class="bi-youtube"></i> Youtube</a>
                <a href="https://www.instagram.com/" class="nav-link text-warning"><i class="bi-instagram"></i> Instagram</a>
            </li>
        </ul>
    </div>
</div>';
}

function addHeaderOther(){
    echo '<div id="header" class="navbar navbar-expand bg-dark sticky-top">
    <div class="container-fluid ps-5">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="index.php" class="navbar-brand me-2 d-none d-lg-inline">
                    <img id="logo" src="./images/longlogo.png">
                </a>
                <a href="index.php" class="navbar-brand me-2 d-sm-inline d-lg-none">
                    <img id="logosmall" src="./images/logo.png" alt="">
                </a>
            </li>
            <li class="nav-item fs-3 text-light"><i class="bi-caret-right-fill"></i></li>';

    if(strpos($_SERVER['REQUEST_URI'],"register.php")){
        echo    '<li class="nav-item fs-3 text-light">Đăng ký</li>';
    }
    else{
        echo    '<li class="nav-item fs-3 text-light">Đăng nhập</li>';
    }
    echo '</div>
    </div>';
}

function searchbox(){
    echo "$('.sreach_name_box').keypress(function(eventkey){
            if(eventkey.key==='Enter'){
                var srname=document.getElementById('search-bar').value;
                window.location ='shop.php?name='+srname;
            }
            });

            $('.sreach_name_btn').click(function(){
            var srname=document.getElementById('search-bar').value;
            if(srname!=''){
                window.location='shop.php?name='+srname;
            }
            });";
}

function adminbar(){
    echo '<nav class="sidebar close">
                <header>
                    <div class="image-text">
                        <span class="image">
                            <img src="../images/logoblack.png" alt="">
                        </span>
                        
                        <div class="text logo-text">
                            <span class="name">ShopMayLanh</span>
                            <span class="profession">HoangBinh</span>
                        </div>
                    </div>
                
                <i class="bx bx-chevron-right toggle"></i>
            </header>

            <div class="menu-bar">
                <div class="menu">
                    
                <ul class="menu-links p-0">
                        <li class="nav-link">
                            <a href="../index.php">
                                <i class="bx bx-home-alt icon" ></i>
                                <span class="text nav-text">Trang Chủ</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="../admin.php">
                                <i class="bx bx-clipboard icon" ></i>
                                <span class="text nav-text">Thống kê</span>
                            </a>
                        </li>
                        
                        <li class="nav-link qlsp">
                            <a href="./admin_product.php">
                                <i class="bx bx-bar-chart-alt-2 icon" ></i>
                                <span class="text nav-text">Sản Phẩm</span>
                            </a>
                        </li>
                        
                        <li class="nav-link">
                            <a href="./admin_user.php">
                                <i class="bx bx-user icon"></i>
                                <span class="text nav-text">Người dùng</span>
                            </a>
                        </li>
                        
                        <li class="nav-link">
                            <a href="#">
                                <i class="bx bx-shopping-bag icon"></i>
                                <span class="text nav-text">Quản Lí Đơn Hàng</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="./admin_brand.php">
                                <i class="bx bx-purchase-tag-alt icon"></i>
                                <span class="text nav-text">Quản Lí Nhãn Hiệu</span>
                            </a>
                        </li>
                        
                        <li class="nav-link">
                            <a href="./admin_type.php">
                                <i class="bx bx-shape-circle icon"></i>
                                <span class="text nav-text">Quản Lí Loại SP</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="bottom-content">
                    <li class="">
                        <a href="../handle/handle_logout.php">
                            <i class="bx bx-log-out icon"></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                    
                    <li class="mode">
                        <div class="sun-moon">
                            <i class="bx bx-moon icon moon"></i>
                            <i class="bx bx-sun icon sun"></i>
                        </div>
                        <span class="mode-text text"></span>
                        
                        <div class="toggle-switch">
                            <span class="switch"></span>
                        </div>
                    </li>
                    
                </div>
            </div>

            </nav>';
}
?>