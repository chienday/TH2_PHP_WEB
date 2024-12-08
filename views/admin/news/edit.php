<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa tin tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Chỉnh sửa tin tức</h2>

        <form action="index.php?controller=admin&action=updateNews&id=<?php echo $news['id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($news['title']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Nội dung</label>
                <textarea class="form-control" id="content" name="content" rows="4" required><?php echo htmlspecialchars($news['content']); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh (Hiện tại: <?php echo $news['image']; ?>)</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <input type="hidden" name="old_image" value="<?php echo $news['image']; ?>"> <!-- Giữ lại tên ảnh cũ nếu không thay đổi -->
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Danh mục</label>
                <select class="form-control" id="category" name="category" required>
                    <!-- Dữ liệu danh mục sẽ được lấy từ cơ sở dữ liệu -->
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>" <?php echo ($category['id'] == $news['category_id']) ? 'selected' : ''; ?>>
                            <?php echo $category['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Cập nhật tin tức</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
