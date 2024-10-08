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
                <form id="editForm" action="admin.php" method="post" onsubmit="confirmUpdate(event)">
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
                <div id="planet-simulation" class="hidden">

                </div>


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
                    if (isset($_POST["header"]) && isset($_POST["section_content"])) {
                        $header = $_POST['header'];
                        $sub_text = $_POST['section_content'];

                        // Kiểm tra file ảnh có tồn tại và không có lỗi
                        if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
                            $target_dir = "uploads/"; // Đường dẫn đến thư mục chứa file
                            $target_file = $target_dir . basename($_FILES["img"]["name"]); // Tên file

                            // Kiểm tra và di chuyển file vào thư mục uploads
                            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                                // Chèn dữ liệu vào database bao gồm đường dẫn file ảnh
                                $stmt = $conn->prepare("INSERT INTO event_detail (Event_detail_title, Event_detail_sub, Event_detail_img) VALUES (:header, :sub_text, :image_path)");
                                $stmt->bindParam(':header', $header);
                                $stmt->bindParam(':sub_text', $sub_text);
                                $stmt->bindParam(':image_path', $target_file); // Lưu đường dẫn file

                                if ($stmt->execute()) {
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
                                }
                            } else {
                                echo "Lỗi khi upload file.";
                            }
                        } else {
                            // Nếu không có file ảnh, chèn dữ liệu mà không có ảnh
                            $stmt = $conn->prepare("INSERT INTO event_detail (Event_detail_title, Event_detail_sub) VALUES (:header, :sub_text)");
                            $stmt->bindParam(':header', $header);
                            $stmt->bindParam(':sub_text', $sub_text);

                            if ($stmt->execute()) {
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
                                echo "Lỗi khi thêm dữ liệu.";
                            }
                        }
                    } else if (isset($_POST["delete"])) {

                        $id = $_POST["delete"];

                        $stmt = $conn->prepare("DELETE FROM event_detail WHERE Event_detail_title = :del");
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
                                    <th>TITLE</th>
                                    <th>IMAGE</th>
                                    <th>ACTION</th>
                                </tr>

                                <?php
                                // Truy vấn dữ liệu từ bảng Event hoặc Post
                                $result = $conn->prepare("SELECT Event_detail_ID, Event_detail_title, Event_detail_sub, Event_detail_img FROM event_detail");
                                $result->execute();

                                // Hiển thị dữ liệu ra bảng
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row["Event_detail_ID"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["Event_detail_title"]) . "</td>";
                                    echo "<td><img src='" . htmlspecialchars($row["Event_detail_img"]) . "' style='max-width: 100px; max-height: 100px;'></td>";
                                    echo "<td>
                                            <button class='btn btn-danger mx-2' type='button' onclick='deletePost(\"" . addslashes(htmlspecialchars($row['Event_detail_title'])) . "\")'>Delete</button>
                                            <button class='btn btn-warning mx-2' type='button' onclick='editPost(\"" . addslashes(htmlspecialchars($row['Event_detail_ID'])) . "\", \"" . addslashes(htmlspecialchars($row['Event_detail_sub'])) . "\", \"" . addslashes(htmlspecialchars($row['Event_detail_title'])) . "\")'>Update</button>
                                         </td>";
                                    echo "</tr>";
                                }
                                ?>

                            </table>
                        </div>
                    </div>

                    <div id="add">
                        <h1 class="text-center">ADD POST</h1>
                        <button type="submit" class="btn btn-danger back" onclick="back()">Back</button>
                        <form action="admin.php" method="POST" enctype="multipart/form-data" class="mt-4">
                            <!-- <h4>TITLE</h4>
                        <input type="text" name="section_title" id="section_title" class="form-control w-75 m-auto mb-3" required>

                        <h4>SUB</h4>
                        <input type="text" name="section_sub" id="section_sub" class="form-control w-75 m-auto mb-3" required> -->

                            <h4>TITLE DETAIL</h4>
                            <input type="text" name="header" id="header" class="form-control w-75 m-auto mb-3" required>

                            <h4>SUB TEXT</h4>
                            <textarea name="section_content" id="section_content" class="form-control w-75 m-auto mb-3" rows="4" required></textarea>

                            <h4>IMAGE</h4>
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

                <div id="cosmic-technology" class="hidden">
                    <h2>Cosmic Technology</h2>
                    <p>Add new posts related to Cosmic Technology here.</p>
                </div>
            </div>
        </div>

        <script src="admin.js"></script>


</body>

</html>