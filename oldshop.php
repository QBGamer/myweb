<?php
    session_start();
    include "./handle/db_con.php";
    include "./handle/get_product.php";

    $allproduct=getallproduct(TRUE);
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>HOME</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <!-- <p> -->
        <!-- </p>
        <div>Sản phẩm</div> -->
        <?php
        // foreach ($allproduct as $item){
        //     echo '<div id="item">
        //         <img id="item_img" src="./product_image/'.$item['picture'].'">
        //         <div id="item_name">'.$item['prd_name'].'</div>
        //         <div id="item_price">'.$item['prd_price'].'</div>
        //         </div>';
        // }
        ?>
        <div id="main-body">
            <div id="header">
                <ul id="header-menu">
                    <li id="logo">
                        <a id="logo-bt" href="index.php"><img src="./icons/longlogo.png" id="logo-img"></a>
                    </li>
                    <li id="category">
                        <a href="#" id="header-icon-box">
                            <img src="./icons/list.png" id="header-icon">
                            <span id="header-icon-text">Danh<br>mục</span>
                        </a>
                    </li>
                    <li id="search-bar">
                        <input id="search-box" type="text" placeholder="Tìm kiếm...">
                    </li>
                    <li id="home">
                        <a href="index.php" id="header-icon-box">
                            <img src="./icons/home.png" id="header-icon">
                            <span id="header-icon-text">Trang<br>chủ</span>
                        </a>
                    </li>
                    <li id="cart">
                        <a href="#" id="header-icon-box">
                            <img src="./icons/cart.png" id="header-icon">
                            <span id="header-icon-text">Giỏ<br>hàng</span>
                        </a>
                    </li>
                    <li id="accountuser">
                        <a href="#" id="header-icon-box">
                            <img src="./icons/user.png" id="header-icon">
                            <span id="header-icon-text"><?php
                                if(isset($_SESSION["username"]))
                                {
                                    echo $_SESSION["username"];
                                }
                                else
                                    echo "Đăng nhập";
                            ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div id="body-content">
                <?php
                foreach ($allproduct as $item){
                    echo '<div id="item">
                        <img id="item_img" src="./product_image/'.$item['picture'].'">
                        <div id="item_name">'.$item['prd_name'].'</div>
                        <div id="item_price">'.$item['prd_price'].'</div>
                        </div>';
                }
                ?>
            </div>
        </div>
    </body>
    </html>