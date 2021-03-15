<?php

require_once("_base_controller.php");
require_once("models/user.php");
class AuthController extends BaseController
{
    protected function getFolder()
    {
        return "auth";
    }

    public  function logIn()
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            $user = new User($username, $password, $email);
            if ($this->UserDb->checkExistUsername($user->username)) {

                $msg['msg'] = "* Username already exist";


                header('Location:'  . "view/register.php?msg=" . $msg['msg']);
            } else {
                if ($this->UserDb->checkExistEmail($user->email)) {
                    $msg['msg'] = "* Email already exist";

                    header('Location:'  . "view/register.php?msg=" . $msg['msg']);
                } else {
                    $this->UserDb->signUp($user);
                    $msg['msg'] = "* Sign Up success";

                    header('Location:'  . "view/login.php?msg=" . $msg['msg']);
                }
            }
        }
    }

    public function checkExistUsername($username)
    {

        $sql = "SELECT * FROM `user` WHERE `username`= '$username'";
        $statement = $this->connection->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll();

        if (isset($result) && count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    // check exists user to login
    protected function checkExistUser($username, $password)
    {

        $sql = "SELECT * FROM `user` WHERE  `username`='$username' AND `password`= '$password' ";
        $statement = $this->connection->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll();

        if (isset($result) && count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    protected function checkExistEmail($email)
    {

        $sql = "SELECT * FROM `user` WHERE `email`= '$email'";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        var_dump($result);
        if (isset($result) && COUNT($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
