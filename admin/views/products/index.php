<?php
require_once("./helpers/utils.php");
require_once("./views/products/product.helper.php");
Utils::showMessage();
$productHelper = new ProductHelper($products);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Danh sách sản phẩm</h1>
                    </div>
                    <div class="col-sm-6 float-right">
                        <a style="float:right" href="?controller=product&action=create">
                            <button type="button" class="btn btn-outline-primary btn-lg"> + Thêm sản phẩn mới</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tên sản phẩm</th>
                                <th>Thể loại</th>
                                <th>Trọng lượng</th>
                                <th>Giá bán</th>
                                <th>Đối tượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            echo $productHelper->renderProducts()
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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