<?php
$db = new Database();
$conn = $db->getConnection();
$sql = "SELECT * FROM Spaceships WHERE isDelete = 'N'";
$result = $conn->query($sql);

if ($result) {
    if ($result->rowCount() > 0) {
        $spaceships = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $spaceships[$row['Spaceships_name']][] = $row;
        }
        $firstSpaceshipName = json_encode(preg_replace('/[^A-Za-z0-9]/', '', str_replace(' ', '_', array_keys($spaceships)[0])));
        echo '<script>var firstSpaceshipName = ' . $firstSpaceshipName . ';</script>';
        echo '<div id="spaceship" class="space-list">';
        echo '<div class="ship_categories">';
        echo '<div class="category flex-lg-row flex-column">';

        foreach ($spaceships as $shipname => $ships) {
            $sanitizedCategory = preg_replace('/[^A-Za-z0-9]/', '', str_replace(' ', '_', $shipname));
            echo '<button class="col-12 col-lg-3" data-target="#' . htmlspecialchars($sanitizedCategory) . '">' . htmlspecialchars($shipname) . '</button>';
        }

        echo '</div>';
        echo '</div>';
        echo '<hr>';
        echo '<div class="ship-list">';

        foreach ($spaceships as $shipname => $ships) {
            $sanitizedShipname = preg_replace('/[^A-Za-z0-9]/', '', str_replace(' ', '_', $shipname));
            echo '<div id="' . htmlspecialchars($sanitizedShipname) . '" class="ship">';
            foreach ($ships as $ship) {
                echo '<div class="row center col-lg-9 m-auto">';
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
        echo 'No spaceships found.';
    }
} else {
    echo "Query failed: " . $conn->errorInfo()[2];
}
