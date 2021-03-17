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
        if (isset($_SESSION['cart'])) {
            $data = $_SESSION['cart'];
            $viewData = ["carts" => $data];
        } else {
            $viewData = [];
        }

        $this->render("index", $viewData, "products_layout");
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_GET['id'];

            unset($_SESSION['cart'][$id]);
            $data = $_SESSION['cart'];
            $viewData = ["carts" => $data];
            $this->render("index", $viewData, "products_layout");
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

        $_SESSION['storeCartSuccess'] = "Thêm vào giỏ hàng thành công!";
        $data = $_SESSION['cart'];
        $viewData = ["carts" => $data];
        // $this->render("index", $viewData, "products_layout");
        header("location:?controller=home&action=welcome");
    }

    public function update()
    {
        foreach ($_POST['qty'] as $product_id => $qty) {
            $_SESSION['cart'][$product_id]['qty'] = $qty;
        }
        header("Location:?controller=cart&action=index");
    }

    public function fillout()
    {
        header("Location:?controller=order&action=index");
    }
}
