<?php
require_once 'models/News.php';

class HomeController {
    public function index() {
        $newsModel = new News();
        $newsList = $newsModel->getAllNews();
        require_once 'views/home/index.php';
    }

    public function detail($id) {
        $newsModel = new News();
        $newsItem = $newsModel->getNewsById($id);
        require_once 'views/news/detail.php';
    }

    public function search() {
        $keyword = $_GET['keyword'] ?? '';
        $newsModel = new News();
        $searchResults = $newsModel->searchNews($keyword);
        require_once 'views/home/index.php';
    }
}
