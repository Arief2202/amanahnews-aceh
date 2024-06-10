@extends('layouts.main')

@section('title')
<title>Amanah News - Beranda</title>
@endsection

@section('script')
<script src="/landing/assets/js/navbarScroll.js"></script>
@endsection

@section('main')

    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div style="background-color:var(--main-color); width:100%; height:100%;position: absolute; z-index: 1; top:0px;"></div>
        <img src="/assets/img/bg.jpg" alt="" data-aos="fade-in" style="opacity: 30%;">
        <img src="/assets/img/bercak.png" alt="" data-aos="fade-in">
  
        <div class="heroImg">
  
          <img src="/assets/img/logo_vertical.png" alt="" data-aos="fade-in">  
        </div>
  
        <div class="container divText" style="">
          <div class="d-flex justify-content-center">
            <div class="row">
              <div class="col" style="text-align: center;">            
                <h2 data-aos="fade-up" data-aos-delay="100">Aneuk Muda Aceh Unggul & Hebat</h2>
                <p data-aos="fade-up" data-aos-delay="200">Sebuah program pemberdayaan generasi muda Aceh yang digagas oleh Badan Intelijen Negara Republik Indonesia</p>
                <p data-aos="fade-up" data-aos-delay="200"><a href="/login" class="btn btn-primary-orange p-3" style="width:200px; font-size:100%; border-radius:50px;">Ayo Bergabung</a></p>
              </div>
            </div>
          </div>
        </div>
        
      </section><!-- /Hero Section -->
  
      <!-- Clients Section -->
      <section id="clients" class="clients section">
        <div class="container mt-3" data-aos="fade-up">
  
  
          <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="border-radius: 30px">
  
              @foreach($carousel_items as $a=>$carousel_item)
              <a href="{{route('berita.detail', ['slug' => $carousel_item->slug])}}">
                <div class="carousel-item @if($a==0) active @endif" data-bs-interval="3000">
                  <img src="/uploads/post/image/{{$carousel_item->banner}}" class="d-block w-100" alt="..." style="height: 650px;">
                  
                  <div class="carousel-caption d-none d-md-block w-100 p-3 carousel-bg-caption">
                    <div style="position: absolute;left:0px;bottom:0px;">
                        <div class="d-flex justify-content-start align-items-start text-start ps-5 pe-5 pb-4">
                          <h1 style="color: #ffffff; font-weight:600;">{{$carousel_item->title}}</h1>  
                        </div>
                    </div>
                  </div>
                </div>
              </a>
              @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="z-index: 10">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next" style="z-index: 10">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          
          <div class="container" style="margin-top:80px; margin-bottom:60px;">
            <h2 class="font-weight-light" style="font-weight: 700;">Berita Trending</h2>
            <div class="row mt-4">
              @foreach($trendings as $trending)
              <div class="col-md-3 mb-3">
                <a class="myCard" href="">
                  <img src="/uploads/post/image/{{$trending->banner}}" alt="">
  
                  <div class="card-title ps-3 pe-3">
                    <h5 class="title mt-5">{{$trending->title}}</h5>
                    <p class="time">{{date('d M Y H:i:s', strtoTime($trending->updated_at ))}}</p>
                  </div>
                </a>
              </div>
              @endforeach
            </div>
        </div>
  
          <div class="row gy-4">
  
            <div class="col-xl-2 col-md-3 col-6 client-logo">
              <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->
  
            <div class="col-xl-2 col-md-3 col-6 client-logo">
              <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->
  
            <div class="col-xl-2 col-md-3 col-6 client-logo">
              <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->
  
            <div class="col-xl-2 col-md-3 col-6 client-logo">
              <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->
  
            <div class="col-xl-2 col-md-3 col-6 client-logo">
              <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->
  
            <div class="col-xl-2 col-md-3 col-6 client-logo">
              <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->
  
          </div>
  
        </div>
  
      </section><!-- /Clients Section -->
  
      <!-- About Section -->
      <section id="about" class="about section">
  
        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row align-items-xl-center gy-5">
  
            <div class="col-xl-5 order-2 order-lg-1 content">
              <h3>About Us</h3>
              <h1>Mengapa Harus Ikut Amanah ?</h1>
              <p>
                Dalam misinya, amanah akan terus mengembangkan dan memberdayakan masyarakat muda Aceh sebagai gerakan untuk membantu meningkatkan stabilitas ekonomi di sekitar Aceh melalui anak muda. Ayo bergabung bersama kami
              </p>
              <a href="#" class="read-more"><span>Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
            </div>
            
            <div class="col-lg-7 order-1 order-lg-2 d-flex justify-content-end" data-aos="zoom-out" data-aos-delay="100">
                <img src="assets/img/mengapa-amanah.png" alt="" class="stack-front">
            </div>
  
          </div>
        </div>
  
      </section><!-- /About Section -->
  
      <!-- Services Section -->
      <section id="services" class="services section">
  
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up" style="width:100vw;">
          <h2>Apa saja Layanan di Amanah?</h2>
          <p>Kami terus hadir untuk membantu masyarakat Aceh terutama kawula muda seluruh Aceh dalam menggerakkan perekonomian Daerah. </p>
        </div><!-- End Section Title -->
  
        <div class="container">
  
          <div class="row gy-4">
  
            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
              <div class="service-item d-flex">
                <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
                <div>
                  <h4 class="title"><a href="services-details.html" class="stretched-link">Pengembangan SDM</a></h4>
                  <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                </div>
              </div>
            </div>
            <!-- End Service Item -->
  
            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="200">
              <div class="service-item d-flex">
                <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
                <div>
                  <h4 class="title"><a href="services-details.html" class="stretched-link">Layanan Informasi</a></h4>
                  <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
                </div>
              </div>
            </div><!-- End Service Item -->
  
            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="300">
              <div class="service-item d-flex">
                <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
                <div>
                  <h4 class="title"><a href="services-details.html" class="stretched-link">Katalog Penjualan</a></h4>
                  <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                </div>
              </div>
            </div><!-- End Service Item -->
  
            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="600">
              <div class="service-item d-flex">
                <div class="icon flex-shrink-0"><i class="bi bi-calendar4-week"></i></div>
                <div>
                  <h4 class="title"><a href="services-details.html" class="stretched-link">Kalender Kegiatan</a></h4>
                  <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
                </div>
              </div>
            </div><!-- End Service Item -->
  
          </div>
  
        </div>
  
      </section><!-- /Services Section -->
  
  
  
      <!-- Testimonials Section -->
      <section id="testimonials" class="testimonials section">
  
        <div class="container">
  
          <div class="row align-items-center">
  
            <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
              <h3>Apa Kata Mereka?</h3>
              <p>
                Dalam mengembangkan program, pemerintah telah berupaya untuk menjangkau lebih banyak pemuda untuk meningkatkan jangkauan program ini lebih luas dan berdampak positif agar mampu menopang perputaran ekonomi di daerah Aceh
              </p>
            </div>
  
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
  
              <div class="swiper">
                <script type="application/json" class="swiper-config">
                  {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                      "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                      "el": ".swiper-pagination",
                      "type": "bullets",
                      "clickable": true
                    }
                  }
                </script>
                <div class="swiper-wrapper">
  
                  @for($a=0;$a<10;$a++)
                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <div class="d-flex">
                        <img src="{{/*fake()->imageUrl(640, 480, 'animals', true)*/""}}" class="testimonial-img flex-shrink-0" alt="">
                        <div>
                          <h3>{{fake()->name()}}</h3>
                          <h4>Mahasiswa Teknik Informatika ITS</h4>
                          <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                          </div>
                        </div>
                      </div>
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                    </div>
                  </div><!-- End testimonial item -->
                  @endfor
  
                </div>
                <div class="swiper-pagination"></div>
              </div>
  
            </div>
  
          </div>
  
        </div>
  
      </section><!-- /Testimonials Section -->
  
  
      <!-- Faq Section -->
      <section id="faq" class="faq section">
  
        <div class="container">
          <div class="row gy-4">
  
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
              <div class="content px-xl-5">
                <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                </p>
              </div>
            </div>
  
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
  
              <div class="faq-container">
                <div class="faq-item faq-active">
                  <h3><span class="num">1.</span> <span>Non consectetur a erat nam at lectus urna duis?</span></h3>
                  <div class="faq-content">
                    <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
  
                <div class="faq-item">
                  <h3><span class="num">2.</span> <span>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</span></h3>
                  <div class="faq-content">
                    <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
  
                <div class="faq-item">
                  <h3><span class="num">3.</span> <span>Dolor sit amet consectetur adipiscing elit pellentesque?</span></h3>
                  <div class="faq-content">
                    <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
  
                <div class="faq-item">
                  <h3><span class="num">4.</span> <span>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</span></h3>
                  <div class="faq-content">
                    <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
  
                <div class="faq-item">
                  <h3><span class="num">5.</span> <span>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</span></h3>
                  <div class="faq-content">
                    <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
  
              </div>
  
            </div>
          </div>
  
        </div>
  
      </section><!-- /Faq Section -->

      
    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>A108 Adam Street</p>
                  <p>New York, NY 535022</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55</p>
                  <p>+1 6678 254445 41</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@example.com</p>
                  <p>contact@example.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="500">
                  <i class="bi bi-clock"></i>
                  <h3>Open Hours</h3>
                  <p>Monday - Friday</p>
                  <p>9:00AM - 05:00PM</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->
  
@endsection