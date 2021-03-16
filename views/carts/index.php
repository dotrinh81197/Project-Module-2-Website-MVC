
<div class="shopping-cart">
    <div class="container">
        <div class="page-title">
            <h1>Giỏ hàng</h1>
        </div>
        <div class="cart-item">
            <table class="table ">
                <thead>
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
                                    echo number_format($price) ;
                                } else {
                                    $price = $cart['sell_price'];
                                    echo number_format($price) ;
                                       }
                                ?>
                            </td>
                            <td><?php echo $cart['qty'] ?></td>
                            <td><?php echo $total = $price * $cart['qty'] ?></td>

                            <td>
                                <button class="btn-delete">
                                    <a class="btn-delete" href="?controller=cart&action=delete&id=<?php echo $cart['product_id'] ?>">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </button>
                            </td>
                        </tr>
                                       
                    <?php endforeach; ?>


                </tbody>

                <tr>
                    <td>Tổng cộng</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo getTotalPrice($carts); ?></td>
                </tr>

            </table>
        </div>
    </div>
</div>
<?php

function getTotalPrice($carts)
{
    $total_array = [];
    foreach ($carts as $key => $cart) {
        if (!empty($cart['sale_price'])) {
            $price = $cart['sale_price'];
            $total_array[] = intval($price)*intval($cart['qty']);
        } else {
           
            $price = $cart['sell_price'];
            $total_array[] = intval($price)*intval($cart['qty']);
        }
    } 
   
    $sum = 0 ;
    
   foreach ($total_array  as $key => $unitprice) {
    $sum = $sum + $unitprice;
   }
  return $sum;
    
   
}

?>
<script>
    document.querySelectorAll(".btn.btn-delete").forEach((e, i) => {
        e.addEventListener("click", (event) => {
            let isDelete = confirm(`Xóa sản phẩm ? `);
            if (isDelete) {
                event.target.parentNode.submit()
            }
        })

    })
</script>