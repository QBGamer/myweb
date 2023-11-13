<?php
        include "../db_con.php";
        include "../handle_sqldata.php";

        $url="http://localhost".$_SERVER['REQUEST_URI'];
        $parts=parse_url($url);
        if(isset($parts['query'])){
            parse_str($parts['query'],$result);
            // var_dump($result);
            $allproduct=getallproduct($result);
        }else{
            $allproduct=getallproduct();
        }
        
        $allbrand=getallbrand(0);
        $alltype=getalltype(0);

    echo '<div class="row g-5 pt-3 px-3">
        <div class="col">
            <div class="fs-5">Tên sản phẩm:</div>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Tên">
            </div>
        </div>
        <div class="col">
            <div class="fs-5">Thương hiệu:</div>
            <select class="form-select">';
            foreach($allbrand as $item){
                echo '<option>'.$item['brand_name'].'</option>';
            }
    echo '</select>
        </div>
        <div class="col">
            <div class="fs-5">Loại:</div>
            <select class="form-select">';
            foreach($alltype as $item){
                echo '<option>'.$item['type_name'].'</option>';
            }
    echo    '</select>
        </div>
        <div class="col">
            <div class="fs-5">Giá sản phẩm:</div>
            <div class="input-group">
                <input type="number" class="form-control" placeholder="Giá">
            </div>
        </div>
        <div class="col">
            <div class="fs-5">Giá khuyến mãi sản phẩm:</div>
            <div class="input-group">
                <input type="number" max="100" class="form-control" placeholder="%Khuyến mãi">
            </div>
        </div>
    </div>
    <div class="row g-5 py-3 px-3">
        <div class="col">
            <div class="fs-5">Tính năng sản phẩm:</div>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Tính Năng">
            </div>
        </div>
        <div class="col">
            <div class="fs-5">Kích cỡ:</div>
            <div class="input-group">
                <input type="number" class="form-control" placeholder="Chiều dài">
                <input type="number" class="form-control" placeholder="Chiều rộng">
            </div>
        </div>
        <div class="col">
            <div class="fs-5">Inverter:</div>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Inverter">
            </div>
        </div>
        <div class="col">
            <div class="fs-5">Màu:</div>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Màu">
            </div>
        </div>
        <div class="col">
            <div class="fs-5">Tốc độ:</div>
            <div class="input-group">
                <input type="number" class="form-control" placeholder="Cấp tốc độ">
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="row border">
            <div class="col text-center align-self-center">Chọn</div>
            <div class="col text-center align-self-center">ID Sản Phẩm</div>
            <div class="col text-center align-self-center">Ảnh</div>
            <div class="col text-center align-self-center">Tên Sản Phẩm</div>
            <div class="col text-center align-self-center">Thương Hiệu</div>
            <div class="col text-center align-self-center">Loại</div>
            <div class="col text-center align-self-center">Giá Sản phẩm</div>
            <div class="col text-center align-self-center">Giá Mới Sản Phẩm</div>
            <div class="col text-center align-self-center">Tính Năng Đặt Biệt</div>
            <div class="col text-center align-self-center">Kích Thước</div>
            <div class="col text-center align-self-center">Inverter</div>
            <div class="col text-center align-self-center">Màu</div>
            <div class="col text-center align-self-center">Điện Năng Tiêu Thụ</div>
            <div class="col text-center align-self-center">Số Cấp Tốc Độ</div>
            <div class="col text-center align-self-center">Lượt Xem</div>
        </div>';
            foreach($allproduct as $item){
                $brand=mysqli_fetch_array(getallbrand($item['brand_id']));
                $type=mysqli_fetch_array(getalltype($item['type_id']));
                echo '<div class="row py-2">
                        <div class="col text-center">
                            <input type="checkbox" class="form-check-input" data-id='.$item['prd_id'].'>
                        </div>
                        <div class="col text-center">'.$item['prd_id'].'</div>
                        <div class="col text-center"><img id="tableimg" class="border" src="../../product_image/'.$item['picture'].'"></div>
                        <div class="col text-center">'.$item['prd_name'].'</div>
                        <div class="col text-center">'.$brand['brand_name'].'</div>
                        <div class="col text-center">'.$type['type_name'].'</div>
                        <div class="col text-center">'.$item['prd_price'].'</div>
                        <div class="col text-center">'.$item['prd_pricenew'].'</div>
                        <div class="col text-center">'.$item['prd_special'].'</div>
                        <div class="col text-center">'.$item['prd_size'].'</div>
                        <div class="col text-center">'.$item['prd_inverter'].'</div>
                        <div class="col text-center">'.$item['prd_color'].'</div>
                        <div class="col text-center">'.$item['prd_vol'].'</div>
                        <div class="col text-center">'.$item['prd_speedlvl'].'</div>
                        <div class="col text-center">'.$item['views'].'</div>
                    </div>
                </div>';
            }
?>