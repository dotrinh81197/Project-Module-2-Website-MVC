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
        unset($_SESSION["auth"]);
    }

    // Lưu thông tin người dùng đã đăng nhập: storeAuthUser
    // Return Type: void
    // Params: $user: User
    // static function storeAuthUser($user)
    // {
    //     $_SESSION[AUTH_KEY] = serialize($user);

    //     var_dump($user);
    // }

    // // Lấy thông tin người dùng đã đăng nhập: getAuthUser
    // // Return Type: User
    // static function getAuthUser()
    // {
    //     return isset($_SESSION[AUTH_KEY]) ? unserialize($_SESSION[AUTH_KEY]) : null;
    // }


    // // xóa thông tin người dùng đã đăng nhập: removeAuthUser
    // static function removeAuthUser()
    // {
    //     unset($_SESSION[AUTH_KEY]);
    // }



}
