<?php

if (!isset($_SESSION['user'])) {
    header("Location: index.php?controller=admin&action=login");
    exit();
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tổng quan quản trị</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-4">Tổng quan quản trị</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Quản lý Tin tức</h5>
                                <p class="card-text">Thêm, sửa, xóa tin tức trên website.</p>
                                <a href="index.php?controller=admin&action=manageNews" class="btn btn-primary">Quản lý tin tức</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Quản lý Danh mục</h5>
                                <p class="card-text">Thêm, sửa, xóa danh mục tin tức.</p>
                                <a href="index.php?controller=admin&action=manageCategories" class="btn btn-primary">Quản lý danh mục</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Thoát</h5>
                                <p class="card-text">Đăng xuất khỏi trang quản trị.</p>
                                <a href="index.php?controller=admin&action=logout" class="btn btn-danger">Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
