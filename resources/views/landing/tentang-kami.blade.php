@extends('layouts.main')

@section('title')
<title>Amanah News - About Us</title>
@endsection

@section('style-before')
<link rel="stylesheet" href="/calender/css/style.css">
@endsection

@section('style')
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .container-top{
            height: 400px;
        }
        .bg-container-top{
            background-color:var(--main-color);
            width:100%;
            min-height:400px;
            position: absolute;
            z-index: 0;
            top:0px;
        }
        @media only screen and (max-width: 600px) {
            .container-top{
                height: 500px;
            }
            .bg-container-top{
                height: 500px;
            }
        }
    </style>
@endsection

@section('script')
<script src="/landing/assets/js/navbarDisScroll.js"></script>
<script src="/landing/assets/js/disPreloader.js"></script>
<script src="/calender/js/popper.js"></script>
<script src="/calender/js/main.js"></script>
@endsection

@section('main')
    <section style="top: 0px; padding:0px; margin:0px;">
        <div class="container-top" style="">
            
            <div class="bg-container-top"></div>
            {{-- <img src="/assets/img/dimsum.png" alt="" style="position: absolute; width:100%; height:500px; z-index: 1; top:0px; opacity:7%;"> --}}
            <div class="topBar">
                <h2 style="color:white;font-weight:600;font-size:62px; margin:0px;padding:0px;text-align:center; margin-bottom: 50px;">Tentang Kami</h2>
                <p  style="color:white;font-size:18px; margin:0px;padding:0px;text-align:center; margin-bottom: 50px;">Izinkan kami perkenalkan siapa dan bagaimana visi misi kami kedepannya untuk dapat membantu anda memahami siapa kami.</p>
            </div>
        </div>
    </section>
    {{-- <section class="ftco-section mb-0 pb-0">
        <div class="container">
        </div>
    </section> --}}
    
    <section id="about" class="about section">
  
        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row align-items-xl-center gy-5">
  
            <div class="col-xl-5 order-2 order-lg-1 content">
                <h3>About Us</h3>
                <h1 style="font-weight:600">Kami bantu untuk membuat mereka menjadi lebih baik</h1>
                <ol>
                    <li>Mendapat prioritas untuk mengikuti berbagai pelatihan yang diadakan oleh masing-masing sektor program</li>
                    <li> Para anggota bisa mengikuti beragam kompetisi yang diselenggarakan oleh AMANAH dari berbagai sektor Program.</li>
                    <li> Berpeluang untuk memperluas jaringan usaha melalui program digital marketing AMANAH [Term & Condition]</li>
                    <li> Berkesempatan untuk mendapatkan pendampingan dan pengawasan dalam perkembangan bidang ekonomi kreatif [Term & Condition]</li>
                    <li> Berbagai fasilitas Gedung AMANAH dengan standar professional yang bisa menjadi wadah dalam mengembangkan usaha juga minat dan bakat anggota AMANAH.</li>
                </ol>
                <h5 style="font-weight: 600">
                    Daftar dan Bergabung Sekarang!
                    Jadi Bagian dari ANEUK MUDA ACEH UNGGUL DAN HEBAT!
                </h5>
              <a href="{{route('register')}}" class="read-more mt-3"><span>Daftar Sekarang</span></a>
            </div>
            
            <div class="col-lg-7 order-1 order-lg-2 d-flex justify-content-end" data-aos="zoom-out" data-aos-delay="100">
                <img src="assets/img/mengapa-amanah.png" alt="" class="stack-front">
            </div>
  
          </div>
        </div>
  
      </section><!-- /About Section -->
@endsection