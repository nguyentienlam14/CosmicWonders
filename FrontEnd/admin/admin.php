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
    <!-- <link rel="shortcut icon" type="image/x-icon" href="./assets/img/logo/weblogo.png" /> -->
    <!-- css -->
    <link rel="stylesheet" href="../css/admin.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/admin.js"></script>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="user-info d-flex justify-content-between align-items-center p-2 bg-light rounded shadow-sm">
                <!-- Thông tin người dùng với icon -->
                <div class="d-flex align-items-center">
                    <i class="fas fa-user-circle fa-2x text-muted me-2"></i> <!-- Icon người dùng -->
                    <span class="text-muted">HELLO, ADMIN</span>
                </div>

                <!-- Nút đăng xuất với icon -->
                <button class="btn btn-danger btn-sm d-flex align-items-center">
                    <i class="fas fa-sign-out-alt me-2"></i> <!-- Icon đăng xuất -->
                    LOG OUT
                </button>
            </div>
        </div>

        <div class="row">

            <div class="sidebar col-12 col-md-3 mb-4 mb-md-0  p-3 rounded shadow-sm">
                <!-- Logo -->
                <div class="text-center mb-3">
                    <img src="../assets/img/logo/weblogo.png" alt="Logo" class="img-fluid mb-2"
                        style="max-width: 100px;">
                    <h2 class="h5">COSMIC WONDERS</h2>
                </div>
                <hr>
                <!-- Navigation với icon -->
                <ul class="list-unstyled text-center">
                    <li class="mb-3">
                        <a href="#" class="text-dark" onclick="event.preventDefault(); showContent('home')">
                            <i class="fas fa-home me-2"></i> Home
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="#" class="text-dark" onclick="event.preventDefault(); showContent('events')">
                            <i class="fas fa-calendar-alt me-2"></i> Events
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="#" class="text-dark" onclick="event.preventDefault(); showContent('celestial')">
                            <i class="fas fa-star me-2"></i> Celestial
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="#" class="text-dark" onclick="event.preventDefault(); showContent('astronaut_details')">
                            <i class="fas fa-user-astronaut me-2"></i> Astronaut
                        </a>
                    </li>
                </ul>


            </div>


            <!--Start Update Events -->
            <div class="w-50 p-2" id="editFormContainer" style="display: none;">
                <h2>Edit Post</h2>
                <button type="button" class="btn btn-danger btncl" onclick="closeForm()">X</button>
                <form id="editForm" action="../../Back-End/admin/events_process.php" method="POST" enctype="multipart/form-data" onsubmit="confirmUpdate(event)">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="editID" class="form-label">ID:</label>
                                <input type="text" id="editID" name="editID" class="form-control w-100 p-2 mx-auto" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="editTitle" class="form-label">Title:</label>
                                <input type="text" id="editTitle" name="editTitle" class="form-control w-100 p-2 mx-auto" required>
                            </div>
                            <div class="mb-3">
                                <label for="editSub" class="form-label">Sub Text:</label>
                                <textarea id="editSub" name="editSub" class="form-control w-100 p-2 mx-auto" rows="4" required></textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label class="form-label">Current Image:</label>
                                <img id="currentImage" src="" alt="No Data" class="img-fluid w-75 mx-auto d-block" style="display: none;">
                            </div>
                            <div class="mb-3">
                                <label for="editImage" class="form-label">Choose New Image:</label>
                                <input type="file" id="editImage" name="editImage" class="form-control w-100 p-2 mx-auto" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <!-- Finish Update Events -->

            <!-- Content Area -->
            <div class="content col-12 col-md-9">

                <div id="home" class="p-4 bg-light rounded shadow-sm">
                    <div class="container">
                        <h1 class="text-center mb-4">Welcome to the Cosmic Wonders Admin</h1>

                        <div class="text-center mb-5">
                            <img src="../assets/img/body/background.jpg" class="img-fluid rounded" alt="Explore the Universe">
                        </div>
                    </div>
                </div>


                <?php
                include '../../BackEnd/config.php';
                ?>

                <div id="events" class="hidden">
                    <div id="but">
                        <h1 class="text-center">Events Management</h1>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="button" class="btn btn-secondary mx-2 w-25" onclick="addEvent()">Add Events Post</button>
                        </div>

                        <div class="mt-5">
                            <table>
                                <tr>
                                    <th>ID</th>
                                    <th>EVENT</th>
                                    <th>TITLE</th>
                                    <th>SUB TEXT</th>
                                    <th>IMG</th>
                                    <th>ACTION</th>
                                </tr>

                                <?php
                                $result = $conn->prepare("SELECT Event_detail_ID, Event_detail_title, Event_detail_sub_text, Event_detail_img, Event_title FROM event JOIN event_detail ON event.Event_ID = event_detail.Event_ID WHERE event_detail.isDelete = 'N'");
                                $result->execute();

                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row["Event_detail_ID"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["Event_title"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["Event_detail_title"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["Event_detail_sub_text"]) . "</td>";
                                    echo "<td><img src='../../BackEnd" . htmlspecialchars($row['Event_detail_img'] ?? '') . "' alt='Event Image' width='100' height='100'></td>";
                                    echo "<td>
                                            <button class='btn btn-danger' type='button' onclick='deletePost(\"" . addslashes(htmlspecialchars($row['Event_detail_ID'])) . "\")'>Delete</button>
                                            <button class='btn btn-warning' type='button' onclick='editPost(\"" . addslashes(htmlspecialchars($row['Event_detail_ID'])) . "\", \"" . addslashes(htmlspecialchars($row['Event_detail_title'])) . "\", \"" . addslashes(htmlspecialchars($row['Event_detail_sub_text'])) . "\", \"" . addslashes(htmlspecialchars($row['Event_detail_img'])) . "\")'>Update</button>
                                         </td>";
                                    echo "</tr>";
                                }
                                ?>

                            </table>
                        </div>
                    </div>

                    <?php
                    $stmt = $conn->prepare("SELECT Event_ID, Event_title FROM event");
                    $stmt->execute();
                    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <div id="add" class="p-4 bg-light rounded shadow-sm">

                        <button type="button" class="btn btn-danger back mb-3 d-flex align-items-center" onclick="back()">
                            <i class="fas fa-arrow-left me-2"></i> Back
                        </button>

                        <form action="../../BackEnd/admin/events_process.php" method="POST" enctype="multipart/form-data"
                            class="d-flex flex-column align-items-center">

                            <input type="hidden" name="form_action" value="insert">
                            <h3 class="text-center mb-4">ADD NEW EVENT</h3>

                            <div class="mb-3 w-75">
                                <label for="event_title" class="form-label">ADD NEW EVENT</label>
                                <input type="text" name="event_title" id="event_title" class="form-control" placeholder="Event Title"
                                    style="height: 50px;">
                            </div>

                            <div class="mb-3 w-75">
                                <label for="event_sub_text" class="form-label">EVENT SUB TEXT</label>
                                <textarea name="event_sub_text" id="event_sub_text" class="form-control" placeholder="Event Sub Text"
                                    rows="2"></textarea>
                            </div>

                            <div class="mb-3 w-75">
                                <label for="event_img" class="form-label">IMAGE FOR NEW EVENT</label>
                                <input type="file" name="event_img" id="event_img" class="form-control">
                            </div>

                            <h3 class="text-center mt-3">ADD POST</h3>

                            <div class="mb-3 w-75">
                                <label for="event_id" class="form-label">SELECT AN EXISTING EVENT TO ADD A POST</label>
                                <select name="event_id" id="event_id" class="form-control">
                                    <option value="">Select an event</option>
                                    <?php foreach ($events as $event): ?>
                                        <option value="<?= $event['Event_ID'] ?>"><?= htmlspecialchars($event['Event_title']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3 w-75">
                                <label for="header" class="form-label">TITLE DETAIL</label>
                                <input type="text" name="header" id="header" class="form-control" style="height: 50px;" placeholder="Title Detail">
                            </div>

                            <div class="mb-3 w-75">
                                <label for="section_content" class="form-label">SUB TEXT DETAIL</label>
                                <textarea name="section_content" id="section_content" class="form-control" rows="4" placeholder="Sub Text Detail"></textarea>
                            </div>

                            <div class="mb-3 w-75">
                                <label for="img" class="form-label">IMAGE FOR POST</label>
                                <input type="file" name="img" id="img" class="form-control">
                            </div>

                            <div class="d-flex justify-content-center mt-4 w-75">
                                <button type="submit" class="btn btn-secondary w-25">Post</button>
                            </div>
                        </form>
                    </div>


                </div>

                <div id="celestial" class="hidden">
                    <div id="but_celestial">
                        <h1 class="text-center">Post Management</h1>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="button" class="btn btn-secondary mx-2 w-25" onclick="addCelestial()">Add Celestial Post</button>
                        </div>
                        <div class="mt-5">
                            <table>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Short Description</th>
                                    <th>Other Details</th>
                                    <th>Discovery Date</th>
                                    <th>Size</th>
                                    <th>Ozone</th>
                                    <th>Distance from Earth</th>
                                    <th>Celestial Body ID</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>

                                <?php
                                $result = $conn->prepare("SELECT cd.Celestial_detail_ID, cd.Celestial_detail_title, cd.Celestial_detail_sub, cd.Other_details, cd.Celestial_discovery_date, cd.Celestial_size, cd.Celestial_ozone, cd.Celestial_distance_s_e, c.Celestial_ID, cd.Celestial_detail_img FROM celestial_detail cd INNER JOIN celestial c ON c.Celestial_ID = cd.Celestial_ID WHERE c.isDelete = 'N'");
                                $result->execute();

                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>
                                            <td>" . htmlspecialchars($row['Celestial_detail_ID']) . "</td>
                                            <td>" . htmlspecialchars($row['Celestial_detail_title']) . "</td>
                                            <td>" . htmlspecialchars($row['Celestial_detail_sub']) . "</td>
                                            <td>" . htmlspecialchars($row['Other_details']) . "</td>
                                            <td>" . htmlspecialchars($row['Celestial_discovery_date']) . "</td>
                                            <td>" . htmlspecialchars($row['Celestial_size']) . "</td>
                                            <td>" . htmlspecialchars($row['Celestial_ozone']) . "</td>
                                            <td>" . htmlspecialchars($row['Celestial_distance_s_e']) . "</td>
                                            <td>" . htmlspecialchars($row['Celestial_ID']) . "</td>
                                            <td>
                                                <img src='../../BackEnd/uploads/" . htmlspecialchars($row['Celestial_detail_img']) . "' alt='Hình Ảnh' width='100' height='100'>
                                            </td>
                                            <td>
                                                <a href='update.php?id=" . $row['Celestial_detail_ID'] . "' class='btn btn-warning btn-sm'>Update</a>   
                                                <a href='../../BackEnd/admin/delete.php?id=" . $row['Celestial_detail_ID'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa không?\");'>Delete</a>
                                            </td>
                                        </tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>


                    <div id="add_celestial" class="p-4 bg-light rounded shadow-sm" style="display: none;">
                        <h1 class="text-center mb-4">ADD CELESTIAL</h1>
                        <button type="button" class="btn btn-danger back mb-3 d-flex align-items-center" onclick="backCelestial()">
                            <i class="fas fa-arrow-left me-2"></i> Back
                        </button>

                        <form action="../../BackEnd/admin/process_insert.php" method="POST" enctype="multipart/form-data" class="d-flex flex-column align-items-center">


                            <div class="mb-3 w-75">
                                <label for="celestial_detail_title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="celestial_detail_title" name="celestial_detail_title" required>
                            </div>

                            <div class="mb-3 w-75">
                                <label for="celestial_detail_sub" class="form-label">Short Description</label>
                                <input type="text" class="form-control" id="celestial_detail_sub" name="celestial_detail_sub" required>
                            </div>

                            <div class="mb-3 w-75">
                                <label for="other_details" class="form-label">Other Details</label>
                                <textarea class="form-control" id="other_details" name="other_details"></textarea>
                            </div>

                            <div class="mb-3 w-75">
                                <label for="celestial_discovery_date" class="form-label">Discovery Date</label>
                                <textarea type="text" class="form-control" id="celestial_discovery_date" name="celestial_discovery_date"></textarea>
                            </div>

                            <div class="mb-3 w-75">
                                <label for="celestial_size" class="form-label">Size</label>
                                <input type="text" class="form-control" id="celestial_size" name="celestial_size">
                            </div>

                            <div class="mb-3 w-75">
                                <label for="celestial_ozone" class="form-label">Ozone</label>
                                <input type="text" class="form-control" id="celestial_ozone" name="celestial_ozone">
                            </div>

                            <div class="mb-3 w-75">
                                <label for="celestial_distance_s_e" class="form-label">Distance from Earth</label>
                                <input type="text" class="form-control" id="celestial_distance_s_e" name="celestial_distance_s_e">
                            </div>

                            <div class="mb-3 w-75">
                                <label for="celestial_id" class="form-label">Celestial Body ID</label>
                                <select id="celestial_id" name="celestial_id" class="form-control" required>
                                    <option value="">Select Celestial</option>
                                    <?php
                                    $sql = "SELECT Celestial_ID, Celestial_type FROM Celestial WHERE isDelete = 'N'";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value='" . $row['Celestial_ID'] . "'>" . htmlspecialchars($row['Celestial_type']) . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3 w-75">
                                <label for="celestial_detail_img" class="form-label">Image</label>
                                <input type="file" class="form-control" id="celestial_detail_img" name="celestial_detail_img">
                            </div>

                            <div class="d-flex justify-content-center mt-4 w-75">
                                <button type="submit" class="btn btn-secondary w-25" onclick="">Post</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div id="astronaut_details" class="hidden">

                    <!-- <div id="but_astronaut">
                        <h1 class="text-center">Astronaut Management</h1>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="button" class="btn btn-secondary mx-2 w-25" onclick="addAstronaut()">Add Astronaut Post</button>
                        </div>
                        <div class="mt-5">
                            <table>
                                <tr>
                                    <th>ID</th>
                                    <th>Astronaut</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                $result = $conn->query("SELECT Astronaut_detail_ID, Astronaut_detail_header_text, Astronaut_detail_sub_text, Astronaut_title FROM astronaut JOIN astronaut_detail ON astronaut.Astronaut_ID = astronaut_detail.Astronaut_ID WHERE Astronaut_title != 'okok'");
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row["Astronaut_detail_ID"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["Astronaut_title"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["Astronaut_detail_header_text"]) . "</td>";
                                    echo "<td>
                                            <button class='btn btn-danger mx-3' type='button' onclick='deletePostAstronaut(\"" . addslashes(htmlspecialchars($row['Astronaut_detail_ID'])) . "\")'>Delete</button>
                                            <button class='btn btn-warning mx-3' type='button' onclick='editPostAstronaut(\"" . addslashes(htmlspecialchars($row['Astronaut_detail_ID'])) . "\", \"" . addslashes(htmlspecialchars($row['Astronaut_detail_header_text'])) . "\", \"" . addslashes(htmlspecialchars($row['Astronaut_detail_sub_text'])) . "\")'>Update</button>
                                         </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div> -->
                    <?php
                    include 'C:/xampp/htdocs/CosmicWonders/BackEnd/config.php'; // Bao gồm file config

                    // Sử dụng kết nối đã có từ config.php
                    $conn = $conn; // Sử dụng biến $conn đã được khởi tạo trong config.php

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['addAstronaut'])) {
                            // Kiểm tra và xử lý hình ảnh phi hành gia
                            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                                $fileName = $_FILES['image']['name'];
                                $targetDirectory = "C:/xampp/htdocs/CosmicWonders/FrontEnd/assets/img/body/";
                                $targetFile = $targetDirectory . basename($fileName);
                                move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
                                $imgUrl = "http://localhost/CosmicWonders/FrontEnd/assets/img/body/" . $fileName; // Đường dẫn ảnh đã sửa
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
                                        $detailImgUrl = "http://localhost/CosmicWonders/FrontEnd/assets/img/body/" . $detailFileName; // Đường dẫn ảnh chi tiết
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

                    // Lấy danh sách phi hành gia
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
                                        <a href="http://localhost/CosmicWonders/BackEnd/admin/edit_astronaut.php?id=<?php echo $astronaut['Astronaut_ID']; ?>" class="btn btn-warning">Edit</a>
                                        <a href="http://localhost/CosmicWonders/BackEnd/admin/delete_Astronaut.php?id=<?php echo $astronaut['Astronaut_ID']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</body>

</html>