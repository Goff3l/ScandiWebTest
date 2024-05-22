<?php

use App\Main\App;
use App\Main\DB\Connection;

App::bind('config', require 'config.php');


App::bind('database', Connection::make(App::get('config')['database']));


function view($name, $data = [])
{
    extract($data);

    return require "app/views/{$name}.view.php";
}

function redirect($path)
{
    header("Location: {$path}");
}
