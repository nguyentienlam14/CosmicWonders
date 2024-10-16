

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Astronaut</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

</head>
<body>
<?php
include 'C:/Xamp/htdocs/CosmicWonders/Back-end/db_Conection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT a.Astronaut_ID,
    a.Astronaut_title, 
    a.Astronaut_subtitle, 
    a.Img_url, 
    ad.Astronaut_detail_ID,
    ad.Astronaut_detail_header_text,
    ad.Astronaut_detail_header_subtext,
    ad.Astronaut_detail_sub_text,
    ad.Astronaut_detail_img,
    ad.Astronaut_detail_img_sub_text,
    ad.Astronaut_detail_type
    FROM Astronaut a
    JOIN Astronaut_detail ad ON a.Astronaut_ID = ad.Astronaut_ID
    WHERE a.Astronaut_ID = :id AND a.isDelete = 'N' AND ad.isDelete = 'N'";

    $stmt = $db->getConnection()->prepare($sql);
    $stmt->execute(['id' => $id]); 
    $astronaut = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$astronaut) {
        echo "Astronaut with ID: " . htmlspecialchars($id) . " not found.";
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $subtitle = isset($_POST['subtitle']) ? $_POST['subtitle'] : '';
        $updateSql = "UPDATE Astronaut SET Astronaut_title = :title, Astronaut_subtitle = :subtitle WHERE Astronaut_ID = :id";
        $updateStmt = $db->getConnection()->prepare($updateSql);
        $updateStmt->execute(['title' => $title, 'subtitle' => $subtitle, 'id' => $id]);
        
        $detailHeaderText = isset($_POST['detailHeaderText']) ? $_POST['detailHeaderText'] : [];
        $detailHeaderSubtext = isset($_POST['detailHeaderSubtext']) ? $_POST['detailHeaderSubtext'] : [];
        $detailSubText = isset($_POST['detailSubText']) ? $_POST['detailSubText'] : [];
        $detailImgSubText = isset($_POST['detailImgSubText']) ? $_POST['detailImgSubText'] : [];
        
        foreach ($detailHeaderText as $index => $headerText) {
            $updateSql = "UPDATE Astronaut_detail SET 
                Astronaut_detail_header_text = :headerText, 
                Astronaut_detail_header_subtext = :headerSubtext,
                Astronaut_detail_sub_text = :subText,
                Astronaut_detail_img_sub_text = :imgSubText 
                WHERE Astronaut_detail_ID = :detailId";

            $updateStmt = $db->getConnection()->prepare($updateSql);
            $updateStmt->execute([
                'headerText' => $headerText,
                'headerSubtext' => isset($detailHeaderSubtext[$index]) ? $detailHeaderSubtext[$index] : '',
                'subText' => isset($detailSubText[$index]) ? $detailSubText[$index] : '',
                'imgSubText' => isset($detailImgSubText[$index]) ? $detailImgSubText[$index] : '',
                'detailId' => $astronaut['Astronaut_detail_ID']
            ]);
        }
        
        if ($updateStmt->rowCount() > 0) {
            echo '<script>
                    swal("Success!", "Data has been successfully updated!", "success");
                  </script>';
        }
        
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $fileName = $_FILES['image']['name'];
            $targetDirectory = "C:/Xamp/htdocs/CosmicWonders/Front-end/assets/img/body/"; 
            $targetFile = $targetDirectory . basename($fileName);
            
            if (!is_dir($targetDirectory) || !is_writable($targetDirectory)) {
                echo '
                <script> 
                    swal("Oops", "Directory does not exist or is not writable.", "error")
                </script>';
                exit();
            }
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $imgUrl = "http://localhost:81/CosmicWonders/Front-end/assets/img/body/" . $fileName; 
                $updateSql = "UPDATE Astronaut SET Img_url = :imgUrl WHERE Astronaut_ID = :id";
                $updateStmt = $db->getConnection()->prepare($updateSql);
                $updateStmt->execute(['imgUrl' => $imgUrl, 'id' => $id]);
                echo '<script>
                        swal("Success", "Image has been successfully uploaded: ' . htmlspecialchars($fileName) . '", "success");
                      </script>';
            } else {
                echo '<script> 
                    swal("Oops", "Something went wrong!", "error")
                </script>';
            }
        } else {
            $error_code = $_FILES['image']['error'] ?? 'No information available';
            echo '<script>
                    swal("Oops", "No image uploaded or an error occurred. Error code: ' . $error_code . '", "error");
                </script>';
        }

        header("Location: admin.php");
        exit();
    }
} else {
    echo '<script> 
            swal("Oops", "Invalid Astronaut ID!", "error")
        </script>';
}
?>
    <div class="container">
        <h1>Edit Astronaut Title</h1>
        <form method="post" enctype="multipart/form-data"> 
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" id="title" name="title" class="form-control" value="<?php echo htmlspecialchars($astronaut['Astronaut_title']); ?>" required>            
            </div>
            <div class="mb-3">
                <label for="subtitle" class="form-label">Subtitle:</label>
                <input type="text" id="subtitle" name="subtitle" class="form-control" value="<?php echo htmlspecialchars($astronaut['Astronaut_subtitle']); ?>">       
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Choose Image:</label>
                <input type="file" id="image" name="image" class="form-control" required>       
            </div>
            <input type="hidden" name="astronautId" value="<?php echo htmlspecialchars($astronaut['Astronaut_ID']); ?>">       
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <h1>Edit Astronaut Detail</h1>
        <form method="POST">
            <h3>Astronaut Detail</h3>
            <div id="detailContainer">
                <div class="detail-group">
                    <div class="mb-3">
                        <label for="detailHeaderText" class="form-label">Detail Title:</label>
                        <input type="text" class="form-control" name="detailHeaderText[]" value="<?php echo htmlspecialchars($astronaut['Astronaut_detail_header_text']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="detailHeaderSubtext" class="form-label">Detail Subtitle:</label>
                        <input type="text" class="form-control" name="detailHeaderSubtext[]" value="<?php echo htmlspecialchars($astronaut['Astronaut_detail_header_subtext']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="detailSubText" class="form-label">Detail Content:</label>
                        <textarea class="form-control" name="detailSubText[]" required><?php echo htmlspecialchars($astronaut['Astronaut_detail_sub_text']); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailImgSubText" class="form-label">Detail Image Caption:</label>
                        <input type="text" class="form-control" name="detailImgSubText[]" value="<?php echo htmlspecialchars($astronaut['Astronaut_detail_img_sub_text']); ?>">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
