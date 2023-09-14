<?php

$routes = [
    'GET' => [
        '/' => fn() => router('Tarefa', 'index')
    ],
    'POST' => []
];


function router(string $controller, string $action)
{
    try {
        $controllerPath = "app\\controllers\\{$controller}";
        // var_dump($controllerPath);

        if (!class_exists($controllerPath)) {
            throw new Exception("O controller {$controller} não está disponível.");
            // echo "O controller {$controller} não está disponível.";
        }

        $controllerInstance = new $controllerPath();

        if (!method_exists($controllerInstance, $action)) {
            throw new Exception("O método {$action} não está disponível no controller {$controller}");
        }

        $controllerInstance->$action();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
