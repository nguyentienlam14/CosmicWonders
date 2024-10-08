<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;0,400;0,500&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!--Web-logo-->
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/logo/weblogo.png" />
    <!-- css -->
    <link rel="stylesheet" href="./admin.css?v=1.1" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="sidebar col-12 col-md-3 mb-4 mb-md-0">
                <!-- Logo -->
                <div class="text-center mb-4">
                    <img src="../assets/img/logo/weblogo.png" alt="Logo" class="img-fluid" style="max-width: 150px;">
                </div>
                <h1 class="text-center">COSMIC WONDERS</h1>
                <hr>
                <ul class="flex-column">
                    <!-- <li><a class="nav-link" href="#" onclick="showContent('planet-simulation')">Planet Simulation</a></li> -->
                    <li><a class="nav-link" href="#" onclick="showContent('events')">Events</a></li>
                    <li><a class="nav-link" href="#" onclick="showContent('celestial')">Celestial</a></li>
                    <li><a class="nav-link" href="#" onclick="showContent('astronaut')">Astronaut</a></li>
                    <!-- <li><a class="nav-link" href="#" onclick="showContent('cosmic-technology')">Cosmic Technology</a> -->
                    </li>
                </ul>

                <div class="mt-4 row">
                    <div class="col-7 text-center mt-2">Xin chào, Đặng Tiến Lâm</div>
                    <div class="col-5 text-end"><button class="btn btn-danger">Đăng Xuất</button></div>
                </div>
            </div>

            <div class="edit-form-container w-50 p-2" id="editFormContainer">
                <h2>Edit Post</h2>
                <button type="button" class="btn btn-danger btncl" onclick="closeForm()">X</button>
                <form id="editForm" action="admin.php" method="POST" onsubmit="confirmUpdate(event)">

                    <div class="mb-3 mt-3">
                        <label for="editID" class="form-label">ID:</label>
                        <input type="text" id="editID" name="editID" class="form-control w-50 p-2 mx-auto">
                    </div>
                    <div class="mb-3">
                        <label for="editTitle" class="form-label">Title:</label>
                        <input type="text" id="editTitle" name="editTitle" class="form-control w-50 p-2 mx-auto" required>
                    </div>
                    <div class="mb-3">
                        <label for="editSub" class="form-label">Sub Text:</label>
                        <input type="text" id="editSub" name="editSub" class="form-control w-50 p-2 mx-auto" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>





            <!-- Content Area -->
            <div class="content col-12 col-md-9">

                <?php
                // Kết nối tới MySQL
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
                                window.location.href = 'admin.php';
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

                        $stmt = $conn->prepare("DELETE FROM event_detail WHERE Event_detail_ID = :del");
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
                                    window.location.href = 'admin.php';
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
                                    window.location.href = 'admin.php';
                                }
                            });
                            </script>
                        ";
                        };
                    }
                }
                ?>

                <div id="events" class="hidden">
                    <div class="post" id="but">
                        <h1 class="text-center">Post Management</h1>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="button" class="btn btn-secondary mx-2 w-25" onclick="addPost()">Add Post</button>
                        </div>

                        <div class="mt-5">
                            <table>
                                <tr>
                                    <th>ID</th>
                                    <th>EVENT</th>
                                    <th>TITLE</th>
                                    <th>ACTION</th>
                                </tr>

                                <?php
                                // Truy vấn dữ liệu từ bảng Event hoặc Post
                                $result = $conn->prepare("SELECT Event_detail_ID, Event_detail_title, Event_detail_sub, Event_title FROM event JOIN event_detail ON event.Event_ID = event_detail.Event_ID");
                                $result->execute();

                                // Hiển thị dữ liệu ra bảng
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row["Event_detail_ID"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["Event_title"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["Event_detail_title"]) . "</td>";
                                    echo "<td>
                                            <button class='btn btn-danger mx-3' type='button' onclick='deletePost(\"" . addslashes(htmlspecialchars($row['Event_detail_ID'])) . "\")'>Delete</button>
                                            <button class='btn btn-warning mx-3' type='button' onclick='editPost(\"" . addslashes(htmlspecialchars($row['Event_detail_ID'])) . "\", \"" . addslashes(htmlspecialchars($row['Event_detail_sub'])) . "\", \"" . addslashes(htmlspecialchars($row['Event_detail_title'])) . "\")'>Update</button>
                                         </td>";
                                    echo "</tr>";
                                }
                                ?>


                            </table>
                        </div>
                    </div>

                    <?php
                    // Kết nối đến cơ sở dữ liệu và lấy danh sách các sự kiện
                    $stmt = $conn->prepare("SELECT Event_ID, Event_title FROM event");
                    $stmt->execute();
                    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <div id="add">
                        <h1 class="text-center">ADD EVENT AND POST</h1>
                        <button type="button" class="btn btn-danger back" onclick="back()">Back</button>

                        <!-- Form insert -->
                        <form action="admin.php" method="POST" enctype="multipart/form-data" class="mt-4">

                            <input type="hidden" name="form_action" value="insert">

                            <!-- Thêm sự kiện mới (nếu cần) -->
                            <h4>THÊM SỰ KIỆN MỚI</h4>
                            <input type="text" name="event_title" id="event_title" class="form-control w-75 m-auto mb-3" placeholder="Event Title">

                            <textarea name="event_sub_text" id="event_sub_text" class="form-control w-75 m-auto mb-3" placeholder="Event Sub Text" rows="2"></textarea>

                            <!-- Trường ảnh cho sự kiện mới -->
                            <h4>ẢNH CHO SỰ KIỆN MỚI</h4>
                            <input type="file" name="event_img" id="event_img" class="form-control w-75 m-auto mb-3">

                            <!-- Dropdown để chọn sự kiện có sẵn -->
                            <h4>CHỌN SỰ KIỆN CÓ SẴN ĐỂ THÊM BÀI VIẾT</h4>
                            <select name="event_id" class="form-control w-75 m-auto mb-3">
                                <option value="">Chọn sự kiện</option>
                                <?php foreach ($events as $event): ?>
                                    <option value="<?= $event['Event_ID'] ?>"><?= htmlspecialchars($event['Event_title']) ?></option>
                                <?php endforeach; ?>
                            </select>

                            <!-- Title Detail cho Event Detail -->
                            <h4>TITLE DETAIL</h4>
                            <input type="text" name="header" id="header" class="form-control w-75 m-auto mb-3">

                            <!-- Sub Text cho Event Detail -->
                            <h4>SUB TEXT</h4>
                            <textarea name="section_content" id="section_content" class="form-control w-75 m-auto mb-3" rows="4"></textarea>

                            <!-- Image cho Event Detail -->
                            <h4>IMAGE FOR POST</h4>
                            <input type="file" name="img" id="img" class="form-control w-75 m-auto mb-3">

                            <div class="mt-5 d-flex justify-content-center">
                                <button type="submit" class="btn btn-secondary mx-2 w-25">Post</button>
                            </div>
                        </form>
                    </div>

                </div>


                <div id="celestial" class="hidden">
                    <h2>Celestial</h2>
                    <p>Add new posts related to Celestial objects here.</p>
                </div>

                <div id="astronaut" class="hidden">
                    <h2>Astronaut</h2>
                    <p>Add new posts related to Astronauts here.</p>
                </div>

            </div>
        </div>

        <script src="admin.js"></script>


</body>

</html>