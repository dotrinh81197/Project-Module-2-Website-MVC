<?php

require_once("controllers/_base_controller.php");
require_once("models/product.php");
class HomeController extends BaseController
{
    protected function getFolder()
    {
        return "home";
    }


    public function index()
    {
        $keyword = $_GET['keyword'];

        $data = new Products;
        $viewData = $data->search($keyword);
        $this->render("index", $viewData, "products_layout");
    }

    public function welcome()
    {
        $this->render("welcome", [], "home_layout");
    }
}
