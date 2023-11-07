<?php
    session_start();
    include "./handle/db_con.php";
    include "./handle/get_product.php";

    $allproduct=getallproduct();
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>HOME</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <!-- <p> -->
        <?php
            // if(isset($_SESSION['username'])){
            //     echo $_SESSION['username'];
            //     echo '<a href="handle/handle_logout.php">Đăng xuất</a>';
            // }
            // else
            //     echo '<a href="login.php">Đăng nhập</a>';
        ?>
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
                            <img src="./icons/list.png" id="header-icon" alt="Danh mục">
                            <div id="header-icon-text">Danh mục</div>
                        </a>
                    </li>
                    <li>
                        <input id="search-bar" type="text" placeholder="Tìm kiếm">
                    </li>
                </ul>
            </div>
        </div>
    </body>
    </html>