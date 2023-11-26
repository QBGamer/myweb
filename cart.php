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
            <div class="col">
                <div id="cart-data-block" class="card mx-auto p-3">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="thanhtoan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Thanh toán</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="./handle/handle_bill.php" method="post">
                <p class="fw-bold">Thông tin khách hàng</p>
                <div class="row g-2 px-2">
                    <div class="col">
                        <input name="phone" type="text" class="form-control" value="<?php echo $_SESSION['phonenumber']?>" placeholder="Số điện thoại">
                    </div>
                    <div class="col">
                        <input name="mail" type="text" class="form-control" value="<?php echo $_SESSION['mail']?>" placeholder="Mail cá nhân">
                    </div>
                </div>
                <div class="row mt-2 px-2">
                    <div class="col">
                        <input name="address" type="text" class="form-control" value="<?php echo $_SESSION['address']?>" placeholder="Địa chỉ nhận hàng">
                    </div>
                </div>
                <p class="fw-bold mt-5">Hình thức nhận hàng</p>
                <div class="form-check px-5">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Nhận tại nhà
                    </label>
                </div>
                <div class="mt-5 justify-content-end">
                    <button class="btn border-danger text-danger" type="submit">Xác nhận</button>
                </div>
            </form>
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
        xmlhttp.open("GET","./handle/handle_cart.php",true);
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
        xmlhttp.open("GET","./handle/handle_cart.php?id="+id+"&type="+type,true);
        xmlhttp.send();
    };
</script>
</body>
</html>
