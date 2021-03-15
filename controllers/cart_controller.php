<?php
require_once("_base_controller.php");
require_once("models/product.php");
class CartController extends BaseController
{
    protected function getFolder()
    {
        return "carts";
    }

    public function store()
    {
        $id = $_GET['id'] ?? null;
        $product = Products::getProduct($id);
        $viewData = [
            "product" => $product
        ];
        
    }
}
