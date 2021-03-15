<?php
session_start();
// Lấy được request yêu cầu đến controller và action
$controller =  isset($_GET["controller"]) ? $_GET["controller"] :  null;
$action = $_GET["action"] ?? null;

if (!isset($_SESSION["auth"]) && $controller != "auth" && $action != "login") {
    header("Location:?controller=auth&action=login");
}


// Yêu cầu kết nối MySQL
require_once("db.php");


//  Nhúng file controller
if (isset($controller)) {
    require_once("controllers/$controller" . "_controller.php");

    $controllerName = ucwords($controller) . "Controller";

    $controllerInstance = new $controllerName;

    // Gọi action
    $controllerInstance->$action();
} else {
    require_once("views/shared/application_layout.php");
}
