<?php
require_once "models/News.php";

class NewsController {
    public function index() {
        $news = News::getAll();
        include "views/home/index.php";
    }

    public function detail($id) {
        $news = News::getById($id);
        include "views/news/detail.php";
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'];
            $category_id = $_POST['category_id'];

            $success = News::add($title, $content, $image, $category_id);

            if ($success) {
                header("Location: index.php?controller=news&action=index");
            } else {
                echo "Thêm tin tức thất bại.";
            }
        } else {
            include "views/admin/news/add.php";
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'];
            $category_id = $_POST['category_id'];

            $success = News::update($id, $title, $content, $image, $category_id);

            if ($success) {
                header("Location: index.php?controller=news&action=index");
            } else {
                echo "Cập nhật tin tức thất bại.";
            }
        } else {
            $news = News::getById($id);
            include "views/admin/news/edit.php";
        }
    }

    public function delete($id) {
        $success = News::delete($id);

        if ($success) {
            header("Location: index.php?controller=news&action=index");
        } else {
            echo "Xóa tin tức thất bại.";
        }
    }
}
