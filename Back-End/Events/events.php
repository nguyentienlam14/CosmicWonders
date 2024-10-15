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
    $stmt = $conn->prepare("SELECT e.Event_ID, e.Event_title, e.Event_sub_text, e.Img_url, ed.Event_detail_ID, ed.Event_detail_title, ed.Event_detail_sub, ed.Event_detail_img
                                   FROM Event e
                                   LEFT JOIN Event_detail ed ON e.Event_ID = ed.Event_ID
                                   WHERE e.isDelete = 'N' AND (ed.isDelete = 'N' OR ed.isDelete IS NULL)
                                   ORDER BY e.Event_ID, ed.Event_detail_ID;");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Nhóm các chi tiết sự kiện theo Event_ID
    $events = [];
    foreach ($results as $row) {

        if (!isset($events[$row['Event_ID']])) {
            $events[$row['Event_ID']] = [
                'Event_ID' => $row['Event_ID'],
                'Event_title' => $row['Event_title'],
                'Event_sub_text' => $row['Event_sub_text'],
                'Img_url' => $row['Img_url'],
                'details' => []
            ];
        }


        if ($row['Event_detail_ID']) {
            $events[$row['Event_ID']]['details'][] = [
                'Event_detail_ID' => $row['Event_detail_ID'],
                'Event_detail_title' => $row['Event_detail_title'],
                'Event_detail_sub' => $row['Event_detail_sub'],
                'Event_detail_img' => $row['Event_detail_img']
            ];
        }
    }
    ?>

    


    <script>
        
    </script>
</body>

</html>