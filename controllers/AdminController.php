<?php

require_once 'models/User.php'; 
require_once "models/News.php";
require_once "models/Category.php";



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

    // Hàm xử lý đăng ký
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Kiểm tra mật khẩu khớp
            if ($password !== $confirm_password) {
                $_SESSION['register_error'] = 'Mật khẩu không khớp!';
                header('Location: index.php?controller=admin&action=register');
                exit;
            }

            // Gọi model User để kiểm tra và lưu thông tin
            $user = User::register($username, $password);

            // Kiểm tra kết quả đăng ký
            if ($user) {
                $_SESSION['register_success'] = 'Đăng ký thành công! Hãy đăng nhập.';
                header('Location: index.php?controller=admin&action=login');
                exit;
            } else {
                $_SESSION['register_error'] = 'Tài khoản đã tồn tại!';
                header('Location: index.php?controller=admin&action=register');
                exit;
            }
        }
        
        // Nếu là GET request, hiển thị form đăng ký
        require "views/admin/register.php";
    }
     // Hàm quản lý tin tức
    public function manageNews() {
        $newsModel = new News();
        $newsList= $newsModel->getAllNews();
        include "views/admin/news/index.php";
    }
     // Quay lại trang dasboard
    public function dashboard() {
     
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?controller=admin&action=login");
            exit();
        }

      
        include "views/admin/dasboard.php";
    }
    // Quản lí danh mục
    public function manageCategories() {
        $newsModel = new Category();
        $newsList= $newsModel->getAllNews();
        include "views/admin/news/danhmuc.php";
    }
    // Hàm xử lý đăng xuất
    public function logout() {
        session_unset(); // Xóa toàn bộ dữ liệu trong session
        session_destroy(); // Hủy session
        header("Location: index.php"); // Chuyển hướng về trang login
        exit;
    }

    
}
?>
