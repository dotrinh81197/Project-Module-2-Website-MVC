<div class="shopping-cart">
    <div class="container">
        <div class="page-title">
            <h1>Giỏ hàng</h1>

            <?php if (empty($carts)) : ?>
                <?php if (isset($_SESSION['checkout_success'])) {
                    echo '<div class="alert alert-success" role="alert">
                   ' . $_SESSION['checkout_success'] . '
                 </div>';
                } ?>
                <h2>Không có sản phẩm trong giỏ hàng </h2>
                <button type="button" class="btn btn-outline-info"><a href="?controller=home&action=welcome">Tiếp tục mua hàng</a></button>
            <?php else : ?>
        </div>
        <div class="cart-item">
            <form action="?controller=cart&action=update" method="post">
                <table class="table-borderless ">
                    <thead style="text-align: center;">
                        <td>Hình ảnh</td>
                        <td>Tên sản phẩm</td>
                        <td>Loại</td>
                        <td>Giá bán lẻ</td>
                        <td>Số lượng</td>
                        <td>Tạm tính</td>

                    </thead>
                    <tbody>

                        <?php foreach ($carts as $key => $cart) : ?>
                            <tr>
                                <td class="image-cart"><img id="cart-item" src="<?php echo $cart['image_url'] ?>" alt=""></td>
                                <td><?php echo $cart['product_name'] ?></td>
                                <td><?php echo $cart['category'] ?></td>
                                <td>
                                    <?php
                                    if (!empty($cart['sale_price'])) {
                                        $price = $cart['sale_price'];
                                        echo number_format($price);
                                    } else {
                                        $price = $cart['sell_price'];
                                        echo number_format($price);
                                    }
                                    ?>
                                </td>
                                <td><input id="qty" type="number" name="qty[<?php echo $cart['product_id'] ?>]" value="<?php echo $cart['qty'] ?>" required min=1> </td>
                                <td><?php echo $total = number_format($price * $cart['qty'])  ?></td>

                                <td>
                                    <a href="?controller=cart&action=delete&id=<?php echo $cart['product_id'] ?>" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                        <?php endforeach; ?>


                    </tbody>

                    <tr>
                        <td><a type="button" class="btn btn-secondary btn-lg" href="?controller=home&action=welcome">Tiếp tục mua hàng</a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button type="submit" class="btn btn-secondary btn-lg" style="float: right;">Cập nhật giỏ hàng</button></td>
                    </tr>

                </table>
            </form>

        </div>
    </div>
    <div class="container">
        <div class="totals col-sm-4 col-md-offset-8">
            <h3>Tổng cộng</h3>
            <div class="inner " style="padding:0; margin:0">
                <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                    <colgroup>
                        <col>
                        <col>
                    </colgroup>
                    <tfoot>
                        <tr style="min-height: 60px;">
                            <td colspan="1" class="a-left"><strong>Tổng tiền</strong></td>
                            <td class="a-right"><strong><span class="price"><?php echo number_format(getTotalPrice($carts)) . ' vnđ'; ?></span></strong></td>
                        </tr>
                    </tfoot>
                </table>
                <ul class="checkout">
                    <li>
                        <a type="button" class="btn btn-info btn-proceed-checkout " href="?controller=cart&action=fillout">Tiến hành đặt hàng </a>
                    </li>
                </ul>
            </div>
            <!--inner-->

        </div>
    </div>
<?php endif; ?>


</div>
<?php

function getTotalPrice($carts)
{
    $total_array = [];
    foreach ($carts as $key => $cart) {
        if (!empty($cart['sale_price'])) {
            $price = $cart['sale_price'];
            $total_array[] = intval($price) * intval($cart['qty']);
        } else {

            $price = $cart['sell_price'];
            $total_array[] = intval($price) * intval($cart['qty']);
        }
    }

    $sum = 0;

    foreach ($total_array  as $key => $unitprice) {
        $sum = $sum + $unitprice;
    }
    return $sum;
}

?>