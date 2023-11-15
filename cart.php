<?php
    session_start();
    require "./web/echoHTML.php";
    if(!isset($_SESSION["username"])){
        header("Location: ./login.php");
        exit();
    }else{
        include "./handle/handle_sqldata.php";

        // $cartdata=getusercart($_SESSION["username"]);
        // foreach($cartdata as $item){
        //     var_dump($item);
        // }
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máy lạnh Hoàng Bình</title>
    <link rel="icon" href="./images/logo.png">

    <link rel="stylesheet" href="./css/style.css">
    <!-- <script src="./js/cart.js"></script> -->
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
    <div class="container-fluid">
        <div class="row row-cols-1 py-5">
            <div class="col ">
                <div id="cart-data-block" class="card mx-auto p-3">
                </div>
            </div>
        </div>
    </div>
<?php
    addFooter();
?>
<script>
    $(document).ready(function(){
        showCart();
    })
    <?php
        searchbox();
    ?>
    function showCart() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("cart-data-block").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","./handle/cart/handle_cart.php",true);
        xmlhttp.send();
    }
    function controlCart(obj){
        var type=obj.dataset.type;
        var id=obj.dataset.id;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("cart-data-block").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","./handle/cart/handle_cart.php?id="+id+"&type="+type,true);
        xmlhttp.send();
    };
</script>
</body>
</html>
