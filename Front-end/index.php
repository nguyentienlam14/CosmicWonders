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
    <!-- test -->
    <div class=" mt-5" id="astronaut">
      <?php
      include "C:/Xamp/htdocs/CosmicWonders/Back-end/Astronaunt/modals/insert_data.php";
      if (!empty($astronauts)) {
        $groupedAstronauts = [];

        foreach ($astronauts as $astronaut) {
          $astronautId = $astronaut['Astronaut_ID'];
          if (!isset($groupedAstronauts[$astronautId])) {
            $groupedAstronauts[$astronautId] = [
              'info' => [
                'Astronaut_title' => $astronaut['Astronaut_title'],
                'Astronaut_subtitle' => $astronaut['Astronaut_subtitle'],
                'Img_url' => $astronaut['Img_url'],
              ],
              'details' => []
            ];
          }
          $groupedAstronauts[$astronautId]['details'][$astronaut['Astronaut_detail_type']][] = [
            'header_text' => $astronaut['Astronaut_detail_header_text'],
            'header_subtext' => $astronaut['Astronaut_detail_header_subtext'],
            'sub_text' => $astronaut['Astronaut_detail_sub_text'],
            'img' => $astronaut['Astronaut_detail_img'],
            'img_sub_text' => $astronaut['Astronaut_detail_img_sub_text'],
          ];
        }

        foreach ($groupedAstronauts as $astronautId => $detailsByType) {
          echo '<div class="astronaut-wrapper">';
          $info = $detailsByType['info'];
          echo '<div class="astronaut-header p-relative start p-0">';
          echo '<img class="img-fluid" src="' . htmlspecialchars($info['Img_url']) . '" alt="">';
          echo '<div class="overlay"></div>';
          echo '<div class="astronaut-header-sub"><h2 class="fs-sm-5 fs-1">' . $info['Astronaut_title'] . '</h2><span>' . htmlspecialchars($info['Astronaut_subtitle']) . '</span></div>';
          echo '<button class="readmore">Read more <i class="bi bi-arrow-down-circle-fill"></i></button>';
          echo '</div>';

          foreach ($detailsByType['details'] as $detailType => $details) {
            echo '<div class="details type-' . htmlspecialchars($detailType) . ' p-3">';
            foreach ($details as $detail) {
              echo '<div class="destination row col-lg-8 col-12 me-auto m-lg-auto">';
              echo '<div class="col-lg-6 col-12 flex-column">';
              echo '<h4>' . htmlspecialchars($detail['header_text']) . '</h4>';
              echo '<h5>' . htmlspecialchars($detail['header_subtext']) . '</h5>';
              echo '<p>' . htmlspecialchars($detail['sub_text']) . '</p>';
              echo '</div>';
              echo '<div class="col-lg-6 col-12 flex-column text-start">';
              echo '<img class="img-fluid img-5x3" src="' . htmlspecialchars($detail['img']) . '" alt="">';
              echo '<p>' . htmlspecialchars($detail['img_sub_text']) . '</p>';
              echo '</div>';
              echo '</div>';
              if ($astronautId === 3) {
                include('C:/Xamp/htdocs/CosmicWonders/Back-end/Astronaunt/modals/addShip.php');
              } elseif ($astronautId === 4) {
                include('C:/Xamp/htdocs/CosmicWonders/Back-end/Astronaunt/modals/addStation.php');
              }
            }
            echo '</div>';
          }
          echo '</div>';
        }
      } else {
        echo "No astronauts found.<br>";
      }
      ?>
    </div>
    <!-- test -->
    <!-- start Astronaut -->


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