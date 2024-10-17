<?php
include 'C:\xampp\htdocs\CosmicWonders\BackEnd\config.php';

try {
    // Tạo bảng users nếu chưa tồn tại
    $sql = "CREATE TABLE IF NOT EXISTS users (
        user_id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL,
        password VARCHAR(255) NOT NULL,
        role INT DEFAULT 1,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );";

    $conn->exec($sql);
    echo "Table 'users' created successfully or already exists.<br>";

    // Mã hóa mật khẩu
    $hashed_password = password_hash('123456', PASSWORD_DEFAULT);

    // Câu lệnh SQL chèn dữ liệu admin
    $sql = "INSERT INTO users (username, password, role) VALUES ('admin', '$hashed_password', 1);";
    
    // Thực thi câu lệnh SQL
    $conn->exec($sql);
    echo "Admin user inserted successfully.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Đóng kết nối
$conn = null;
?>