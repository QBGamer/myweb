<?php
  session_start();
  include "./handle/db_con.php";
  include "./handle/handle_sqldata.php";
  require "./web/echoHTML.php";

  
  // var_dump("http://localhost".$_SERVER['REQUEST_URI']);
  $url="http://localhost".$_SERVER['REQUEST_URI'];
  $parts=parse_url($url);
  if(isset($parts['query'])){
    parse_str($parts['query'],$result);
    // var_dump($result);
    $productdata=getallproduct($result);
  }else{
    $productdata=getallproduct();
  }
  $branddata=getallbrand(FALSE);
  $typedata=getalltype(FALSE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máy lạnh Hoàng Bình</title>
    <link rel="icon" href="./images/logo.png">

    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/website.js"></script>

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
<div id="body" class="container-fluid">
  <button type="button" class="btn fs-1" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="sidebar_shop btn_show_lable"><i class="bi-list-columns-reverse"></i> <span class="collapse multi-collapse show" id="btn_show_lable"">Danh mục<span></button>
  <div class="row flex-nowrap">
      <div class="col-auto col-md-3 col-xl-2 px-sm-1 px-0 border-end border-top collapse multi-collapse show" id="sidebar_shop">
          <div class="d-flex flex-column align-items-center align-items-sm-start px-1 pt-2 text-dark min-vh-100">
              <ul class="nav nav-pills flex-column">
                  <li>
                    <p class="fs-3 mt-1">Thương hiệu</p>
                    <ul class="nav flex-column">
                      <?php
                        foreach($branddata as $brddata){
                          echo '<li>
                                  <a href="#"';
                          if(isset($result['brand'])){
                            if($brddata['brand_id']==$result['brand']){
                              echo 'class="nav-link btn-secondary search-filter"';
                            }else{
                              echo 'class="nav-link disabled"';
                            }
                          }else{
                            echo 'class="nav-link search-filter"';
                          }
                          echo 'data-mtype="brand" data-mvalue="'.$brddata['brand_id'].'"><i class="bi-caret-right"></i> '.$brddata['brand_name'].'</a>
                                </li>';
                        }
                      ?>
                    </ul>
                  </li>
                  <li>
                    <p class="fs-3 mt-4">Loại</p>
                    <ul class="nav flex-column">
                      <?php
                        foreach($typedata as $tdata){
                          echo '<li>
                                  <a href="#"';
                          if(isset($result['type'])){
                            if($tdata['type_id']==$result['type']){
                              echo 'class="nav-link btn-secondary search-filter"';
                            }else{
                              echo 'class="nav-link disabled"';
                            }
                          }else{
                            echo 'class="nav-link search-filter"';
                          }
                          echo 'data-mtype="type" data-mvalue="'.$tdata['type_id'].'"><i class="bi-caret-right"></i> '.$tdata['type_name'].'</a>
                                </li>';
                        }
                      ?>
                    </ul>
                  </li>
                  <li>
                    <p class="fs-3 mt-4">Sắp xếp theo</p>
                    <ul class="nav flex-column">
                      <li><a href="#" class="nav-link btn-secondary search-filter" data-mtype="views" data-mvalue="1">
                        <i class="bi-caret-right"></i> Lượt xem</a>
                      </li>
                      <li><a href="#" class="nav-link btn-secondary search-filter" data-mtype="views" data-mvalue="0">
                        <i class="bi-caret-right"></i> Mới nhất</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <p class="fs-3 mt-4">Giá cả</p>
                    <ul class="nav flex-column">
                      <li>
                        <div class="input-group">
                          <span class="input-group-text">Từ</span>
                          <input id="search_min" type="text" class="form-control" placeholder="vd: 100.000 đ" value="<?php if(isset($result['min'])) echo $result['min'];?>">
                        </div>
                        <div class="input-group">
                          <span class="input-group-text">Đến</span>
                          <input id="search_max" type="text" class="form-control" placeholder="vd: 1.100.000 đ" value="<?php if(isset($result['max'])) echo $result['max'];?>">
                        </div>
                        <button type="button" class="btn btn-danger float-end mt-2 search_money">Tìm kiếm giá</button>
                      </li>
                    </ul>
                  </li>
              </ul>
          </div>
      </div>
      <div class="col py-3">

        <!-- item trang shop here -->
        <div id="shop-product" class="py-5">
          <div class="container">
              <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-lg-4 g-1">
                  <?php
                    foreach($productdata as $item){
                      echo '<div class=" col">
                            <div class="shop-product card">
                              <a class="text-decoration-none" href="view.php?id='.$item['prd_id'].'">
                                <div class="img-parent card-img-top d-flex align-items-center">
                                  <img class="rounded mx-auto d-block img" src="./product_image/'.$item['picture'].'">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-dark">'.$item['prd_name'].'</h5>
                                    <p class="text-dark">'.$item['views'].' lượt xem</p>';
                            if($item['prd_pricenew']!=NULL)
                              echo  '<div class="badge bg-danger position-absolute" style="top: 0.5rem; right: 0.5rem">-'.$item['prd_pricenew'].'%</div>
                            <span class="card-text fs-5 text-danger">'.number_format($item['prd_price']-($item['prd_price']*$item['prd_pricenew']/100)).' đ </span><span class="card-text fs-6 text-dark text-decoration-line-through">'.number_format($item['prd_price']).' đ</span>';
                            else
                              echo '<span class="card-text fs-5 text-dark">'.number_format($item['prd_price']).' đ</span>';
                            echo    '</div>
                            </div>
                            </a>
                        </div>';
                    }
                  ?>
              </div>
          </div>
        </div>

      </div>
  </div>
</div>
<?php
  addFooter();
?>

<script>
    $('.search-filter').click(function(){
        var thisurl=window.location.search;
        var linkget="&"+this.dataset.mtype+"="+this.dataset.mvalue;
        if(thisurl==""){
            thisurl+="?"+linkget;
        }else{
            if(thisurl.includes(this.dataset.mtype)){
                if(thisurl.includes("&views=1")){
                  thisurl=thisurl.replace("&views=1",linkget);
                }else if(thisurl.includes("&views=0")){
                  thisurl=thisurl.replace("&views=0",linkget);
                }else
                thisurl=thisurl.replace(linkget,'');
            }else{
              thisurl+=linkget;
            }
        }
        window.location.search=thisurl;
    });
    <?php
        searchbox();
    ?>
    $('.search_money').click(function(){
      var min=document.getElementById("search_min").value;
      var max=document.getElementById("search_max").value;
      var thisurl=window.location.search;
      if(min!=""){
          var moneymin="&min="+min;
          if(thisurl==""){
            thisurl+="?"+moneymin;
          }else{
            if(thisurl.includes("&min=")){
              thisurl=thisurl.replace("&min=<?php if(isset($result['max'])) echo $result['min']?>",moneymin);
            }else{
              thisurl+=moneymin
            }
          }
        }
      if(max!=""){
        var moneymax="&max="+max;
        if(thisurl==""){
          thisurl+="?"+moneymax;
        }else{
          if(thisurl.includes("&max=")){
            thisurl=thisurl.replace("&max=<?php if(isset($result['max'])) echo $result['max']?>",moneymax);
          }else{
            thisurl+=moneymax;
          }
        }
      }
      // asd
      window.location.search=thisurl;
    });
</script>

</body>
</html>