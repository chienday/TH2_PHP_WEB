<?php
session_start();

$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';

$controllerName = ucfirst($controller) . "Controller";
$controllerFile = "controllers/" . $controllerName . ".php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerInstance = new $controllerName();

    if (method_exists($controllerInstance, $action)) {
        if (isset($_GET['id'])) {
            $controllerInstance->$action($_GET['id']);
        } else {
            $controllerInstance->$action();
        }
    } else {
        echo "Action $action không tồn tại!";
    }
} else {
    echo "Controller $controller không tồn tại!";
}
