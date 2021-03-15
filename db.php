<?php

class DB
{
    private static $connection;


    public static function getInstance()
    {
        // kiểm tra nếu $connection = null thì khởi tạo $connection bằng PDO
        if (!isset($connection)) {
            try {
                self::$connection = new PDO("mysql:host=localhost;dbname=website_manager", "root", "");
                // set the PDO error mode to exception
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Connected successfully";
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        return  self::$connection;
    }
}
