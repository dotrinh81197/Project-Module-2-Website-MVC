<?php
require_once("db.php");

class User
{
    public $id;
    public $username;
    private $password;
    public $email;
    public $level;
    public $last_login_at;

    static function findByUserNameAndPassword($username, $password)
    {
        $sql = "SELECT * FROM user WHERE username = ? AND password = ?";

        $statement = DB::getInstance()->prepare($sql);
        $statement->execute([$username, $password]);

        // Type: Associative Array
        $rawData = $statement->fetch();

        // Kiểm tra, nếu dữ liệu lấy về là false thì trả về null
        if (!$rawData) {
            return null;
        }

        // Trả về đối tượng User
        $user = new User();
        $user->id = $rawData["user_id"];
        $user->username = $rawData["username"];
        $user->email = $rawData["email"];
        $user->password = $rawData["password"];
        $user->level = $rawData["level"];
        $user->last_login_at = $rawData["last_login_at"];

        return $user;
    }


    // Tìm người dùng với username và password, nếu trả về null thì là không tìm thấy
    static function removeAuthUser()
    {
        unset($_SESSION["username"]);
        unset($_SESSION["auth"]);
    }
    static function checkExistUsername($username)
    {

        $sql = "SELECT * FROM `user` WHERE `username`= '$username'";
        $statement = DB::getInstance()->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll();

        if (isset($result) && count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    // check exists user to login
    static function checkExistUser($username, $password)
    {

        $sql = "SELECT * FROM `user` WHERE  `username`='$username' AND `password`= '$password' ";
        $statement = DB::getInstance()->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll();

        if (isset($result) && count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    static function checkExistEmail($email)
    {

        $sql = "SELECT * FROM `user` WHERE `email`= '$email'";
        $statement = DB::getInstance()->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        var_dump($result);
        if (isset($result) && COUNT($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    static function signUp($username, $password, $email)
    {
        $sql = "INSERT INTO user (username,password,email)
       VALUES('$username','$password','$email');";
        $statement = DB::getInstance()->prepare($sql);

        return   $statement->execute();
    }
}
