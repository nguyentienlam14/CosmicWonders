<?php
include 'C:/xampp/htdocs/CosmicWonders/BackEnd/config.php'; // Bao gồm file cấu hình

if (!$conn) {
    die("Failed to connect to the database.");
}

$sql = "SELECT a.Astronaut_ID,
    a.Astronaut_title, 
    a.Astronaut_subtitle, 
    a.Img_url, 
    ad.Astronaut_detail_ID,
    ad.Astronaut_detail_header_text,
    ad.Astronaut_detail_header_subtext,
    ad.Astronaut_detail_sub_text,
    ad.Astronaut_detail_img,
    ad.Astronaut_detail_img_sub_text,
    ad.Astronaut_detail_type
    FROM Astronaut a
    JOIN Astronaut_detail ad ON a.Astronaut_ID = ad.Astronaut_ID
    WHERE a.isDelete = 'N' AND ad.isDelete = 'N'";

$stmt = $conn->query($sql);
$astronauts = $stmt->fetchAll(PDO::FETCH_ASSOC);


$conn = null;
?>
