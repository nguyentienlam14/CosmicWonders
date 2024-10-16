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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!--Web-logo-->
  <link rel="shortcut icon" type="image/x-icon" href="./assets/img/logo/weblogo.png" />
  <!-- css -->
  <link rel="stylesheet" href="./css/index.css" />
  <link rel="stylesheet" href="./css/animation.css" />
</head>

<body>
  <!-- start header -->
  <header class="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-header ">
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
          <ul class="navbar-nav ms-lg-auto me-lg-0 me-auto">
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
          <a href="#event">Cosmic<br />Event</a>
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
          <a href="#cosmotechnology">Cosmic<br />technology</a>
        </div>
        <div class="text-icon">
          <a href="#cosmotechnology"><i class="bi bi-arrow-down-circle-fill"></i></a>
        </div>
      </div>

    </div>
    <!-- finish general -->

    <!-- start Event -->
    <?php include 'C:\xampp\htdocs\CosmicWonders\BackEnd\Events\events.php'; ?>
    <div class="main-content container-fluid">
      <div id="events">
        <h1 class="text-center">EVENTS</h1>
        <hr>
        <?php foreach ($events as $event): ?>
          <div id="bigbang" class="container-fluid">
            <div class="bb_content container-fluid">
              <div class="bb_content">
                <div class="bb_header row text-start" style="background-image: url('../BackEnd/uploads/<?php echo htmlspecialchars( $event['Img_url']); ?>');">
                  <div class="col-12">
                    <h2 class="m-0"><?= $event['Event_title'] ?></h2>
                    <div class="text1"><?= $event['Event_sub_text'] ?></div>
                  </div>

                  <!-- Button Read More -->
                  <div class="col-12 mt-2">
                    <button class="btn btn-sm readMoreBtn" id="toggleBtn_<?= $event['Event_ID'] ?>">
                      Read More <i class="fas fa-chevron-down"></i>
                    </button>
                  </div>
                </div>

                <div class="bb_body p-5 d-none" id="bbBody_<?= $event['Event_ID'] ?>" style="width: 100%;">
                  <div class="row">
                    <div class="col-12 col-md-3">
                      <ul class="bb_menu_list">
                        <li>Content</li>
                        <?php foreach ($event['details'] as $detail): ?>
                          <li><a href="#detail_<?= $detail['Event_detail_ID'] ?>"><?= $detail['Event_detail_title'] ?></a></li>
                        <?php endforeach; ?>
                      </ul>
                    </div>

                    <!-- Nội dung chi tiết -->
                    <div class="col-12 col-md-9">
                      <?php foreach ($event['details'] as $detail): ?>
                        <div class="row">
                          <div id="detail_<?= $detail['Event_detail_ID'] ?>">
                            <!-- Hiển thị tiêu đề chi tiết sự kiện -->
                            <h3><?= $detail['Event_detail_title'] ?></h3>
                            <!-- Hiển thị mô tả phụ -->
                            <p><?= $detail['Event_detail_sub_text'] ?></p>

                            <!-- Hiển thị hình ảnh nếu có -->
                            <?php if (!empty($detail['Event_detail_img'])): ?>
                              <img class="img-fluid" src='../BackEnd/uploads/<?php echo htmlspecialchars($detail['Event_detail_img']); ?>' alt="<?= $detail['Event_detail_title'] ?>">
                              <!-- <img src='../../BackEnd/" . htmlspecialchars($row['Event_detail_img'] ?? '') . "' alt='Event Image' width='100' height='100'> -->
                            <?php endif; ?>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- finish Event -->

    <!-- start Celestial -->
    <?php
    include '../BackEnd/Celestial/fetch_celestial_data.php';
    ?>
    <div id="celestial"
      class="container title-summary rounded min-vh-100"
      style="background-color: rgba(224, 217, 217, 0.3); max-width: 100%">
      <div class="row">
        <h1
          class="mt-5 mb-5 text-center"
          style="color: white; font-weight: 700;">
          Stars Stories
        </h1>
        <div class="col-md-3 mb-2 sticky-filter" id="filter-section">
          <div class="card m-auto">
            <div
              class="card-header d-flex justify-content-between align-items-center">
              <span style="font-weight: 500; font-size: 15px">Which star and planet do you want to explore?</span>
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedStar"
                aria-controls="navbarSupportedStar"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <i
                  class="bi bi-filter-square-fill"
                  style="font-size: 20px"></i>
              </button>
            </div>
            <div class="card-body">
              <input
                type="text"
                class="form-control mb-3"
                placeholder="Search"
                id="search-input" />
              <ul class="list-unstyled collapse" id="navbarSupportedStar">
                <li class="mb-2">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    id="planet" />
                  <label class="form-check-label" for="planet">Planet</label>
                </li>
                <li class="mb-2">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    id="stars" />
                  <label class="form-check-label" for="stars">Stars</label>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="row">
            <p id="no-result-message" style="display: none; color: red;">Dữ liệu bạn đang tìm kiếm không tìm thấy hoặc đang cập nhật</p>
            <?php foreach ($results as $row): ?>
              <div class="col-md-4 mb-3">
                <div class="card card-content <?php echo strtolower($row['Celestial_type']); ?>">
                  <img src='../BackEnd/uploads/<?php echo htmlspecialchars($row['Celestial_detail_img']); ?>' class="card-img-top" alt="<?php echo htmlspecialchars($row['Celestial_detail_title']); ?>">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($row['Celestial_detail_title']); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($row['Celestial_detail_sub']); ?></p>
                    <a href="#" class="btn btn-primary btn-content-readmore"
                      data-bs-toggle="modal"
                      data-bs-target="#titleDetailModal"
                      data-title="<?php echo htmlspecialchars($row['Celestial_detail_title']); ?>"
                      data-sub-title="<?php echo htmlspecialchars($row['Celestial_detail_sub']); ?>"
                      data-img="../BackEnd/uploads/<?php echo htmlspecialchars($row['Celestial_detail_img']); ?>"
                      data-discovery="<?php echo htmlspecialchars($row['Celestial_discovery_date']); ?>"
                      data-size="<?php echo htmlspecialchars($row['Celestial_size']); ?>"
                      data-ozone="<?php echo htmlspecialchars($row['Celestial_ozone']); ?>"
                      data-distance="<?php echo htmlspecialchars($row['Celestial_distance_s_e']); ?>"
                      data-other-details="<?php echo htmlspecialchars($row['Other_details']); ?>"
                      data-created-at="<?php echo htmlspecialchars($row['created_at']); ?>">Read More</a>
                    <hr class="my-2" />
                    <p class="card-text text-end">
                      <small class="text-muted">Article - <?php echo timeAgo($row['created_at']); ?></small> <!-- Thay thế với ngày phù hợp nếu cần -->
                    </p>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <!-- phân trang -->
          <nav aria-label="Page navigation example" id="pagination">
            <ul class="pagination justify-content-end"></ul>
          </nav>
        </div>
      </div>

      <!-- model chi tiết bài viết  -->
      <div
        class="modal fade"
        id="titleDetailModal"
        tabindex="-1"
        aria-labelledby="titleDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content title-summary-modal">
            <div class="modal-header">
              <h5 class="modal-title" id="titleDetailModalLabel">
                Chi tiết bài viết
              </h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container title-detail">
                <div class="image-container">
                  <img src="" alt="Hình ảnh chi tiết" id="modal-image" />
                  <div class="title-img">
                    <div class="title-img-1" id="modal-title"></div>
                    <div class="title-img-2" id="modal-subtitle"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h2 class="section-title">Discovery Date</h2>
                    <p class="content" id="modal-discovery"></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h2 class="section-title">Size</h2>
                    <p class="content" id="modal-size"></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h2 class="section-title">Atmosphere</h2>
                    <p class="content" id="modal-ozone"></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h2 class="section-title">Distance from the Sun and Earth</h2>
                    <p class="content" id="modal-distance"></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h2 class="section-title">Other Important Details</h2>
                    <p class="content" id="modal-other-details"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- kết thúc chi tiết bài viết -->
    </div>
    <!-- finish Celestial -->

    <!-- start Astronaut -->
    <div class=" mt-5" id="astronaut">
      <?php
      include "C:/xampp/htdocs/CosmicWonders/BackEnd/Astronaunt/insert_data.php";
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
                include('C:/xampp/htdocs/CosmicWonders/BackEnd/Astronaunt/addShip.php');
              } elseif ($astronautId === 4) {
                include('C:/xampp/htdocs/CosmicWonders/BackEnd/Astronaunt/addStation.php');
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

    <!-- start footer -->
    <footer id="footer" class="text-light">
      <hr class="my-4 border border-light" />
      <div class="row mb-4">
        <div class="col-lg-3 introduce-footer">
          <img
            src="./assets/img/logo/weblogo.png"
            alt="Discoveries Logo"
            class="logo-img-footer img-fluid mb-3"
            style="width: 100px; height: 100px" />
          <span class="ms-2">Cosmic Wonders</span>
          <h4 class="ms-3">Group 2</h4>
          <p class="ms-3 w-80">
            Join us in exploring the unknown in air and space, innovating for
            the benefit of humanity, and inspiring the world through
            discovery.
          </p>
          <a href="./loginadmin/login.php" class="text-white text-decoration-none ms-3">Login</a>
        </div>

        <div class="col-lg-9 text-center footer-column">
          <div class="row mt-5">
            <div class="col-md-3">
              <h4 class="text-light text-decoration-underline mb-3">Home</h4>
              <ul class="list-unstyled">
                <li>
                  <a href="#" class="text-white text-decoration-none">Events</a>
                </li>
                <li>
                  <a href="#" class="text-white text-decoration-none">Celestial</a>
                </li>
                <li>
                  <a href="#" class="text-white text-decoration-none">Astronauts</a>
                </li>

              </ul>
            </div>
            <div class="col-md-3">
              <h4 class="text-light text-decoration-underline mb-3">
                Events
              </h4>
              <ul class="list-unstyled">
                <li>
                  <a href="#" class="text-white text-decoration-none">Big Bang</a>
                </li>
                <li>
                  <a href="#" class="text-white text-decoration-none">Black Holes</a>
                </li>
              </ul>
            </div>
            <div class="col-md-3">
              <h4 class="text-light text-decoration-underline mb-3">
                Celestial
              </h4>
              <ul class="list-unstyled">
                <li>
                  <a href="#" class="text-white text-decoration-none">Stars</a>
                </li>
                <li>
                  <a href="#" class="text-white text-decoration-none">Planet</a>
                </li>
              </ul>
            </div>
            <div class="col-md-3">
              <h4 class="text-light text-decoration-underline mb-3">
                Astronauts
              </h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white text-decoration-none">Journey of Exploration</a></li>
                <li><a href="#" class="text-white text-decoration-none">Why Go to Space?</a></li>
                <li><a href="#" class="text-white text-decoration-none">Spaceships and Rockets</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div>
        <hr class="bg-secondary" />
        <p class="text-center text-secondary small mt-3">
          Page Last Updated: Sep 21, 2024
        </p>
      </div>
    </footer>
    <!-- finish footer -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
    <script src="./js/events.js"></script>
    <script src="./js/star.js"></script>
</body>

</html>