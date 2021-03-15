<?php

namespace controller;

session_start();

use model\DbConnection;
use model\User;
use model\UserDb;

class UserController
{
    public $UserDb;

    public function __construct()
    {
        $connection = new DbConnection("mysql:host = localhost:3306;dbname=website_manager", "root", "");
        $this->UserDb = new UserDb($connection->connect());
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

    public function logIn()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username =  $_POST['username'];
            $password = $_POST['password'];
            $email = '';
        }
        $user = new User($username, $password, $email);
        if ($this->UserDb->checkExistUser($user->username, $user->password)) {
            $_SESSION['username'] = $username;
            header(('Location:' . "index.php"));
        }
    }

    public function logOut()
    {

        header(('Location:' . "view/logout.php"));
    }
}

$controller = new UserController();
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : NUll;

switch ($action) {
    case 'register':

        $controller->register();
        break;
    case 'login':

        $controller->logIn();
        break;
    case 'logout':
        $controller->logOut();
        break;
}
