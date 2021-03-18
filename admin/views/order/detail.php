<h1>Chi tiết đơn hàng </h1>
<?php
$order_detail_list = $viewData[0]['order_detail'];
$sum = 0;
?>
<div class="row">

    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>

                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Đơn giá </th>
                    <th scope="col">Số lượng </th>
                    <th scope="col">Thành tiền</th>


                </tr>
            </thead>
            <tbody>

                <tr>
                    <?php foreach ($order_detail_list  as $key => $order_detail) : ?>
                        <?php $price = $order_detail['product_price'];
                        $qty = $order_detail['product_qty'];
                        $total = $price * $qty;
                        ?>
                        <td><?php echo  $order_detail['order_id'] ?></td>
                        <td><?php echo $order_detail['product_name'] ?></td>
                        <td><?php echo number_format($price) ?></td>
                        <td><?php echo  $qty ?></td>
                        <td><?php echo number_format($total) ?></td>

                </tr>
                <?php $sum += $total; ?>
            <?php endforeach; ?>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Tổng cộng: </td>
                <td><?php echo number_format($sum) ?></td>

            </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <table class="table">
            <?php
            $infoCustomer = $viewData[0]['info_customer'];

            ?>
            <thead>
                Thông tin khách hàng
            </thead>
            <tbody>
                <tr>
                    <td>Tên</td>
                    <td>Email</td>
                    <td>Số điện thoại</td>
                    <td>Địa chỉ</td>
                    <td>Ngày đặt đơn</td>

                </tr>
                <tr>
                    <td><?php echo  $infoCustomer["customer_name"] ?></td>
                    <td><?php echo  $infoCustomer["customer_email"] ?></td>
                    <td><?php echo  $infoCustomer["customer_phone"] ?></td>
                    <td><?php echo  $infoCustomer["customer_address"] ?></td>
                    <td><?php echo $order_detail_list[0]['created_at'] ?></td>

                </tr>

            </tbody>

        </table>
    </div>
</div>
<div>
    
</div>