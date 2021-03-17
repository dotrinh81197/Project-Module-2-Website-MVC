<?php
require_once("models/product.php");
require_once("./db.php");


class Order
{
    public $order_id;
    public $product_id;
    public $price;
    public $qty;
    public $created_at;
    public $customer_name;
    public $customer_email;
    public $customer_phone;
    public $customer_address;

    static function storeOrders($customer_id)
    {
        $sql = "INSERT INTO `orders` (created_at,status,customer_id)
        VALUES (CURRENT_TIME,0,$customer_id);";
        $statement = DB::getInstance()->prepare($sql);
        $statement->execute();

        $sql2 = "SELECT *
        FROM orders
        ORDER BY order_id DESC ";
        $statement = DB::getInstance()->prepare($sql2);
        $statement->execute();
        return $statement->fetch();
    }

    public function storeCustomerOrder($customer_name, $customer_email, $customer_phone, $customer_address)
    {
        $sql = "INSERT INTO customer (customer_name,customer_email,customer_phone,customer_address)
      VALUES (?,?,?,?);";

        $statement = DB::getInstance()->prepare($sql);
        $statement->execute([
            $this->customer_name = $customer_name,
            $this->customer_email = $customer_email,
            $this->customer_phone = $customer_phone,
            $this->customer_address = $customer_address,
        ]);

        $sql = "SELECT * FROM customer; ";
        $stm = DB::getInstance()->prepare($sql);
        $stm->execute();
        return $rowdata = $stm->fetchAll();
    }

    static function storeOrderDetail($order_id, $product_id, $product_name, $price, $qty)
    {
        $sql = "INSERT INTO order_detail (order_id,product_id,product_name,product_price,product_qty)
        VALUES ($order_id,$product_id,'$product_name',$price,$qty);";
        $statement = DB::getInstance()->prepare($sql);
        return $statement->execute();
    }
}
