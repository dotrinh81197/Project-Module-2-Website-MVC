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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->storeCategory();
        } else {
            if (isset($_SESSION["message"])) {
                unset($_SESSION["message"]);
            }
            $this->showCreatePage();
        }
    }

    public function storeCategory()
    {
        $category_name = $_POST["category_name"];
        $category = new Categories();
        $check =  $category::findByCategoryName($category_name);

        if ($check) {
            $_SESSION["message"] = "Thể loại này đã tồn tại";
            $this->showCreatePage();
        } else {
            $category->category_name = $category_name;
            $saveSuccess = $category->save($category_name);

            if ($saveSuccess) {
                $_SESSION["message"] = "Thể loại mới đã được thêm vào";
            }
            $this->index();
        }
    }
    public function showCreatePage()
    {
        $categories = Categories::all();
        $viewData = ["categories" => $categories];
        $this->render("create", $viewData,);
    }
    public function edit()
    {

        $this->render("edit", [],);
    }
}
