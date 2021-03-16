<?php
require_once("_base_controller.php");
require_once("models/product.php");
require_once("models/categories.php");
require_once("models/cart.php");
class CartController extends BaseController
{
    protected function getFolder()
    {
        return "carts";
    }

    public function index()
    {
        // phương thức show ra tất cả sp có trong giỏ hàng

    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            unset($_SESSION['cart'][$id]);
        }
    }

    public function store()
    {
        $id = $_GET['id'] ?? null;
        $product =  Carts::findbyid($id);

        // nếu giỏ hàng không trống or không có tồn tại sản phẩm có id này
        if (empty($_SESSION['cart']) || !array_key_exists($id, $_SESSION['cart'])) {
            $product['qty'] = 1;
            $_SESSION['cart'][$id] = $product;
        } else {
            // sản phẩm chưa tồn tại trong giỏ hàng
            $product['qty'] = $_SESSION['cart'][$id]['qty'] + 1;
            $_SESSION['cart'][$id] = $product;
        }

        $_SESSION['message'] = "Thêm vào giỏ hàng thành công!";
        $data = $_SESSION['cart'];
        $viewData = ["carts" => $data];
        $this->render("index", $viewData, "products_layout");
        // header("location:?controller=cart&action=index");
    }

    // $viewData = [
    //     "product" => $product
    // ];
}
