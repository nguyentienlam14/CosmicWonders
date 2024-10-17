<?php
include 'C:/xampp/htdocs/CosmicWonders/BackEnd/config.php';

if ($conn === null) {
    die("Failed to connect to the database.");
}
function insertSampleData($conn)
{
    $imgLink = "http://localhost/CosmicWonders/FrontEnd/assets/img/body/";
    try {
        $sampleCategories = [
            ['Name' => 'Planet<br>Simulation', 'Img_url' => $imgLink . '/planet_choose.jpg', 'isDelete' => 'N'],
            ['Name' => 'Cosmic<br>Event', 'Img_url' => $imgLink . '/planet_choose.jpg', 'isDelete' => 'N'],
            ['Name' => 'Celestial', 'Img_url' => $imgLink . '/start.jpg', 'isDelete' => 'N'],
            ['Name' => 'Astronaut', 'Img_url' => $imgLink . '/astronaut.webp', 'isDelete' => 'N'],
            ['Name' => 'Cosmic<br>technology', 'Img_url' => $imgLink . '/space.jpg', 'isDelete' => 'N'],
        ];

        foreach ($sampleCategories as $category) {
            $sql = "INSERT INTO Category (Name, Img_url, isDelete) VALUES (:name, :imgUrl, :isDelete)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['name' => $category['Name'], 'imgUrl' => $category['Img_url'], 'isDelete' => $category['isDelete']]);
            echo "Inserted category: " . $category['Name'] . "<br>";
        }
        $spaceships = [
            [
                'Spaceships_name' => 'Falcon 9',
                'Spaceships_title' => 'The Workhorse of SpaceX',
                'Spaceships_description' => 'Falcon 9 is a partially reusable rocket designed and manufactured by SpaceX.',
                'Spaceships_image' => $imgLink . '/Falcon-9.jfif',
                'Spaceships_details' => 'It was first launched in 2010 and has become the most frequently used rocket in history.',
                'Spaceships_caption' => 'Falcon 9 is known for its reliability and cost-effectiveness.',
                'isDelete' => 'N'
            ],
            [
                'Spaceships_name' => 'Atlas V',
                'Spaceships_title' => 'A Proven Launch Vehicle',
                'Spaceships_description' => 'Atlas V is an expendable launch vehicle designed to deliver payloads to various orbits.',
                'Spaceships_image' => $imgLink . '/Atlas_V.jfif',
                'Spaceships_details' => 'Launched by United Launch Alliance, it has been in service since 2002.',
                'Spaceships_caption' => 'Atlas V is renowned for its high success rate and versatility.',
                'isDelete' => 'N'
            ],
            [
                'Spaceships_name' => 'Ariane 5',
                'Spaceships_title' => 'Europe’s Heavy-Lift Champion',
                'Spaceships_description' => 'Ariane 5 is an expendable launch vehicle used to deploy satellites into orbit.',
                'Spaceships_image' => $imgLink . '/Ariane5.jpg',
                'Spaceships_details' => 'Since its maiden flight in 1996, it has successfully launched numerous commercial satellites.',
                'Spaceships_caption' => 'Ariane 5 is known for its payload capacity and reliability.',
                'isDelete' => 'N'
            ],
            [
                'Spaceships_name' => 'Soyuz',
                'Spaceships_title' => 'The Workhorse of Russian Space',
                'Spaceships_description' => 'Soyuz is a family of rockets that have been used for crewed and uncrewed missions since the 1960s.',
                'Spaceships_image' => $imgLink . '/Soyuz.webp',
                'Spaceships_details' => 'The Soyuz program continues to evolve, maintaining a strong track record in human spaceflight.',
                'Spaceships_caption' => 'Soyuz is famous for its reliability and extensive usage in space exploration.',
                'isDelete' => 'N'
            ],
            [
                'Spaceships_name' => 'Space Launch System (SLS)',
                'Spaceships_title' => 'NASA’s Next Generation Rocket',
                'Spaceships_description' => 'SLS is designed to be the most powerful rocket ever built, aimed at deep space exploration.',
                'Spaceships_image' => $imgLink . '/SLS.jpg',
                'Spaceships_details' => 'It is expected to play a key role in NASA’s Artemis program to return humans to the Moon.',
                'Spaceships_caption' => 'SLS is pivotal for future human exploration of Mars and beyond.',
                'isDelete' => 'N'
            ]
        ];


        foreach ($spaceships as $spaceship) {
            $sql = "INSERT INTO Spaceships (Spaceships_name, Spaceships_title, Spaceships_description, Spaceships_image, Spaceships_details, Spaceships_caption, isDelete) 
                    VALUES (:name, :title, :description, :image, :details, :caption, :isDelete)";
            $stmt = $conn->prepare($sql);
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
                'Stations_image' => $imgLink . '/station-1.webp',
                'Stations_details' => 'The ISS was launched in 1998 and is a joint project of five space agencies.',
                'Stations_caption' => 'The ISS serves as a microgravity and space environment research laboratory.',
                'isDelete' => 'N'
            ],
            [
                'Stations_name' => 'Tiangong Space Station',
                'Stations_title' => 'China’s Space Ambition',
                'Stations_description' => 'The Tiangong Space Station is China’s effort to maintain a permanent presence in space.',
                'Stations_image' => $imgLink . '/station-2.webp',
                'Stations_details' => 'Launched in 2021, it represents China’s advancement in space technology.',
                'Stations_caption' => 'Tiangong is a symbol of China’s growing capabilities in space exploration.',
                'isDelete' => 'N'
            ],
            [
                'Stations_name' => 'Mir Space Station',
                'Stations_title' => 'A Soviet-Russian Space Legacy',
                'Stations_description' => 'Mir was a space station operated by Russia from 1986 to 2001.',
                'Stations_image' => $imgLink . '/station-3.webp',
                'Stations_details' => 'It set records for the longest continuous human presence in space before the ISS.',
                'Stations_caption' => 'Mir contributed to space science for over 15 years.',
                'isDelete' => 'N'
            ],
            [
                'Stations_name' => 'Salyut Space Station',
                'Stations_title' => 'The Pioneer of Soviet Space Stations',
                'Stations_description' => 'Salyut was a series of space stations launched by the Soviet Union.',
                'Stations_image' => $imgLink . '/salyut.jpg',
                'Stations_details' => 'Active from 1971 to 1986, it was used for scientific and military purposes.',
                'Stations_caption' => 'Salyut paved the way for future long-term space stations.',
                'isDelete' => 'N'
            ],
            [
                'Stations_name' => 'Skylab Space Station',
                'Stations_title' => 'America’s First Space Station',
                'Stations_description' => 'Skylab was the United States’ first space station, launched in 1973.',
                'Stations_image' => $imgLink . '/Skylab.jpg',
                'Stations_details' => 'Skylab was used for scientific experiments and solar observations.',
                'Stations_caption' => 'Skylab was a key milestone in U.S. space exploration before the ISS.',
                'isDelete' => 'N'
            ]

        ];

        foreach ($stations as $station) {
            $sql = "INSERT INTO Stations (Stations_name, Stations_title, Stations_description, Stations_image, Stations_details, Stations_caption, isDelete) 
                    VALUES (:name, :title, :description, :image, :details, :caption, :isDelete)";

            $stmt = $conn->prepare($sql);
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
            ['Astronaut_title' => "Spaceships and Rockets", 'Astronaut_subtitle' => 'Learn more about spaceships and rockets enabled by NASA.', 'Img_url' => $imgLink . 'spaceship.webp', 'Category_ID' => 4, 'isDelete' => 'N'],
            ['Astronaut_title' => "Orion Spacecraft", 'Astronaut_subtitle' => 'The reasons to explore the universe are as varied as those for exploring Earth: to learn, discover resources, and improve life.', 'Img_url' => $imgLink . 'staion-bg.webp', 'Category_ID' => 4, 'isDelete' => 'N']
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
                    'Astronaut_detail_header_text' => "What is a rocket ?",
                    'Astronaut_detail_header_subtext' => "A rocket is used to carry a spacecraft from Earth’s surface to space, usually to low Earth orbit or beyond, and is sometimes called a launch vehicle.",
                    'Astronaut_detail_sub_text' => "Although rockets may appear similar, no two are alike because they are complex devices with millions of pieces and systems that must be calculated and constructed to work together. A rocket is chosen based on the spacecraft’s mission requirements. For example, the farther away from Earth the spacecraft needs to go, the bigger and more powerful the rocket needs to be.",
                    'Astronaut_detail_img' => $imgLink . 'rocket-launch-at-sunset.jpg',
                    'Astronaut_detail_img_sub_text' => "A United Launch Alliance Atlas V rocket with the Lucy spacecraft aboard is seen in this 2 minute and 30 second exposure photograph as it launches from Space Launch Complex 41, Saturday, Oct. 16, 2021, at Cape Canaveral Space Force Station in Florida. NASA/Bill Ingalls",
                    'Astronaut_detail_type' => 1
                ]
            ],
            4 => [  // Chi tiết cho astronaut ID = 4
                [
                    'Astronaut_detail_header_text' => "What is a spacecraft?",
                    'Astronaut_detail_header_subtext' => "A spacecraft is a vehicle that flies in space. It can carry astronauts, cargo, or instruments to their destination, or it can be the destination. The International Space Station is a spacecraft, just like the smaller vehicles that deliver crew and cargo to it.",
                    'Astronaut_detail_sub_text' => "Spacecraft launch on rockets and have their own propulsion and navigation systems that take over after they separate from the rocket, propelling them to other worlds in our solar system. Their main purpose lies in transporting payloads — or anything within the vehicle beyond what is essential to operate in space — to their destination. For example, for the Artemis II Moon mission, a human crew and other experiments will be carried aboard the Orion spacecraft.",
                    'Astronaut_detail_img' => $imgLink . 'station-0.jpg',
                    'Astronaut_detail_img_sub_text' => "This illustration shows Cassini spacecraft in orbit around Saturn. Cassini made 22 orbits that swooped between the rings and the planet before ending its mission on Sept. 15, 2017, with a final plunge into Saturn.",
                    'Astronaut_detail_type' => 1
                ]
            ]
        ];

        foreach ($Astronauts as $index => $astronaut) {
            $sql = "INSERT INTO Astronaut (Astronaut_title, Astronaut_subtitle, Img_url, Category_ID, isDelete) 
                    VALUES (:title, :sub_title, :imgUrl, :categoryId, :isDelete)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'title' => $astronaut['Astronaut_title'],
                'sub_title' => $astronaut['Astronaut_subtitle'],
                'imgUrl' => $astronaut['Img_url'],
                'categoryId' => $astronaut['Category_ID'],
                'isDelete' => $astronaut['isDelete']
            ]);

            $astronautId = $conn->lastInsertId();

            $AstronautDetails = $AstronautDetailsArray[$index + 1];

            foreach ($AstronautDetails as $detail) {
                $sqlDetail = "INSERT INTO Astronaut_detail (Astronaut_detail_header_text, Astronaut_detail_header_subtext, Astronaut_detail_sub_text, 
                              Astronaut_detail_img, Astronaut_detail_img_sub_text, Astronaut_ID, Astronaut_detail_type) 
                              VALUES (:header_text, :header_subtext, :sub_text, :img, :img_subtext, :astronaut_id, :detail_type)";

                $stmtDetail = $conn->prepare($sqlDetail);
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


insertSampleData($conn); // Gọi hàm với kết nối
$conn = null;
?>