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
    <link rel="stylesheet" href="assets/css/detail.css">


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Upright:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <title>Trang chủ</title>
</head>

<body>
    <!--header-->
    <div class="container">

        <img id="header" style="width: 100%; height:30%;" src="assets/lib/resouce/banner/banner.png" alt="">


    </div>

    <!--nav-bar-->
    <div class="container">
        <nav class="navbar navbar-expand-md ">
            <div class=" container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <a class="navbar-brand" href="#">---</a>

                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <a class="navbar-brand" href="#"><img class="logo" src="assets/lib/resouce/logo/logo.png" alt=""></a>
                        <li class=""><a href="?controller=home&action=welcome">Trang chủ</a></li>
                        <li class=""><a href="#">Giới thiệu</a></li>
                        <li class=""><a href="#">Liên hệ</a></li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right" style="display: flex;flex-direction: row-reverse;">
                        <?php
                        if (isset($_SESSION["username"])) {

                            echo '<li class="nav-item"> <span>Hi! ' . $_SESSION["username"] . ' </span><a href="?controller=auth&action=logout" class="nav-link logout"> <span class="d-sm-none d-xl-inline-block ">Logout</span><i class="fa fa-sign-out"></i></a></li>
                        ';
                        } else {
                            echo '<li><a href="?controller=auth&action=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                        }
                        ?> </ul>
                </div>
            </div>
        </nav>
        </nav>
        <!-- end nav-bar-->
        <!--search-->
        <?php include_once("./views/layout/search.php") ?>


    </div>
    <!--nav-menu-->
    <?php

    include_once "./views/layout/menu.php";
    ?>

    <!--end nav-menu-->
    <?php
    if (isset($content)) {
        echo $content;
    }
    ?>


    <!--footer-->
    <div class="container  modal-footer">
        <div class="row footer">
            <div class="col-12 col-md-6 float-left">
                <div class="media-wrap">
                    <a href="https://mobirise.com/">
                        <img id="footer-item" src="assets/lib/resouce/logo/logo.png">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-3 ">
                <h5 class="pb-3">
                    Address
                </h5>
                <p class="mbr-text">
                    25 Nguyễn Tri Phương
                    <br> thành phố Huế, Việt Nam
                </p>
            </div>
            <div class="col-12 col-md-3 ">
                <h5 class="pb-3">
                    Contacts
                </h5>
                <p class="mbr-text">
                    Email: support@zynpet.com
                    <br>Phone: (+84) 076 356 4100
                    <br>Fax: +1 (0) 000 0000 002
                </p>
            </div>
            <div class="col-12 col-md-3 ">
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