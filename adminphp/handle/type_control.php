<?php
session_start();
if(isset($_SESSION['permission'])){
        include "../../handle/db_con.php";
        include "../../handle/handle_sqldata.php";
        

        if(isset($_GET['del'])){
                $name=$_GET['id'];
                $sql="DELETE FROM type WHERE type_id='$name'";
                // var_dump($sql);
                mysqli_query($conn,$sql);
        }

        if(!empty($_POST['id'])){
                $id=$_POST['id'];
                $sql="UPDATE type SET type_id=$id";
                if(!empty($_POST['name'])){
                        $name=$_POST['name'];
                        $sql.=",type_name='$name'";
                }
                $sql.=" WHERE type_id=$id";
                var_dump($sql);
                mysqli_query($conn,$sql);
                header("Location: ../admin_type.php");
                exit();
        }
        
        if(isset($_POST['name'])&&empty($_POST['id'])){
                $name=$_POST['name'];
                $sql="INSERT INTO type(type_name) VALUE ('$name')";
                mysqli_query($conn,$sql);
                header("Location: ../admin_type.php");
                exit();
        }

        $alltype=getalltype(0);
        foreach($alltype as $item){
                echo '<div class="row py-3">
                        <div class="col text-center align-self-center"><button type="button" class="btn btn-danger" data-id="'.$item['type_id'].'" onclick="del(this)">X</button></div>
                        <div class="col align-self-center">'.$item['type_id'].'</div>
                        <div class="col align-self-center">'.$item['type_name'].'</div>
                </div>';
        }
        echo '</div>';
}
// var_dump($_SESSION['permission']);
?>