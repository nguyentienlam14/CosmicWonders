<?php
// Kết nối cơ sở dữ liệu
include '../../BackEnd/config.php'; 

// Kiểm tra xem ID có được truyền qua URL không
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Lấy giá trị ID từ URL

    // Truy vấn dữ liệu chi tiết từ cơ sở dữ liệu
    $sql = "SELECT * FROM Celestial_detail WHERE Celestial_detail_ID = :id AND isDelete = 'N'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Kiểm tra xem có mục dữ liệu với ID đã cho hay không
    if ($stmt->rowCount() > 0) {
        $celestial_detail = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Không tìm thấy chi tiết thiên thể với ID này.";
        exit;
    }
} else {
    echo "ID không được truyền qua URL.";
    exit;
}

// Biến để theo dõi thông báo
$message = '';

// Xử lý khi người dùng gửi form cập nhật
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $celestial_detail_title = $_POST['celestial_detail_title'];
    $celestial_detail_sub = $_POST['celestial_detail_sub'];
    $other_details = $_POST['other_details'];
    $celestial_discovery_date = $_POST['celestial_discovery_date'];
    $celestial_size = $_POST['celestial_size'];
    $celestial_ozone = $_POST['celestial_ozone'];
    $celestial_distance_s_e = $_POST['celestial_distance_s_e'];
    $celestial_id = $_POST['celestial_id'];

    // Kiểm tra xem có file ảnh mới không
    if (!empty($_FILES['celestial_detail_img']['name'])) {
        $celestial_detail_img = $_FILES['celestial_detail_img']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($celestial_detail_img);
        move_uploaded_file($_FILES["celestial_detail_img"]["tmp_name"], $target_file);
    } else {
        // Nếu không có file mới, giữ nguyên ảnh cũ
        $celestial_detail_img = $celestial_detail['Celestial_detail_img'];
    }

    // Cập nhật dữ liệu trong cơ sở dữ liệu
    $sql_update = "UPDATE Celestial_detail SET 
                    Celestial_detail_title = :celestial_detail_title, 
                    Celestial_detail_sub = :celestial_detail_sub, 
                    Other_details = :other_details, 
                    Celestial_discovery_date = :celestial_discovery_date, 
                    Celestial_size = :celestial_size, 
                    Celestial_ozone = :celestial_ozone, 
                    Celestial_distance_s_e = :celestial_distance_s_e, 
                    Celestial_ID = :celestial_id, 
                    Celestial_detail_img = :celestial_detail_img 
                   WHERE Celestial_detail_ID = :id";
    
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bindParam(':celestial_detail_title', $celestial_detail_title);
    $stmt_update->bindParam(':celestial_detail_sub', $celestial_detail_sub);
    $stmt_update->bindParam(':other_details', $other_details);
    $stmt_update->bindParam(':celestial_discovery_date', $celestial_discovery_date);
    $stmt_update->bindParam(':celestial_size', $celestial_size);
    $stmt_update->bindParam(':celestial_ozone', $celestial_ozone);
    $stmt_update->bindParam(':celestial_distance_s_e', $celestial_distance_s_e);
    $stmt_update->bindParam(':celestial_id', $celestial_id);
    $stmt_update->bindParam(':celestial_detail_img', $celestial_detail_img);
    $stmt_update->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt_update->execute()) {
        $message = "Cập nhật thành công!"; // Thiết lập thông báo thành công
    } else {
        $message = "Có lỗi xảy ra trong quá trình cập nhật.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <style>
        body {
            background-color: #6c757d;
        }
        .container {
            margin: auto;
            background-color: white;
            padding: 5px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container ">
        <h2>Update Celestial Body Details</h2>

        <!-- Hiển thị thông báo nếu có -->
        <?php if ($message): ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($message); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                // Chuyển hướng về trang admin sau 1 giây
                setTimeout(function() {
                    window.location.href = 'admin.php'; // Thay đổi đường dẫn nếu cần
                }, 1000);
            </script>
        <?php endif; ?>

        <form action="update.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="celestial_detail_title" class="form-label">Detail Title: </label>
                <input type="text" class="form-control" id="celestial_detail_title" name="celestial_detail_title" value="<?php echo htmlspecialchars($celestial_detail['Celestial_detail_title']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="celestial_detail_sub" class="form-label">Short Description: </label>
                <input type="text" class="form-control" id="celestial_detail_sub" name="celestial_detail_sub" value="<?php echo htmlspecialchars($celestial_detail['Celestial_detail_sub']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="other_details" class="form-label">Other Details: </label>
                <textarea class="form-control" id="other_details" name="other_details"><?php echo htmlspecialchars($celestial_detail['Other_details']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="celestial_discovery_date" class="form-label">Discovery Date: </label>
                <input type="text" class="form-control" id="celestial_discovery_date" name="celestial_discovery_date" value="<?php echo htmlspecialchars($celestial_detail['Celestial_discovery_date']); ?>">
            </div>
            <div class="mb-3">
                <label for="celestial_size" class="form-label">Size: </label>
                <input type="text" class="form-control" id="celestial_size" name="celestial_size" value="<?php echo htmlspecialchars($celestial_detail['Celestial_size']); ?>">
            </div>
            <div class="mb-3">
                <label for="celestial_ozone" class="form-label">Ozone: </label>
                <input type="text" class="form-control" id="celestial_ozone" name="celestial_ozone" value="<?php echo htmlspecialchars($celestial_detail['Celestial_ozone']); ?>">
            </div>
            <div class="mb-3">
                <label for="celestial_distance_s_e" class="form-label">Distance from Earth: </label>
                <input type="text" class="form-control" id="celestial_distance_s_e" name="celestial_distance_s_e" value="<?php echo htmlspecialchars($celestial_detail['Celestial_distance_s_e']); ?>">
            </div>
            <div class="mb-3">
                <label for="celestial_id" class="form-label">Celestial Body ID:</label>
                <select id="celestial_id" name="celestial_id" class="form-select" required>
                    <?php
                    // Truy vấn để lấy danh sách các thiên thể
                    $sql_celestial = "SELECT Celestial_ID, Celestial_type FROM Celestial WHERE isDelete = 'N'";
                    $stmt_celestial = $conn->prepare($sql_celestial);
                    $stmt_celestial->execute();

                    while ($row_celestial = $stmt_celestial->fetch(PDO::FETCH_ASSOC)) {
                        $selected = ($row_celestial['Celestial_ID'] == $celestial_detail['Celestial_ID']) ? 'selected' : '';
                        echo "<option value='" . $row_celestial['Celestial_ID'] . "' $selected>" . $row_celestial['Celestial_type'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="celestial_detail_img" class="form-label">Image: </label>
                <input type="file" class="form-control" id="celestial_detail_img" name="celestial_detail_img">
                <div class="mt-2">
                    <img src="../../BackEnd/uploads/ echo htmlspecialchars($celestial_detail['Celestial_detail_img']); ?>" alt="Hình Ảnh">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>