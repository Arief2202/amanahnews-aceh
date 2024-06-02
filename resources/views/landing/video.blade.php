@extends('layouts.main')

@section('title')
<title>Amanah News - Video</title>
@endsection

@section('script')
<script src="/landing/assets/js/navbarScroll.js"></script>
@endsection

@section('main')
  
    <!-- Hero Section -->
    <section style="margin: 0px; padding: 0px; width:100%;">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" >
  
              @for($a=0; $a<10; $a++)
              <div class="carousel-item @if($a==0) active @endif" data-bs-interval="3000">
                <div style="background-color:#000000; width:100%; height:100%;position: absolute; z-index: 0; top:0px;"></div>
                <img src="/assets/img/bg.jpg" class="d-block w-100" alt="..." style="max-height: 100%; opacity:30%;z-index:1;">
                
                <div class="carousel-caption d-none d-md-block h-100 p-3" style="width: 1000px">
                  <div style="position: absolute; left:50px; top:50%; transform:translateY(-50%); color:white;">
                    <h5 style="color:white;font-weight:600;margin:0px;padding:0px;text-align:left; margin-bottom: 50px;">Peuhaba Aceh Gayo...</h5>
                    <h1 style="color:white;font-weight:800;font-size:56px; margin:0px;padding:0px;text-align:left; margin-bottom: 50px;">Lima Rekomendasi Tempat Wisata Menarik Aceh</h1>
                    <p style="color:white;margin:0px;padding:0px;font-size:16px;text-align:left; margin-bottom: 50px;">Dengan keindahan alamnya yang memukau, menawarkan berbagai destinasi wisata yang tak boleh dilewatkan. Berikut adalah lima tempat menarik yang wajib dikunjungi jika Anda berada di Aceh:</p>
                      
                    <div class="d-flex justfiy-content-start align-items-start">
                      <a href="/berita/detail" style="color:white;font-weight:600;font-size:20px;margin:0px;padding:0px;text-align:left; margin-bottom: 50px;">Lihat Selengkapnya ></a>
                    </div>
                    <div class="row" style="position:absolute">
                      <div class="col">
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="background-color: transparent;border:none;">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                      </div>
                      <div class="col">
                        <button type="button" data-bs-target="#carouselExample" data-bs-slide="next" style="background-color: transparent;border:none;">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  {{-- <h1 class="d-flex justify-content-start" style="color: #ffffff; margin-top:50px;">Pemerintah Lakukan Tiga Langkah Besar Majukan Kebudayaan Aceh</h1>   --}}
                </div>
                {{-- <p>Some representative placeholder content for the first slide.</p> --}}
              </div>
              @endfor

            </div>
          </div>
    </section>

    <section class="section" style="">
      <div class="container">
        <div class=" d-flex justify-content-center w-100">
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Cari Berita Video yang ingin anda lihat" style="width: 50vw; border-width: 2px 2px;">
            </div>
            <div class="col">
              <button class="btn btn-primary-orange">Search</button>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <h3 class="mt-5" style="font-weight:500;margin:0px;padding:0px;text-align:left; margin-bottom: 5px;">Terbaru dari AMANAH</h3>
          </div>
          <div class="col d-flex justify-content-end align-items-end mb-2">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Category
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Sport</a></li>
                <li><a class="dropdown-item" href="#">Politik</a></li>
                <li><a class="dropdown-item" href="#">Smart Environment</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div style="margin:0px;padding:0px; border:none; border-top:2px solid #000000;margin-bottom:20px"></div>
        <div class="row p-3">
          <div class="col-xl-8 ps-5 pe-5">
              @for($a=0; $a<5; $a++)
                <div class="mb-3 w-100" data-aos="fade-up" data-aos-delay="50">
                  <a href="/berita/detail">
                    <div class="d-flex justify-content-between">
                      <p style="color:#92929D;margin:0px;padding:0px;font-size:14px;text-align:left; margin-bottom: 5px;">Smart Environment</p>
                      <p style="color:#92929D;margin:0px;padding:0px;font-size:14px;text-align:left; margin-bottom: 5px;">17 Mei 2024</p>
                    </div>
                    <img src="/assets/img/bg.jpg" alt="" style="width: 100%">
                    <h3 class="mt-3" style="font-weight:700;">Pengelolaan Sampah di RDF Plant Rorotan, Jakarta Utara</h3>
                    <p class="mt-3" style="color:#92929D;font-size:16px;text-align:left;">RDF Plant Jakarta di Rorotan merupakan tempat pengolahan sampah, mengubahnya menjadi bahan bakar alternatif. Yuk intip inovasi dari Jakarta ini!</p>
                    <a href="mt-3 mb-5"style=" color:#000000;font-size:16px;font-weight:600;text-align:left;">Baca Artikel ></a>
                    <hr>
                  </a>
                </div>
              @endfor
          </div>
          <div class="col-xl-4 p-2">
            <div class="mb-5">
              <a href="">
                <img src="/assets/img/ad.png" alt="" style="width: 100%">
              </a>
            </div>
            @for($a=0; $a<5; $a++)
              <div class="mb-3 w-100" data-aos="fade-left" data-aos-delay="100">
                <a href="/berita/detail">
                  <div class="d-flex justify-content-between">
                    <p style="color:#92929D;margin:0px;padding:0px;font-size:12px;text-align:left; margin-bottom: 5px;">Smart Environment</p>
                    <p style="color:#92929D;margin:0px;padding:0px;font-size:12px;text-align:left; margin-bottom: 5px;">17 Mei 2024</p>
                  </div>
                  <img src="/assets/img/bg.jpg" alt="" style="width: 100%">
                  <h4 class="mt-3 mb-4" style="font-weight:600;">Pengelolaan Sampah di RDF Plant Rorotan, Jakarta Utara</h4>
                  <a href="mb-5">Baca Artikel ></a>
                  <hr>
                </a>
              </div>
            @endfor
          </div>
        </div>
      </div>
    </section>
    
    <section class="section" style="padding-top:0px;">
      <div class="container">        
        <div class="container section-title" data-aos="fade-up">
          <h2>Artikel Lainnya</h2>
          <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->
        <div class="row">
          @for($i=0; $i<10; $i++)
          <div class="col-xl-4 mb-3">
            <a href="/berita/detail">
              <div class="" style="width:100%;" data-aos="flip-left" data-aos-delay="300">
                <img src="/assets/img/bg.jpg" alt="" style="width: 100%">
                <h4 class="mt-3 mb-4" style="font-weight:600;">Pengelolaan Sampah di RDF Plant Rorotan, Jakarta Utara</h4>
                <a href="mb-5">Baca Artikel ></a>
              </div>
            </a>
          </div>
          @endfor
        </div>
      </div>
    </section>
@endsection