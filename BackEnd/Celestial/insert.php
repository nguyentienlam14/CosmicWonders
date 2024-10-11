<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Chi Tiết Thiên Văn</title>
</head>
<body>
    <h1>Thêm Chi Tiết Thiên Văn</h1>
    <form action="process_insert.php" method="POST" enctype="multipart/form-data">
        <label for="celestial_detail_title">Tiêu Đề Chi Tiết:</label><br>
        <input type="text" id="celestial_detail_title" name="celestial_detail_title" required><br><br>

        <label for="celestial_detail_sub">Mô Tả Ngắn:</label><br>
        <textarea id="celestial_detail_sub" name="celestial_detail_sub" required></textarea><br><br>

        <label for="other_details">Chi Tiết Khác:</label><br>
        <textarea id="other_details" name="other_details"></textarea><br><br>

        <label for="celestial_discovery_date">Ngày Khám Phá:</label><br>
        <input type="text" id="celestial_discovery_date" name="celestial_discovery_date"><br><br>

        <label for="celestial_size">Kích Thước:</label><br>
        <input type="text" id="celestial_size" name="celestial_size"><br><br>

        <label for="celestial_ozone">Ozone:</label><br>
        <input type="text" id="celestial_ozone" name="celestial_ozone"><br><br>

        <label for="celestial_distance_s_e">Khoảng Cách từ Trái Đất:</label><br>
        <input type="text" id="celestial_distance_s_e" name="celestial_distance_s_e"><br><br>

        <label for="celestial_id">Chọn Thiên Thể:</label><br>
        <select id="celestial_id" name="celestial_id" required>
            
        <?php
            include '../BackEnd/config.php'; // Kết nối đến cơ sở dữ liệu

            // Lấy dữ liệu celestial
            $sql = "SELECT Celestial_ID, Celestial_type FROM Celestial WHERE isDelete = 'N'";
            $result = $conn->query($sql);

            // Xuất các tùy chọn
            if ($result->rowCount() > 0) {  // Sử dụng rowCount() với PDO
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row['Celestial_ID'] . "'>" . $row['Celestial_type'] . "</option>";
                }
            } else {
                echo "<option value=''>Không có dữ liệu</option>";
            }
            ?>
        </select><br><br>

        <label for="celestial_detail_img">Hình Ảnh Chi Tiết:</label><br>
        <input type="file" id="celestial_detail_img" name="celestial_detail_img"><br><br>

        <button type="submit">Thêm Chi Tiết</button>
    </form>
</body>
</html>
