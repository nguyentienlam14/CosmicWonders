<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Cosmic Wonders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<?php
include 'C:/Xamp/htdocs/CosmicWonders/Back-end/db_Conection.php';

$db = new Database();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addAstronaut'])) {
        // Kiểm tra và xử lý hình ảnh phi hành gia
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $fileName = $_FILES['image']['name'];
            $targetDirectory = "C:/Xamp/htdocs/CosmicWonders/Front-end/assets/img/body/";
            $targetFile = $targetDirectory . basename($fileName);
            move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
            $imgUrl = "http://localhost:81/CosmicWonders/Front-end/assets/img/body/" . $fileName; 
        } else {
            echo '<script>alert("Error uploading main image.");</script>';
            exit();
        }

        // Chèn dữ liệu phi hành gia vào cơ sở dữ liệu
        $sql = "INSERT INTO Astronaut (Astronaut_title, Astronaut_subtitle, Img_url, Category_ID, isDelete) 
                VALUES (:title, :subtitle, :imgUrl, :categoryId, :isDelete)";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'title' => $_POST['title'],
            'subtitle' => $_POST['subtitle'],
            'imgUrl' => $imgUrl,
            'categoryId' => $_POST['categoryId'],
            'isDelete' => $_POST['isDelete']
        ]);
        
        $astronautId = $conn->lastInsertId();
        if (isset($_POST['detailHeaderText'])) {
            foreach ($_POST['detailHeaderText'] as $index => $headerText) {
                $detailImgUrl = null; 
                if (isset($_FILES['detailImg']) && isset($_FILES['detailImg'][$index]) && $_FILES['detailImg'][$index]['error'] == 0) {
                    $detailFileName = $_FILES['detailImg'][$index]['name'];
                    $detailTargetFile = $targetDirectory . basename($detailFileName);
                    move_uploaded_file($_FILES['detailImg'][$index]['tmp_name'], $detailTargetFile);
                    $detailImgUrl = "http://localhost:81/CosmicWonders/Front-end/assets/img/body/" . $detailFileName; 
                }
                $detailSql = "INSERT INTO Astronaut_detail (Astronaut_detail_header_text, Astronaut_detail_header_subtext, Astronaut_detail_sub_text, 
                              Astronaut_detail_img, Astronaut_detail_img_sub_text, Astronaut_ID, Astronaut_detail_type) 
                              VALUES (:header_text, :header_subtext, :sub_text, :img, :img_subtext, :astronaut_id, :detail_type)";

                $detailStmt = $conn->prepare($detailSql);
                $detailStmt->execute([
                    'header_text' => $headerText,
                    'header_subtext' => $_POST['detailHeaderSubtext'][$index] ?? null, 
                    'sub_text' => $_POST['detailSubText'][$index] ?? null, 
                    'img' => $detailImgUrl,
                    'img_subtext' => $_POST['detailImgSubText'][$index] ?? null,
                    'astronaut_id' => $astronautId,
                    'detail_type' => 1
                ]);
            }
        }
    }
}

$astronauts = $conn->query("SELECT * FROM Astronaut WHERE isDelete = 'N'")->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="mt-4">Astronaut Management</h1>

<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Astronaut Title:</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="subtitle" class="form-label">Subtitle:</label>
        <input type="text" class="form-control" id="subtitle" name="subtitle">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Choose Image:</label>
        <input type="file" id="image" name="image" class="form-control" required>       
    </div>
    <input type="hidden" name="categoryId" value="4">
    <input type="hidden" name="isDelete" value="N">

    <h3>Astronaut Details</h3>
    <div id="detailContainer">
        <div class="detail-group mb-3">
            <div class="mb-3">
                <label for="detailHeaderText" class="form-label">Detail Title:</label>
                <input type="text" class="form-control" name="detailHeaderText[]" required>
            </div>
            <div class="mb-3">
                <label for="detailHeaderSubtext" class="form-label">Detail Subtitle:</label>
                <input type="text" class="form-control" name="detailHeaderSubtext[]">
            </div>
            <div class="mb-3">
                <label for="detailSubText" class="form-label">Detail Content:</label>
                <textarea class="form-control" name="detailSubText[]" required></textarea>
            </div>
            <div class="mb-3">
                <label for="detailImg" class="form-label">Detail Image:</label>
                <input type="file" id="detailImg" name="detailImg[]" class="form-control" required>       
            </div>
            <div class="mb-3">
                <label for="detailImgSubText" class="form-label">Detail Image Caption:</label>
                <input type="text" class="form-control" name="detailImgSubText[]">
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-secondary" id="addDetail">Add Detail</button>
    <button type="submit" name="addAstronaut" class="btn btn-primary">Add Astronaut</button>
</form>



    <h2 class="mt-4">Astronaut List</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($astronauts as $astronaut): ?>
            <tr>
                <td><?php echo $astronaut['Astronaut_ID']; ?></td>
                <td><?php echo $astronaut['Astronaut_title']; ?></td>
                <td><img src="<?php echo $astronaut['Img_url']; ?>" alt="" width="100"></td>
                <td>
                    <a href="edit.php?id=<?php echo $astronaut['Astronaut_ID']; ?>" class="btn btn-warning">Edit</a>
                    <a href="delete.php?id=<?php echo $astronaut['Astronaut_ID']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table> 
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    if (localStorage.getItem('showAstronauts')) {
        showContent('astronaut_details'); 
        localStorage.removeItem('showAstronauts');
    }
});
    $(document).ready(function () {
        $('#addDetail').click(function () {
            var newDetailGroup = `
            <hr>
            <h3>Astronaut Details</h3>
                <div class="detail-group mb-3">
                    <div class="mb-3">
                        <label for="detailHeaderText" class="form-label">Detail Title:</label>
                        <input type="text" class="form-control" name="detailHeaderText[]" required>
                    </div>
                    <div class="mb-3">
                        <label for="detailHeaderSubtext" class="form-label">Detail Subtitle:</label>
                        <input type="text" class="form-control" name="detailHeaderSubtext[]">
                    </div>
                    <div class="mb-3">
                        <label for="detailSubText" class="form-label">Detail Content:</label>
                        <textarea class="form-control" name="detailSubText[]" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detailImg" class="form-label">Detail Image URL:</label>
                        <input type="text" class="form-control" name="detailImg[]">
                    </div>
                    <div class="mb-3">
                        <label for="detailImgSubText" class="form-label">Detail Image Caption:</label>
                        <input type="text" class="form-control" name="detailImgSubText[]">
                    </div>
                </div>`;
            $('#detailContainer').append(newDetailGroup);
        });
    });
</script>
</body>
</html>
