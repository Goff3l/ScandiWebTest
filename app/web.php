<?php

$router->get('', ['ProductController', 'show']);
$router->get('add-product', ['ProductController', 'add']);
$router->post('add-product', ['ProductController', 'store']);
$router->post('delete-product', ['ProductController', 'delete']);
$router->post('sku', ['ProductController', 'validate']);


