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
    <link rel="stylesheet" href="../css/admin.css?v=1.1" />

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
                    <span class="text-muted">Xin chào, Đặng Tiến Lâm</span>
                </div>

                <!-- Nút đăng xuất với icon -->
                <button class="btn btn-danger btn-sm d-flex align-items-center">
                    <i class="fas fa-sign-out-alt me-2"></i> <!-- Icon đăng xuất -->
                    Đăng Xuất
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
                        <a href="#" class="text-dark" onclick="showContent('home')">
                            <i class="fas fa-home me-2"></i> Home
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="#" class="text-dark" onclick="showContent('events')">
                            <i class="fas fa-calendar-alt me-2"></i> Events
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="#" class="text-dark" onclick="showContent('celestial')">
                            <i class="fas fa-star me-2"></i> Celestial
                        </a>
                    </li>
                    <li class="mb-3 dropdown">
                        <a href="#" class="text-dark dropdown-toggle" id="astronautDropdown" role="button">
                            <i class="fas fa-user-astronaut me-2"></i> Astronaut
                        </a>
                        <ul class="dropdown-menu" id="astronautMenu">
                            <li><a class="dropdown-item" href="#" onclick="showContent('astronaut_details')">Astronaut Details</a></li>
                            <li><a class="dropdown-item" href="#" onclick="showContent('astronaut2')">Astronaut 2</a></li>
                        </ul>
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

            <!-- Start Update Astronaut1 -->
            <div class="w-50 p-2" id="editFormAstronaut" style="display: none;">
                <h2>Edit Astronaut</h2>
                <button type="button" class="btn btn-danger btncl" onclick="closeFormAstronaut()">X</button>
                <form id="editForm" action="../../Back-End/admin/astronaut_process.php" method="POST" onsubmit="confirmUpdateAstronaut(event)">

                    <div class="mb-3 mt-3">
                        <label for="AstronautID" class="form-label">ID:</label>
                        <input type="text" id="AstronautID" name="AstronautID" class="form-control w-50 p-2 mx-auto" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="editName" class="form-label">Title:</label>
                        <input type="text" id="editName" name="editName" class="form-control w-50 p-2 mx-auto" required>
                    </div>
                    <div class="mb-3">
                        <label for="editBio" class="form-label">Sub:</label>
                        <textarea id="editBio" name="editBio" class="form-control w-50 p-2 mx-auto" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <!-- Finish Update Astronaut1 -->



            <!-- Content Area -->
            <div class="content col-12 col-md-9">

                <div id="home" class="p-4 bg-light rounded shadow-sm">
                    <div class="container">
                        <h1 class="text-center mb-4">Welcome to the Cosmic Wonders Admin Dashboard</h1>

                        <div class="text-center mb-5">
                            <p class="lead">Manage events and explore the wonders of the universe from this dashboard.</p>
                            <img src="https://via.placeholder.com/400x200.png?text=Explore+the+Universe" class="img-fluid rounded" alt="Explore the Universe">
                        </div>


                        <h2 class="h4 text-center mb-3">Featured Images</h2>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <img src="https://via.placeholder.com/300.png?text=Planet+1" class="img-fluid rounded shadow-sm" alt="Planet 1">
                            </div>
                            <div class="col-md-4 mb-4">
                                <img src="https://via.placeholder.com/300.png?text=Planet+2" class="img-fluid rounded shadow-sm" alt="Planet 2">
                            </div>
                            <div class="col-md-4 mb-4">
                                <img src="https://via.placeholder.com/300.png?text=Planet+3" class="img-fluid rounded shadow-sm" alt="Planet 3">
                            </div>
                        </div>
                    </div>
                </div>




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
                                $result = $conn->prepare("SELECT Event_detail_ID, Event_detail_title, Event_detail_sub, Event_detail_img, Event_title FROM event JOIN event_detail ON event.Event_ID = event_detail.Event_ID WHERE event_detail.isDelete = 'N'");
                                $result->execute();

                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($row["Event_detail_ID"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["Event_title"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["Event_detail_title"]) . "</td>";
                                    echo "<td>" . htmlspecialchars($row["Event_detail_sub"]) . "</td>";
                                    echo "<td><img src='../../Back-End" . htmlspecialchars($row['Event_detail_img'] ?? '') . "' alt='Event Image' width='100' height='100'></td>";
                                    echo "<td>
                                            <button class='btn btn-danger' type='button' onclick='deletePost(\"" . addslashes(htmlspecialchars($row['Event_detail_ID'])) . "\")'>Delete</button>
                                            <button class='btn btn-warning' type='button' onclick='editPost(\"" . addslashes(htmlspecialchars($row['Event_detail_ID'])) . "\", \"" . addslashes(htmlspecialchars($row['Event_detail_title'])) . "\", \"" . addslashes(htmlspecialchars($row['Event_detail_sub'])) . "\", \"" . addslashes(htmlspecialchars($row['Event_detail_img'])) . "\")'>Update</button>
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
                        <h1 class="text-center mb-4">ADD EVENT AND POST</h1>
                        <button type="button" class="btn btn-danger back mb-3 d-flex align-items-center" onclick="back()">
                            <i class="fas fa-arrow-left me-2"></i> Back
                        </button>

                        <form action="../../Back-End/admin/events_process.php" method="POST" enctype="multipart/form-data"
                            class="d-flex flex-column align-items-center">

                            <input type="hidden" name="form_action" value="insert">

                            <div class="mb-3 w-75">
                                <label for="event_title" class="form-label">ADD NEW EVENT</label>
                                <input type="text" name="event_title" id="event_title" class="form-control" placeholder="Event Title"
                                    style="height: 50px;">
                            </div>

                            <div class="mb-3 w-75">
                                <label for="event_sub_text" class="form-label">Event Sub Text</label>
                                <textarea name="event_sub_text" id="event_sub_text" class="form-control" placeholder="Event Sub Text"
                                    rows="2"></textarea>
                            </div>

                            <div class="mb-3 w-75">
                                <label for="event_img" class="form-label">IMAGE FOR NEW EVENT</label>
                                <input type="file" name="event_img" id="event_img" class="form-control">
                            </div>
                            <hr>
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
                                <input type="text" name="header" id="header" class="form-control" style="height: 50px;">
                            </div>

                            <div class="mb-3 w-75">
                                <label for="section_content" class="form-label">SUB TEXT</label>
                                <textarea name="section_content" id="section_content" class="form-control" rows="4"></textarea>
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



                <div id="astronaut_details" class="hidden">

                    <div id="but_astronaut">
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
                    </div>

                    <?php
                    $stmt = $conn->prepare("SELECT Astronaut_ID, Astronaut_title FROM astronaut WHERE Astronaut_title != 'okok'");
                    $stmt->execute();
                    $astronauts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>


                    <div id="add_astronaut" class="p-4 bg-light rounded shadow-sm">
                        <h1 class="text-center mb-4">ADD ASTRONAUT AND DETAILS</h1>
                        <button type="button" class="btn btn-danger back mb-3 d-flex align-items-center" onclick="backAstronaut()">
                            <i class="fas fa-arrow-left me-2"></i> Back
                        </button>

                        <form action="../../Back-End/admin/astronaut_process.php" method="POST" enctype="multipart/form-data"
                            class="d-flex flex-column align-items-center">

                            <input type="hidden" name="form_action" value="insert">

                            <!-- ADD NEW ASTRONAUT -->
                            <div class="mb-3 w-75">
                                <label for="astronaut_title" class="form-label">ADD NEW ASTRONAUT</label>
                                <input type="text" name="astronaut_title" id="astronaut_title" class="form-control" placeholder="Astronaut Title"
                                    style="height: 50px;">
                            </div>

                            <div class="mb-3 w-75">
                                <label for="astronaut_img" class="form-label">IMAGE FOR NEW ASTRONAUT</label>
                                <input type="file" name="astronaut_img" id="astronaut_img" class="form-control">
                            </div>

                            <hr>

                            <!-- SELECT EXISTING ASTRONAUT TO ADD DETAILS -->
                            <div class="mb-3 w-75">
                                <label for="astronaut_id" class="form-label">SELECT AN EXISTING ASTRONAUT TO ADD DETAILS</label>
                                <select name="astronaut_id" id="astronaut_id" class="form-control">
                                    <option value="">Select an astronaut</option>
                                    <?php foreach ($astronauts as $astronaut): ?>
                                        <option value="<?= $astronaut['Astronaut_ID'] ?>"><?= htmlspecialchars($astronaut['Astronaut_title']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- ADD DETAILS FOR ASTRONAUT -->
                            <div class="mb-3 w-75">
                                <label for="detail_title" class="form-label">DETAIL TITLE</label>
                                <input type="text" name="detail_title" id="detail_title" class="form-control" style="height: 50px;">
                            </div>

                            <div class="mb-3 w-75">
                                <label for="detail_sub_text" class="form-label">SUB TEXT</label>
                                <textarea name="detail_sub_text" id="detail_sub_text" class="form-control" rows="4"></textarea>
                            </div>

                            <div class="mb-3 w-75">
                                <label for="detail_img" class="form-label">IMAGE FOR DETAILS</label>
                                <input type="file" name="detail_img" id="detail_img" class="form-control">
                            </div>

                            <div class="d-flex justify-content-center mt-4 w-75">
                                <button type="submit" class="btn btn-secondary w-25">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





</body>

</html>