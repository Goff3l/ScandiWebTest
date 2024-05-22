<?php

use App\Main\Router;
use App\Main\DB\Request;


require 'vendor/autoload.php';
$query = require "main/requirements.php";

Router::load('app/web.php')->direct(Request::uri(), Request::method());
