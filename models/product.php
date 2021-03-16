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
            $entity->cost_price = $row['cost_price'];
            $entity->sale_price = $row['sale_price'];
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

    static function search($keyword)
    {
        $sql = "SELECT *FROM products
        WHERE product_name LIKE '%$keyword%' OR product_name LIKE '%$keyword' or product_name LIKE '$keyword%';";


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
            $entity->cost_price = $row['cost_price'];
            $entity->sale_price = $row['sale_price'];
            $entity->description = $row['description'];
            $entity->ageRange = $row['age_range'];
            $entity->origin = $row['origin'];
            $entity->image_url = $row['image_url'];
            $entity->intended_for = $row['intended_for'];
            $entity->category_id = $row['category_id'];
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
        $sql = "INSERT INTO `products` (product_id,product_name, brand, item_weight, cost_price, sell_price, description, age_range, origin, image_url, intended_for, category_id)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)
        ON DUPLICATE KEY UPDATE
        product_name=?,
        brand = ? ,
        item_weight= ?,
        cost_price =?,
        sell_price=?,
        sale_price = ?,
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
            $this->category_id,
        ]);
    }

    static function getCategoryIntended($category_id, $intended_for, $number)
    {
        if (empty($intended_for)) {

            $sql = "SELECT *
                FROM products t1
                LEFT JOIN categories t2 
                ON t1.category_id = t2.category_id
                WHERE t1.category_id = $category_id 
                LIMIT $number;";
        } else {

            $sql = "SELECT *
            FROM products t1
            LEFT JOIN categories t2 
            ON t1.category_id = t2.category_id
            WHERE t1.category_id = $category_id  AND
                  t1.intended_for = '$intended_for'
            LIMIT $number;";
        }


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
            $entity->cost_price = $row['cost_price'];
            $entity->sale_price = $row['sale_price'];
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

    static function getbyIntended_for($intended_for, $number)
    {
        $sql = "SELECT * FROM products 
        WHERE intended_for = '$intended_for'
        LIMIT $number; ";

        $statement = DB::getInstance()->prepare($sql);

        $statement->execute();

        $rowdata = $statement->fetchAll();

        $products = [];

        foreach ($rowdata as $row) {
            $entity = new Products();
            $entity->id = $row['product_id'];
            $entity->name = $row['product_name'];
            $entity->brand = $row['description'];
            $entity->weight = $row['item_weight'];
            $entity->sell_price = $row['sell_price'];
            $entity->cost_price = $row['cost_price'];
            $entity->sale_price = $row['sale_price'];
            $entity->description = $row['description'];
            $entity->ageRange = $row['age_range'];
            $entity->origin = $row['origin'];
            $entity->image_url = $row['image_url'];
            $entity->intended_for = $row['intended_for'];
            $entity->category_id = $row['category_id'];
            $products[] = $entity;
        }
        return $products;
    }

    // lay cac sp giam gia'
    static function getbySellPrice($number)
    {
        $sql = "SELECT * 
        FROM products
         ORDER BY sell_price ASC LIMIT $number;";

        $statement = DB::getInstance()->prepare($sql);
        $statement->execute();
        $rowdata = $statement->fetchAll();

        $products = [];

        foreach ($rowdata as $row) {
            $entity = new Products();
            $entity->id = $row['product_id'];
            $entity->name = $row['product_name'];
            $entity->brand = $row['description'];
            $entity->weight = $row['item_weight'];
            $entity->sell_price = $row['sell_price'];
            $entity->cost_price = $row['cost_price'];
            $entity->sale_price = $row['sale_price'];
            $entity->description = $row['description'];
            $entity->ageRange = $row['age_range'];
            $entity->origin = $row['origin'];
            $entity->image_url = $row['image_url'];
            $entity->intended_for = $row['intended_for'];
            $entity->category_id = $row['category_id'];
            $products[] = $entity;
        }
        return $products;
    }
    static function getbyCategory($category_id, $number)
    {

        $sql = "SELECT *
        FROM products t1
        LEFT JOIN categories t2 
        ON t1.category_id = t2.category_id
        WHERE t1.category_id = $category_id 
        LIMIT $number;";



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
            $entity->cost_price = $row['cost_price'];
            $entity->sale_price = $row['sale_price'];
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

    public function find($keyword)
    {
        $sql = "SELECT *FROM products
       WHERE product_name LIKE '$keyword' OR product_name LIKE '$keyword' or product_name LIKE '$keyword';";

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
            $entity->cost_price = $row['cost_price'];
            $entity->sale_price = $row['sale_price'];
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
    // static function findbyid($id)
    // {
    //     $sql = "SELECT t1.product_name, t1.sell_price, t1.sale_price, t1.image_url , t2.category_name AS category
    //     FROM products t1
    //     LEFT JOIN categories t2
    //     ON t1.category_id = t2.category_id
    //     WHERE t1.product_id = $id;";
    //     $statement = DB::getInstance()->prepare($sql);
    //     $statement->execute();

    //     return $rowdata = $statement->fetch();
    // }
}
