<?php
include 'C:/xampp/htdocs/CosmicWonders/BackEnd/config.php';

$sql = "SELECT * FROM Stations WHERE isDelete = 'N'";
$result = $conn->query($sql);

if ($result) {
    if ($result->rowCount() > 0) {
        $stations = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $stations[$row['Stations_name']][] = $row;
        }
        
        $firstStationName = json_encode(str_replace(' ', '_', array_keys($stations)[0]));
        echo '<script>var firstStationName = ' . $firstStationName . ';</script>';
        echo '<div id="stations" class="space-list">';
        echo '<div class="station_categories">';
        echo '<div class="category2 flex-lg-row flex-column">';

        foreach ($stations as $stationName => $stationsData) {
            $sanitizedCategory = str_replace(' ', '_', $stationName);
            echo '<button class="col-12 col-lg-3" data-target="#' . htmlspecialchars($sanitizedCategory) . '">' . htmlspecialchars($stationName) . '</button>';
        }
        echo '</div>';
        echo '</div>';
        echo '<hr>';
        echo '<div class="station-list">';

        foreach ($stations as $stationName => $stationsData) {
            $sanitizedStationName = str_replace(' ', '_', $stationName);
            echo '<div id="' . htmlspecialchars($sanitizedStationName) . '" class="station">';
            foreach ($stationsData as $station) {
                echo '<div class="row center col-lg-9 m-auto">';
                echo '<div class="col-lg-6 col-12">';
                echo '<h4>' . htmlspecialchars($station['Stations_title']) . '</h4>';
                echo '<h2 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-5">' . htmlspecialchars($station['Stations_description']) . '</h2>';
                echo '<span class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-6">' . htmlspecialchars($station['Stations_details']) . '</span>';
                echo '</div>';
                echo '<div class="col-lg-6 col-12">';
                echo '<img class="img-fluid img-5x3" src="' . htmlspecialchars($station['Stations_image']) . '" alt="">';
                echo '<p>' . htmlspecialchars($station['Stations_caption']) . '</p>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
    } else {
        echo 'No stations found.';
    }
} else {
    echo "Query failed: " . $conn->errorInfo()[2];
}
?>
