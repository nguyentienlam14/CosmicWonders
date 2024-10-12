<?php
    $sql = "SELECT * FROM Astronaut_detail";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    $astronauts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($astronauts as $astronaut){
        if($astronaut['Astronaut_detail_type'] === 1){
            echo '
                <div class="astronaut-header p-relative start">
                    <div class="overlay"></div>
                    <h2 class="fs-sm-5 fs-1"> '.$astronaut['Astronaut_title'].'</h2>
                    <button class="readmore">Read more <i class="bi bi-arrow-down-circle-fill"></i></button>
                </div>
                <div class="details p-3">
                    <div class="destination row col-lg-8 col-12 me-auto m-lg-auto">
                        <div class="col-lg-6 col-12 flex-column">
                            <h4>'.$astronaut['Astronaut_title'] .'</h4>';
                            $sql = "SELECT a.Astronaut_title, ad.Astronaut_detail_header_text, ad.Astronaut_Large_Size
                                    FROM Astronaut a
                                    JOIN Astronaut_detail ad ON a.Astronaut_ID = ad.Astronaut_ID";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $destinationSql = "SELECT * FROM Astronaut_destinations WHERE astronaut_id = :astronaut_id";
                            $destinationStmt = $conn->prepare($destinationSql);
                            $destinationStmt->bindParam(':astronaut_id', $astronaut['id']);
                            $destinationStmt->execute();
                            
                            $destinations = $destinationStmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($destinations as $destination) {
                                echo '
                                    <h2 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-md-1 fs-5 text-start">' . htmlspecialchars($destination['name']) . '</h2>
                                    <h5 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-5">' . htmlspecialchars($destination['description']) . '</h5>
                                ';
                            }
                            echo '
                                        </div>
                                        <div class="col-lg-6 col-12 flex-column text-start">
                                            <img class="img-fluid img-5x3" src="./assets/img/body/astronaut-1.jpg" alt="">
                                            <p>On flight day 13, Orion reached its maximum distance from Earth during the Artemis I mission when it was
                                            268,563 miles away from our home planet. Orion has now traveled farther than any other spacecraft built
                                            for humans.</p>
                                        </div>
                                    </div>
                                </div>
                            ';
        }elseif($astronaut['Astronaut_detail_type'] === 2){
            echo'
                <div id="cosmotechnology" class="astronaut-header p-relative start">
                    <img class="img-fuild" src="assets/img/body/spaceship.webp" alt="">
                    <div class="overlay"></div>
                    <div class="astronaut-header-sub">
                    <h2 class="fs-lg-1 fs-2">Spaceships and Rockets</h2>
                    <span class="fs-lg-1 fs-6">Learn more about spaceships and rockets enabled by NASA.</span>
                    </div>
                    <button class="readmore">Read more <i class="bi bi-arrow-down-circle-fill"></i></button>
                </div>
                <div class="details p-3">
                    <div class="destination row col-lg-9 m-auto">
                    <div class="row mt-lg-5 mb-lg-5 m-0">
                        <div class="col-lg-6 col-12 flex-column text-justify">
                        <h4 class=" text-start">Spaceships and Rockets</h4>
                        <h2 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-5 text-start">What is a rocket?</h2>
                        <h5 class="pt-3 pb-3 fs-5 text-justify">A rocket is used to carry a spacecraft from Earth’s surface to
                            space, usually
                            to low Earth orbit or beyond, and is sometimes called a launch vehicle.</h5>
                        <span class="fs-lg-1 fs-6">Although rockets may appear similar, no two are alike because they are complex
                            devices with millions
                            of pieces and systems that must be calculated and constructed to work together. A rocket is chosen based
                            on the spacecraft’s mission requirements. For example, the farther away from Earth the spacecraft needs
                            to go, the bigger and more powerful the rocket needs to be.</span>
                        </div>
                        <div class="col-lg-6 col-12 flex-column text-start">
                        <img class="img-fluid img-5x3" src="./assets/img/body/lucy-launch.webp" alt="">
                        <p class="text-justify">A United Launch Alliance Atlas V rocket with the Lucy spacecraft aboard is seen in
                            this 2 minute and 30
                            second exposure photograph as it launches from Space Launch Complex 41, Saturday, Oct. 16, 2021, at Cape
                            Canaveral Space Force Station in Florida.
                            NASA/Bill Ingalls</p>
                        </div>
                    </div>
                    <!-- spaceship -->
                    <div id="spaceship" class="space-list">
                        <div class="ship_categories">
                        <div class="category flex-lg-row flex-column">
                            <button class="col-12 col-lg-3" data-target="#ships-1">Crew Rockets</button>
                            <button class="col-12 col-lg-3" data-target="#ships-2">Resupply Rockets</button>
                            <button class="col-12 col-lg-3" data-target="#ships-3">Unmanned Rocket</button>
                        </div>
                        </div>
                        <hr>
                        <div class="ship-list">
                        <div id="ships-1" class="ship">
                            <div class="row center">
                            <div class="col-lg-6 col-12">
                                <h4>Commercial Crew Rockets</h4>
                                <h2 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-5">These commercial rockets are launching crews to
                                low Earth orbit through
                                partnerships with NASA.</h2>
                                <span class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-6">A new generation of rockets capable of carrying
                                astronauts to low Earth
                                orbit and the International Space Station provides expanded utility, additional research time, and
                                broader opportunities for discovery on the orbiting laboratory.</span>
                            </div>
                            <div class="col-lg-6 col-12">
                                <img class="img-fluid w-100 h-auto" src="./assets/img/body/nasas-spacex-crew-2.webp" alt="">
                                <p>With a view of the iconic Vehicle Assembly Building at left, a SpaceX Falcon 9 rocket soars
                                upward from Launch Complex 39A at NASA’s Kennedy Space Center in Florida on April 23, 2021,
                                carrying the company’s Crew Dragon Endeavour capsule.</p>
                            </div>
                            </div>
                        </div>
                        <div id="ships-2" class="ship">
                            <div class="row center">
                            <div class="col-lg-6 col-12">
                                <h4>Commercial Resupply Rockets</h4>
                                <h2 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-5">These commercial rockets are launching crews to
                                low Earth orbit through
                                partnerships with NASA.</h2>
                                <span class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-6">A new generation of rockets capable of carrying
                                astronauts to low Earth
                                orbit and the International Space Station provides expanded utility, additional research time, and
                                broader opportunities for discovery on the orbiting laboratory.</span>
                            </div>
                            <div class="col-lg-6 col-12">
                                <img class="img-fluid w-100 h-auto" src="./assets/img/body/nasas-spacex-crew-2.webp" alt="">
                                <p>With a view of the iconic Vehicle Assembly Building at left, a SpaceX Falcon 9 rocket soars
                                upward from Launch Complex 39A at NASA’s Kennedy Space Center in Florida on April 23, 2021,
                                carrying the company’s Crew Dragon Endeavour capsule.</p>
                            </div>
                            </div>
                        </div>
                        <div id="ships-3" class="ship">
                            <div class="row center">
                            <div class="col-lg-6 col-12">
                                <h4>Unmanned Rocket</h4>
                                <h2 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-5">These commercial rockets are launching crews to
                                low Earth orbit through
                                partnerships with NASA.</h2>
                                <span class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-6">A new generation of rockets capable of carrying
                                astronauts to low Earth
                                orbit and the International Space Station provides expanded utility, additional research time, and
                                broader opportunities for discovery on the orbiting laboratory.</span>
                            </div>
                            <div class="col-lg-6 col-12">
                                <img class="img-fluid w-100 h-auto" src="./assets/img/body/nasas-spacex-crew-2.webp" alt="">
                                <p>With a view of the iconic Vehicle Assembly Building at left, a SpaceX Falcon 9 rocket soars
                                upward from Launch Complex 39A at NASA’s Kennedy Space Center in Florida on April 23, 2021,
                                carrying the company’s Crew Dragon Endeavour capsule.</p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <hr>
                    <div class="astronaut-header p-relative start">
                        <img class="img-fuild" src="assets/img/body/staion-bg.webp" alt="">
                        <div class="overlay"></div>
                        <div class="astronaut-header-sub">
                        <h2>Orion Spacecraft</h2>
                        <span>The reasons to explore the universe are as varied as those for exploring Earth: to learn, discover
                            resources, and improve life.</span>
                        </div>
                    </div>
                    <div class="destination d-flex flex-lg-row flex-column mt-5">
                        <div class="col-lg-6 col-12">
                        <h4>Spaceships and Rockets</h4>
                        <h2 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-5">What is a spacecraft?</h2>
                        <h4 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-6">A spacecraft is a vehicle that flies in space. It can
                            carry astronauts, cargo, or instruments to their destination, or it can be the destination. The
                            International Space Station is a spacecraft, just like the smaller vehicles that deliver crew and cargo
                            to it.</h4>
                        <span class="text-justify">Spacecraft launch on rockets and have their own propulsion and navigation
                            systems that take over after they separate from the rocket, propelling them to other worlds in our solar
                            system. Their main purpose lies in transporting payloads — or anything within the vehicle beyond what is
                            essential to operate in space — to their destination. For example, for the Artemis II Moon mission, a
                            human crew and other experiments will be carried aboard the Orion spacecraft.</span>
                        </div>
                        <div class="col-lg-6 col-12">
                        <img class="img-fluid" src="./assets/img/body/station-0.jpg" alt="">
                        <p class="text-justify">This illustration shows Cassini spacecraft in orbit around Saturn. Cassini made 22
                            orbits that swooped
                            between the rings and the planet before ending its mission on Sept. 15, 2017, with a final plunge into
                            Saturn.</p>
                        </div>
                    </div>

                    <!-- station -->
                    <div id="station" class="space-list mt-5">
                        <div class="ship_categories">
                        <div class="category2 d-md-block d-flex flex-lg-row flex-column">
                            <button data-target="#station-1">Cargo Spacecraft</button>
                            <button data-target="#station-2">Crew Spacecraft</button>
                            <button data-target="#station-3">International Partner</button>
                        </div>
                        </div>
                        <hr>
                        <div class="station-list">
                        <div id="station-1" class="station">
                            <div class="row center">
                            <div class="col-lg-6 col-12">
                                <h4>Commercial Cargo Spacecraft</h4>
                                <h2 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-5">These commercial rockets are launching crews to
                                low Earth orbit through
                                partnerstation with NASA.</h2>
                                <span class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-6 text-justify">A new generation of rockets
                                capable of carrying astronauts to low Earth
                                orbit and the International Space Station provides expanded utility, additional research time, and
                                broader opportunities for discovery on the orbiting laboratory.</span>
                            </div>
                            <div class="col-lg-6 col-12">
                                <img class="img-fluid w-100 h-auto" src="./assets/img/body/nasas-spacex-crew-2.webp" alt="">
                                <p class="text-justify">With a view of the iconic Vehicle Assembly Building at left, a SpaceX Falcon
                                9 rocket soars
                                upward from Launch Complex 39A at NASA’s Kennedy Space Center in Florida on April 23, 2021,
                                carrying the company’s Crew Dragon Endeavour capsule.</p>
                            </div>
                            </div>
                        </div>
                        <div id="station-2" class="station">
                            <div class="row center">
                            <div class="col-lg-6 col-12">
                                <h4>Commercial Crew Spacecraft</h4>
                                <h2 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-5">These commercial rockets are launching crews to
                                low Earth orbit through
                                partnerstation with NASA.</h2>
                                <span class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-6">A new generation of rockets capable of carrying
                                astronauts to low Earth
                                orbit and the International Space Station provides expanded utility, additional research time, and
                                broader opportunities for discovery on the orbiting laboratory.</span>
                            </div>
                            <div class="col-lg-6 col-12">
                                <img class="img-fluid w-100 h-auto" src="./assets/img/body/nasas-spacex-crew-2.webp" alt="">
                                <p>With a view of the iconic Vehicle Assembly Building at left, a SpaceX Falcon 9 rocket soars
                                upward from Launch Complex 39A at NASA’s Kennedy Space Center in Florida on April 23, 2021,
                                carrying the company’s Crew Dragon Endeavour capsule.</p>
                            </div>
                            </div>
                        </div>
                        <div id="station-3" class="station">
                            <div class="row center">
                            <div class="col-lg-6 col-12">
                                <h4>International Partner Rockets and Spacecraft</h4>
                                <h2 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-5">These commercial rockets are launching crews to
                                low Earth orbit through
                                partnerships with NASA.</h2>
                                <span class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-6">A new generation of rockets capable of carrying
                                astronauts to low Earth
                                orbit and the International Space Station provides expanded utility, additional research time, and
                                broader opportunities for discovery on the orbiting laboratory.</span>
                            </div>
                            <div class="col-lg-6 col-12">
                                <img class="img-fluid w-100 h-auto" src="./assets/img/body/nasas-spacex-crew-2.webp" alt="">
                                <p>With a view of the iconic Vehicle Assembly Building at left, a SpaceX Falcon 9 rocket soars
                                upward from Launch Complex 39A at NASA’s Kennedy Space Center in Florida on April 23, 2021,
                                carrying the company’s Crew Dragon Endeavour capsule.</p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="stations col-12">
                        <h2>Space Stations</h2>
                        <span>From low Earth orbit to the Moon, these space stations are the ultimate homes away from home.</span>
                        <div class="row center justify-content-between mt-5">
                        <div class="p-1 col-xl-4 col-md-6 col-md-6 col-12 d-flex flex-column p-0">
                            <img class="img-fluid" src="./assets/img/body/station-1.webp" alt="">
                            <h5>International Space Station</h5>
                            <span>Humanity’s home and laboratory off Earth.</span>
                            <a class="readmore2" data-bs-toggle="modal" data-bs-target="#stationModal"
                            data-bs-title="International Space Station"
                            data-bs-content="The International Space Station (ISS) is a habitable artificial satellite that orbits Earth. It serves as a microgravity and space environment research laboratory in which scientific research is conducted in astrobiology, astronomy, meteorology, and other fields.">Read
                            more <i class="bi bi-arrow-down-circle-fill"></i></a>
                        </div>
                        <div class="p-1 col-xl-4 col-md-6 col-12 d-flex flex-column p-0">
                            <img class="img-fluid" src="./assets/img/body/station-1.webp" alt="">
                            <h5>Tiangong Space Station</h5>
                            <span>China’s modular space station.</span>
                            <a class="readmore2" data-bs-toggle="modal" data-bs-target="#stationModal"
                            data-bs-title="Tiangong Space Station"
                            data-bs-content="The Tiangong space station is a modular space station being constructed in low Earth orbit by China. It will be able to accommodate three astronauts and be operational for at least ten years.">Read
                            more <i class="bi bi-arrow-down-circle-fill"></i></a>
                        </div>
                        <div class="p-1 col-xl-4 col-md-6 col-12 d-flex flex-column p-0">
                            <img class="img-fluid" src="./assets/img/body/station-1.webp" alt="">
                            <h5>Skylab</h5>
                            <span>The first American space station.</span>
                            <a class="readmore2" data-bs-toggle="modal" data-bs-target="#stationModal" data-bs-title="Skylab"
                            data-bs-content="Skylab was the United States’ first space station. It was launched in 1973 and was operational for 6 years, serving as a microgravity laboratory and living space for astronauts.">Read
                            more <i class="bi bi-arrow-down-circle-fill"></i></a>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            ';
        }else{
            echo'không bé ơi';
        }
    }

?>