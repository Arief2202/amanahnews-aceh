<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  @yield('title')
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  @yield('style-before')
  <!-- Vendor CSS Files -->
  <link href="/vendor/boxicons-2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link href="/vendor/bootstrap-5.3.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="/landing/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/landing/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/landing/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/landing/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="/landing/assets/css/main.css" rel="stylesheet">
  @yield('style')
  <!-- =======================================================
  * Template Name: Append
  * Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
  * Updated: May 18 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
        <img src="/assets/img/logo_horizontal_dark.png">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        {{-- <h1 class="sitename">Append</h1><span>.</span> --}}
      </a>
      
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/" class="@if($_SERVER['REQUEST_URI'] == '/') active @endif">Beranda</a></li>
          <li><a href="/berita" class="@if($_SERVER['REQUEST_URI'] == '/berita') active @endif">Berita</a></li>
          <li><a href="/e-catalog" class="@if($_SERVER['REQUEST_URI'] == '/e-catalog') active @endif">E-Catalog</a></li>
          <li><a href="/acara" class="@if($_SERVER['REQUEST_URI'] == '/acara') active @endif">Acara</a></li>
          <li><a href="/video" class="@if($_SERVER['REQUEST_URI'] == '/video') active @endif">Video</a></li>
          <li class="ps-2 pe-2 pb-3 signinout"><a href="/login" class="btn btn-primary-orange">Sign In</a></li>
          <li class="ps-2 pe-2 signinout"><a href="/register" class="btn btn-outline-secondary">Sign Up</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="me-3 btn-signinup">
        <a class="btn-getstarted me-3" href="/login">Sign In</a>
        <a class="btn btn-outline-light" href="/register">Sign Up</a>
      </div>

    </div>
  </header>

  <main class="main">
    @yield('main')


    <section>
      <div class="container">

        <div class="card" style="height: 350px; background-color:#7E9465;">
          <img src="/assets/img/bintik.png" alt="" style="width: 120px; position: absolute;left:150px;">
          <div style="position:absolute; top:100px;width:100%;">
            <div class="d-flex justify-content-center">

              <h1 style="font-weight: 600; color:white">Mari Berdiskusi Bersama Kami</h1>
            </div>
            <div class="d-flex justify-content-center">
              <form action="">
                <div class="row ms-5 mt-4" style="width: 800px">
                    <div class="col-md-8">
                      <input type="text" class="form-control" placeholder="Masukkan alamat email anda disini">
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-primary-orange">Mari Berlangganan</button>
                    </div>
                  </div>
              </form>
            </div>
          </div>
          <img src="/assets/img/bintik.png" alt="" style="width: 120px;position: absolute;right:150px;bottom:0px">
        </div>
      </div>
    </section>

  </main>

  <footer id="footer" class="footer position-relative">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Append</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>A108 Adam Street</p>
          <p>New York, NY 535022</p>
          <p>United States</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
          <p><strong>Email:</strong> <span>info@example.com</span></p>
        </div>

      </div>
    </div>
    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="sitename">D72SpecialTeam</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="/vendor/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
  <script src="/landing/assets/vendor/php-email-form/validate.js"></script>
  <script src="/landing/assets/vendor/aos/aos.js"></script>
  <script src="/landing/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/landing/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/landing/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="/landing/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/landing/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/vendor/jquery-3.7.1/jquery-3.7.1.min.js"></script>

  <!-- Main JS File -->
  @yield('script')
  <script src="/landing/assets/js/main.js"></script>

</body>

</html>