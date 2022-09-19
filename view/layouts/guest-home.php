<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php $this->write('title') ?></title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/logo-lopmoi.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.11.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo-lopmoi.png" alt="">
        <span>LopMoi</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Trang chủ</a></li>
          <li class="dropdown"><a href="javascript:void(0)"><span>Cho gia sư</span><i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/danh-sach-lop">Danh sách lớp</a></li>
              <li><a href="/danh-sach-cac-trung-tam">Các trung tâm</a></li>
              <li><a href="/tao-cv-gia-su">Tạo CV</a></li>
            </ul>
          </li>
          <!-- <li><a class="nav-link scrollto" href="#about">Danh sách lớp</a></li>
          <li><a class="nav-link scrollto" href="#services">Các trung tâm</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Tạo CV</a></li> -->
          <li class="dropdown"><a href="javascript:void(0)"><span>Cộng đồng</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/dien-dan-gia-su">Diễn đàn gia sư</a></li>
              <li><a href="https://www.facebook.com/groups/timkiemgiasuhanoi">Nhóm GIA SƯ HÀ NỘI</a></li>
              <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> -->
              <li><a href="#">Fanpage Lớp mới</a></li>
              <!-- <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li> -->
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#team">Blog</a></li>
          <!-- <li><a href="blog.html">Blog</a></li> -->
          <li><a class="nav-link scrollto" href="#contact">Đăng nhập</a></li>
          <li><a class="getstarted scrollto" href="#about">Đăng ký</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <?php $this->show('main') ?>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="assets/img/logo-lopmoi.png" alt="">
              <span>LopMoi</span>
            </a>
            <p>Mang lại giá trị đích thực cho các gia sư. Mang lại giá trị đích thực cho các gia sư. Mang lại giá trị đích thực cho các gia sư.</p>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Các trang:</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="/">Trang chủ</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/danh-sach-lop">Danh sách lớp</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/danh-sach-cac-trung-tam">Các trung tâm</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/tao-cv-gia-su">Tạo CV</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="/bai-viet">Blog</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Liên kết ngoài</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Group GIA SƯ HÀ NỘI</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Fanpage Lớp Mới</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Kênh youtube Lớp mới</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Liên hệ</h4>
            <p>
              Số nhà 32, Ngõ 1<br>
              Vân Côn, Hoài Đức<br>
              Hà Nội<br><br>
              <strong>SĐT:</strong> 0969 757 418<br>
              <strong>Email:</strong> hotro.lopmoi@gmail.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>LopMoi</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        Designed by <a href="https://bootstrapmade.com/">Nguyễn Đình Tuấn</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>