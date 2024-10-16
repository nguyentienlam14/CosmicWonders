<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM celestial_detail WHERE Celestial_detail_ID = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location:../../FrontEnd/admin/admin.php");
        exit();
    } else {
        echo "Lỗi: Không thể xóa dữ liệu.";
    }

    $conn = null;
} else {
    echo "Không tìm thấy ID.";
}
?>

