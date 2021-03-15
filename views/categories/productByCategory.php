<?php
require_once("./helper/cart.helper.php");
$cartHelper = new CartHelper($products);
?>
<div class="container">
    <div class="products-content">
        <h2>Sản phẩm bán chạy</h2>
    </div>
    <div class="row main-content" style="height: 300px;">

        <?php
        echo $cartHelper->renderItems($product);

        ?>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid3">
                <div class="product-image3">


                    <a href="#">
                        <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo4/images/img-3.jpg">
                        <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo4/images/img-4.jpg">
                    </a>
                    <ul class="social">
                        <li><a href="?controller=product&action=detail"><i class="far fa-eye"></i></a></li>
                        <li><a href="?controller=cart&action=add"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#"><?php echo $product->name ?></a></h3>
                    <div class="price">
                        <?php echo $product->sell_price ?>
                    </div>
                    <ul class="rating">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                    </ul>
                </div>
            </div>
        </div>


    </div>
</div>
<div class="container">
    <div class="products-content">
        <h2>Sản phẩm khuyến mãi</h2>
    </div>
    <div class="row  main-content" style="height: 300px;">
        <div class="col-lg-3 col-md-4 col-sm-6 " style="background-color: blueviolet; height: 300px;">

        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 " style="background-color: rgb(44, 179, 167); height: 300px;">

        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 " style="background-color: rgb(149, 16, 46); height: 300px;">

        </div>
        <div class="col-lg-3 col-md-4 col-sm-6   " style="background-color: rgb(240, 80, 88); height: 300px;">

        </div>

    </div>
</div>

<div class="container">
    <div class="products-content">
        <h2>Dành cho chó</h2>
    </div>
    <div class="row  main-content" style="height: 300px;">
        <div class="col-lg-3 col-md-4 col-sm-6 " style="background-color: blueviolet; height: 300px;">

        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 " style="background-color: rgb(44, 179, 167); height: 300px;">

        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 " style="background-color: rgb(149, 16, 46); height: 300px;">

        </div>
        <div class="col-lg-3 col-md-4 col-sm-6   " style="background-color: rgb(240, 80, 88); height: 300px;">

        </div>

    </div>
</div>
<div class="container">
    <div class="products-content">
        <h2>Dành cho mèo</h2>
    </div>
    <div class="row  main-content" style="height: 300px;">
        <div class="col-lg-3 col-md-4 col-sm-6 " style="background-color: blueviolet; height: 300px;">

        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 " style="background-color: rgb(44, 179, 167); height: 300px;">

        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 " style="background-color: rgb(149, 16, 46); height: 300px;">

        </div>
        <div class="col-lg-3 col-md-4 col-sm-6   " style="background-color: rgb(240, 80, 88); height: 300px;">

        </div>

    </div>
</div>