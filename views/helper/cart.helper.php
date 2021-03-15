<?php

class CartHelper
{
    function __construct($products)
    {
        $this->products = $products;
    }

    private function makeItemRow($product)
    {
        if (!empty($product->sale_price)) {
            $product_price =  $product->sale_price;
        } else {
            $product_price =  $product->sell_price;
        }
        return
            '<div class="col-md-3 col-sm-6 cart" >
                 <div class="product-grid3">
                    <div class="product-image3">
                        <a href="#">
                            <img class="pic-1" src="' . $product->image_url . '">
                            <img class="pic-2" src="' . $product->image_url . '">
                           
                        </a>
                        <ul class="social">
                            <li><a href="?controller=product&action=detail&id=' . $product->id . '"><i class="far fa-eye"></i></a></li>
                            <li><a href="?controller=cart&action=store&id=' . $product->id . '   "><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div
                 </div>

                <div class="product-content">
                     <h3 class="title"><a href="#">' . $product->name . '</a></h3>
                </div>
                <div class="price">
                ' . number_format($product_price)  . '
                </div>
               
            </div>
        </div>';
    }

    public function renderItems()
    {

        // $result = "";
        // foreach ($this->products as $key =>  $product) {
        //     $result .= $this->makeCartRow($product, $key);
        // }
        // return $result;


        $result = "";
        foreach ($this->products as $key =>  $product) {
            $result .= $this->makeItemRow($product);
        }
        return $result;
    }
}
