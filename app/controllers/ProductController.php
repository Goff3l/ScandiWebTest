<?php

namespace App\Controllers;

use App\Main\App;
use App\Models\Product;
use App\Models\Dvd;
use App\Models\Book;
use App\Models\Furniture;
use App\Validation\Validator;

class ProductController
{

    public function show()
    {

        $products = Product::getAll();

        return view('home', [
            'products' => $products,
        ]);
    }

    public function add()
    {
        return view('add-product');
    }

    public function store()
    {



        $typeToClass = [
            'dvd' => 'Dvd',
            'book' => 'Book',
            'furniture' => 'Furniture',
        ];

        $type = $_POST['type'];

        $className = 'App\\Models\\' . $typeToClass[$type];

        $attributes = [];
        foreach ($_POST as $key => $value) {
            if ($key !== 'sku' && $key !== 'name' && $key !== 'price' && $key !== 'type')
                $attributes[] = $value;
        }
        

        $product = new $className(
            $_POST['sku'],
            $_POST['name'],
            $_POST['price'],
            ...$attributes
        );

        $product->save();

        return redirect('/');
    }


    public function delete()
    {
        $productIds = $_POST['productIds'];
        Product::delete($productIds);
        return redirect('/');
    }

    public function validate()
    {
        Validator::duplicateSku($_POST['sku']);
    }
}
