<?php

// Lấy được request yêu cầu đến controller và action
$controller =  isset($_GET["controller"]) ? $_GET["controller"] :  null;
$action = $_GET["action"] ?? null;


// Yêu cầu kết nối MySQL
require_once("db.php");
// $connection = DB::getInstance();

//  Nhúng file controller
if (isset($controller)) {

    require_once("controllers/$controller" . "_controller.php");
    // Khởi tạo controller
    // home: HomeController
    $controllerName = ucwords($controller) . "Controller";

    $controllerInstance = new $controllerName;

    // Gọi action
    $controllerInstance->$action();
} else {

    require_once("views/shared/home_layout.php");
}
