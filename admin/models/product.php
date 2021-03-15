<?php
require_once("./db.php");


class Products
{
    public $id;
    public $name;
    public $brand;
    public $weight;
    public $cost_price;
    public $sell_price;
    public $sale_price;
    public $description;
    public $ageRange;
    public $origin;
    public $category_id;
    public $image_url;
    public $category;
    public $intended_for;

    public static function all()
    {
        $sql = "SELECT *
        FROM products t1
        LEFT JOIN categories t2 
        ON t1.category_id = t2.category_id ;";

        $statement = DB::getInstance()->prepare($sql);

        $statement->execute();
        // Array associative 
        $rowdata = $statement->fetchAll();
        $list = [];

        foreach ($rowdata as $row) {
            $entity = new Products();
            $entity->id = $row['product_id'];
            $entity->name = $row['product_name'];
            $entity->brand = $row['description'];
            $entity->weight = $row['item_weight'];
            $entity->sell_price = $row['sell_price'];
            $entity->sale_price = $row["sale_price"];
            $entity->cost_price = $row['cost_price'];
            $entity->description = $row['description'];
            $entity->ageRange = $row['age_range'];
            $entity->origin = $row['origin'];
            $entity->image_url = $row['image_url'];
            $entity->intended_for = $row['intended_for'];
            $entity->category_id = $row['category_id'];
            $entity->category = $row['category_name'];
            $list[] = $entity;
        }
        return $list;
    }

    public static function getProduct($id)
    {
        $sql = "SELECT t1.*, t2.category_name AS category
        FROM products t1
        LEFT JOIN categories t2
        ON t1.category_id = t2.category_id
        WHERE t1.product_id = $id;";
        $statement = DB::getInstance()->prepare($sql);
        $statement->execute();
        $rowdata = $statement->fetch();

        $product = new Products();

        $product->id = $rowdata["product_id"];
        $product->name = $rowdata["product_name"];
        $product->brand = $rowdata["brand"];
        $product->weight = $rowdata["item_weight"];
        $product->cost_price = $rowdata["cost_price"];
        $product->sell_price = $rowdata["sell_price"];
        $product->sale_price = $rowdata["sale_price"];
        $product->description = $rowdata["description"];
        $product->ageRange = $rowdata["age_range"];
        $product->origin = $rowdata["origin"];
        $product->category_id = $rowdata["category_id"];
        $product->image_url = $rowdata["image_url"];
        $product->category = $rowdata["category"];
        $product->intended_for = $rowdata["intended_for"];

        return $product;
    }


    public function save()
    {
        $sql = "INSERT INTO `products` (product_id,product_name, brand, item_weight, cost_price, sell_price, sale_price,description, age_range, origin, image_url, intended_for, category_id)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)
        ON DUPLICATE KEY UPDATE
        product_name=?,
        brand = ? ,
        item_weight= ?,
        cost_price =?,
        sell_price=?,
        sale_price=?,
        description=?,
        age_range=?,
        origin=?,
        image_url=?,
        intended_for=?,
        category_id=?;";



        $statement = DB::getInstance()->prepare($sql);

        return $statement->execute([
            $this->id,
            $this->name,
            $this->brand,
            $this->weight,
            $this->cost_price,
            $this->sell_price,
            $this->sale_price,
            $this->description,
            $this->ageRange,
            $this->origin,
            $this->image_url,
            $this->intended_for,
            $this->category_id,

            $this->name,
            $this->brand,
            $this->weight,
            $this->cost_price,
            $this->sell_price,
            $this->sale_price,
            $this->description,
            $this->ageRange,
            $this->origin,
            $this->image_url,
            $this->intended_for,
            $this->category_id
        ]);
    }

    public function update($id)
    {
        $sql = "UPDATE products 
        SET product_name= ?, brand= ?, item_weight=?, cost_price=?, sell_price=?, description= ?, age_range= ?, origin= ?, image_url= ?,intended_for= ?,category_id= ?
        where product_id=$id";

        $statement = DB::getInstance()->prepare($sql);
        return $statement->execute([
            $this->name,
            $this->brand,
            $this->weight,
            $this->cost_price,
            $this->sell_price,
            $this->sale_price,
            $this->description,
            $this->ageRange,
            $this->origin,
            $this->image_url,
            $this->intended_for,
            $this->category_id
        ]);
    }



    public function destroy()
    {
        $sql = "DELETE FROM products WHERE product_id=$this->id;";
        $statement = DB::getInstance()->prepare($sql);
        return $statement->execute();
    }
}
