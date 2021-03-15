<?php

require_once("controllers/_base_controller.php");
require_once("models/product.php");
require_once("models/categories.php");
class ProductController extends BaseController
{
    protected function getFolder()
    {
        return "products";
    }

    public function index()
    {

        if (isset($_GET["keyword"])) {
            $keyword = $_GET["keyword"];
            $data = Products::search($keyword);
        }

        $viewData = array(
            "products" => $data,
        );
        $this->render("index", $viewData, "products_layout");
    }

    public function detail()
    {
        $id = $_GET['id'];

        $data = new Products();
        $product = $data::getProduct($id);

        $viewData = ["product" => $product];

        $this->render("_detail", $viewData, "products_layout");
    }

    public function show()
    {
        $data = new Products();
        $category_id = $_GET['id'];

        if (isset($_GET['intended'])) {
            $intended = $_GET['intended'];
        } else {
            $intended = "";
        }


        $products = $data::getCategoryIntended($category_id, $intended, 4);

        $viewData = ["products" => $products];

        $this->render("productByCategory", $viewData, "products_layout");
    }




    public function showByIntended()
    {
        $intended = $_GET['intended'];
        $data = new Products;
        $products = $data::getbyIntended_for($intended, 8);
        $viewData = ["products" => $products];

        $this->render("productByCategory", $viewData, "products_layout");
    }
}
