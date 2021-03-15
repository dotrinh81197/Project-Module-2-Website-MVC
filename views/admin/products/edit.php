<?php
require_once("./helpers/utils.php");
Utils::showMessage();
?>
<form method="post">
    <div class="row">

        <div class="col-md-7">
            <h1 style="padding-top:1em">CHỈNH SỬA </h1>
            <div class="form-group">
                <label for="exampleFormControlInput1">Tên mặt hàng</label>
                <input type="text" class="form-control" name="name" id="exampleFormControlInput1" value="<?php echo $product->name ?>" required="" />
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Thương hiệu</label>
                <input type="text" class="form-control" name="brand" id="exampleFormControlInput1" value="<?php echo $product->brand ?>" required="" />
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Xuất xứ</label>
                <input type="text" class="form-control" name="origin" id="exampleFormControlInput1" value="<?php echo $product->origin ?>" required="" />
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Loại hàng</label>
                <select class="form-control" name="category_id" id="exampleFormControlSelect1">

                    <?php

                    foreach ($categories as $key => $category) {
                        echo "<option value= '$category->category_id'" . ($category->category_id == $product->category_id ? 'selected' : '') . " > $category->category_name"  . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Dành cho</label>
                <input type="text" class="form-control" name="intended_for" id="exampleFormControlInput1" value="<?php echo $product->intended_for ?>" required="" />
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Giá vốn</label>
                <input type="number" class="form-control" name="cost_price" id="exampleFormControlInput1" value="<?php echo $product->cost_price ?>" required min="0" step="0.01" value="0" />
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Giá bán</label>
                <input type="number" class="form-control" name="sell_price" id="exampleFormControlInput1" value="<?php echo $product->sell_price ?>" required min="0" step="0.01" value="0" />
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Khối lượng</label>
                <input type="text" class="form-control" name="weight" id="exampleFormControlInput1" value="<?php echo $product->weight ?>" required="" />
            </div>


            <div class="form-group">
                <label for="exampleFormControlInput1">Đối tượng</label>
                <input type="text" class="form-control" name="ageRange" id="exampleFormControlInput1" value="<?php echo $product->ageRange ?>" required="" />
            </div>


        </div>


        <!-- //choose file -->
        <div class="col-md-5">
            <div id="choose-avatar" style="height: 344px; width:500px; padding-top:3em ">
                <a type="button" class="btn btn-outline-info" onclick="input_avatar.click()" class="btn btn-sm btn-light" required>
                    Chọn ảnh
                </a>

                <input id="input_avatar" type="file" name="p_file" hidden="" />

                <!-- Thẻ để preview ảnh -->
                <div style="height:500px; width:500px">
                    <input type="image" id="avatar_preview" src="<?php echo $product->image_url ?>" style="height:500px; width:500px" />

                </div>

                <!-- Thẻ input chứa nội dung của ảnh base64 -->
                <input id="avatar_url" name="image_url" type="text" hidden="" />
            </div>
        </div>



    </div>


    <div class="form-group">
        <label for="exampleFormControlInput1">Mô tả sản phẩm</label>
        <textarea type="text" class="form-control" name="description" id="exampleFormControlInput1" row=3> <?php echo $product->description ?></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block">
            Cập nhật mặt hàng
        </button>
        <!-- <button type="submit" class="btn btn-primary btn-lg btn-block">
                  Thoát
                </button> -->
    </div>
</form>
<script src="/assets/js/script.js"></script>


<script>
    const leftFormCol = document.querySelector("#left_form_col");
    const avatarControl = document.querySelector("#choose-avatar");
    const avatarPreview = document.querySelector("#avatar_preview");
    const avatarUrl = document.querySelector("#avatar_url");

    const input_avatar = document.querySelector("#input_avatar");

    input_avatar.addEventListener("change", function() {
        readURL(this, avatarPreview, avatarUrl);
    });

    function refreshAvatarControlSize() {
        const height = leftFormCol.offsetHeight;
        // console.log(height);

        avatarControl.style.height = height + "px";
    }

    window.onload = () => {
        refreshAvatarControlSize();
    };

    window.onresize = () => {
        refreshAvatarControlSize();
    };
</script>