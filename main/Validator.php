<?php

namespace App\Validation;

use App\Main\App;
use PDO;

class Validator
{
    static public function duplicateSku($sku){
        $query = sprintf("select * from products where sku='{$sku}' ");
        $stmt = APP::get('database')->prepare($query);
        $stmt->execute();
        $duplicate = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (count($duplicate) === 0) {
            echo "false";
          } else {
            echo "true";
          }
        
    }
}