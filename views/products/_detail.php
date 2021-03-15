<div class="container-fluid">
    <div class="content-wrapper">
        <div class="item-container">
            <div class="container">
                <div class="col-md-6">
                    <img id="detail-item" src="<?php echo $product->image_url ?>" alt="detail product">
                </div>

                <div class="col-md-6">
                    <div class="product-title"> <?php echo $product->name ?></div>
                    <div class="product-rating">
                        <i class="fa fa-star gold"></i>
                        <i class="fa fa-star gold"></i>
                        <i class="fa fa-star gold"></i>
                        <i class="fa fa-star gold"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <div class="product-brand">
                        <span>Thương hiệu: </span>
                        <?php echo $product->brand ?>
                    </div>

                    <div class="product-age">
                        <span>Dành cho <?php echo $product->intended_for; ?>: </span>
                        <?php echo $product->ageRange ?>
                    </div>

                    <hr>
                    <div class="product-price"><span>Giá bán: </span><?php echo number_format($product->sell_price); ?> VNĐ</div>

                    <hr>
                    <div class="product-extra">
                        <div class="quantity-adder">
                            Số lượng: <input class="slsp form-control" name="qty" type="text" id="qty" value="1" size="2">
                            <span class="add-up add-action">+</span>
                            <span class="add-down add-action">-</span>
                            <input name="idtin" id="idtin" type="hidden" value="572">
                        </div>
                        <a type="button" idtin="572" class="btn btn-success btn-lg adtocart" href="?controller=cart&action=store&id= <?php echo $product->category_id ?>">
                            <i class="fa fa-shopping-cart"></i> Thêm vào giỏ </a>
                        <div class="product-action">
                            <div class="wishlish-compare">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-md-12 product-info">
                <ul id="myTab" class="nav nav-tabs nav_tabs">

                    <li class="active"><a href="#service-one" data-toggle="tab">DESCRIPTION</a></li>
                    <li><a href="#service-two" data-toggle="tab">PRODUCT INFO</a></li>
                    <li><a href="#service-three" data-toggle="tab">REVIEWS</a></li>

                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="service-one">

                        <section class="container product-info">
                            <p> <?php echo $product->description; ?></p>
                        </section>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>