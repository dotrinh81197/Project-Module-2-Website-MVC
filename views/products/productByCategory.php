<?php
require_once("./views/helper/cart.helper.php");
$cartHelper = new CartHelper($products);

?>
<div class="container">
    <div class="products-content">
        <h2>
            <?php
            if (empty($products)) {
                echo "Chưa có sản phẩm";
            } else {
                if (isset($products[0]->intended_for)) {
                    $intended_for = $products[0]->intended_for;
                    $category_name = $products[0]->category;
                    echo $category_name . ' cho ' . $intended_for;
                } else {
                    $category_name = $products[0]->category;
                    echo $category_name;
                }
            }

            ?>
        </h2>
    </div>
    <div class="row " style="height: 100%;">
        <?php
        $cartHelper = new CartHelper($products);
        echo $cartHelper->renderItems($products);
        ?>
    </div>

</div>