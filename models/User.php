<?php
require_once "config/Database.php"; // Bao gồm file cấu hình kết nối DB

class User {
    // Đăng nhập người dùng
    public static function login($username, $password) {
        // Kết nối cơ sở dữ liệu
        $db = Database::getConnection();
        
        // Truy vấn tìm người dùng theo tên đăng nhập
        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        // Kiểm tra nếu người dùng tồn tại và mật khẩu khớp
        if ($user && $password === $user['password']) {
            return $user; // Mật khẩu chưa mã hóa, so sánh trực tiếp
        }
        
        return null; // Trả về null nếu không đăng nhập thành công
    }

    // Đăng ký người dùng mới
    public static function register($username, $password, $role = 0) {
        // Kết nối cơ sở dữ liệu
        $db = Database::getConnection();
        
        // Mã hóa mật khẩu trước khi lưu
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Truy vấn chèn người dùng vào cơ sở dữ liệu
        $stmt = $db->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, :role)");
        $stmt->execute([
            'username' => $username,
            'password' => $hashedPassword,
            'role' => $role
        ]);

        // Trả về ID của người dùng vừa đăng ký
        return $db->lastInsertId();
    }

    // Kiểm tra quyền của người dùng (nếu là quản trị viên)
    public static function isAdmin($user) {
        return $user['role'] == 1; // Nếu role = 1 là quản trị viên
    }

}
?>
