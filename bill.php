<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ./");
        exit();
    }
    include "./handle/db_con.php";
    include "./handle/handle_sqldata.php";
    require "./web/echoHTML.php";
    $username=$_SESSION['username'];
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
<?php
    addHeader();
?>
<div id="body" class="container py-5">
    <div class="card mx-auto p-3">
        <div class="row border-bottom py-1 mb-3">
            <div class="col fs-4">Sản phẩm</div>
            <div class="col fs-4">Số lượng</div>
            <div class="col fs-4">Trạng thái</div>
        </div>
        <?php
        $sql="SELECT bil_id FROM bill WHERE username='$username'";
        $result = mysqli_query($conn,$sql);
        foreach($result as $item){
            $id= $item["bil_id"];
            $sql="SELECT item_bill.bill_id,prd_name,item_bill.num,bill.total,bill.stats FROM item_bill,bill,product WHERE bill.bil_id=item_bill.bill_id AND bill.username='$username' AND item_bill.item_id=product.prd_id AND bill.bil_id=$id";
            $result2=mysqli_query($conn,$sql);
            foreach($result2 as $item2){
                echo '<div class="row p-1">
                    <div class="col">'.$item2['prd_name'].'</div>
                    <div class="col">'.$item2['num'].'</div>';
                switch($item2['stats']){
                    case 0:
                        echo '<div class="col text-warning">Chờ xác nhận</div></div>';
                        break;
                    case 1:
                        echo '<div class="col text-success">Đã xác nhận</div></div>';
                        break;
                    case 2:
                        echo '<div class="col text-muted">Hủy bỏ</div></div>';
                        break;
                }
            }
            echo '<div class="d-flex flex-row-reverse fw-bold mb-5"><div class="text-danger ">Tổng: '.number_format($item2['total']).' đ</div></div>';
        }
        ?>
    </div>
</div>
<?php
    addFooter();
    ?>
<script>
    // $(document).onload(function(){
        //     showbill
    // });
    // function showbill() {
    //     var xmlhttp = new XMLHttpRequest();
    //     xmlhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {
    //         document.getElementById("cart-data-block").innerHTML = this.responseText;
    //         }
    //     };
    //     xmlhttp.open("GET","./handle/handle_cart.php",true);
    //     xmlhttp.send();
    // }
</script>
</body>
</html>