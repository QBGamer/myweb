<?php
session_start();
  if(isset($_SESSION['permission'])){
    include "../../handle/db_con.php";
    if(isset($_GET["id"])){
      $id = $_GET["id"];
      $status=$_GET['status'];
      $sql="UPDATE bill SET stats=$status WHERE bil_id=$id";
      mysqli_query($conn, $sql);
    }
    $sql="SELECT * FROM bill";
    $result=mysqli_query($conn,$sql);
    foreach($result as $item){
      $id=$item['bil_id'];
      echo '<tr>
      <td class="align-self-center">'.$item['date'].'</td>
              <td class="align-self-center"><button class="btn" type="button" data-bs-toggle="modal" data-bs-target="#checksp'.$item['bil_id'].'">Xem sản phẩm</button></td>
              <td class="align-self-center">'.$item['username'].'</td>
              <td class="align-self-center">'.$item['phone'].'</td>
              <td class="align-self-center">'.$item['mail'].'</td>
              <td class="align-self-center">'.$item['address'].'</td>
              <td class="align-self-center">'.number_format($item['total']).' đ</td>
              <td class="align-self-center">
              <select class="form-select" data-id='.$item['bil_id'].' onchange="changestatus(this)">';
    switch($item['stats']){
      case 0:
        echo '<option class="text-warning" value="0" selected>Chờ xác nhận</option>
            <option class="text-success" value="1">Đã xác nhận</option>
            <option class="text-muted" value="2">Hủy bỏ</option>';
        break;
      case 1:
        echo '<option class="text-warning" value="0">Chờ xác nhận</option>
            <option class="text-success" value="1" selected>Đã xác nhận</option>
            <option class="text-muted" value="2">Hủy bỏ</option>';
        break;
      case 2:
        echo '<option class="text-warning" value="0">Chờ xác nhận</option>
            <option class="text-success" value="1">Đã xác nhận</option>
            <option class="text-muted" value="2" selected>Hủy bỏ</option>';
        break;
    }
              echo '</select>
            </td>
      </tr>
      </div>
        <div class="modal fade" id="checksp'.$item['bil_id'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Danh sách sản phẩm hóa đơn '.$item['bil_id'].'</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row mb-3 fs-4">
              <div class="col">Sản phẩm</div>
              <div class="col">Số lượng</div>
            </div>';
        $sql="SELECT item_bill.num,product.prd_name FROM product,item_bill WHERE product.prd_id=item_bill.item_id AND item_bill.bill_id=$id";
        $result2=mysqli_query($conn,$sql);
        foreach($result2 as $item2){
          echo '<div class="row">
          <div class="col">'.$item2['prd_name'].'</div>
          <div class="col">'.$item2['num'].'</div>
          </div>';
        }
        echo '</div>
        </div>';
    }
  }   
?>