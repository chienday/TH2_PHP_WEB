<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết tin tức</title>
</head>
<body>
    <h1><?= $news['title'] ?></h1>
    <img src="<?= $news['image'] ?>" alt="Image" width="500">
    <p><?= $news['content'] ?></p>
    <a href="index.php?controller=news&action=index">Quay lại</a>
</body>
</html>
