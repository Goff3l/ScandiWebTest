<?php
namespace App\Models;

use App\Models\Product;
use App\Main\App;
use PDO;


class Dvd extends Product
{
    public $type;
    public $size;

    public function __construct($sku, $name, $price, $size)
    {
        parent::__construct($sku, $name, $price);
        $this->type = 'DVD';
        $this->size = $size;
    }


    public function save()
    {

        $query = sprintf("INSERT INTO products (sku, name, price, type) VALUES ('%s', '%s', '%s', 'dvd')", $this->sku, $this->name, $this->price);
        $stmt = APP::get('database')->prepare($query);
        $stmt->execute();

        $product_id = $this->getProductId();


        $query = sprintf(
            "INSERT INTO product_attributes (product_id, attribute_type, attribute_value) VALUES ('%s', 'size', '%s')",
            $product_id,
            "Size: {$this->size} MB"
        );
        $stmt = APP::get('database')->prepare($query);
        $stmt->execute();
    }
}
