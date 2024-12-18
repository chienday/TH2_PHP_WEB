<?php
require_once "config/Database.php";

class News {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAllNews() {
        $stmt = $this->db->prepare("SELECT * FROM news");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
// Thêm
    public static function add($title, $content, $image, $category_id) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO news (title, content, image, category_id, created_at) VALUES (?, ?, ?, ?, NOW())");
        return $stmt->execute([$title, $content, $image, $category_id]);
    }
// Sửa
    public static function update($id, $title, $content, $image, $category_id) {
        $db = Database::connect();
        $stmt = $db->prepare("UPDATE news SET title = ?, content = ?, image = ?, category_id = ? WHERE id = ?");
        return $stmt->execute([$title, $content, $image, $category_id, $id]);
    }
// Xóa
    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM news WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
// Tìm kiếm
public static function search($keyword) {
    $db = Database::getConnection();

    $stmt = $db->prepare("SELECT * FROM news WHERE title LIKE ? OR content LIKE ?");
    $stmt->execute(['%' . $keyword . '%', '%' . $keyword . '%']);
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
