<?php
require '../controllers/HomeController.php';
$homeController = new HomeController();
$newsList = $homeController->index();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>News Home</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <!-- Custom styles -->
    <link href="../public/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..." 
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="btn btn-danger" href="../views/admin/login.php">Đăng nhập</a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800 text-center">Danh sách tin tức</h1>
                    <div class="row">
                        <?php if (empty($newsList)): ?>
                            <div class="col-12 text-center">
                                <div class="alert alert-warning">Không có tin tức nào!</div>
                            </div>
                        <?php else: ?>
                            <?php foreach ($newsList as $news): ?>
                                <div class="col-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card shadow h-100">
                                        <img src="../public/assets/images/<?php echo htmlspecialchars($news->getImage()); ?>" 
                                            alt="<?php echo htmlspecialchars($news->getTitle() ?: 'Hình ảnh bài viết'); ?>" 
                                            class="card-img-top" style="height: 200px; object-fit: cover;">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-2">
                                                <span class="badge bg-primary text-light">ID: <?php echo $news->getId(); ?></span>
                                                <span class="text-muted"><?php echo htmlspecialchars($news->getCreatedAt()); ?></span>
                                            </div>
                                            <h5 class="card-title"><?php echo htmlspecialchars($news->getTitle()); ?></h5>
                                            <p class="card-text">
                                                <?php 
                                                $content = htmlspecialchars($news->getContent());
                                                echo strlen($content) > 100 
                                                    ? substr($content, 0, 100) . '...' 
                                                    : $content; 
                                                ?>
                                            </p>
                                            <a href="news_detail.php?id=<?php echo $news->getId(); ?>" 
                                                class="btn btn-primary btn-sm mt-2">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- End of Page Content -->

                <?php
                require_once "../utilities/footer.php";
                ?>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Scripts -->
    <script src="../public/assets/vendor/jquery/jquery.min.js"></script>
    <script src="../public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../public/assets/js/sb-admin-2.min.js"></script>
</body>

</html>
