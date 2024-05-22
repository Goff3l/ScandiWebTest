<?php

namespace App\Models;

use App\Main\App;
use PDO;

abstract class Product
{
    public $sku;
    public $name;
    public $price;

    function __construct($sku, $name, $price)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    public function getProductId()
    {
        $product_id_query = sprintf("select id from products where sku='{$this->sku}' ");
        $stmt = APP::get('database')->prepare($product_id_query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ)[0]->id;
    }

    public static function delete($ids)
    {

        foreach ($ids as $productId) {
            $query = sprintf("DELETE FROM products
                    WHERE id = '{$productId}';");

            $stmt = APP::get('database')->prepare($query);
            $stmt->execute();
        }
    }

    public static function getAll()
    {
        $query = sprintf("SELECT products.*, product_attributes.*
             FROM products
             INNER JOIN product_attributes ON products.id = product_attributes.product_id;");


        $stmt = APP::get('database')->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}