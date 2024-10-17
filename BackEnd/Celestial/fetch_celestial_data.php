<?php
include '../BackEnd/config.php';


$sql = "SELECT 
            cd.Celestial_detail_title, 
            cd.Celestial_detail_sub, 
            cd.Celestial_detail_img, 
            cd.created_at, 
            cd.Other_details, 
            cd.Celestial_discovery_date, 
            cd.Celestial_size, 
            cd.Celestial_ozone, 
            cd.Celestial_distance_s_e, 
            c.Celestial_type 
        FROM celestial_detail cd
        JOIN Celestial c ON cd.Celestial_ID = c.Celestial_ID
        WHERE cd.isDelete = 'N'";
$stmt = $conn->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

function timeAgo($datetime, $full = false)
{
    $now = new DateTime();
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);


    $weeks = floor($diff->d / 7);
    $days = $diff->d % 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'days',
        'h' => 'hours',
        'i' => 'minutes',
        's' => 'seconds',
    );

    if ($diff->y) {
        return $diff->y . ' ' . $string['y'] . ' ago';
    } elseif ($diff->m) {
        return $diff->m . ' ' . $string['m'] . ' ago';
    } elseif ($weeks) {
        return $weeks . ' ' . $string['w'] . ' ago';
    } elseif ($days) {
        return $days . ' ' . $string['d'] . ' ago';
    } elseif ($diff->h) {
        return $diff->h . ' ' . $string['h'] . ' ago';
    } elseif ($diff->i) {
        return $diff->i . ' ' . $string['i'] . ' ago';
    } elseif ($diff->s) {
        return $diff->s . ' ' . $string['s'] . ' ago';
    }

    return 'Bây giờ';
}
