<?php
session_start();
function addHeader(){
    echo '<div id="header">
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
        </div>';
}
?>