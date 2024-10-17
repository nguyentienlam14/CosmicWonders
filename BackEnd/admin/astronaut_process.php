<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php

    include '../config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["form_action"])) {
            $form_action = $_POST["form_action"];

            if ($form_action == "insert") {
                if (isset($_POST["astronaut_title"]) && !empty($_POST["astronaut_title"])) {
                    $astronaut_title = $_POST['astronaut_title'];
                    $astronaut_image = null;

                    if (isset($_FILES['astronaut_img']) && $_FILES['astronaut_img']['error'] == 0) {
                        $target_dir = "../uploads/";
                        $astronaut_image = $target_dir . basename($_FILES["astronaut_img"]["name"]);

                        if (!move_uploaded_file($_FILES["astronaut_img"]["tmp_name"], $astronaut_image)) {
                            throw new Exception("Lỗi khi upload ảnh astronaut.");
                        }
                    }

                    $stmtAstronaut = $conn->prepare("INSERT INTO astronaut (Astronaut_title, Img_url) VALUES (:astronaut_title, :img_url)");
                    $stmtAstronaut->bindParam(':astronaut_title', $astronaut_title);
                    $stmtAstronaut->bindParam(':img_url', $astronaut_image);
                    $stmtAstronaut->execute();

                    $astronaut_id = $conn->lastInsertId();
                } else {
                    if (isset($_POST["astronaut_id"]) && !empty($_POST["astronaut_id"])) {
                        $astronaut_id = $_POST["astronaut_id"];
                    } else {
                        throw new Exception("Chưa chọn astronaut.");
                    }
                }

                if (isset($_POST["detail_title"]) && isset($_POST["detail_sub_text"])) {
                    $header = $_POST['detail_title'];
                    $sub_text = $_POST['detail_sub_text'];
                    $detail_image = null;

                    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
                        $target_dir = "uploads/";
                        $detail_image = $target_dir . basename($_FILES["img"]["name"]);

                        if (!move_uploaded_file($_FILES["img"]["tmp_name"], $detail_image)) {
                            throw new Exception("Lỗi khi upload file chi tiết astronaut.");
                        }
                    }

                    $stmtDetail = $conn->prepare("INSERT INTO astronaut_detail (Astronaut_detail_header_text, Astronaut_detail_sub_text, Astronaut_detail_img, Astronaut_ID) VALUES (:header, :sub_text, :image_path, :astronaut_id)");
                    $stmtDetail->bindParam(':header', $header);
                    $stmtDetail->bindParam(':sub_text', $sub_text);
                    $stmtDetail->bindParam(':image_path', $detail_image);
                    $stmtDetail->bindParam(':astronaut_id', $astronaut_id);

                    if ($stmtDetail->execute()) {
                        echo "<script>
                        Swal.fire({
                            title: 'Post thành công!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                localStorage.setItem('showAstronauts', true);
                                window.location.href = '../../Front-End/admin/admin.php';
                            }
                        });
                        </script>";
                    } else {
                        throw new Exception("Lỗi khi chèn vào bảng astronaut_detail.");
                    }
                } else {
                    throw new Exception("Chưa nhập đầy đủ tiêu đề và nội dung.");
                }
            }
        } else if (isset($_POST["deleteAstronaut"])) {
            $id = $_POST["deleteAstronaut"];

            $stmt = $conn->prepare("DELETE FROM astronaut_detail WHERE Astronaut_detail_ID = :del");
            $stmt->bindParam(':del', $id);
            if ($stmt->execute()) {
                echo "
                    <script>
                        Swal.fire({
                        title: 'Xóa thành công!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            localStorage.setItem('showAstronauts', true);
                            window.location.href = '../../Front-End/admin/admin.php';
                        }
                    });
                    </script>
                ";
            };
        } else if (isset($_POST["AstronautID"]) && !empty($_POST["AstronautID"])) {
            $editID = $_POST["AstronautID"];
            $editNewTitle = $_POST["editName"];
            $editSub = $_POST["editBio"];

            $stmt = $conn->prepare("UPDATE astronaut_detail SET Astronaut_detail_header_text = :newTitle, Astronaut_detail_sub_text = :sub WHERE Astronaut_detail_ID = :id");
            $stmt->bindParam(':newTitle', $editNewTitle);
            $stmt->bindParam(':sub', $editSub);
            $stmt->bindParam(':id', $editID);
            if ($stmt->execute()) {
                echo "
                    <script>
                        Swal.fire({
                            title: 'Sửa thành công!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                localStorage.setItem('showAstronauts', true);
                                window.location.href = '../../Front-End/admin/admin.php';
                            }
                        });
                    </script>
                ";
            };
        }
    }
    ?>
</body>

</html>