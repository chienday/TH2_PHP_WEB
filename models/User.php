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
        $db = Database::connect();
        
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

    // Lấy thông tin người dùng theo ID
    public static function getById($id) {
        // Kết nối cơ sở dữ liệu
        $db = Database::connect();
        
        // Truy vấn lấy thông tin người dùng theo ID
        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Kiểm tra quyền của người dùng (nếu là quản trị viên)
    public static function isAdmin($user) {
        return $user['role'] == 1; // Nếu role = 1 là quản trị viên
    }

    // Cập nhật thông tin người dùng
    public static function update($id, $username, $password = null) {
        // Kết nối cơ sở dữ liệu
        $db = Database::connect();
        
        if ($password) {
            // Mã hóa mật khẩu mới nếu có
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            // Truy vấn cập nhật thông tin người dùng (bao gồm mật khẩu)
            $stmt = $db->prepare("UPDATE users SET username = :username, password = :password WHERE id = :id");
            $stmt->execute(['username' => $username, 'password' => $hashedPassword, 'id' => $id]);
        } else {
            // Truy vấn cập nhật chỉ tên đăng nhập nếu không có thay đổi mật khẩu
            $stmt = $db->prepare("UPDATE users SET username = :username WHERE id = :id");
            $stmt->execute(['username' => $username, 'id' => $id]);
        }
    }

    // Xóa người dùng
    public static function delete($id) {
        // Kết nối cơ sở dữ liệu
        $db = Database::connect();
        
        // Truy vấn xóa người dùng theo ID
        $stmt = $db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>
