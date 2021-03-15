<?php
if (isset($_GET['id']) && $_GET['id'] != null) {
    $id = $_GET['id'];
    $product = $Pro->getId($id);
    if (isset($product)) {
        if (isset($_SESSION['cart'])) {
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['qty'] += 1;
            } else {
                $_SESSION['cart'][$id]['qty'] = 1;
            }
        } else {
            $_SESSION['cart'][$id]['qty'] = 1;
        }
    }
}
