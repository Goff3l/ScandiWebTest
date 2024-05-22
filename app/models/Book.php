<?php
namespace App\Models;

use App\Models\Product;
use App\Main\App;
use PDO;

class Book extends Product
{
    public $type;
    public $weight;

    public function __construct($sku, $name, $price, $weight)
    {
        parent::__construct($sku, $name, $price);
        $this->type = 'book';
        $this->weight = $weight;
    }

    public function save()
    {

        $query = sprintf("INSERT INTO products (sku, name, price, type) VALUES ('%s', '%s', '%s', 'dvd')", $this->sku, $this->name, $this->price);
        $stmt = APP::get('database')->prepare($query);
        $stmt->execute();

        $product_id = $this->getProductId();

        $query = sprintf(
            "INSERT INTO product_attributes (product_id, attribute_type, attribute_value) VALUES ('%s', 'weight', '%s')",
            $product_id,
            "Weight: {$this->weight}KG"
        );
        $stmt = APP::get('database')->prepare($query);
        $stmt->execute();
    }
}