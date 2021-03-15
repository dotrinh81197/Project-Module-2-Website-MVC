<?php
class Utils
{
    public static function showMessage()
    {
        if (isset($_SESSION["message"])) {
            echo "<div class='alert alert-success' role='alert'>
              " . $_SESSION["message"] . "
            </div>";
            unset($_SESSION["message"]);
        }
    }

    // Hàm kiểm tra lien kết có đúng với đường dẫn hay không, nếu đúng thì in ra active
// function showActive($controllerName, $actionName = null)
// {
//     global $controller;
//     if ($controller == $controllerName) {
//         echo "active";
//     }
// }
}
