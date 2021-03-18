<?php
require_once("./views/helper/cart.helper.php");
require_once("models/product.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/reponsive.css">
    <link rel="stylesheet" href="assets/css/menu.css">
    <link rel="stylesheet" href="assets/css/banner.css">
    <link rel="stylesheet" href="assets/css/services.css">
    <link rel="stylesheet" href="assets/css/cart.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Upright:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <title>Trang chủ</title>
</head>

<body>
    <!--header-->
    <div class="container">

        <img id="header" style="width: 100%; height: 50%;" src="assets/lib/resouce/banner/banner2.png" alt="">


    </div>

    <?php include_once("./views/layout/navbar.php") ?>
    <?php include_once("./views/layout/search.php") ?>
    <?php

    include_once "./views/layout/menu.php";
    include_once "./views/layout/banner.php";


    ?>
    <div class="container">
        <div class="alert alert-success" style="float: right;" role="alert">
            <?php

            if (isset($_SESSION['storeCartSuccess'])) {
                echo $_SESSION['storeCartSuccess'];
                unset($_SESSION['storeCartSuccess']);
            }

            ?>
        </div>
        <div class="products-content">
            <h2>Sản phẩm cho chó</h2>
        </div>
        <div class="row " style="height: 100%;">

            <?php

            $products = Products::getbyIntended_for('cho', 4);
            $cartHelper = new CartHelper($products);
            echo $cartHelper->renderItems($products);

            ?>
        </div>

    </div>
    <div class="container">
        <div class="products-content">
            <h2>Dành cho mèo</h2>
        </div>
        <div class="row  main-content">
            <?php
            $products = Products::getbyIntended_for("meo", 4);
            $cartHelper = new CartHelper($products);
            echo $cartHelper->renderItems($products);

            ?>
        </div>
    </div>
    <div class="container">
        <div class="products-content">
            <h2>Sản phẩm khuyến mãi</h2>
        </div>
        <div class="row  main-content" style="height: 100%;">
            <?php
            $products = Products::getbySellPrice(4);
            $cartHelper = new CartHelper($products);
            echo $cartHelper->renderItems($products);

            ?>
        </div>
    </div>


    <div class="container">
        <div class="products-content">
            <h2>Sản phẩm vệ sinh thú cưng</h2>
        </div>
        <div class="row  main-content" style="height: 100%;">

            <?php
            $products = Products::getbyCategory(7, 4);
            $cartHelper = new CartHelper($products);
            echo $cartHelper->renderItems($products);

            ?>

        </div>
    </div>

    <div class="content">

        <div class="container services">
            <div class="row">
                <div class="col-12 col-sm-12 ">
                    <h2>Dịch vụ</h2>
                </div>
            </div>
            <div class="row services-item" style="display:inline-block">
                <div class="col-lg-3 col-sm-6 services">
                    <a href="">
                        <img src="https://assets.petco.com/petco/image/upload/h_200,f_auto,q_100/Icon_Grooming_Scissors">
                        <p>Tắm, tỉa lông</p>
                    </a>

                </div>
                <div class="col-lg-3 col-sm-6 services">
                    <a href=""> <img src="https://assets.petco.com/petco/image/upload/h_200,f_auto,q_100/Icon_DogTraining_Ribbon">
                        <p>Huấn luyện</p>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 services">
                    <a href=""><img src="https://assets.petco.com/petco/image/upload/h_200,f_auto,q_100/Icon_Vet_Stethoscope">
                        <p>Chăm sóc thú y</p>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 services">
                    <a href=""> <img src="https://assets.petco.com/petco/image/upload/h_200,f_auto,q_100/Icon_Pharmacy_PillBottle">
                        <p>Dược phẩm</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--footer-->
    <div class="container  modal-footer">
        <div class="row footer">
            <div class="col-sm-6  col-md-3">
                <div class="media-wrap">
                    <a href="https://mobirise.com/">
                        <img id="footer-item" src="assets/lib/resouce/logo/logo.png">
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-md-3  ">
                <h5 class="pb-3">
                    Address
                </h5>
                <p class="mbr-text">
                    25 Nguyễn Tri Phương
                    <br> thành phố Huế, Việt Nam
                </p>
            </div>
            <div class="col-sm-6 col-md-3 ">
                <h5 class="pb-3">
                    Contacts
                </h5>
                <p class="mbr-text">
                    Email: support@zynpet.com
                    <br>Phone: (+84) 076 356 4100
                    <br>Fax: +1 (0) 000 0000 002
                </p>
            </div>
            <div class="col-sm-6 col-md-3 ">
                <h5 class="pb-3">
                    Links
                </h5>
                <p class="mbr-text">
                    <a class="text-white" href="">facebook : facebook.com/zynpet</a>
                    <br><a class="text-white" href=""></a>
                </p>
            </div>
            <div class="footer-lower">
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                    </div>
                </div>
                <div class="row copyright">
                    <div class="col-sm-6 copyright ">
                        <p class=" ">
                            © Copyright 2021 - All Rights Reserved
                        </p>
                    </div>
                    <div class="col-sm-6 fllowus">
                        <span class="follow u">Fllow us </span>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-twitter"></i>
                    </div>

                </div>
            </div>
        </div>

    </div>

</body>

</html>