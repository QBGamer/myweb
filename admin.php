<?php
    session_start();
    if(!isset($_SESSION['permission'])){
        header("Location: ./index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="./css/stylemenu.css">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        
        <!-- Bootstrap -->
        <script src="./js/bootstrap.bundle.js"></script>
        <link rel="stylesheet" href="./css/bootstrap.css">

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
                        <a href="./adminphp/admin_product.php">
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
                    <a href="./handle/handle_logout.php">
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
        <div id="datahere" class="text">Chào Ngài Admin!</div>
    </section>
    <script src="./js/scriptmenu.js"></script>
</body>
</html>