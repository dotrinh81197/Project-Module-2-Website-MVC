<div class="shopping-cart">
    <?php echo "<pre>";
    die(print_r($carts));
    ?>
    <div class="container">
        <div class="page-title">
            <h1>Giỏ hàng</h1>
        </div>
        <div class="cart-item">
            <table>
                <thead>
                    <td>Hình ảnh</td>
                    <td>Tên sản phẩm</td>
                    <td>Loại</td>
                    <td>Giá bán lẻ</td>
                    <td>Tạm tính</td>

                </thead>
                <tbody>
                    <tr>
                        <td><img src="" alt=""></td>
                        <td><?php echo $carts['product_name'] ?></td>
                        <td><?php echo $carts['category'] ?></td>
                        <td>
                            <?php
                            if (!empty($carts['sale_price'])) {
                                echo  $carts['sale_price'];
                            } else {
                                echo $carts['sell-price'];
                            }
                            ?>
                        </td>
                        <td></td>
                        <td></td>
                        <td><button><a href="?controller=cart&action=delete"><i class="fa fa-trash" aria-hidden="true"></i></a></button></td>
                    </tr>
                </tbody>



            </table>
        </div>
    </div>
</div>