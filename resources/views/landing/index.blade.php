@extends('layouts.main')

@section('title')
<title>Amanah News - Beranda</title>
@endsection

@section('script')
<script src="/landing/assets/js/navbarScroll.js"></script>
<script src="/landing/assets/js/autoPreloader.js"></script>
@endsection

@section('main')
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div style="background-color:#00000057; width:100%; height:100%;position: absolute; z-index: 0; top:0px;"></div>
        <img src="/assets/img/bg.jpg" alt="" data-aos="fade-in" style="opacity: 10%;">
        <img src="/assets/img/bercak.png" alt="" data-aos="fade-in" style="opacity: 50%;">
  
        <div class="heroImg">
  
          <img src="/assets/img/amanah-dropshadow.png" alt="" data-aos="fade-in">  
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
                <a class="myCard" href="/berita/detail/{{$trending->slug}}">
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
                  <h4 class="title"><a class="stretched-link">Pengembangan SDM</a></h4>
                  <p class="description">Program AMANAH berupaya mengembangkan beragam kekayaan sumber daya alam dan sumber daya manusia khususnya para pemuda yang ada di Aceh. Program AMANAH juga berupaya mengangkat ekonomi kreatif yang dapat berkembang di masyarakat yang terdiri dari 18 subsektor. </p>
                </div>
              </div>
            </div>
            <!-- End Service Item -->
  
            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="200">
              <div class="service-item d-flex">
                <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
                <div>
                  <h4 class="title"><a href="@if($newest->count() > 0) /berita/detail/{{$newest->first()->slug}} @endif" class="stretched-link">Berita Terkini</a></h4>
                  @if($newest->count() > 0)
                  <p class="description">{{$newest->first()->title}}</p>
                  @endif
                </div>
              </div>
            </div><!-- End Service Item -->
  
            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="300">
              <div class="service-item d-flex">
                <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
                <div>
                  <h4 class="title"><a class="stretched-link">Katalog Penjualan</a></h4>
                  {{-- <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p> --}}
                </div>
              </div>
            </div><!-- End Service Item -->
  
            <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="600">
              <div class="service-item d-flex">
                <div class="icon flex-shrink-0"><i class="bi bi-calendar4-week"></i></div>
                <div>
                  <h4 class="title"><a class="stretched-link">Kalender Kegiatan</a></h4>
                  {{-- <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p> --}}
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
  
                  @foreach($kata_merekas as $kataMereka)
                  <div class="swiper-slide">
                    <div class="testimonial-item">
                      <div class="d-flex">
                        <img src="/uploads/kataMereka/{{$kataMereka->photo}}" class="testimonial-img flex-shrink-0" alt="">
                        <div>
                          <h3>{{$kataMereka->name}}</h3>
                          <h4>{{$kataMereka->instance}}</h4>
                          <div class="stars">
                            @for($a=0;$a<$kataMereka->star; $a++)<i class="bi bi-star-fill"></i>@endfor
                          </div>
                        </div>
                      </div>
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>{{$kataMereka->answer}}</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                    </div>
                  </div><!-- End testimonial item -->
                  @endforeach
  
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
                {{-- <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                </p> --}}
              </div>
            </div>
  
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
  
              <div class="faq-container">
                @foreach($faqs as $key=>$faq)
                  <div class="faq-item @if($key==0)faq-active @endif">
                    <h3><span class="num">{{$key+1}}.</span> <span>{{$faq->question}}</span></h3>
                    <div class="faq-content">
                      <p>{{$faq->answer}}</p>
                    </div>
                    <i class="faq-toggle bi bi-chevron-right"></i>
                  </div><!-- End Faq item-->
                @endforeach
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
        <p>Kami siap membantu dengan segala pertanyaan dan informasi lebih lanjut mengenai Program Aneuk Muda Aceh Unggul dan Hebat (Amanah). Jangan ragu untuk menghubungi kami melalui saluran berikut</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>Sekretariat AMANAH (Aneuk Muda Aceh Unggul Hebat)</p>
                  <p>Jl. Prof. A. Majid Ibrahim II, Kp. Baru, Kec. Baiturrahman, Kota Banda Aceh, Aceh 23116</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>+62 823-1193-8885</p>
                  {{-- <p>+1 6678 254445 41</p> --}}
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>amanahaceh24@gmail.com</p>
                  {{-- <p>contact@example.com</p> --}}
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="500">
                  <i class="bi bi-clock"></i>
                  <h3>Open Hours</h3>
                  <p>Monday - Saturday</p>
                  <p>9:00 - 22:00</p>
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