<?php

require_once('../vendor/autoload.php');
require_once('../app/routes/router.php');

try {
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

    $request = $_SERVER['REQUEST_METHOD'];
    // var_dump($request);

    if(!isset($routes[$request])){
        throw new Exception("O metódo não está disponível.");
    }

    if(!array_key_exists($uri, $routes[$request])){
        throw new Exception("A rota não está disponível.");
    }

    $controller = $routes[$request][$uri];
    $controller();
} catch (Exception $e) {
    echo $e->getMessage();
}