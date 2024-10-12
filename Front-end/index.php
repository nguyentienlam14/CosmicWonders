<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cosmic Wonders</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap"
    rel="stylesheet" />
  <!--Web-logo-->
  <link rel="shortcut icon" type="image/x-icon" href="./assets/img/logo/weblogo.png" />
  <!-- css -->
  <link rel="stylesheet" href="./css/index.css" />
  <link rel="stylesheet" href="./css/animation.css" />
</head>

<body>
  <!-- start header -->
  <header class="header">
    <nav class="navbar navbar-expand-xl bg-body-tertiary navbar-header ">
      <div class="container-fluid p-0">
        <div class="center col-4 justify-content-start">
          <img class="logo-img img-fluid h-auto" src="./assets/img/logo/weblogo.png" alt="" />
          <a class="d-none d-sm-flex navbar-brand" href="#">Cosmic Wonders</a>
        </div>
        <button class="navbar-toggler col-2 end" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <hr class="split-header d-md-none d-block" />
          <ul class="navbar-nav ms-lg-auto me-lg-0 me-auto ps-2~">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#event">Event</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#celestial">Celestial</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#cosmotechnology">Cosmotechnology</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#astronaut">Astronaut</a>
            </li>
            <li class="nav-item d-flex d-lg-none">
              <a href=""><button class="btn btn-dark" type="button">
                  Shop Now
                </button></a>
            </li>
          </ul>
          <form class="d-none d-xl-flex container-fluid ms-0 me-0 justify-content-start col-3">
            <a href=""><button class="btn btn-dark" type="button">Shop Now</button></a>
          </form>
        </div>
      </div>
    </nav>
    <div class="p-relative">
      <div class="overlay"></div>
      <video width="100%" height="600" autoplay loop muted>
        <source src="./assets/img/header/header_video.mp4" type="video/mp4" />
        Your browser does not support the video tag.
      </video>
      <div class="header_text">
        <h1>Cosmic Wonders</h1>
        <h2>Discover the Wonders of the Galaxy</h2>
      </div>
      <div class="header_btn center">
        <a href="#selection">
          <i class="bi bi-caret-down-fill"></i>
          <i class="bi bi-rocket-takeoff"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- finish header -->

  <div class="main-content container-fluid center flex-column">
    <!-- start general -->
    <div id="selection" class="row col-12 center flex-lg">
      <div class="col-lg-2 col-4 selection_img">
        <a href="3dtest.html"><img class="" src="./assets/img/body/planet_choose.jpg" alt="" /></a>
        <div class="text"><a href="3dtest.html">Planet<br>Simulation</a></div>
        <div class="text-icon">
          <a href="3dtest.html"><i class="bi bi-arrow-down-circle-fill"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-4 selection_img">
        <a href=""><img class="" src="./assets/img/body/start.jpg" alt="" /></a>
        <div class="text">
          <a href="#event">Cosmic<br>Event</a>
        </div>
        <div class="text-icon">
          <a href="#event"><i class="bi bi-arrow-down-circle-fill"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-4 selection_img">
        <a href=""><img class="" src="./assets/img/body/space.jpg" alt="" /></a>
        <div class="text"><a href="#celestial">Celestial</a></div>
        <div class="text-icon">
          <a href="#celestial"><i class="bi bi-arrow-down-circle-fill"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-4 selection_img">
        <a href=""><img class="" src="./assets/img/body/astronaut.webp" alt="" /></a>
        <div class="text"><a href="#astronaut">Astronaut</a></div>
        <div class="text-icon">
          <a href="#astronaut"><i class="bi bi-arrow-down-circle-fill"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-4 selection_img">
        <a href=""><img class="" src="./assets/img/body/Tàu vũ trụ.png" alt="" /></a>
        <div class="text">
          <a href="#cosmotechnology">Cosmic<br>technology</a>
        </div>
        <div class="text-icon">
          <a href="#cosmotechnology"><i class="bi bi-arrow-down-circle-fill"></i></a>
        </div>
      </div>
      
    </div>
    <!-- finish general -->

    <!-- start Event -->
    <div id="event"></div>
    <!-- finish Event -->

    <!-- start Celestial -->
    <div id="Celestial">
    </div>
    <!-- finish Celestial -->

    <!-- start Astronaut -->
    <div class=" mt-5" id="astronaut">
      <div class="astronaut-header p-relative start">
        <img class="img-fuild" src="assets/img/body/astronaut.webp" alt="">
        <div class="overlay"></div>
        <div class="astronaut-header-sub">
          <h2 class="fs-sm-5 fs-1">The Astronaut's Voyage to <br> Explore the Stars</h2>
          <span></span>
        </div>
        <button class="readmore">Read more <i class="bi bi-arrow-down-circle-fill"></i></button>
      </div>
      <div class="details p-3">
        <div class="destination row col-lg-8 col-12 me-auto m-lg-auto">
          <div class="col-lg-6 col-12 flex-column">
            <h4>Destinations</h4>
            <h2 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-md-1 fs-5 text-start">Earth, Moon, and Mars</h2>
            <h5 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-5 ">With more than 20 years of operations in low Earth orbit, we are
              preparing our
              return to the Moon for long-term exploration and discovery before taking the next giant leap to Mars.</h5>
            <span>Never has humanity endeavored to simultaneously architect multinational infrastructures in lunar
              orbit, on the lunar surface, and at Mars — all while maintaining high-demand government and private-sector
              operations in low Earth orbit.</span>
          </div>
          <div class="col-lg-6 col-12 flex-column text-start">
            <img class="img-fluid img-5x3" src="./assets/img/body/astronaut-1.jpg" alt="">
            <p>On flight day 13, Orion reached its maximum distance from Earth during the Artemis I mission when it was
              268,563 miles away from our home planet. Orion has now traveled farther than any other spacecraft built
              for humans.</p>
          </div>
        </div>
      </div>

      <div class="astronaut-header p-relative start">
        <img class="img-fuild" src="assets/img/body/why.jpg" alt="">
        <div class="overlay"></div>
        <div class="astronaut-header-sub">
          <h2 class="fs-lg-1 fs-2">Why Go to Space?</h2>
          <span class="fs-lg-1 fs-6">Exploring the universe, like exploring Earth, stems from the human desire to gain
            knowledge, find resources, and improve life.</span>
        </div>
        <button class="readmore">Read more <i class="bi bi-arrow-down-circle-fill"></i></button>
      </div>
      <div class="details p-3">
        <div class="destination row col-lg-8 col-12 m-auto">
          <div class="col-lg-6 col-12 flex-column text-start">
            <h4>Why Go to Space</h4>
            <h2 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-5">Human space exploration answers fundamental questions
              about our place in the universe and solar system history.</h2>```
            <h5 class="pt-md-3 pb-md-3 pt-1 pb-1 fs-lg-1 fs-5">Exploration of Jupiter and its moons is crucial for
              understanding our solar
              system.</h5>
            <span>Exploration vision is anchored in providing value for humanity by answering some of the most
              fundamental questions: Why are we here? How did it all begin? Are we alone? What comes next? </span>
          </div>
          <div class="col-lg-6 col-12 flex-column text-start">
            <img class="img-fluid" src="./assets/img/body/STSCI-H-p1829b-slideshow-2400x1200.jpg" alt="">
            <p>This illustration shows Cassini spacecraft in orbit around Saturn. Cassini made 22 orbits that swooped
              between the rings and the planet before ending its mission on Sept. 15, 2017, with a final plunge into
              Saturn.</p>
          </div>
        </div>
      </div>

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
                    <img class="img-fluid img-5x3" src="./assets/img/body/nasas-spacex-crew-2.webp" alt="">
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
                    <img class="img-fluid img-5x3" src="./assets/img/body/nasas-spacex-crew-2.webp" alt="">
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
                    <img class="img-fluid img-5x3" src="./assets/img/body/nasas-spacex-crew-2.webp" alt="">
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
              <img class="img-fluid img-5x3" src="./assets/img/body/station-0.jpg" alt="">
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
                    <img class="img-fluid img-5x3" src="./assets/img/body/nasas-spacex-crew-2.webp" alt="">
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
                    <img class="img-fluid img-5x3" src="./assets/img/body/nasas-spacex-crew-2.webp" alt="">
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
                    <img class="img-fluid img-5x3" src="./assets/img/body/nasas-spacex-crew-2.webp" alt="">
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
                <span>Humanity's home and laboratory off Earth.</span>
                <a class="readmore2" data-bs-toggle="modal" data-bs-target="#stationModal"
                  data-bs-title="International Space Station"
                  data-bs-content="The International Space Station (ISS) is a habitable artificial satellite that orbits Earth. It serves as a microgravity and space environment research laboratory in which scientific research is conducted in astrobiology, astronomy, meteorology, and other fields.">Read
                  more <i class="bi bi-arrow-down-circle-fill"></i></a>
              </div>
              <div class="p-1 col-xl-4 col-md-6 col-12 d-flex flex-column p-0">
                <img class="img-fluid" src="./assets/img/body/station-1.webp" alt="">
                <h5>Tiangong Space Station</h5>
                <span>China's modular space station.</span>
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
                  data-bs-content="Skylab was the United States' first space station. It was launched in 1973 and was operational for 6 years, serving as a microgravity laboratory and living space for astronauts.">Read
                  more <i class="bi bi-arrow-down-circle-fill"></i></a>
              </div>
            </div>
          </div>
          </div>
      </div>
      </div>
      <!-- Modal -->
      <div class="custom-overlay" id="overlay"></div>
      <div class="modal m-auto fade" id="stationModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">Thông Tin Trạm</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
            </div>
            <div class="modal-body">
              <div class="row center justify-content-lg-start pt-5">
                <img class="img-fluid w-lg-50 col-lg-6 col-12 mb-auto"
                  src="./assets/img/body/International-Space-Station-in-2021.webp" alt="">
                <div class="col-lg-6 col-12 mb-auto fs-4">
                  <p><strong>Tên Trạm: Trạm Khí Tượng ABC</strong></p>
                  <p>Địa chỉ: 123 Đường XYZ, Thành phố HCM</p>
                  <p>Loại Trạm: Khí Tượng</p>
                  <p>Thông Tin Liên Hệ: 0123 456 789</p>
                  <p>Mô Tả: Trạm khí tượng ABC cung cấp dữ liệu về thời tiết, nhiệt độ, độ ẩm và các
                    điều kiện khí hậu khác trong khu vực.</p>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
          </div>
        </div>
      </div>
      <!-- finish Astronaut -->

    </div>

    <!-- start footer -->
    <footer id="footer"></footer>
    <!-- finish footer -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
    <script src="./js/star.js"></script>
</body>

</html>