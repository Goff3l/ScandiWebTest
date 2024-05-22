<?php
namespace App\Models;

use App\Models\Product;
use App\Main\App;
use PDO;

class Furniture extends Product
{
    public $type;
    public $height;
    public $width;
    public $length;


    public function __construct($sku, $name, $price, $height, $width, $length)
    {
        parent::__construct($sku, $name, $price);
        $this->type = 'furniture';
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }


    public function save()
    {

        $query = sprintf("INSERT INTO products (sku, name, price, type) VALUES ('%s', '%s', '%s', 'dvd')", $this->sku, $this->name, $this->price);
        $stmt = APP::get('database')->prepare($query);
        $stmt->execute();

        $product_id = $this->getProductId();
        $dimensions = "Dimensions: {$this->height}x{$this->width}x{$this->length}";

        $query = sprintf(
            "INSERT INTO product_attributes (product_id, attribute_type, attribute_value) VALUES ('%s', 'dimensions', '%s')",
            $product_id,
            $dimensions
        );
        $stmt = APP::get('database')->prepare($query);
        $stmt->execute();
    }
}
