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
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-header">
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
    <div class="p-relative mt-1">
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

  <div class="main-content container-fluid">
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
        <a href=""><img class="" src="./assets/img/body/Tàu vũ trụ.png" alt="" /></a>
        <div class="text">
          <a href="#cosmotechnology">Cosmic<br />technology</a>
        </div>
        <div class="text-icon">
          <a href="#cosmotechnology"><i class="bi bi-arrow-down-circle-fill"></i></a>
        </div>
      </div>
      <div class="col-lg-2 col-4 selection_img">
        <a href=""><img class="" src="./assets/img/body/astronaut.webp" alt="" /></a>
        <div class="text"><a href="#astronaut">Astronaut</a></div>
        <div class="text-icon">
          <a href="#astronaut"><i class="bi bi-arrow-down-circle-fill"></i></a>
        </div>
      </div>
    </div>
    <!-- finish general -->

    <!-- start Planet-Simulation -->
    <div id="Planet-Simulation"></div>
    <!-- finish Planet-Simulation -->

    <!-- Event -->

    <?php include '../Back-End/Events/events.php'; ?>

    <div class="main-content container-fluid">
      <div id="events">
        <h1 class="text-center">EVENTS</h1>
        <hr>
        <?php foreach ($events as $event): ?>
          <div id="bigbang" class="container-fluid">
            <div class="bb_content container-fluid">
              <div class="bb_content">
                <!-- Phần tiêu đề (bb_header) lấy từ bảng Event -->
                <div class="bb_header row text-start" style="background-image: url('../Back-End/admin/<?= $event['Img_url'] ?>');">
                  <div class="col-12">
                    <!-- Hiển thị tiêu đề sự kiện từ Event_title -->
                    <h2 class="m-0"><?= $event['Event_title'] ?></h2>
                    <!-- Hiển thị mô tả sự kiện từ Event_sub_text -->
                    <div class="text1"><?= $event['Event_sub_text'] ?></div>
                  </div>

                  <!-- Button Read More -->
                  <div class="col-12 mt-2">
                    <button class="btn btn-sm readMoreBtn" id="toggleBtn_<?= $event['Event_ID'] ?>">
                      Read More <i class="fas fa-chevron-down"></i>
                    </button>
                  </div>
                </div>

                <!-- Phần nội dung chi tiết (bb_body) lấy từ bảng Event_detail -->
                <div class="bb_body p-5 d-none" id="bbBody_<?= $event['Event_ID'] ?>">
                  <div class="row">
                    <!-- Menu (Nếu cần hiển thị) -->
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
                            <p><?= $detail['Event_detail_sub'] ?></p>

                            <!-- Hiển thị hình ảnh nếu có -->
                            <?php if (!empty($detail['Event_detail_img'])): ?>
                              <img class="img-fluid" src="../Back-End/admin/<?= $detail['Event_detail_img'] ?>" alt="<?= $detail['Event_detail_title'] ?>">
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


    <!-- Finish Event -->


    <!-- start star and planet -->
    <div class="container title-summary rounded" style="background-color: aliceblue; max-width: 90%">
      <div class="row">
        <h1 class="mt-5 mb-5 text-center" style="color: black; font-weight: 700">
          Stars Stories
        </h1>
        <div class="col-md-3 mb-2 sticky-filter" id="filter-section">
          <div class="card m-auto">
            <div class="card-header d-flex justify-content-between align-items-center">
              <span style="font-weight: 500; font-size: 15px">Which star and planet do you want to explore?</span>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedStar" aria-controls="navbarSupportedStar" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="bi bi-filter-square-fill" style="font-size: 20px"></i>
              </button>
            </div>
            <div class="card-body">
              <input type="text" class="form-control mb-3" placeholder="STARS" />
              <input type="text" class="form-control mb-3" placeholder="Search by keyword" />
              <ul class="list-unstyled collapse" id="navbarSupportedStar">
                <li class="mb-2">
                  <input class="form-check-input" type="checkbox" id="betelgeuse" />
                  <label class="form-check-label" for="betelgeuse">Betelgeuse</label>
                </li>
                <li class="mb-2">
                  <input class="form-check-input" type="checkbox" id="binaryStars" />
                  <label class="form-check-label" for="binaryStars">Binary Stars</label>
                </li>
                <li class="mb-2">
                  <input class="form-check-input" type="checkbox" id="brownDwarfs" />
                  <label class="form-check-label" for="brownDwarfs">Brown Dwarfs</label>
                </li>
                <li class="mb-2">
                  <input class="form-check-input" type="checkbox" id="neutronStars" />
                  <label class="form-check-label" for="neutronStars">Neutron Stars</label>
                </li>
                <li class="mb-2">
                  <input class="form-check-input" type="checkbox" id="protostars" />
                  <label class="form-check-label" for="protostars">Protostars</label>
                </li>
                <li class="mb-2">
                  <input class="form-check-input" type="checkbox" id="redDwarfs" />
                  <label class="form-check-label" for="redDwarfs">Red Dwarfs</label>
                </li>
                <li class="mb-2">
                  <input class="form-check-input" type="checkbox" id="redGiants" />
                  <label class="form-check-label" for="redGiants">Red Giants</label>
                </li>
                <li class="mb-2">
                  <input class="form-check-input" type="checkbox" id="starClusters" />
                  <label class="form-check-label" for="starClusters">Star Clusters</label>
                </li>
                <li class="mb-2">
                  <input class="form-check-input" type="checkbox" id="stellarEvolution" />
                  <label class="form-check-label" for="stellarEvolution">Stellar Evolution</label>
                </li>
                <li class="mb-2">
                  <input class="form-check-input" type="checkbox" id="supernovae" />
                  <label class="form-check-label" for="supernovae">Supernovae</label>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="row">
            <!-- Article 1 -->
            <div class="col-md-4 mb-3">
              <div class="card card-content">
                <img src="./textures/jupiter.jpg" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title">
                    NASA's Webb Peers into the Extreme Outer Galaxy
                  </h5>
                  <p class="card-text">
                    Astronomers have directed NASA's James Webb Space
                    Telescope to examine the outskirts of our Milky Way
                    galaxy...
                  </p>
                  <a href="#" class="btn btn-primary btn-content-readmore" data-bs-toggle="modal"
                    data-bs-target="#titleDetailModal">Read More</a>
                  <hr class="my-2" />
                  <p class="card-text text-end">
                    <small class="text-muted">Article - 1 week ago</small>
                  </p>
                </div>
              </div>
            </div>
            <!-- Article 2 -->
            <div class="col-md-4 mb-3">
              <div class="card card-content">
                <img src="./textures/earth.webp" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title">
                    NASA's Webb Peers into the Extreme Outer Galaxy
                  </h5>
                  <p class="card-text">
                    Astronomers have directed NASA's James Webb Space
                    Telescope to examine the outskirts of our Milky Way
                    galaxy...
                  </p>
                  <a href="#" class="btn btn-primary btn-content-readmore" data-bs-toggle="modal"
                    data-bs-target="#titleDetailModal">Read More</a>
                  <hr class="my-2" />
                  <p class="card-text text-end">
                    <small class="text-muted">Article - 1 week ago</small>
                  </p>
                </div>
              </div>
            </div>
            <!-- Article 3 -->
            <div class="col-md-4 mb-3">
              <div class="card card-content">
                <img src="./textures/mars.png" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title">
                    NASA's Webb Peers into the Extreme Outer Galaxy
                  </h5>
                  <p class="card-text">
                    Astronomers have directed NASA's James Webb Space
                    Telescope to examine the outskirts of our Milky Way
                    galaxy...
                  </p>
                  <a href="#" class="btn btn-primary btn-content-readmore" data-bs-toggle="modal"
                    data-bs-target="#titleDetailModal">Read More</a>
                  <hr class="my-2" />
                  <p class="card-text text-end">
                    <small class="text-muted">Article - 1 week ago</small>
                  </p>
                </div>
              </div>
            </div>
            <!-- Article 4 -->
            <div class="col-md-4 mb-3">
              <div class="card card-content">
                <img src="./textures/neptune.jpg" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title">
                    NASA's Webb Peers into the Extreme Outer Galaxy
                  </h5>
                  <p class="card-text">
                    Astronomers have directed NASA's James Webb Space
                    Telescope to examine the outskirts of our Milky Way
                    galaxy...
                  </p>
                  <a href="#" class="btn btn-primary btn-content-readmore" data-bs-toggle="modal"
                    data-bs-target="#titleDetailModal">Read More</a>
                  <hr class="my-2" />
                  <p class="card-text text-end">
                    <small class="text-muted">Article - 1 week ago</small>
                  </p>
                </div>
              </div>
            </div>
            <!-- Article 5 -->
            <div class="col-md-4 mb-3">
              <div class="card card-content">
                <img src="./textures/neptune.jpg" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title">
                    NASA's Webb Peers into the Extreme Outer Galaxy
                  </h5>
                  <p class="card-text">
                    Astronomers have directed NASA's James Webb Space
                    Telescope to examine the outskirts of our Milky Way
                    galaxy...
                  </p>
                  <a href="#" class="btn btn-primary btn-content-readmore" data-bs-toggle="modal"
                    data-bs-target="#titleDetailModal">Read More</a>
                  <hr class="my-2" />
                  <p class="card-text text-end">
                    <small class="text-muted">Article - 1 week ago</small>
                  </p>
                </div>
              </div>
            </div>
            <!-- Article 6 -->
            <div class="col-md-4 mb-3">
              <div class="card card-content">
                <img src="./textures/neptune.jpg" class="card-img-top" alt="..." />
                <div class="card-body">
                  20px;5 class="card-title">
                  NASA's Webb Peers into the Extreme Outer Galaxy
                  </h5>
                  <p class="card-text">
                    Astronomers have directed NASA's James Webb Space
                    Telescope to examine the outskirts of our Milky Way
                    galaxy...
                  </p>
                  <a href="#" class="btn btn-primary btn-content-readmore" data-bs-toggle="modal"
                    data-bs-target="#titleDetailModal">Read More</a>
                  <hr class="my-2" />
                  <p class="card-text text-end">
                    <small class="text-muted">Article - 1 week ago</small>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- phân trang -->
          <nav aria-label="Page navigation example" id="pagination">
            <ul class="pagination justify-content-end"></ul>
          </nav>
        </div>
      </div>

      <!-- model chi tiết bài viết  -->
      <div class="modal fade" id="titleDetailModal" tabindex="-1" aria-labelledby="titleDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content title-summary-modal">
            <div class="modal-header">
              <h5 class="modal-title" id="titleDetailModalLabel">
                Chi tiết bài viết
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container title-detail">
                <div class="image-container">
                  <img src="./assets/img/slider/header_img(5).png" alt="Sao Thổ" />
                  <div class="title-img">
                    <div class="title-img-1">SAO THỔ</div>
                    <div class="title-img-2">
                      Sao Thổ là hành tinh thứ sáu tính từ Mặt trời và là hành
                      tinh lớn thứ hai trong hệ mặt trời. Nó được bao quanh
                      bởi những vành đai tuyệt đẹp.
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h2 class="section-title">Ngày phát hiện</h2>
                    <p class="content">
                      Sao Thổ đã được con người biết đến từ thời cổ đại, nhờ
                      vào việc quan sát bầu trời bằng mắt thường. Các nhà
                      thiên văn học cổ đại như Ptolemy và những người Hy Lạp
                      đã nhận diện và ghi lại sự tồn tại của Sao Thổ. Tuy
                      nhiên, Sao Thổ không được "phát hiện" dưới dạng hành
                      tinh riêng biệt mà là một thiên thể đã được quan sát và
                      nghiên cứu từ rất lâu. Việc nghiên cứu chi tiết hơn về
                      Sao Thổ bắt đầu từ thế kỷ 17, khi Galileo Galilei lần
                      đầu tiên quan sát Sao Thổ bằng kính viễn vọng vào năm
                      1610.
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h2 class="section-title">Kích thước</h2>
                    <p class="content">
                      Sao Thổ là hành tinh lớn thứ hai trong Hệ Mặt Trời sau
                      Sao Mộc, với đường kính khoảng 120,536 km. Khối lượng
                      của Sao Thổ cũng lớn hơn Trái Đất rất nhiều, gấp khoảng
                      95 lần. Tuy nhiên, Sao Thổ lại có mật độ rất thấp, chỉ
                      bằng 0.687 lần mật độ nước, có nghĩa là nếu có thể đặt
                      Sao Thổ vào một hồ nước khổng lồ, nó sẽ nổi.
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h2 class="section-title">Khí quyển</h2>
                    <p class="content">
                      Khí quyển của Sao Thổ chủ yếu bao gồm hydro (khoảng 96%)
                      và heli (khoảng 3%), giống như nhiều hành tinh khí khổng
                      lồ khác. Bên cạnh đó, nó còn chứa các hợp chất nhỏ khác
                      như methane, amonia, và hơi nước. Khí quyển của Sao Thổ
                      có các dải mây tương tự như Sao Mộc, tuy nhiên, chúng
                      không rõ nét và dễ nhận thấy như Sao Mộc do lớp mây dày
                      hơn và ít rối loạn hơn.
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h2 class="section-title">
                      Khoảng cách từ Mặt Trời và Trái Đất
                    </h2>
                    <p class="content">
                      Sao Thổ cách Mặt Trời khoảng 1.4 tỷ km (9.5 đơn vị thiên
                      văn - AU), tùy thuộc vào vị trí trên quỹ đạo của nó.
                      Khoảng cách giữa Sao Thổ và Trái Đất thay đổi tùy theo
                      vị trí của hai hành tinh trên quỹ đạo của mình, nhưng
                      khoảng cách trung bình là khoảng 1.2 tỷ km.
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h2 class="section-title">
                      Các chi tiết quan trọng khác
                    </h2>
                    <p class="content">
                      Vòng đai: Sao Thổ nổi tiếng với hệ thống vòng đai tuyệt
                      đẹp, chủ yếu được tạo thành từ bằng và đãi. Những vòng
                      đai này trải dài hàng ngàn km, nhưng chỉ dày vài chục
                      mét.
                    </p>
                    <p class="content">
                      Mặt trăng: Sao Thổ có ít nhất 83 mặt trăng được xác
                      nhận, trong đó lớn nhất là Titan, mặt trăng lớn thứ hai
                      trong Hệ Mặt Trời. Titan có một bầu khí quyển dày và có
                      các chất hóa học giống với những gì có thể hình thành sự
                      sống.
                    </p>
                    <p class="content">
                      Quỹ đạo và chu kỳ quay: Một năm trên Sao Thổ (tức thời
                      gian sao Thổ quay quanh Mặt Trời) kéo dài khoảng 29.5
                      năm Trái Đất. Tuy nhiên, một ngày trên Sao Thổ (tức thời
                      gian sao Thổ tự quay quanh trục của nó) chỉ dài khoảng
                      10 giờ 33 phút.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- kết thúc chi tiết bài viết -->
    </div>
    <!-- finish star and plant -->

    <!-- start Celestial -->
    <div id="Celestial"></div>
    <!-- finish Celestial -->

    <!-- start Astronaut -->
    <div id="Cosmic-technology"></div>
    <!-- finish Astronaut -->
  </div>

  <!-- start footer -->
  <footer id="footer"></footer>
  <!-- finish footer -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
  <script src="./js/star.js"></script>
  <script src="./js/events.js"></script>

</body>

</html>