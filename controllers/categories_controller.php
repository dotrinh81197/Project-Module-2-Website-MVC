<?php
require_once("controllers/_base_controller.php");
require_once("models/categories.php");
class CategoriesController extends BaseController
{
    protected function getFolder()
    {
        return "categories";
    }

    public function index()
    {

        $data = Categories::all();
        $viewData = array(
            "categories" => $data,
        );

        $this->render("index", $viewData);
    }
    public function create()
    {
        $data = Categories::all();
        $viewData = array(
            "categories" => $data,
        );

        $this->render("create", $viewData);
    }

    public function edit()
    {

        $this->render("categories", "add");
    }

    public function show()
    {
        $category_id = $_GET['category_id'];
        $data =   CategoriesController::getProductsByCategory(4, $category_id);
        $viewData = ["products" => $data];
        $this->render("productByCategory", $viewData, "byCategory_layout");
    }
    
    static  function getProductsByCategory($number, $category_id)
    {
        $sql = "SELECT * FROM products 
        WHERE category_id = $category_id 
        LIMIT $number; ";

        $statement = DB::getInstance()->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }
}
