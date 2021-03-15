<?php
require_once("./helpers/utils.php")

?>

<div class="row">
    <div class="col-12">
        <h1>Thêm thể loại</h1>
    </div>
    <form class="container" action="?controller=categories&action=create" method="POST">
        <div class="col-md-5">
            <?php echo Utils::showMessage(); ?>
            <div class="form-group">
                <label for="exampleFormControlInput1">Tên thể loại</label>
                <input type="text" class="form-control" name="category_name" id="exampleFormControlInput1" placeholder="Nhập tên sản phẩm" required="" />
            </div>
            <button type="submit" class="btn btn-outline-primary  btn-lg btn-block"> Thêm mới</button>

        </div>
    </form>

</div>