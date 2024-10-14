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

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "comis";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Không thể kết nối đến cơ sở dữ liệu: " . $e->getMessage();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["form_action"])) {
            $form_action = $_POST["form_action"];

            // THÊM BÀI VIẾT HOẶC SỰ KIỆN MỚI
            if ($form_action == "insert") {
                // Thêm sự kiện mới hoặc lấy ID sự kiện đã chọn
                if (isset($_POST["event_title"]) && !empty($_POST["event_title"]) && isset($_POST["event_sub_text"])) {
                    // Thêm sự kiện mới
                    $event_title = $_POST['event_title'];
                    $event_sub_text = $_POST['event_sub_text'];
                    $event_image = null;

                    // Kiểm tra file ảnh cho sự kiện mới
                    if (isset($_FILES['event_img']) && $_FILES['event_img']['error'] == 0) {
                        $target_dir = "uploads/";
                        $event_image = $target_dir . basename($_FILES["event_img"]["name"]);

                        // Di chuyển file vào thư mục uploads
                        if (!move_uploaded_file($_FILES["event_img"]["tmp_name"], $event_image)) {
                            throw new Exception("Lỗi khi upload ảnh sự kiện.");
                        }
                    }

                    // Thêm sự kiện mới vào bảng Event
                    $stmtEvent = $conn->prepare("INSERT INTO event (Event_title, Event_sub_text, Img_url) VALUES (:event_title, :event_sub_text, :img_url)");
                    $stmtEvent->bindParam(':event_title', $event_title);
                    $stmtEvent->bindParam(':event_sub_text', $event_sub_text);
                    $stmtEvent->bindParam(':img_url', $event_image);
                    $stmtEvent->execute();

                    // Lấy ID của Event vừa được chèn
                    $event_id = $conn->lastInsertId();
                } else {
                    // Nếu không có sự kiện mới, lấy ID sự kiện đã chọn
                    if (isset($_POST["event_id"]) && !empty($_POST["event_id"])) {
                        $event_id = $_POST["event_id"];
                    } else {
                        throw new Exception("Chưa chọn sự kiện.");
                    }
                }

                // Thêm bài viết chi tiết
                if (isset($_POST["header"]) && isset($_POST["section_content"])) {
                    $header = $_POST['header'];
                    $sub_text = $_POST['section_content'];
                    $post_image = null;

                    // Kiểm tra file ảnh cho bài viết chi tiết
                    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
                        $target_dir = "uploads/";
                        $post_image = $target_dir . basename($_FILES["img"]["name"]);

                        // Di chuyển file vào thư mục uploads
                        if (!move_uploaded_file($_FILES["img"]["tmp_name"], $post_image)) {
                            throw new Exception("Lỗi khi upload file bài viết.");
                        }
                    }

                    // Chèn dữ liệu vào bảng Event_detail
                    $stmtDetail = $conn->prepare("INSERT INTO event_detail (Event_detail_title, Event_detail_sub, Event_detail_img, Event_ID) VALUES (:header, :sub_text, :image_path, :event_id)");
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
                                window.location.href = '../../Front-End/admin/admin.php';
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
                                    window.location.href = '../../Front-End/admin/admin.php';
                                }
                            });
                            </script>
                        ";
            };
        } else if (isset($_POST["editID"]) && !empty($_POST["editID"])) {

            $editID = $_POST["editID"];
            $editNewTitle = $_POST["editTitle"];
            $editSub = $_POST["editSub"];


            $stmt = $conn->prepare("UPDATE event_detail SET Event_detail_title = :newTitle, Event_detail_sub = :sub WHERE Event_detail_ID = :id");
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
                                    localStorage.setItem('showEvents', true);
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