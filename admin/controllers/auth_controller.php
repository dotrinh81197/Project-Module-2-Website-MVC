<?php

require_once("_base_controller.php");
require_once("models/user.php");
class AuthController extends BaseController
{
    protected function getFolder()
    {
        return "auth";
    }

    public  function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->submitLogin();
        } else {
            $this->showLoginPage();
        }
    }

    public  function logOut()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Xóa thông tin đăng nhập khỏi Session
            User::removeAuthUser();

            // Điều hướng về trang đăng nhập
            header("Location:?controller=auth&action=login");
        }
    }


    public function submitLogin()
    {
        $username =  $_POST['username'];
        $password = $_POST['password'];
        // kiem tra username &password hop le
        $user = User::findByUserNameAndPassword($username, $password);

        if ($user) {

            // save thong tin user da dang nhap vao session['auth']
            $_SESSION["auth"] = $user;
            $_SESSION["username"] = $user->username;

            header("Location:?controller=home&action=welcome");
        } else {
            // thông báo lỗi 
            $_SESSION["error_login"] = "User name or password wrong!";

            header("location:?controller=auth&action=login");
        }
    }

    public function showLoginPage()
    {
        $this->render("login", [], "auth_layout");
    }

    public function register()
    {
        $this->render("register", [], "auth_layout");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            $user = new User();
            if (User::checkExistUsername($username)) {

                $_SESSION['msg'] = "* Username already exist";

                header("Location:?controller=auth&action=register");
            } else {
                if (User::checkExistEmail($email)) {
                    $_SESSION['msg'] = "* Email already exist";

                    header("Location:?controller=auth&action=register");
                } else {
                    User::signUp($username, $password, $email);
                    $_SESSION['msg'] = "* Sign Up success";

                    header("Location:?controller=auth&action=login");
                }
            }
        }
    }
}
