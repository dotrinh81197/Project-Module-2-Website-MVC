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
        $data = Products::all();

        $viewData = array(
            "products" => $data,
        );


        $this->render("index", $viewData);
    }
    // tạo mới sản phẩm
    public function create()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->storeProduct();
            $this->showCreatePage();
        } else {
            $this->showCreatePage();
        }
    }

    public function edit()
    {
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->showEditProduct($id);
        } else {

            $this->EditProduct($id);

            $products = Products::all();
            $categories = Categories::all();
            $viewData = [
                "products" => $products,
                "categories" => $categories
            ];
            $this->render("index", $viewData);
        }
    }

    public function delete()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_GET['id'];
            $product = Products::getProduct($id);
            if (isset($product)) {
                $product->destroy();

                header("Location:?controller=product&action=index");
            }
        }
    }


    protected function storeProduct()
    {
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $weight = $_POST['weight'];
        $cost_price = $_POST['cost_price'];
        $sell_price = $_POST['sell_price'];
        $description = $_POST['description'];
        $ageRange = $_POST['ageRange'];
        $origin = $_POST['origin'];
        $image_url = $_POST['image_url'];
        $category_id = $_POST['category_id'];


        $product = new Products();
        $product->name = $name;
        $product->brand = $brand;
        $product->weight = $weight;
        $product->cost_price = $cost_price;
        $product->sell_price = $sell_price;
        $product->description = $description;
        $product->ageRange = $ageRange;
        $product->origin = $origin;
        $product->image_url = $image_url;
        $product->category_id = $category_id;

        
        $saveSussess = $product->save();

        if ($saveSussess) {
            $_SESSION['message'] = "Đã thêm sản phẩm mới.";
        }
    }

    protected function showCreatePage()
    {
        $products = Products::all();
        $categories = Categories::all();

        $viewData = array(
            "products" => $products,
            "categories" => $categories
        );
        $this->render("create", $viewData);
    }

    protected function showEditProduct($id)
    {
        $product = Products::getProduct($id);
        $categories = Categories::all();
        $viewData = [
            "product" => $product,
            "categories" => $categories
        ];

        $this->render("edit", $viewData);
    }

    protected function EditProduct($id)
    {
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $weight = $_POST['weight'];
        $cost_price = $_POST['cost_price'];
        $sell_price = $_POST['sell_price'];
        $description = $_POST['description'];
        $ageRange = $_POST['ageRange'];
        $origin = $_POST['origin'];
        $intended_for = $_POST['intended_for'];
        $image_url = $_POST['image_url'];
        $category_id = $_POST['category_id'];


        $product = new Products();
        $product->name = $name;
        $product->brand = $brand;
        $product->weight = $weight;
        $product->cost_price = $cost_price;
        $product->sell_price = $sell_price;
        $product->description = $description;
        $product->ageRange = $ageRange;
        $product->origin = $origin;
        $product->intended_for = $intended_for;
        $product->image_url = $image_url;
        $product->category_id = $category_id;

        $editSuccess = $product->update($id);
        if ($editSuccess) {
            $_SESSION['message'] = "Sản phẩm đã được chỉnh sửa";
        }
    }


    protected function showPage()
    {
        $data = Products::all();
        $viewData = ["products" => $data];
        $this->render("edit", $viewData);
    }
}
