<?php
include 'db_Conection.php';

function insertSampleData($db) {
    $imgLink= "http://localhost:81/CosmicWonders/Front-end/assets/img/body/";
    try {
        // $sampleCategories = [
        //     ['Name' => 'Planet<br>Simulation', 'Img_url' => $imgLink.'/planet_choose.jpg', 'isDelete' => 'N'],
        //     ['Name' => 'Cosmic<br>Event', 'Img_url' => $imgLink.'/planet_choose.jpg', 'isDelete' => 'N'],
        //     ['Name' => 'Celestial', 'Img_url' => $imgLink.'/start.jpg', 'isDelete' => 'N'],
        //     ['Name' => 'Astronaut', 'Img_url' => $imgLink.'/astronaut.webp', 'isDelete' => 'N'],
        //     ['Name' => 'Cosmic<br>technology', 'Img_url' => $imgLink.'/space.jpg', 'isDelete' => 'N'],
        // ];

        // foreach ($sampleCategories as $category) {
        //     $sql = "INSERT INTO Category (Name, Img_url, isDelete) VALUES (:name, :imgUrl, :isDelete)";
        //     $stmt = $db->getConnection()->prepare($sql);
        //     $stmt->execute(['name' => $category['Name'], 'imgUrl' => $category['Img_url'], 'isDelete' => $category['isDelete']]);
        //     echo "Inserted category: " . $category['Name'] . "<br>";
        // }

        $sampleAstronauts = [
            ['Astronaut_title' => "The Astronaut's Voyage to <br> Explore the Stars",'Astronaut_sub_title' => '', 'Img_url' => $imgLink . 'astronaut.webp', 'Category_ID' => 4, 'isDelete' => 'N'],
            ['Astronaut_title' => "Why Go to Space?",'Astronaut_sub_title' => 'Exploring the universe, like exploring Earth, stems from the human desire to gain
            knowledge, find resources, and improve life.', 'Img_url' => $imgLink . 'why.jpg', 'Category_ID' => 4, 'isDelete' => 'N'],
            ['Astronaut_title' => "Spaceships and Rockets",'Astronaut_sub_title' => 'Learn more about spaceships and rockets enabled by NASA.', 'Img_url' => $imgLink . 'spaceship.webp', 'Category_ID' => 4, 'isDelete' => 'N']
           
        ];

        foreach ($sampleAstronauts as $astronaut) {
            $sql = "INSERT INTO Astronaut (Astronaut_title,Astronaut_sub_title, Img_url, Category_ID, isDelete) VALUES (:title,:sub_title, :imgUrl, :categoryId, :isDelete)";
            $stmt = $db->getConnection()->prepare($sql);
            $stmt->execute(['title' => $astronaut['Astronaut_title'],'sub_title'=> $astronaut['Astronaut_sub_title'] ,'imgUrl' => $astronaut['Img_url'], 'categoryId' => $astronaut['Category_ID'], 'isDelete' => $astronaut['isDelete']]);
            echo "Inserted astronaut: " . $astronaut['Astronaut_title'] . "<br>";
        }

    } catch (PDOException $e) {
        echo "Error inserting sample data: " . $e->getMessage();
    }
}

$db = new Database();
insertSampleData($db);
$db->closeConnection();
?>
