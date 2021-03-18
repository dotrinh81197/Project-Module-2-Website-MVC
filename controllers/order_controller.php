<?php
require_once("controllers/_base_controller.php");
require_once("models/product.php");
require_once("models/categories.php");
require_once("models/order.php");
class OrderController extends BaseController
{
    protected function getFolder()
    {
        return "order";
    }

    public function index()
    {
        $data = $_SESSION['cart'];
        $viewData = ['carts' => $data];
        $this->render("index", $viewData, "order_layout");
    }

    public function checkout()
    {
        if (!empty($_SESSION['cart'])) {
            $customer_name = $_POST['name'];
            $customer_email = $_POST['email'];
            $customer_phone = $_POST['tel'];
            $customer_address = $_POST['address'];

            $customer_order = new Order();
            $customer =  $customer_order->storeCustomerOrder($customer_name, $customer_email, $customer_phone, $customer_address);
            //  { ["customer_id"]=> string(1) "1" [0]=> string(1) "1" ["customer_name"]=> string(11) "Đỗ Trinh" [1]=> string(11) "Đỗ Trinh" ["customer_email"]=> string(17) "dotrinh@gmail.com" [2]=> string(17) "dotrinh@gmail.com" ["customer_phone"]=> string(9) "091331041" [3]=> string(9) "091331041" ["customer_address"]=> string(6) "24 NTV" [4]=> string(6) "24 NTV" }h hàng order là 1 mảng 
            $customer_id = $customer['customer_id'];
            $order = $customer_order::storeOrders($customer_id);
            $order_id = $order['order_id'];

            foreach (($_SESSION['cart']) as $key => $product) {

                $product_id = $product['product_id'];
                $product_name = $product['product_name'];
                if (isset($product['sale_price'])) {
                    $price = $product['sale_price'];
                } else {
                    $price = $product['sell_price'];
                }
                $qty = $product['qty'];

                Order::storeOrderDetail($order_id, $product_id, $product_name, $price, $qty);
            }

            unset($_SESSION['cart']);
            $_SESSION['checkout_success'] = "Đã đặt hàng thành công";
            header("Location:?controller=cart&action=index");
        }
    }
}
