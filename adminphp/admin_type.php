<?php
    session_start();
    if(!isset($_SESSION['permission'])){
        header("Location: ./index.php");
        exit();
    }
    include "../handle/db_con.php";
    include "../handle/handle_sqldata.php";
    include "../web/echoHTML.php";
    // $alluser=getuser();
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
        <?php
            adminbar();
        ?>
    <section class="home">
    <div class="container">
            <div class="card bg-light px-3 mt-5">
                <div class="row border">
                    <div class="col text-center align-self-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bx bx-cog"></i></button>
                        <!-- Modal -->
                        <form action="./handle/type_control.php" method="post" enctype="multipart/form-data">
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm/Chỉnh sửa sản phẩm</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <div class="form-label text-start">ID(Để trống nếu thêm):</div>
                                            <select class="form-select" name="id">
                                            <option value=''></option>
                                                <?php
                                                    $alltype=getalltype(0);
                                                    foreach($alltype as $item)
                                                        echo '<option value='.$item['type_id'].'>'.$item['type_id'].'</option>';
                                                ?>
                                            </select>
                                            <div class="col">
                                                <div class="form-label text-start">Tên loại</div>
                                                <input type="text" class="form-control" name="name">
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
                    <div class="col align-self-center">Tên loại</div>
                </div>
            <div id="datahere"></div>
        </div>
    </section>
    <script src="../js/scriptmenu.js"></script>
    <!-- <script src="/handle/admin/product_control.php"></script> -->
    <script>
        $(document).ready(function(){
            show();
        });
        function show(){
            // console.log("log");
            // var id=this.dataset.id;
            // var quantity=document.getElementById('quantity').value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("datahere").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","./handle/type_control.php",true);
            xmlhttp.send();
        }
        function del(e){
            // console.log("click");
            var id=e.dataset.id;
            // var sendthis="del=1&id="+id;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("datahere").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","./handle/type_control.php?del=1&id="+id,true);
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