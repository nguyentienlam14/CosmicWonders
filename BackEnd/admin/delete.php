<?php
include '../config.php'; // Kết nối đến cơ sở dữ liệu

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa mục dựa trên ID
    $sql = "DELETE FROM celestial_detail WHERE Celestial_detail_ID = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Chuyển hướng về trang chính sau khi xóa
        header("Location:../../FrontEnd/admin/admin.php");
        exit(); // Dừng thực thi tiếp tục sau khi chuyển hướng
    } else {
        echo "Lỗi: Không thể xóa dữ liệu.";
    }

    // Đóng kết nối
    $conn = null;
} else {
    echo "Không tìm thấy ID.";
}
?>

