<?php

require_once 'models/User.php'; // Bao gồm file User.php

class AdminController {

    // Hàm xử lý đăng nhập
    public function login() {
        // Nếu là yêu cầu POST từ form đăng nhập
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form đăng nhập
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Gọi phương thức login từ User model
            $user = User::login($username, $password);

            // Kiểm tra nếu đăng nhập thành công
            if ($user) {
                // Nếu là quản trị viên, lưu thông tin vào session và chuyển hướng
                if (User::isAdmin($user)) {
                    $_SESSION['user'] = $user; // Lưu thông tin người dùng vào session
                    include "views/admin/dasboard.php"; // Chuyển hướng tới dashboard
                    exit;
                } else {
                    // Nếu không phải là quản trị viên
                    $_SESSION['error'] = "Bạn không phải là quản trị viên!";
                    header("Location: login.php"); // Quay lại trang login
                    exit;
                }
            } else {
                // Nếu thông tin đăng nhập không hợp lệ
                $_SESSION['error'] = "Sai tên đăng nhập hoặc mật khẩu!";
                include "views/admin/login.php";// Quay lại trang login
                exit;
            }
        }
        
        // Nếu là GET request, hiển thị form đăng nhập
        include "views/admin/login.php";
    }

    // Hàm xử lý đăng xuất
    public function logout() {
        session_start(); // Khởi tạo session để sử dụng $_SESSION
        session_unset(); // Xóa toàn bộ dữ liệu trong session
        session_destroy(); // Hủy session
        header("Location: login.php"); // Chuyển hướng về trang login
        exit;
    }
}
?>
