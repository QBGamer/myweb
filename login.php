<?php
    session_start();
    require "./web/echoHTML.php";
    if(isset($_SESSION["username"])){
        header("Location: ./index.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máy lạnh Hoàng Bình</title>
    <link rel="icon" href="./images/logo.png">

    <link rel="stylesheet" href="./css/style.css">
    <!-- <link rel="stylesheet" href="./css/bg_effect.scss"> -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>
<body>
<?php
    addHeaderOther();
?>
<div id="login" class="container-fluid">
    <div class="py-5">
        <div class="container d-flex justify-content-center">
            <div id="login-box" class="card p-2">
                <form action="./handle/handle_login.php" method="post">
                    <p class="fs-1"><i class="bi-box-arrow-in-right pe-3"></i> Đăng nhập</p>
                    <div class="mb-3">
                        <label class="form-label">Tài khoản:</label>
                        <input type="text" class="form-control" name="uname" placeholder="Nhập tài khoản">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu:</label>
                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                    </div>
                    <!-- <div class="form-check mb-3">
                        <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember"> Remember me
                        </label>
                    </div> -->
                    <?php
                        if(isset($_GET['error'])) { ?>
                        <p class="error text-danger">*<?php echo $_GET['error']; ?>*</p>
                        <?php }
                    ?>
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    <div class="container">
                        <div class="row mt-3">
                            <div class="col text-start"><a href="./register.php">Chưa có tài khoản?</a></div>
                            <div class="col text-end"><a href="">Quên mật khẩu?</a></div>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<?php
    // addFooter();
?>

</body>
</html>