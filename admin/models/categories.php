<?php
require_once("./db.php");


class Categories
{

    public $category_id;
    public $category_name;


    public static function all()
    {
        $sql = "SELECT *
        FROM categories ";

        $statement = DB::getInstance()->prepare($sql);

        $statement->execute();
        // Array associative 
        $rowdata = $statement->fetchAll();
        $list = [];

        foreach ($rowdata as $row) {
            $entity = new Categories();
            $entity->category_id = $row['category_id'];
            $entity->category_name = $row['category_name'];

            $list[] = $entity;
        }
        return $list;
    }


    public function save($name)
    {
        $sql = "INSERT INTO categories (category_name)
        values ('$name');";

        $statement = DB::getInstance()->prepare($sql);
        $statement->execute();
    }

    public function drop()
    {
        $sql = "DELETE FROM products WHERE product_id='?';";
        $statement = DB::getInstance()->prepare($sql);
        $statement->execute();
    }

    static function findByCategoryName($category_name)
    {
        $sql = "SELECT * FROM website_manager.categories WHERE category_name = '$category_name';";
        $statement = DB::getInstance()->prepare($sql);
        $statement->execute();

        return $statement->fetch();
    }
}
