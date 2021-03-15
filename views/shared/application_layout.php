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

  <!--nav-bar-->
  <div class="container">
    <nav class="navbar navbar-expand-md " style="margin-top: -5%;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <a class="navbar-brand" href="#">---</a>

          </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <a class="navbar-brand" href="#"><img class="logo" src="lib/resouce/banner/logo.png" alt=""></a>
            <li class=""><a href="?controller=home&action=welcome">Trang chủ</a></li>
            <li class=""><a href="#">Giới thiệu</a></li>
            <li class=""><a href="#">Liên hệ</a></li>

          </ul>

          <ul class="nav navbar-nav navbar-right">
            <!-- <li><a href="?controller=auth&action=register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
            <li><a href="?controller=auth&action=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>

        </div>
      </div>
    </nav>
    </nav>
    <!--search-->
    <?php
    include_once("./views/layout/search.php")
    ?>
    <!--banner-->
    <?php
    include_once "./views/layout/banner.php";
    ?>
    <!--nav-menu-->

    <div class="container">

      <div class=" menu">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myMenu">
          <a class="navbar-brand" href="#"><span>Menu</span></a>

        </button>
        <div class="collapse navbar-collapse" id="myMenu">
          <ul class="clearfix">
            <li class="menu-item"><a href="#"> <i class="fa fa-paw"></i>Shop cho chó</a>

              <ul class="clearfix">
                <li class="menu-item">
                  <a href="?controller=product&action=showByIntended&intended=cho">
                    <i class="fa fa-paw"></i>
                    Shop cho chó
                  </a>

                  <ul class="sub-menu">
                    <li><a href="?controller=product&action=showByCategory&id=1">Thức ăn</a></li>
                    <li><a href="?controller=product&action=showByCategory&id=2">Quần áo</a></li>
                    <li><a href="?controller=product&action=showByCategory&id=3">Phụ kiện</a></li>
                    <li><a href="?controller=product&action=showByCategory&id=12">Mỹ phẩm,làm đẹp</a></li>

                  </ul>


                </li>
                <li class="menu-item">
                  <a href="#"><i class="fa fa-paw"></i> Shop cho mèo </a>
                  <ul class="sub-menu">
                    <li><a href="?controller=product&action=showByCategory&id=1&intended=meo">Thức ăn</a></li>
                    <li><a href="?controller=product&action=showByCategory&id=2&intended=meo">Quần áo</a></li>
                    <li><a href="?controller=product&action=showByCategory&id=3">Phụ kiện</a></li>
                    <li><a href="?controller=product&action=showByCategory&id=4&intended=meo">Giường, chuồng</a></li>
                    <li><a href="?controller=product&action=showByCategory&id=12">Mỹ phẩm,làm đẹp</a></li>
                  </ul>
                </li>
                <li class="menu-item">
                  <a href="">Dịch vụ </a>

                  <ul class="sub-menu">
                    <li><a href="#">Cắt, tỉa lông</a></li>
                    <li><a href="#">Tắm, massage, spa</a></li>
                    <li><a href="#">Huấn luyện </a></li>
                    <li><a href="#">Thú y </a></li>
                  </ul>
                </li>
                <li class="menu-item"><a href="#">Tin tức</a></li>
                <li class="menu-item"><a href="#">Đơn hàng</a></li>
                <div class="shopping-cart">
                  <li class="menu-item"> <a href="#">Giỏ hàng </a> <a><i class="fas fa-shopping-cart"></i></a></li>
                </div>

              </ul>


            </li>
            <li class="menu-item">
              <a href="#"><i class="fa fa-paw"></i> Shop cho mèo </a>

              <ul class="sub-menu">
                <li><a href="#">Thức ăn</a></li>
                <li><a href="#">Quần áo</a></li>
                <li><a href="#">Phụ kiện</a></li>
                <li><a href="#">Giường, chuồng</a></li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="#">Dịch vụ </a>

              <ul class="sub-menu">
                <li><a href="#">Cắt, tỉa lông</a></li>
                <li><a href="#">Tắm, massage, spa</a></li>
                <li><a href="#">Huấn luyện </a></li>
                <li><a href="#">Thú y </a></li>
              </ul>
            </li>
            <li class="menu-item"><a href="#">Tin tức</a></li>
            <li class="menu-item"><a href="#">Đơn hàng</a></li>
            <div class="shopping-cart">
              <li class="menu-item"> <a href="#">Giỏ hàng </a> <a><i class="fas fa-shopping-cart"></i></a></li>
            </div>

          </ul>
        </div>

      </div>
    </div>
    <!--end nav-menu-->


  </div>
  <?php
  include_once "./views/layout/banner.php";
  ?>

  <div class="content">

    <div class="container services">
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
  </div>




  <!--footer-->
  <div class="container  modal-footer">
    <div class="row footer">
      <div class="col-12 col-md-3">
        <div class="media-wrap">
          <a href="https://mobirise.com/">
            <img src="assets/lib/resouce/logo/logo.png">
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