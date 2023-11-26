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
            <div class="card bg-light p-3 mt-5">
            <table id="datahere">
              <tr class="py-3" id="head">
                <td class="align-self-center fw-bold">Vào lúc</td>
                <td class="align-self-center fw-bold">Sản phẩm</td>
                <td class="align-self-center fw-bold">Người dùng</td>
                <td class="align-self-center fw-bold">Số điện thoại</td>
                <td class="align-self-center fw-bold">Mail</td>
                <td class="align-self-center fw-bold">Địa chỉ</td>
                <td class="align-self-center fw-bold">Số tiền</td>
                <td class="align-self-center fw-bold">Tình trạng</td>
              </tr>
            </table>
            <!-- <table ></table> -->
        </div>
    </section>
    <script src="../js/scriptmenu.js"></script>
    <script>
        $(document).ready(function(){
            show();
        });
        function show(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("datahere").innerHTML =document.getElementById("head").innerHTML+this.responseText;
                }
            };
            xmlhttp.open("GET","./handle/bill_control.php",true);
            xmlhttp.send();
        }
        function changestatus(e){
          var value=e.value;
          var id=e.dataset.id;
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("datahere").innerHTML =document.getElementById("head").innerHTML+this.responseText;
              }
          };
          var stringchange="?id="+id+"&status="+value;
          xmlhttp.open("GET","./handle/bill_control.php"+stringchange,true);
          xmlhttp.send();
        }
        // data-bill-id='.$item['bil_id'].' onchange="changestatus(this)"
    </script>
</body>
</html>