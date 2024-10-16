<?php
include '../config.php'; // Kết nối đến cơ sở dữ liệu

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['celestial_detail_ID'];
    $title = $_POST['celestial_detail_title'];
    $sub = $_POST['celestial_detail_sub'];
    // Lấy các giá trị khác từ form nếu cần

    // Cập nhật dữ liệu
    $sql = "UPDATE Celestial_detail SET celestial_detail_title = :title, celestial_detail_sub = :sub WHERE Celestial_detail_ID = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':sub', $sub);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Chuyển hướng về trang chính sau khi cập nhật
        header("Location: admin.php");
    } else {
        echo "Lỗi: Không thể cập nhật dữ liệu.";
    }

    // Đóng kết nối
    $conn = null;
}
?>
