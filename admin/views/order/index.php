<h1>Danh sách đơn hàng</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Trạng Thái </th>
            <th scope="col">Chi tiết </th>
        </tr>
    </thead>
    <tbody>
        <?php $orders = $viewData[0];
        ?>
        <?php foreach ($orders as $order) : ?>

            <?php foreach ($order as $key => $orderObject) : ?>


                <tr>
                    <td>
                        <?php 
                            echo  $order[$key]->order_id 
                        ?>
                    </td>
                    <td class="date-convert">
                        <?php 
                            echo $order[$key]->created_at;
                        ?>
                    </td>
                    <td><?php if ($order[$key]->status == '0') {
                            echo "<span class=status>Đang chờ</span>";
                        } else {
                            echo "<span class=status>Đã hoàn tất</span>";
                        } ?>
                    </td>
                    <td><a type="button" class="btn btn-outline-info" href="?controller=order&action=detail&id=<?php echo $order[$key]->order_id ?>">Chi tiết</a></td>
                    <td>
                        <a href=" ?controller=order&action=delete&id=<?php echo $order[$key]->order_id ?>" type="submit">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>
        <?php endforeach; ?>

    </tbody>
</table>
<script>
    document.querySelectorAll("td.date-convert"").forEach(e=>{
        let date = new Date(e.innerText);
        date.setHours(t.getHours() + 7);
        e.innerText = date.toLocaleString("vi");
    })
</script>
