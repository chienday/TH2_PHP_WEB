<?php
session_start();

// Lấy controller và action từ URL hoặc gán mặc định
$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';

// Xử lý tên controller (chuyển thành dạng `HomeController`)
$controllerName = ucfirst($controller) . "Controller";
$controllerFile = "controllers/" . $controllerName . ".php";

// Kiểm tra file controller có tồn tại không
if (file_exists($controllerFile)) {
    require_once $controllerFile;

    // Tạo instance của controller
    if (class_exists($controllerName)) {
        $controllerInstance = new $controllerName();

        // Kiểm tra action có tồn tại trong controller hay không
        if (method_exists($controllerInstance, $action)) {
            // Gọi action với tham số id (nếu có)
            $id = $_GET['id'] ?? null;
            if ($id !== null) {
                $controllerInstance->$action($id);
            } else {
                $controllerInstance->$action();
            }
        } else {
            echo "Action <b>$action</b> không tồn tại trong controller <b>$controller</b>!";
        }
    } else {
        echo "Controller class <b>$controllerName</b> không tồn tại!";
    }
} else {
    echo "File controller <b>$controllerFile</b> không tồn tại!";
}

