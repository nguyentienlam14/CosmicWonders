<?php
    $sql = "SELECT a.Astronaut_ID,
    a.Astronaut_title, 
    a.Astronaut_subtitle, 
    a.Img_url, 
    ad.Astronaut_detail_ID,
    ad.Astronaut_detail_header_text,
    ad.Astronaut_detail_header_subtext,
    ad.Astronaut_detail_sub_text,
    ad.Astronaut_detail_img,
    ad.Astronaut_detail_type
    FROM Astronaut a
    JOIN Astronaut_detail ad ON a.Astronaut_ID = ad.Astronaut_ID
    WHERE a.isDelete = 'N' AND ad.isDelete = 'N'";

    $stmt = $conn->query($sql);
    $astronauts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($astronauts)) {
    $groupedAstronauts = [];
    foreach ($astronauts as $astronaut) {
    $groupedAstronauts[$astronaut['Astronaut_ID']][$astronaut['Astronaut_detail_type']][] = $astronaut;
    }

    foreach ($groupedAstronauts as $astronautId => $detailsByType) {
    if (!empty($detailsByType[1])) {
    echo '<div class="astronaut-header p-relative start">';
    foreach ($detailsByType[1] as $detail) {
    echo '
        <img class="img-fluid" src="' . htmlspecialchars($detail['Astronaut_detail_img']) . '" alt="">
        <div class="overlay"></div>
        <h2 class="fs-sm-5 fs-1">' . htmlspecialchars($detail['Astronaut_title']) . '</h2>
        <div class="astronaut-header-sub">
            <span>' . htmlspecialchars($detail['Astronaut_subtitle']) . '</span>
        </div>
        <button class="readmore">Read more <i class="bi bi-arrow-down-circle-fill"></i></button>
    ';
    }
    echo '</div>';
    echo '<div class="details p-3">';
    foreach ($detailsByType[1] as $detail) {
    echo '<div class="destination row col-lg-8 col-12 me-auto m-lg-auto">';
    echo '
        <div class="col-lg-6 col-12 flex-column">
            <h4>' . htmlspecialchars($detail['Astronaut_detail_header_text']) . '</h4>
            <h5>' . htmlspecialchars($detail['Astronaut_detail_header_subtext']) . '</h5>
            <p>' . htmlspecialchars($detail['Astronaut_detail_sub_text']) . '</p>
        </div>
        <div class="col-lg-6 col-12 flex-column text-start">
            <img class="img-fluid img-5x3" src="' . htmlspecialchars($detail['Img_url']) . '" alt="">
            <p>' . htmlspecialchars($detail['Astronaut_detail_img_sub_text']) . '</p>
        </div>';
    echo '</div>';
    }
    echo '</div>';
    }

    if (!empty($detailsByType[2])) {
    echo '<div class="astronaut-header p-relative start">';
    foreach ($detailsByType[2] as $detail) {
    echo '
        <img class="img-fluid" src="' . htmlspecialchars($detail['Astronaut_detail_img']) . '" alt="">
        <div class="overlay"></div>
        <h2 class="fs-sm-5 fs-1">' . htmlspecialchars($detail['Astronaut_title']) . '</h2>
        <div class="astronaut-header-sub">
            <span>' . htmlspecialchars($detail['Astronaut_subtitle']) . '</span>
        </div>
        <button class="readmore">Read more <i class="bi bi-arrow-down-circle-fill"></i></button>
    ';
    }
    echo '</div>';
    echo '<div class="details p-3">';
    foreach ($detailsByType[2] as $detail) {
    echo '<div class="destination row col-lg-9 m-auto">';
    echo '
        <div class="col-lg-6 col-12 flex-column text-justify">
            <h4 class="text-start">' . htmlspecialchars($detail['Astronaut_detail_header_text']) . '</h4>
            <h5 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-5 text-start">' . htmlspecialchars($detail['Astronaut_detail_header_subtext']) . '</h5>
            <span>' . htmlspecialchars($detail['Astronaut_detail_sub_text']) . '</span>
        </div>
        <div class="col-lg-6 col-12 flex-column text-start">
            <img class="img-fluid img-5x3" src="' . htmlspecialchars($detail['Img_url']) . '" alt="">
            <p class="text-justify">' . htmlspecialchars($detail['Astronaut_detail_img_sub_text']) . '</p>
        </div>';
    echo '</div>';
    }
    echo '</div>';
    }
    }

    $sql = "SELECT * FROM Spaceships";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    $spaceships = [];
    while ($row = $result->fetch_assoc()) {
    $spaceships[$row['Spaceships_name']][] = $row;
    }
    echo '<div id="spaceship" class="space-list">';
    echo '<div class="ship_categories">';
    echo '<div class="category flex-lg-row flex-column">';
    foreach ($spaceships as $shipname => $ships) {
    $sanitizedCategory = str_replace(' ', '_', $shipname);
    echo '<button class="col-12 col-lg-3" data-target="#' . htmlspecialchars($sanitizedCategory) . '">' . htmlspecialchars($shipname) . '</button>';
    }
    echo '</div>';
    echo '</div>';
    echo '<hr>';
    echo '<div class="ship-list">';
    foreach ($spaceships as $shipname => $ships) {
    echo '<div id="' . htmlspecialchars($shipname) . '" class="ship">';
    foreach ($ships as $ship) {
    echo '<div class="row center">';
    echo '<div class="col-lg-6 col-12">';
    echo '<h4>' . htmlspecialchars($ship['Spaceships_title']) . '</h4>';
    echo '<h2 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-5">' . htmlspecialchars($ship['Spaceships_description']) . '</h2>';
    echo '<span class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-6">' . htmlspecialchars($ship['Spaceships_details']) . '</span>';
    echo '</div>';
    echo '<div class="col-lg-6 col-12">';
    echo '<img class="img-fluid img-5x3" src="' . htmlspecialchars($ship['Spaceships_image']) . '" alt="">';
    echo '<p>' . htmlspecialchars($ship['Spaceships_caption']) . '</p>';
    echo '</div>';
    echo '</div>';
    }
    echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    } else {
    echo "0 results";
    }

    $sql = "SELECT * FROM Stations";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    $stations = [];
    while ($row = $result->fetch_assoc()) {
    $stations[$row['Stations_name']][] = $row;
    }
    echo '<div id="station" class="space-list mt-5">';
    echo '<div id="station-data" data-stations="' . htmlspecialchars(json_encode(array_keys($stations))) . '"></div>';
    echo '<div class="ship_categories">';
    echo '<div class="category2 d-md-block d-flex flex-lg-row flex-column">';
    foreach ($stations as $stationname => $stations) {
    $sanitizedCategory2 = str_replace(' ', '_', $stationname);
    echo '<button class="col-12 col-lg-3" data-target="#' . htmlspecialchars($sanitizedCategory2) . '">' . htmlspecialchars($stationname) . '</button>';
    }
    echo '</div>';
    echo '</div>';
    echo '<hr>';
    echo '<div class="station-list">';
    foreach ($stations as $stationname => $stations) {
    echo '<div id="' . htmlspecialchars($stationname) . '" class="station">';
    foreach ($stations as $station) {
    echo '<div class="row center">';
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
    echo "0 results";
    }
    } else {
    echo '<p>No astronauts found.</p>';
    }

    $conn->close();

?>
