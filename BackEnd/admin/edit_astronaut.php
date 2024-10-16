<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Astronaut</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Để thông báo -->
</head>
<body>
<?php
include 'C:/xampp/htdocs/CosmicWonders/BackEnd/config.php'; // Đảm bảo đường dẫn chính xác

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT a.Astronaut_ID, a.Astronaut_title, a.Astronaut_subtitle, a.Img_url, 
                   ad.Astronaut_detail_ID, ad.Astronaut_detail_header_text, 
                   ad.Astronaut_detail_header_subtext, ad.Astronaut_detail_sub_text, 
                   ad.Astronaut_detail_img, ad.Astronaut_detail_img_sub_text
            FROM Astronaut a
            JOIN Astronaut_detail ad ON a.Astronaut_ID = ad.Astronaut_ID
            WHERE a.Astronaut_ID = :id AND a.isDelete = 'N' AND ad.isDelete = 'N'";

    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]); 
    $astronaut = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($astronaut)) {
        echo '<script>Swal.fire("Error!", "Astronaut not found.", "error");</script>';
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'] ?? '';
        $subtitle = $_POST['subtitle'] ?? '';

        // Cập nhật thông tin phi hành gia
        $updateSql = "UPDATE Astronaut SET Astronaut_title = :title, Astronaut_subtitle = :subtitle WHERE Astronaut_ID = :id";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->execute(['title' => $title, 'subtitle' => $subtitle, 'id' => $id]);

        $detailHeaderText = $_POST['detailHeaderText'] ?? [];
        $detailHeaderSubtext = $_POST['detailHeaderSubtext'] ?? [];
        $detailSubText = $_POST['detailSubText'] ?? [];
        $detailImgSubText = $_POST['detailImgSubText'] ?? [];
        $detailIds = $_POST['detailId'] ?? [];

        foreach ($detailHeaderText as $index => $headerText) {
            $detailImgUrl = ""; 
            if (isset($_FILES['detailImage']['name'][$index]) && $_FILES['detailImage']['error'][$index] == 0) {
                $detailFileName = $_FILES['detailImage']['name'][$index];
                $detailTargetDirectory = "C:/xampp/htdocs/CosmicWonders/Front-end/assets/img/body/";
                $detailTargetFile = $detailTargetDirectory . basename($detailFileName);

                if (!is_dir($detailTargetDirectory) || !is_writable($detailTargetDirectory)) {
                    echo '<script>Swal.fire("Error!", "Directory for detail images does not exist or is not writable.", "error");</script>';
                    exit();
                }

                if (move_uploaded_file($_FILES['detailImage']['tmp_name'][$index], $detailTargetFile)) {
                    $detailImgUrl = "http:/localhost/CosmicWonders/FrontEnd/assets/img/body/" . $detailFileName;
                } else {
                    echo '<script>Swal.fire("Error!", "Failed to upload detail image.", "error");</script>';
                }
            }

            $updateSql = "UPDATE Astronaut_detail SET 
                Astronaut_detail_header_text = :headerText, 
                Astronaut_detail_header_subtext = :headerSubtext,
                Astronaut_detail_sub_text = :subText,
                Astronaut_detail_img_sub_text = :imgSubText,
                Astronaut_detail_img = :detailImgUrl 
                WHERE Astronaut_detail_ID = :detailId";

            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->execute([
                'headerText' => $headerText,
                'headerSubtext' => $detailHeaderSubtext[$index] ?? '',
                'subText' => $detailSubText[$index] ?? '',
                'imgSubText' => $detailImgSubText[$index] ?? '',
                'detailImgUrl' => $detailImgUrl,
                'detailId' => $detailIds[$index]
            ]);
        }

        echo '<script>Swal.fire("Success!", "Changes have been saved.", "success").then(() => { window.location.href = "http:/CosmicWonders/FrontEnd/admin/admin.php"; });</script>';
        exit();
    }
} else {
    echo '<script>Swal.fire("Error!", "Invalid Astronaut ID!", "error");</script>';
}
?>

<div class="container">
    <h1>Edit Astronaut</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" id="title" name="title" class="form-control" value="<?php echo htmlspecialchars($astronaut[0]['Astronaut_title']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="subtitle" class="form-label">Subtitle:</label>
            <input type="text" id="subtitle" name="subtitle" class="form-control" value="<?php echo htmlspecialchars($astronaut[0]['Astronaut_subtitle']); ?>">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Choose Image:</label>
            <input type="file" id="image" name="image" class="form-control"> <!-- Không yêu cầu tải lên ảnh -->
        </div>
        <h3>Astronaut Detail</h3>
        <div id="detailContainer">
            <?php foreach ($astronaut as $details) : ?>
                <div class="detail-group mb-3">
                    <input type="hidden" name="detailId[]" value="<?php echo htmlspecialchars($details['Astronaut_detail_ID']); ?>">
                    <label for="detailHeaderText" class="form-label">Detail Title:</label>
                    <input type="text" class="form-control" name="detailHeaderText[]" value="<?php echo htmlspecialchars($details['Astronaut_detail_header_text']); ?>" required>
                    
                    <label for="detailHeaderSubtext" class="form-label">Detail Subtitle:</label>
                    <input type="text" class="form-control" name="detailHeaderSubtext[]" value="<?php echo htmlspecialchars($details['Astronaut_detail_header_subtext']); ?>">
                    
                    <label for="detailSubText" class="form-label">Detail Content:</label>
                    <textarea class="form-control" name="detailSubText[]" required><?php echo htmlspecialchars($details['Astronaut_detail_sub_text']); ?></textarea>
                    
                    <label for="detailImage" class="form-label">Choose Image:</label>
                    <input type="file" id="detailImage" name="detailImage[]" class="form-control">
                    
                    <label for="detailImgSubText" class="form-label">Detail Image Caption:</label>
                    <input type="text" class="form-control" name="detailImgSubText[]" value="<?php echo htmlspecialchars($details['Astronaut_detail_img_sub_text']); ?>">
                </div>
            <?php endforeach; ?>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
</body>
</html>
