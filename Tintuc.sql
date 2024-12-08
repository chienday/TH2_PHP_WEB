-- tao bang
-- Tạo bảng users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role INT NOT NULL DEFAULT 0 -- 0: người dùng, 1: quản trị viên
);

-- Tạo bảng categories
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Tạo bảng news
CREATE TABLE news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    category_id INT NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id)
); 

insert into users (id, username, password, role) values (1, 'chiendaynha123', 'chienday22', '1');
insert into users (id, username, password, role) values (2, 'chienuser', 'chien11', '0');
INSERT INTO categories (id, name) 
VALUES (1, 'Mới nhất');
INSERT INTO categories (id, name) 
VALUES (2, 'Hôm qua');
INSERT INTO categories (id, name) 
VALUES (3, 'Hôm kia');

INSERT INTO news (id, title, content, image, created_at, category_id) 
VALUES (1, 'Tin tức phòng học', 'Nội dung bài viết 1', 'image1.jpg', NOW(), 1);

INSERT INTO news (id, title, content, image, created_at, category_id) 
VALUES (2, 'Tin tức thể thao', 'Nội dung bài viết 2', 'image2.jpg', NOW(), 2);

INSERT INTO news (id, title, content, image, created_at, category_id) 
VALUES (3, 'Tin tức sinh viên', 'Nội dung bài viết 3', 'image3.jpg', NOW(), 3);

INSERT INTO news (id, title, content, image, created_at, category_id) 
VALUES (4, 'Tin tức nhà nước', 'Nội dung bài viết 4', 'image4.jpg', NOW(), 1);

INSERT INTO news (id, title, content, image, created_at, category_id) 
VALUES (5, 'Tin tức giao thông', 'Nội dung bài viết 5', 'image5.jpg', NOW(), 2);

INSERT INTO news (id, title, content, image, created_at, category_id) 
VALUES (6, 'Tin tức bảo hiểm y tế', 'Nội dung bài viết 6', 'image6.jpg', NOW(), 3);

INSERT INTO news (id, title, content, image, created_at, category_id) 
VALUES (7, 'Tin tức đảng công sản', 'Nội dung bài viết 7', 'image7.jpg', NOW(), 1);

INSERT INTO news (id, title, content, image, created_at, category_id) 
VALUES (8, 'Tin tức tuyển sinh', 'Nội dung bài viết 8', 'image8.jpg', NOW(), 2);

INSERT INTO news (id, title, content, image, created_at, category_id) 
VALUES (9, 'Tin tức khen thưởng', 'Nội dung bài viết 9', 'image9.jpg', NOW(), 3);

INSERT INTO news (id, title, content, image, created_at, category_id) 
VALUES (10, 'Tin tức báo mới', 'Nội dung bài viết 10', 'image10.jpg', NOW(), 1);


