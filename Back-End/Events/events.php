<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


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
    ?>

    <?php
    // Truy vấn dữ liệu từ bảng Event và Event_detail
    $stmt = $conn->prepare("SELECT e.Event_ID, e.Event_title, e.Event_sub_text, e.Img_url, 
                               ed.Event_detail_ID, ed.Event_detail_title, ed.Event_detail_sub, ed.Event_detail_img
                        FROM Event e
                        LEFT JOIN Event_detail ed ON e.Event_ID = ed.Event_ID
                        ORDER BY e.Event_ID, ed.Event_detail_ID");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Nhóm các chi tiết sự kiện theo Event_ID
    $events = [];
    foreach ($results as $row) {
        // Nếu Event_ID chưa có trong mảng $events, khởi tạo nó
        if (!isset($events[$row['Event_ID']])) {
            $events[$row['Event_ID']] = [
                'Event_ID' => $row['Event_ID'],
                'Event_title' => $row['Event_title'],
                'Event_sub_text' => $row['Event_sub_text'],
                'Img_url' => $row['Img_url'],
                'details' => [] // Mảng để chứa các chi tiết của sự kiện này
            ];
        }

        // Thêm chi tiết sự kiện vào mảng 'details'
        if ($row['Event_detail_ID']) { // Chỉ thêm nếu có chi tiết sự kiện
            $events[$row['Event_ID']]['details'][] = [
                'Event_detail_ID' => $row['Event_detail_ID'],
                'Event_detail_title' => $row['Event_detail_title'],
                'Event_detail_sub' => $row['Event_detail_sub'],
                'Event_detail_img' => $row['Event_detail_img']
            ];
        }
    }
    ?>

    <div class="main-content container-fluid">
        <div id="events">
            <h1 class="text-center">EVENTS</h1>
            <hr>
            <?php foreach ($events as $event): ?>
                <div id="bigbang" class="container-fluid">
                    <div class="bb_content container-fluid">
                        <div class="bb_content">
                            <!-- Phần tiêu đề (bb_header) lấy từ bảng Event -->
                            <div class="bb_header row text-start" style="background-image: url('../Back-End/admin/<?= $event['Img_url'] ?>');">
                                <div class="col-12">
                                    <!-- Hiển thị tiêu đề sự kiện từ Event_title -->
                                    <h2 class="m-0"><?= $event['Event_title'] ?></h2>
                                    <!-- Hiển thị mô tả sự kiện từ Event_sub_text -->
                                    <div class="text1"><?= $event['Event_sub_text'] ?></div>
                                </div>

                                <!-- Button Read More -->
                                <div class="col-12 mt-2">
                                    <button class="btn btn-sm readMoreBtn" id="toggleBtn_<?= $event['Event_ID'] ?>">
                                        Read More <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Phần nội dung chi tiết (bb_body) lấy từ bảng Event_detail -->
                            <div class="bb_body p-5 d-none" id="bbBody_<?= $event['Event_ID'] ?>">
                                <div class="row">
                                    <!-- Menu (Nếu cần hiển thị) -->
                                    <div class="col-12 col-md-3">
                                        <ul class="bb_menu_list">
                                            <li>Content</li>
                                            <?php foreach ($event['details'] as $detail): ?>
                                                <li><a href="#detail_<?= $detail['Event_detail_ID'] ?>"><?= $detail['Event_detail_title'] ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>

                                    <!-- Nội dung chi tiết -->
                                    <div class="col-12 col-md-9">
                                        <?php foreach ($event['details'] as $detail): ?>
                                            <div class="row">
                                                <div id="detail_<?= $detail['Event_detail_ID'] ?>">
                                                    <!-- Hiển thị tiêu đề chi tiết sự kiện -->
                                                    <h3><?= $detail['Event_detail_title'] ?></h3>
                                                    <!-- Hiển thị mô tả phụ -->
                                                    <p><?= $detail['Event_detail_sub'] ?></p>

                                                    <!-- Hiển thị hình ảnh nếu có -->
                                                    <?php if (!empty($detail['Event_detail_img'])): ?>
                                                        <img class="img-fluid" src="../Back-End/admin/<?= $detail['Event_detail_img'] ?>" alt="<?= $detail['Event_detail_title'] ?>">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>







    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Lấy tất cả các nút Read More
            const toggleButtons = document.querySelectorAll(".readMoreBtn");

            // Lặp qua tất cả các nút và gán sự kiện click cho mỗi nút
            toggleButtons.forEach(function(button) {
                const eventID = button.id.split('_')[1]; // Lấy Event_ID từ ID của nút
                const bbBody = document.getElementById(`bbBody_${eventID}`); // Tìm phần nội dung tương ứng với Event_ID

                // Gán sự kiện click cho nút
                button.addEventListener("click", function() {
                    // Chuyển đổi lớp 'd-none' để ẩn hoặc hiển thị nội dung
                    bbBody.classList.toggle("d-none");

                    // Cập nhật nội dung của nút dựa trên trạng thái hiển thị
                    if (bbBody.classList.contains("d-none")) {
                        button.innerHTML = 'Read More <i class="fas fa-chevron-down"></i>'; // Hiển thị "Read More"
                    } else {
                        button.innerHTML = '<i class="fas fa-times"></i>'; // Hiển thị dấu "X"
                    }
                });
            });
        });
    </script>
</body>

</html>