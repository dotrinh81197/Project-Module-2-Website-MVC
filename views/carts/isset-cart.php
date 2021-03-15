<div class="container d-flex justify-content-center">
    <div class="col-12">
        <div class="cart">
            <div class="cart-title">
                <h3 class="titlet">GIỎ HÀNG</h3>
            </div>
            <div class="cart-content">
                <table style="width:100%;font-size:1.6rem" class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $key => $value) : ?>
                            <?php $product = $Pro->getId($key); ?>
                            <tr>
                                <td>
                                    <p><?= $product['product_name'] ?></p>
                                </td>
                                <td>
                                    <a href="../products/index.php?id=<?= $product['product_id'] ?>">
                                        <img style="width:100px" src="<?= $product['image1'] ?>" alt="">
                                    </a>
                                </td>
                                <td>
                                    <p><?= number_format($product['price']) ?></p>
                                </td>
                                <td>
                                    <p><?= $value['qty'] ?></p>
                                </td>
                                <td>
                                    <?php echo number_format($total = $product['price'] * $value['qty']);
                                    $sumPrice = $sumPrice + $total;
                                    ?>
                                </td>
                                <td>
                                    <!-- <a href="" class="btn btn-outline-primary">Update</a> -->
                                    <a href="index.php?key=<?= $key ?>" class="btn-outline-dark"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Tổng tiền:
                            <?= number_format($sumPrice); ?>
                        <td></td>
                    </tfoot>
                </table>
            </div>
            <div class="cart-payment d-flex justify-content-around py-5">
                <div class="card-continue">
                    <a href="../index" class="btn insert-cart">Tiếp tục mua</a>
                </div>
                <div class="card-pay">
                    <a href="../checkout/" class="btn btn insert-cart">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</div>