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

    include 'C:\xampp\htdocs\CosmicWonders\BackEnd\config.php';


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["form_action"])) {
            $form_action = $_POST["form_action"];

            if ($form_action == "insert") {
                if (isset($_POST["event_title"]) && !empty($_POST["event_title"]) && isset($_POST["event_sub_text"])) {
                    $event_title = $_POST['event_title'];
                    $event_sub_text = $_POST['event_sub_text'];
                    $event_image = null;

                    if (isset($_FILES['event_img']) && $_FILES['event_img']['error'] == 0) {
                        $target_dir = "../uploads/";
                        $event_image = $target_dir . basename($_FILES["event_img"]["name"]);

                        if (!move_uploaded_file($_FILES["event_img"]["tmp_name"], $event_image)) {
                            throw new Exception("Lỗi khi upload ảnh sự kiện.");
                        }
                    }

                    $stmtEvent = $conn->prepare("INSERT INTO Event (Event_title, Event_sub_text, Img_url) VALUES (:event_title, :event_sub_text, :img_url)");
                    $stmtEvent->bindParam(':event_title', $event_title);
                    $stmtEvent->bindParam(':event_sub_text', $event_sub_text);
                    $stmtEvent->bindParam(':img_url', $event_image);
                    $stmtEvent->execute();

                    $event_id = $conn->lastInsertId();
                } else {
                    if (isset($_POST["event_id"]) && !empty($_POST["event_id"])) {
                        $event_id = $_POST["event_id"];
                    } else {
                        throw new Exception("Chưa chọn sự kiện.");
                    }
                }

                if (isset($_POST["header"]) && isset($_POST["section_content"])) {
                    $header = $_POST['header'];
                    $sub_text = $_POST['section_content'];
                    $post_image = null;

                    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
                        $target_dir = "../uploads/";
                        $post_image = $target_dir . basename($_FILES["img"]["name"]);

                        if (!move_uploaded_file($_FILES["img"]["tmp_name"], $post_image)) {
                            throw new Exception("Lỗi khi upload file bài viết.");
                        }
                    }

                    $stmtDetail = $conn->prepare("INSERT INTO event_detail (Event_detail_title, Event_detail_sub_text, Event_detail_img, Event_ID) VALUES (:header, :sub_text, :image_path, :event_id)");
                    $stmtDetail->bindParam(':header', $header);
                    $stmtDetail->bindParam(':sub_text', $sub_text);
                    $stmtDetail->bindParam(':image_path', $post_image);
                    $stmtDetail->bindParam(':event_id', $event_id);

                    if ($stmtDetail->execute()) {

                        echo "<script>
                        Swal.fire({
                            title: 'Post thành công!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                localStorage.setItem('showEvents', true);
                                window.location.href = '../../FrontEnd/admin/admin.php';
                            }
                        });
                        </script>";
                    } else {
                        throw new Exception("Lỗi khi chèn vào bảng event_detail.");
                    }
                } else {
                    throw new Exception("Chưa nhập đầy đủ tiêu đề và nội dung.");
                }
            }
        } else if (isset($_POST["delete"])) {

            $id = $_POST["delete"];

            $stmt = $conn->prepare("UPDATE event_detail SET isDelete = 'Y' WHERE Event_detail_ID = :del");
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
                                    localStorage.setItem('showEvents', true);
                                    window.location.href = '../../FrontEnd/admin/admin.php';
                                }
                            });
                            </script>
                        ";
            };
        } else if (isset($_POST["editID"]) && !empty($_POST["editID"])) {
            $editID = $_POST["editID"];
            $editNewTitle = $_POST["editTitle"];
            $editSub = $_POST["editSub"];
            $editImagePath = null;

            $stmtSelect = $conn->prepare("SELECT Event_detail_img FROM event_detail WHERE Event_detail_ID = :id");
            $stmtSelect->bindParam(':id', $editID);
            $stmtSelect->execute();
            $currentImage = $stmtSelect->fetchColumn();

            if (isset($_FILES['editImage']) && $_FILES['editImage']['error'] == 0) {
                $target_dir = "../uploads/";
                $editImagePath = $target_dir . basename($_FILES['editImage']['name']);

                
                if (!move_uploaded_file($_FILES["editImage"]["tmp_name"], $editImagePath)) {
                    throw new Exception("Lỗi khi upload file bài viết.");
                }
            } else {

                $stmtCurrentImage = $conn->prepare("SELECT Event_detail_img FROM event_detail WHERE Event_detail_ID = :id");
                $stmtCurrentImage->bindParam(':id', $editID);
                $stmtCurrentImage->execute();
                $currentImage = $stmtCurrentImage->fetchColumn();

                $editImagePath = $currentImage;
            }

            $stmt = $conn->prepare("UPDATE event_detail SET Event_detail_title = :newTitle, Event_detail_sub_text = :sub, Event_detail_img = :img WHERE Event_detail_ID = :id");
            $stmt->bindParam(':newTitle', $editNewTitle);
            $stmt->bindParam(':sub', $editSub);
            $stmt->bindParam(':img', $editImagePath);
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
                                localStorage.setItem('showEvents', true);
                                window.location.href = '../../FrontEnd/admin/admin.php';
                            }
                        });
                    </script>
                ";
            }
        } 
    }
    ?>

</body>

</html>