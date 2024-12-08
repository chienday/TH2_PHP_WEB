<?php if (!empty($newsList)): ?>
    <h2>Kết quả tìm kiếm:</h2>
    <div class="row">
        <?php foreach ($newsList as $news): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="<?php echo htmlspecialchars($news['image']); ?>" class="card-img-top" alt="Image">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="index.php?controller=news&action=detail&id=<?php echo $news['id']; ?>">
                                <?php echo htmlspecialchars($news['title']); ?>
                            </a>
                        </h5>
                        <p class="card-text">
                            <?php echo htmlspecialchars(mb_strimwidth($news['content'], 0, 100, "...")); ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>Không có tin tức nào phù hợp với từ khóa của bạn.</p>
<?php endif; ?>
