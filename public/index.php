<?php

use App\Connection\DatabaseConnection;

include '../vendor/autoload.php';
include '../config/database.php';

$rotas = require '../config/rotas.php';

$url = $_SERVER["REQUEST_URI"];
$rota = explode("?", $url)[0];

if(!isset($rotas[$rota])){
    echo 'Erro 404';
    exit;
}

$controller = $rotas[$rota]['controller'];
$method = $rotas[$rota]['method'];

(new $controller)->$method();