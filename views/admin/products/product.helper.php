<?php

class ProductHelper
{
    function __construct($products)
    {
        $this->products = $products;
    }

    private function makeProductRow($product, $key)
    {
        return
            '<tr class="">
                <th  scope="row">' . ++$key . '</th>
                <td >' . $product->name . '</td>
                <td>' . $product->category . '</td>
                <td >' . $product->weight . '</td>
                <td >' . $product->sell_price . '</td>
                <td >' . $product->ageRange . '</td>
                <td >
                    <a href="?controller=product&action=edit&id=' . $product->id . '">
                        <button type="button" class="btn btn-outline-warning">
                            Sửa
                        </button>
                    </a>
                </td>
                <td>
                    <form class="d-inline"
                        id="' . $product->id . '"
                        action="?controller=product&action=delete&id=' . $product->id  . '"
                        method="POST">
                        <span class="btn btn-outline-danger btn-delete">Xóa</span>
                    </form>
                </td>
                
            </tr>';
    }

    public function renderProducts()
    {

        $result = "";
        foreach ($this->products as $key =>  $product) {
            $result .= $this->makeProductRow($product, $key);
        }
        return $result;
    }
}
