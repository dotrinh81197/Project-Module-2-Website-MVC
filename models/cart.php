<?php
require_once("models/product.php");
require_once("./db.php");


class Carts
{

    public $name;
    public $brand;
    public $weight;
    public $sell_price;
    public $sale_price;
    public $ageRange;
    public $image_url;
    public $category;



    static function findbyid($id)
    {
        $sql = "SELECT t1.product_name, t1.sell_price, t1.sale_price, t1.image_url , t2.category_name AS category
        FROM products t1
        LEFT JOIN categories t2
        ON t1.category_id = t2.category_id
        WHERE t1.product_id = $id;";
        $statement = DB::getInstance()->prepare($sql);
        $statement->execute();

        return $rowdata = $statement->fetch();
    }


    // public function addToCart()
    // {
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $productId = $_GET["id"];

    //         $product = Products::getProduct($productId);

    //         $cart = new Carts();

    //         $cart->store($product);

    //         echo "
    //         <script type='text/javascript'>
    //             window.history.go(-1);
    //         </script>
    //         ";
    //     }
    // }

    // public function store(Products $product, $qty = 1)
    // {
    //     $items =  self::getItems();

    //     // Check if product is exist, increase Qty of there item
    //     // Otherwise, add new CartItem to item list
    //     if ($item = self::findbyid($product->id)) {
    //         $item->increaseQty($qty);
    //     } else {
    //         $items[] = new Carts($product, $qty);
    //     }

    //     self::storeIntoSession($items);
    // }
}


// class Cart
// {
// }
//     public static function countItems()
//     {
//         return count(self::getItems());
//     }

//     public function getTotal()
//     {
//         return array_reduce(self::getItems(), function ($carry, $item) {
//             return $carry + $item->qty * $item->unitPrice;
//         }, 0);
//     }

//    
//     public function removeItemInCart($productId)
//     {
//         $items = array_filter($this->items, function ($item, $productId) {
//             return $item->productId !== $productId;
//         }, $productId);

//         $this->storeIntoSession($items);
//     }

//     private static function findCartItem($productId)
//     {
//         $items = self::getItems();

//         foreach ($items as $item) {
//             if ($item->productId == $productId) {
//                 return $item;
//             }
//         }

//         return null;
//     }

//     private static function isCartExistInSession()
//     {
//         return isset($_SESSION["cart"]);
//     }

//     public static function getItems()
//     {
//         if (!self::isCartExistInSession()) {
//             self::init();
//         }

//         return unserialize($_SESSION["cart"]);
//     }

//     private static function storeIntoSession($items)
//     {
//         $_SESSION['cart'] = serialize($items);
//     }

//     private static function init()
//     {
//         if (!isset($_SESSION["cart"])) {
//             $_SESSION["cart"] = serialize([]);
//         }
//     }
// }
