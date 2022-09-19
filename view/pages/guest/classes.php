<?php

$view = view('layouts/guest');

$view->title = 'Danh sách lớp mới';
$view->main = function () {
?>

  <link rel="stylesheet" href="/assets/css/pages/guest/classes.css">
  <main id="main">
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Tìm kiếm lớp dạy</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Sắp xếp theo:</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="#">Lớp mới trước trước </a></li>
                  <li><a href="#">Lớp cũ trước </a></li>
                  <li><a href="#">Học phí tăng dần </a></li>
                  <li><a href="#">Học phí giảm dần </a></li>
                  <li><a href="#">Phần trăm phí tăng </a></li>
                  <li><a href="#">Phần trăm phí giảm </a></li>
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="assets/img/blog/blog-recent-1.jpg" alt="">
                  <h4><a href="blog-single.html">Nihil blanditiis at in nihil autem</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/blog/blog-recent-2.jpg" alt="">
                  <h4><a href="blog-single.html">Quidem autem et impedit</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/blog/blog-recent-3.jpg" alt="">
                  <h4><a href="blog-single.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/blog/blog-recent-4.jpg" alt="">
                  <h4><a href="blog-single.html">Laborum corporis quo dara net para</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

                <div class="post-item clearfix">
                  <img src="assets/img/blog/blog-recent-5.jpg" alt="">
                  <h4><a href="blog-single.html">Et dolores corrupti quae illo quod dolor</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>

              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->
          <div class="col-lg-8 entries">

            <!-- ======= Services Section ======= -->
            <section id="services" class="services">

              <div class="container" data-aos="fade-up">

                <header class="section-header">
                  <!-- <h2>Services</h2> -->
                  <p>Danh sách lớp dạy</p>
                </header>

                <div class="row gy-4">
                  <?php
                  foreach ($this->classes as $class) {
                  ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                      <div class="service-box blue">
                        <h3><?=$class['subject'] . ' ' . $class['grade']?></h3>
                        <p>
                          Học sinh: Nam<br>
                          Học lực: Khá<br>
                          Địa chỉ: Cầu Giấy, Hà Nội
                        </p>
                        <a href="#" class="read-more"><span>Xem chi tiết</span> <i class="bi bi-arrow-right"></i></a>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>

              </div>

            </section><!-- End Services Section -->


            <div class="blog-pagination">
              <ul class="justify-content-center">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
              </ul>
            </div>

          </div><!-- End blog entries list -->


        </div>

      </div>
    </section><!-- End Blog Section -->
  </main>
<?php
};




$view->render();
