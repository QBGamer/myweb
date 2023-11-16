<?php
session_start();
if(isset($_SESSION['permission'])){
        include "../../handle/db_con.php";
        include "../../handle/handle_sqldata.php";
        

        if(isset($_GET['del'])){
                $name=$_GET['id'];
                $sql="DELETE FROM users WHERE username='$name'";
                // var_dump($sql);
                mysqli_query($conn,$sql);
        }
        
        if(isset($_POST['name'])){
                $name=$_POST['name'];
                $sql="UPDATE users SET username='$name'";
                if(!empty($_POST['phone'])){
                        $phone=$_POST['phone'];
                        $sql.=",phonenumber=$phone";
                }
                if(!empty($_POST['email'])){
                        $mail=$_POST['email'];
                        $sql.=",mail='$mail'";
                }
                if(!empty($_POST['address'])){
                        $addres=$_POST['address'];
                        $sql.=",address='$addres'";
                }
                if(!empty($_POST['permission'])){
                        $permis=$_POST['permission'];
                        $sql.=",permission=$permis";
                }
                $sql.=" WHERE username='$name'";
                // var_dump($sql);
                mysqli_query($conn,$sql);
                header("Location: ../admin_user.php");
                exit();
        }
        $alluser=getuser();
        foreach($alluser as $item){
                echo '<div class="row py-3">
                        <div class="col text-center align-self-center"><button type="button" class="btn btn-danger" data-id="'.$item['username'].'" onclick="del(this)">X</button></div>
                        <div class="col align-self-center">'.$item['username'].'</div>
                        <div class="col align-self-center">'.$item['phonenumber'].'</div>
                        <div class="col align-self-center">'.$item['mail'].'</div>
                        <div class="col align-self-center">'.$item['address'].'</div>
                        <div class="col align-self-center">'.$item['permission'].'</div>
                </div>';
        }
        echo '</div>';
}
// var_dump($_SESSION['permission']);
?>