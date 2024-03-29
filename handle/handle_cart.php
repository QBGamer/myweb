<?php
    session_start();
    require "./db_con.php";
    // mysqli_select_db($conn,"maylanh");
    $uname=$_SESSION["username"];
    if(isset($_GET['type']) && isset($_GET['id'])){
        $type=$_GET['type'];
        $id=$_GET['id'];
        $sql="SELECT * FROM cart WHERE cart_id='$id'";
        $result = mysqli_fetch_array(mysqli_query($conn,$sql));
        if($uname==$result['username']){
            switch($type){
                case "1":
                    $sql="UPDATE cart SET num=num+1 WHERE cart_id='$id'";
                    break;
                case "2":
                    $checknum=mysqli_fetch_array(mysqli_query($conn,"SELECT num FROM cart WHERE cart_id='$id'"))[0];
                    if($checknum!=1)
                        $sql="UPDATE cart SET num=num-1 WHERE cart_id='$id'";
                    break;
                case "3":
                    $sql="DELETE FROM cart WHERE cart_id='$id'";
                    break;
            }
            // var_dump($sql);
            mysqli_query($conn,$sql);
        }
    }
    $sql="SELECT product.*,cart.num,cart.cart_id FROM cart,users,product WHERE users.username='$uname' AND users.username=cart.username AND product.prd_id=cart.prd_id";
    $result = mysqli_query($conn,$sql);
    $total=0;
    // var_dump(mysqli_fetch_all($result,MYSQLI_ASSOC));

    // echo '<table class="table">
    //     <thead>
    //         <tr>
    //             <th id="cart-table-header-sp" scope="col">Sản phẩm</th>
    //             <th id="cart-table-header" scope="col">Đơn giá</th>
    //             <th id="cart-table-header" scope="col">Số lượng</th>
    //             <th id="cart-table-header" scope="col">Giá</th>
    //             <th id="cart-table-header" scope="col">Thao tác</th>
    //         </tr>
    //     </thead>
    //     <tbody>';
    // while($row = mysqli_fetch_array($result)) {
    //     $total+=$row['prd_price']*$row['num'];
    //     echo "<tr>";
    //     echo "<td><img id='img' class='border' src='./product_image/".$row['picture']."'><span class='ms-5'>".$row['prd_name']."</span></td>";
    //     echo "<td class='align-self-center'>".number_format($row['prd_price'])." đ</td>";
    //     echo "<td><button id='test' type='button' class='btn btn-light border cart-btn' data-type=1 data-id=".$row['cart_id']." onclick='controlCart(this)'>+</button><span class='px-2'>".$row['num']."</span><button type='button' class='btn btn-light border cart-btn' data-type=2 data-id=".$row['cart_id']." onclick='controlCart(this)'>-</button></td>";
    //     echo "<td>".number_format($row['prd_price']*$row['num'])." đ</td>";
    //     echo "<td><button type='button' class='btn btn-danger border' data-type=3 data-id=".$row['cart_id']." onclick='controlCart(this)'>Xóa</button></td>";
    //     echo "</tr>";
    // }

    // echo '</tbody>
    //     </table>';
    // echo '<div class="row border-bottom mb-2">
        //     <div class="col-6 fs-5">Sản phẩm</div>
        //     <div class="col fs-5">Đơn giá</div>
        //     <div class="col fs-5">Số lượng</div>
        //     <div class="col fs-5">Giá</div>
        //     <div class="col fs-5">Thao tác</div>
        // </div>';
    foreach($result as $item){
        $total+=($item['prd_price']-($item['prd_price']*$item['prd_pricenew']/100))*$item['num'];
        echo '<div class="row mt-4 py-2 border-bottom">
                <div class="col align-self-center"><img id="img" class="border" src="./product_image/'.$item['picture'].'"></div>
                <div class="col align-self-center">'.$item['prd_name'].'</div>';
            if($item['prd_pricenew']!=NULL)
                echo '<div class="col-lg align-self-center d-flex justify-content-center">'.number_format($item['prd_price']-($item['prd_price']*$item['prd_pricenew']/100)).' đ x</div>
                    <div class="col-lg align-self-center d-flex justify-content-center">
                    <button type="button" class="btn btn-light border cart-btn" data-type=1 data-id='.$item['cart_id'].' onclick="controlCart(this)">+</button>
                    <span class="px-2">'.$item['num'].'</span>
                    <button type="button" class="btn btn-light border cart-btn" data-type=2 data-id='.$item['cart_id'].' onclick="controlCart(this)">-</button>
                </div>';
                // <div class="col align-self-center">'.number_format(($item['prd_price']-($item['prd_price']*$item['prd_pricenew']/100))*$item['num']).' đ</div>';
            else 
                echo '<div class="col-lg align-self-center d-flex justify-content-center">'.number_format($item['prd_price']).' đ x</div>
                    <div class="col-lg align-self-center d-flex justify-content-center">
                    <button type="button" class="btn btn-light border cart-btn" data-type=1 data-id='.$item['cart_id'].' onclick="controlCart(this)">+</button>
                    <span class="px-2">'.$item['num'].'</span>
                    <button type="button" class="btn btn-light border cart-btn" data-type=2 data-id='.$item['cart_id'].' onclick="controlCart(this)">-</button>
                </div>';
                // <div class="col align-self-center">'.number_format($item['prd_price']*$item['num']).' đ</div>';
        echo    '<div class="col d-flex align-self-center justify-content-end"><button type="button" class="btn btn-danger border" data-type=3 data-id='.$item['cart_id'].' onclick="controlCart(this)">Xóa</button></div>
        </div>';
    }
    echo '<div class="container-fluid">
            <div class="row row-cols-1 py-5">
                <div class="col">
                    <div id="cart-buy-block" class="card mx-auto p-3">
                        <p class="fs-md-4">Tổng thanh toán('.mysqli_num_rows($result).' sản phẩm)</p>
                        <p class="fs-md-4 px-2 text-warning">'.number_format($total).' đ<p>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#thanhtoan">Thanh toán</button>
                    </div>
                </div>
            </div>
        </div>';
    mysqli_close($conn);
?>