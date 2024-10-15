<?php
include '../config.php'; // Kết nối đến cơ sở dữ liệu

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}



// Nhận dữ liệu từ form
$celestial_detail_title = $_POST['celestial_detail_title'];
$celestial_detail_sub = $_POST['celestial_detail_sub'];
$other_details = $_POST['other_details'];
$celestial_discovery_date = $_POST['celestial_discovery_date'];
$celestial_size = $_POST['celestial_size'];
$celestial_ozone = $_POST['celestial_ozone'];
$celestial_distance_s_e = $_POST['celestial_distance_s_e'];
$celestial_id = $_POST['celestial_id'];
$celestial_detail_img = $_FILES['celestial_detail_img']['name'];

// Upload ảnh nếu có
$upload_dir = '';

if ($_FILES['celestial_detail_img']['error'] == UPLOAD_ERR_OK) {
    if (move_uploaded_file($_FILES['celestial_detail_img']['tmp_name'], $upload_dir . $celestial_detail_img)) {
        echo "Tệp đã được tải lên thành công.<br>";
    } else {
        echo "Lỗi: Không thể di chuyển tệp đã tải lên.<br>";
    }
}

// Chèn dữ liệu vào bảng
$sql = "INSERT INTO Celestial_detail (Celestial_detail_title, Celestial_detail_sub, Other_details, Celestial_discovery_date, Celestial_size, Celestial_ozone, Celestial_distance_s_e, Celestial_ID, Celestial_detail_img) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// Sử dụng bindValue() với PDO
$stmt->bindValue(1, $celestial_detail_title);
$stmt->bindValue(2, $celestial_detail_sub);
$stmt->bindValue(3, $other_details);
$stmt->bindValue(4, $celestial_discovery_date);
$stmt->bindValue(5, $celestial_size);
$stmt->bindValue(6, $celestial_ozone);
$stmt->bindValue(7, $celestial_distance_s_e);
$stmt->bindValue(8, $celestial_id);
$stmt->bindValue(9, $celestial_detail_img);

if ($stmt->execute()) {
    echo "<script>alert('Thêm mới thành công!');</script>";
} else {
    echo "<script>alert('Lỗi: " . $stmt->errorInfo()[2] . "');</script>";
}


// Đóng kết nối
$conn = null; // Đặt biến $conn thành null
?>