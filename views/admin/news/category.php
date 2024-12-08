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
    <title>Quản lý Tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Danh sách mục </h2>
        <a href="index.php?controller=admin&action=dashboard" class="btn btn-primary mb-3">Quay lại</a>

        <a href="index.php?controller=admin&action=add" class="btn btn-success mb-3">Thêm danh mục</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($newsList as $news): ?>
                    <tr>
                        <td><?php echo $news['id']; ?></td>
                        <td><?php echo htmlspecialchars($news['name']); ?></td>
                        
                        <td>
                            <a href="index.php?controller=admin&action=editNews&id=<?php echo $news['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="index.php?controller=admin&action=deleteNews&id=<?php echo $news['id']; ?>" class="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
