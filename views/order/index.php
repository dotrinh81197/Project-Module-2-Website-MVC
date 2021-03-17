<div class="shopping-cart">

    <div class="page-title">
        <h1>Giỏ hàng</h1>

    </div>
    <div class="container">
        <form action="?controller=order&action=checkout" method="post">
            <div class="row">
                <div class="col-md-4 infor-checkout">
                    <h3>Thông tin nhận hàng</h3>
                    <input type="text" class="form-control-custom" name="name" placeholder="Họ và tên" required>
                    <input type="text" class="form-control-custom" name="email" placeholder="Email" required FILTER_VALIDATE_EMAIL>
                    <input type="tel" class="form-control-custom" name="tel" placeholder="Số điện thoại" required pattern="(09|01[2|6|8|9])+([0-9]{8})\b">
                    <input type="text" class="form-control-custom" name="address" placeholder="Địa chỉ" required>
                    <textarea name="note" id="" cols="30" rows="5" placeholder="Ghi chú" style="width: 100%" ;></textarea>
                </div>
                <div class="col-md-8 order-item">
                    <div class="cart-item">
                        <table class="table-borderless" style="width: 110%">
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
                        </table>
                    </div>
                    <div class="totals col-sm-4 col-md-offset-8">
                        <h3>Tổng cộng</h3>
                        <div class="inner " style="padding:0; margin:0">
                            <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                                <tfoot>
                                    <tr style="min-height: 60px;">
                                        <td colspan="1" class="a-left"><strong>Tổng tiền</strong></td>
                                        <td class="a-right"><strong><span class="price"><?php echo number_format(getTotalPrice($carts)) . ' vnđ'; ?></span></strong></td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>


                    </div>


                </div>
                <button class="button btn-proceed-checkout" title="Tiến hành thanh toán" type="submit" style="width:300px; float:right">
                    <a class="checkout">Tiến hành đặt hàng</a>
                </button>
            </div>
        </form>
    </div>



</div>



<?php

// define variables and set to empty values
$nameErr = $emailErr = $tellErr = $addressErr = "";
$name = $email = $tell = $address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = ($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = ($_POST["email"]);
    }

    if (empty($_POST["tel"])) {
        $tel = "Telephone is required";
    } else {
        $tel = ($_POST["tel"]);
    }

    if (empty($_POST["address"])) {
        $address = "Address is required";
    } else {
        $address = ($_POST["address"]);
    }
}

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