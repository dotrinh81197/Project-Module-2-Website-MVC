<?php require_once "../classes/ClassProduct.php";
session_start();
if (isset($_GET['key'])) {
    $key = (int) $_GET['key'];
    if ($key) {
        if (array_key_exists($key, $_SESSION['cart'])) {
            unset($_SESSION['cart'][$key]);
            header("location: index.php");
        }
    }
}
if (empty($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}
$sumPrice = 0;
?>
<?php include __DIR__ . "/../layout/header.php"; ?>
<div class="content">
    <div class="grid">
        <div class="container">
            <?php if (isset($_SESSION['cart'])) {
                include "isset-cart.php";
            } else {
                include "no-cart.php";
            }
            ?>
        </div>
    </div>
</div>
<?php include __DIR__ . "/../layout/footer.php"; ?>