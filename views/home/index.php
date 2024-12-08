<?php
$noidung = [
    [
        'title' => 'Khởi công khối phòng học điểm trường ở Hà Tĩnh',
        'description' =>'Công trình khối phòng học chức năng sẽ là nơi dạy và học của thầy trò Trường tiểu học Quang Vĩnh, đồng thời cũng là điểm tránh trú an toàn khi mưa lũ về.',
        'url'=>'https://tuoitre.vn/khoi-cong-khoi-phong-hoc-diem-truong-vuot-lu-o-ha-tinh-20231206083052028.htm',
    ],
    [
        'title' =>'Flick phân bua sau khi bị truất quyền chỉ đạo',
        'description'=>'HLV Barca Hansi Flick cho rằng khác biệt với văn hóa Tây Ban Nha khiến ông phải nhận thẻ đỏ vì phản ứng trong trận hòa Real Betis 2-2 ở La Liga ngày 7/12.',
        'url'=>'https://vnexpress.net/flick-phan-bua-sau-khi-bi-truat-quyen-chi-dao-4825348.html',
    ]
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TLU News</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="bg-primary text-white py-3">
        <div class="container">
            <h1 class="text-center">Chào mừng đến với Website Tin tức</h1>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=home&action=index">Trang chủ</a>
                            </li>
                        </ul>
                           
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=admin&action=login">Đăng nhập</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=admin&action=register">Đăng kí</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mt-5">
        <!-- Giới thiệu -->
        <section class="mb-4">
            <div class="text-center">
                <h2>Giới thiệu</h2>
                <p>Chào mừng bạn đến với hệ thống tin tức TLU. Tại đây, bạn có thể xem và tìm kiếm các tin tức mới nhất!</p>
            </div>
        </section>

        <!-- Form tìm kiếm -->
        <section class="search-form mb-4">
            <form action="index.php" method="GET" class="d-flex justify-content-center">
                <input type="hidden" name="controller" value="news">
                <input type="hidden" name="action" value="search">
                <input class="form-control me-2" type="text" name="keyword" placeholder="Tìm kiếm tin tức..." required>
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </form>
        </section>

        <!-- Tin tức nổi bật -->
        <section class="featured-news">
            <h2 class="text-center mb-4">Tin tức nổi bật</h2>
            <div class="row">
                <?php if (!empty($noidung)): ?>
                    <?php foreach ($noidung as $index => $data): ?>
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo ($index + 1) . '. ' . htmlspecialchars($data['title']); ?></h5>
                                    <p class="card-text"><?php echo htmlspecialchars($data['description']); ?></p>
                                    <a href="<?php echo htmlspecialchars($data['url']); ?>" class="btn btn-primary" target="_blank">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">Không có tin tức nổi bật để hiển thị.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3 mt-5">
        <div class="container text-center">
            <p>&copy; 2024 - Hệ thống tin tức TLU</p>
        </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
