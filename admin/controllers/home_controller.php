<?php

require_once("controllers/_base_controller.php");
class HomeController extends BaseController
{
    protected function getFolder()
    {
        return "home";
    }
    public function welcome()
    {
        // Kiểm tra file gọi đến có tồn tại hay không?


        $this->render("welcome", []);
    }
}
