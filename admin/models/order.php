<?php
require_once("./db.php");

class Order
{

    public $order_id;
    public $created_at;
    public $customer_id;
    public $status;



    public static function all()
    {
        $sql = "SELECT *
        FROM orders ";

        $statement = DB::getInstance()->prepare($sql);

        $statement->execute();
        // Array associative 
        $rowdata = $statement->fetchAll();
        $list = [];

        foreach ($rowdata as $row) {
            $entity = new Order();
            $entity->order_id = $row['order_id'];
            $entity->created_at = $row['created_at'];
            $entity->customer_id = $row['customer_id'];
            $entity->status = $row['status'];

            $list[] = $entity;
        }
        return $list;
    }

    static function getdetail($id)
    {

        $sql = "SELECT *
        FROM order_detail t1
        INNER JOIN orders t2
        ON t1.order_id = t2.order_id;";
        $statement = DB::getInstance()->prepare($sql);
        $statement->execute();
        return $rowdata = $statement->fetchAll();
    }

    static function drop($id)
    {
        $sql1 = "DELETE FROM order_detail WHERE order_id=$id;";
        $statement = DB::getInstance()->prepare($sql1);
        $statement->execute();

        $sql2 = " DELETE FROM orders WHERE order_id=$id;";
        $statement = DB::getInstance()->prepare($sql2);
        $statement->execute();
    }

    static function getCustomerOrder($id)
    {
        $sql = "SELECT * FROM website_manager.customer where customer_id=$id;";
        $statement = DB::getInstance()->prepare($sql);
        $statement->execute();
        return   $rowdata =  $statement->fetch();
    }
}
