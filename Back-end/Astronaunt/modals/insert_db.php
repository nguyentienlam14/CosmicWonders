<?php
include 'C:/xampp/htdocs/CosmicWonders/Back-end/db_Conection.php';

function insertSampleData($db) {
    $imgLink= "http://localhost/CosmicWonders/Front-end/assets/img/body/";
    try {
        $sampleCategories = [
            ['Name' => 'Planet<br>Simulation', 'Img_url' => $imgLink.'/planet_choose.jpg', 'isDelete' => 'N'],
            ['Name' => 'Cosmic<br>Event', 'Img_url' => $imgLink.'/planet_choose.jpg', 'isDelete' => 'N'],
            ['Name' => 'Celestial', 'Img_url' => $imgLink.'/start.jpg', 'isDelete' => 'N'],
            ['Name' => 'Astronaut', 'Img_url' => $imgLink.'/astronaut.webp', 'isDelete' => 'N'],
            ['Name' => 'Cosmic<br>technology', 'Img_url' => $imgLink.'/space.jpg', 'isDelete' => 'N'],
        ];

        foreach ($sampleCategories as $category) {
            $sql = "INSERT INTO Category (Name, Img_url, isDelete) VALUES (:name, :imgUrl, :isDelete)";
            $stmt = $db->getConnection()->prepare($sql);
            $stmt->execute(['name' => $category['Name'], 'imgUrl' => $category['Img_url'], 'isDelete' => $category['isDelete']]);
            echo "Inserted category: " . $category['Name'] . "<br>";
        }
        $spaceships = [
            [
                'Spaceships_name' => 'Apollo 11',
                'Spaceships_title' => 'The First Manned Moon Landing',
                'Spaceships_description' => 'Apollo 11 was the first mission to land humans on the Moon.',
                'Spaceships_image' => 'http://localhost/CosmicWonders/Front-end/assets/img/spaceships/apollo_11.jpg',
                'Spaceships_details' => 'Apollo 11 launched on July 16, 1969, and landed on the Moon on July 20, 1969.',
                'Spaceships_caption' => 'The Apollo 11 mission was a historic event.',
                'isDelete' => 'N'
            ],
            [
                'Spaceships_name' => 'Space Shuttle',
                'Spaceships_title' => 'Reusable Spacecraft',
                'Spaceships_description' => 'The Space Shuttle was a partially reusable spacecraft.',
                'Spaceships_image' => 'http://localhost/CosmicWonders/Front-end/assets/img/spaceships/space_shuttle.jpg',
                'Spaceships_details' => 'The Space Shuttle program operated from 1981 to 2011.',
                'Spaceships_caption' => 'The Space Shuttle launched and landed like an airplane.',
                'isDelete' => 'N'
            ],
            // Thêm nhiều dữ liệu hơn nếu cần
        ];
        
        foreach ($spaceships as $spaceship) {
            $sql = "INSERT INTO Spaceships (Spaceships_name, Spaceships_title, Spaceships_description, Spaceships_image, Spaceships_details, Spaceships_caption, isDelete) 
                    VALUES (:name, :title, :description, :image, :details, :caption, :isDelete)";
            
            $stmt = $db->getConnection()->prepare($sql);
            $stmt->execute([
                'name' => $spaceship['Spaceships_name'],
                'title' => $spaceship['Spaceships_title'],
                'description' => $spaceship['Spaceships_description'],
                'image' => $spaceship['Spaceships_image'],
                'details' => $spaceship['Spaceships_details'],
                'caption' => $spaceship['Spaceships_caption'],
                'isDelete' => $spaceship['isDelete']
            ]);
            
            echo "Inserted spaceship: " . $spaceship['Spaceships_name'] . "<br>";
        }
        
        $stations = [
            [
                'Stations_name' => 'International Space Station',
                'Stations_title' => 'A Marvel of Modern Engineering',
                'Stations_description' => 'The ISS is a space station, or habitable artificial satellite, in low Earth orbit.',
                'Stations_image' => 'http://localhost/CosmicWonders/Front-end/assets/img/stations/iss.jpg',
                'Stations_details' => 'The ISS was launched in 1998 and is a joint project of five space agencies.',
                'Stations_caption' => 'The ISS serves as a microgravity and space environment research laboratory.',
                'isDelete' => 'N'
            ],
            [
                'Stations_name' => 'Tiangong',
                'Stations_title' => 'Chinese Modular Space Station',
                'Stations_description' => 'Tiangong is a space station being constructed in low Earth orbit by China.',
                'Stations_image' => 'http://localhost/CosmicWonders/Front-end/assets/img/stations/tiangong.jpg',
                'Stations_details' => 'Tiangong aims to host astronauts for long-term missions.',
                'Stations_caption' => 'Tiangong represents China’s growing capabilities in space exploration.',
                'isDelete' => 'N'
            ],
            // Thêm nhiều dữ liệu hơn nếu cần
        ];
        
        foreach ($stations as $station) {
            $sql = "INSERT INTO Stations (Stations_name, Stations_title, Stations_description, Stations_image, Stations_details, Stations_caption, isDelete) 
                    VALUES (:name, :title, :description, :image, :details, :caption, :isDelete)";
            
            $stmt = $db->getConnection()->prepare($sql);
            $stmt->execute([
                'name' => $station['Stations_name'],
                'title' => $station['Stations_title'],
                'description' => $station['Stations_description'],
                'image' => $station['Stations_image'],
                'details' => $station['Stations_details'],
                'caption' => $station['Stations_caption'],
                'isDelete' => $station['isDelete']
            ]);
            
            echo "Inserted station: " . $station['Stations_name'] . "<br>";
        }
        
        $Astronauts = [
            ['Astronaut_title' => "The Astronaut's Voyage to <br> Explore the Stars", 'Astronaut_subtitle' => '', 'Img_url' => $imgLink . 'astronaut.webp', 'Category_ID' => 4, 'isDelete' => 'N'],
            ['Astronaut_title' => "Why Go to Space?", 'Astronaut_subtitle' => 'Exploring the universe, like exploring Earth, stems from the human desire to gain knowledge, find resources, and improve life.', 'Img_url' => $imgLink . 'why.jpg', 'Category_ID' => 4, 'isDelete' => 'N'],
            ['Astronaut_title' => "Spaceships and Rockets", 'Astronaut_subtitle' => 'Learn more about spaceships and rockets enabled by NASA.', 'Img_url' => $imgLink . 'spaceship.webp', 'Category_ID' => 4, 'isDelete' => 'N']
        ];
        
        $AstronautDetailsArray = [
            1 => [  // Chi tiết cho astronaut ID = 1
                [
                    'Astronaut_detail_header_text' => "Earth, Moon, and Mars",
                    'Astronaut_detail_header_subtext' => "With more than 20 years of operations in low Earth orbit, we are preparing our return to the Moon for long-term exploration and discovery before taking the next giant leap to Mars.",
                    'Astronaut_detail_sub_text' => "Never has humanity endeavored to simultaneously architect multinational infrastructures in lunar orbit, on the lunar surface, and at Mars — all while maintaining high-demand government and private-sector operations in low Earth orbit.",
                    'Astronaut_detail_img' => $imgLink . 'astronaut-1.jpg',
                    'Astronaut_detail_img_sub_text' => "On flight day 13, Orion reached its maximum distance from Earth during the Artemis I mission when it was 268,563 miles away from our home planet. Orion has now traveled farther than any other spacecraft built for humans.",
                    'Astronaut_detail_type' => 1
                ],
                
            ],
            2 => [  // Chi tiết cho astronaut ID = 2
                [
                    'Astronaut_detail_header_text' => "Human space exploration answers fundamental questions about our place in the universe and solar system history.",
                    'Astronaut_detail_header_subtext' => "Exploration of Jupiter and its moons is crucial for understanding our solar system.",
                    'Astronaut_detail_sub_text' => "Exploration vision is anchored in providing value for humanity by answering some of the most fundamental questions: Why are we here? How did it all begin? Are we alone? What comes next?",
                    'Astronaut_detail_img' => $imgLink . 'STSCI-H-p1829b-slideshow-2400x1200.jpg',
                    'Astronaut_detail_img_sub_text' => "This illustration shows Cassini spacecraft in orbit around Saturn. Cassini made 22 orbits that swooped between the rings and the planet before ending its mission on Sept. 15, 2017, with a final plunge into Saturn.",
                    'Astronaut_detail_type' => 1
                ]
            ],
            3 => [  // Chi tiết cho astronaut ID = 3
                [
                    'Astronaut_detail_header_text' => "Future Missions",
                    'Astronaut_detail_header_subtext' => "Exploring the possibilities of human presence on Mars.",
                    'Astronaut_detail_sub_text' => "Mars represents a new frontier for humanity, offering unique challenges and opportunities.",
                    'Astronaut_detail_img' => $imgLink . 'mars_exploration.jpg',
                    'Astronaut_detail_img_sub_text' => "Artist's concept of a Mars colony.",
                    'Astronaut_detail_type' => 1
                ]
            ]
        ];
        
        foreach ($Astronauts as $index => $astronaut) {
            $sql = "INSERT INTO Astronaut (Astronaut_title, Astronaut_subtitle, Img_url, Category_ID, isDelete) 
                    VALUES (:title, :sub_title, :imgUrl, :categoryId, :isDelete)";
            $stmt = $db->getConnection()->prepare($sql);
            $stmt->execute([
                'title' => $astronaut['Astronaut_title'],
                'sub_title' => $astronaut['Astronaut_subtitle'],
                'imgUrl' => $astronaut['Img_url'],
                'categoryId' => $astronaut['Category_ID'],
                'isDelete' => $astronaut['isDelete']
            ]);
        
            $astronautId = $db->getConnection()->lastInsertId();
        
            $AstronautDetails = $AstronautDetailsArray[$index + 1]; 
        
            foreach ($AstronautDetails as $detail) {
                $sqlDetail = "INSERT INTO Astronaut_detail (Astronaut_detail_header_text, Astronaut_detail_header_subtext, Astronaut_detail_sub_text, 
                              Astronaut_detail_img, Astronaut_detail_img_sub_text, Astronaut_ID, Astronaut_detail_type) 
                              VALUES (:header_text, :header_subtext, :sub_text, :img, :img_subtext, :astronaut_id, :detail_type)";
                
                $stmtDetail = $db->getConnection()->prepare($sqlDetail);
                $stmtDetail->execute([
                    'header_text' => $detail['Astronaut_detail_header_text'],
                    'header_subtext' => $detail['Astronaut_detail_header_subtext'],
                    'sub_text' => $detail['Astronaut_detail_sub_text'],
                    'img' => $detail['Astronaut_detail_img'],
                    'img_subtext' => $detail['Astronaut_detail_img_sub_text'],
                    'astronaut_id' => $astronautId,
                    'detail_type' => $detail['Astronaut_detail_type']
                ]);
        
                echo "Inserted astronaut detail for: " . $detail['Astronaut_detail_header_text'] . "<br>";
            }
        
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
