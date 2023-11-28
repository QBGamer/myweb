<?php
  session_start();
  require "./handle_sqldata.php";
  if (isset($_SESSION["username"])){
    $username = $_SESSION["username"];
    if(isset($_POST['phone'])){
      $date= date("Y-m-d H:i:s");
      $phone = $_POST['phone'];
      $mail=$_POST['mail'];
      $address=$_POST['address'];
      $total=0;

      $item_id="";
      $item_price="";
      $sql="SELECT product.*,cart.num,cart.cart_id FROM cart,users,product WHERE users.username='$username' AND users.username=cart.username AND product.prd_id=cart.prd_id";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
        foreach($result as $item){
          $total+=($item['prd_price']-($item['prd_price']*$item['prd_pricenew']/100))*$item['num'];
        }

        $sql="INSERT INTO bill (date,username,phone,mail,address,total) value ('$date','$username','$phone','$mail','$address',$total)";
        mysqli_query($conn,$sql);

        $sql= "SELECT bil_id FROM bill WHERE date='$date' and username='$username'";
        // var_dump($sql);
        $id=mysqli_fetch_array(mysqli_query($conn,$sql))[0];
        // var_dump($id);

        $sql="SELECT product.*,cart.num,cart.cart_id FROM cart,users,product WHERE users.username='$username' AND users.username=cart.username AND product.prd_id=cart.prd_id";
        $result = mysqli_query($conn,$sql);
        foreach($result as $item){
          $item_id=$item["prd_id"];
          $num=$item['num'];
          $sql= "INSERT INTO item_bill value ($id,$item_id,$num)";
          mysqli_query($conn,$sql);
        }
        $sql= "DELETE FROM cart WHERE username='$username'";
        // var_dump($sql);
        mysqli_query($conn,$sql);
      }
    }
  }
  header("Location: ../cart.php");
  exit();
?>