<?php
require_once("./helpers/utils.php");
Utils::showMessage();
?>
<form class="container" method="POST">
  <div class="row">
    <h1>Thêm mới sản phẩm</h1>
  </div>
  <div class="row">
    <div id="left_form_col" class="col-md-7">
      <div class="form-group">
        <label for="exampleFormControlInput1">Tên sản phẩm</label>
        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Nhập tên sản phẩm" required="" />
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Thương hiệu</label>
        <input type="text" class="form-control" name="brand" id="exampleFormControlInput1" placeholder="Nhập tên sản phẩm" required="" />
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Xuất xứ</label>
        <input type="text" class="form-control" name="origin" id="exampleFormControlInput1" placeholder="Xuất xứ" />
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Khối lượng - Size</label>
        <input type="text" class="form-control" name="weight" id="exampleFormControlInput1" placeholder="Khối lượng sản phẩm" />
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Dành cho </label>
        <input type="text" class="form-control" name="intended_for" id="exampleFormControlInput1" placeholder="Dành cho " required />
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Thể loại</label>
        <select class="form-control" name="category_id" id="exampleFormControlSelect1">

          <?php

          foreach ($categories as $key => $category) {
            echo "<option value= $category->category_id </option>$category->category_name</option>";
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Đối tượng</label>
        <input type="text" class="form-control" name="ageRange" id="exampleFormControlInput1" placeholder="Đối tượng" required />
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Giá vốn</label>
        <input type="number" class="form-control" name="cost_price" placeholder="VND" required min="0" step="0.01" value="0.01" />
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Giá bán</label>
        <input type="number" class="form-control" name="sell_price" id="test" placeholder="VND" required min="0" step="0.01" value="0.01" />
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Giá khuyến mãi</label>
        <input type="number" class="form-control" name="sale_price" id="test" placeholder="VND" required min="0" step="0.01" value="0.01" />
      </div>
    </div>

    <div class="col-md-5">
      <div id="choose-avatar" style="height: 344px">
        <button type="button" class="btn btn-outline-info" onclick="input_avatar.click()" class="btn btn-sm btn-light" required>
          Chọn ảnh
        </button>

        <input id="input_avatar" type="file" name="p_file" hidden="" />

        <!-- Thẻ để preview ảnh -->
        <div style="height:500px; width:500px">
          <input type="image" hidden="" id="avatar_preview" src="" style="height:500px; width:500px" />

        </div>

        <!-- Thẻ input chứa nội dung của ảnh base64 -->
        <input id="avatar_url" name="image_url" type="text" hidden="" />
      </div>
    </div>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Mô tả sản phẩm</label>

    <textarea class="form-control" placeholder="Mô tả sản phẩm" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary btn-lg btn-block">
      Thêm sản phẩm mới
    </button>
  </div>
</form>

<script src="assets/js/script.js"></script>

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