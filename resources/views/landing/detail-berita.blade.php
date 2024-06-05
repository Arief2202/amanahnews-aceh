@extends('layouts.main')

@section('title')
<title>Amanah News - Berita</title>
@endsection

@section('script')
<script src="/landing/assets/js/navbarDisScroll.js"></script>
@endsection

@section('main')
    <section class="mb-0 pb-0" style="margin-top: 40px;">
        <div class="mb-0 page-title" data-aos="fade">
            <nav class="breadcrumbs">
              <div class="container">
                <ol>
                  <li><a href="/berita">Berita</a></li>
                  <li class="current">{{$post->slug}}</li>
                </ol>
              </div>
            </nav>
          </div><!-- End Page Title -->
    </section>

    <section class="mt-0 pt-0">
        <div class="col-1 " style="position: fixed; left:200px; top:200px;">
            <div class="row">
                <div class="col-1">
                    Bagikan Artikel
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{route('berita.detail', ['slug' => $post->slug])}}" class="mt-3 btn btn-primary" style="width:50px; height:50px; border-radius:50px"></a>
                    <a href="https://twitter.com/share?url={{route('berita.detail', ['slug' => $post->slug])}}" class="mt-3 btn btn-success" style="width:50px; height:50px; border-radius:50px"></a>
                    <a href="https://www.linkedin.com/uas/login?session_redirect={{route('berita.detail', ['slug' => $post->slug])}}" class="mt-3 btn btn-dark" style="width:50px; height:50px; border-radius:50px"></a>
                    <a href="https://web.whatsapp.com/send?text={{route('berita.detail', ['slug' => $post->slug])}}" class="mt-3 btn btn-warning" style="width:50px; height:50px; border-radius:50px"></a>
                </div>
            </div>
        </div>
        <div class="container p-0 mt-0">
            <div class="ps-3">                
                <div class="mt-3 mb-2">
                    <h1 style="font-weight:600">{{$post->title}}</h1>
                </div>
                <div class="mb-3">
                    <div class="row mb-2">
                        <div class="col-auto">
                            <button class="mt-3 btn btn-secondary" style="width:70px; height:70px; border-radius:50px"></button>
                        </div>
                        <div class="col">
                            <h5 class="mt-3" style="font-weight:600">{{$post->user->name}}</h5>
                            <p class=" " style="font-weight:600; color:rgba(0, 0, 0, 0.486)">{{$post->user->instance}}</p>
                        </div>
                    </div>
                    <div>
                        <p>20 Mei 2024 7:46 WIB - Waktu baca 1 menit</p>
                    </div>
                </div>
            </div>
            <div class="row p-0 m-0">
                <div class="col-xl-8" style="">
                    <img src="/uploads/post/image/{{$post->banner}}" alt="" style="width:100%">
                    <p class="mt-2" style="font-size:12px; color:rgba(0, 0, 0, 0.4)">{{$post->banner_source}}</p>
                    <p>Jakarta (ANTARA) - Kementerian Perhubungan (Kemenhub) sedang berkoordinasi dengan Komite Nasional Keselamatan Transportasi (KNKT) dan kepolisian terkait pesawat yang jatuh di Kawasan Lapangan Sunburst Bumi Serpong Damai (BSD), Kecamatan Serpong, Tangerang Selatan, Banten, pada Minggu.</p>
                    <div>
                      <?=$post->content ?>
                    </div>
                </div>
                <div class="col-xl-4 p-2 ps-5">
                    <div class="mb-5">
                      <a href="">
                        <img src="\assets\uploads\iklan\iklan1.png" alt="" style="width: 100%">
                      </a>
                    </div>
                    <h4 style="font-weight: 600;">Sedang Hangat</h4>
                    <hr>
                    @foreach($hots as $a=>$hot)
                      <div class="w-100" data-aos="fade-left" data-aos-delay="100">
                        <a href="/berita/detail/{{$hot->slug}}">
                            <h5 class="p-0 m-0" style="font-weight:700; font-size:16px;">{{$hot->title}}</h5>
                            <div class="row p-0 m-0 mt-2">
                                <div class="col-auto p-0 m-0">
                                    <button class="btn btn-secondary p-0 m-0" style="width:30px; height:30px; border-radius:50px;"></button>
                                </div>
                                <div class="col-auto p-0 m-0">
                                    <h5 style="font-weight:600; font-size:14px; margin-left:10px; margin-top:8px">{{$hot->user->name}}</h5>
                                </div>
                                <div class="col-auto ps-1 m-0 ms-2" style="padding:3px;width:4px; height:4px;">
                                    <button class="btn btn-secondary" style="width:3px; height:4px; border-radius:50px; margin:0px; padding:0px;background-color:rgba(0, 0, 0, 0.2); border-color:transparent;"></button>
                                </div>
                                <div class="col p-0 m-0 ms-2">
                                    <p style="font-weight:600; font-size:12px; margin-top:7px; color:rgba(0, 0, 0, 0.423);">{{$hot->updated_at}}</p>
                                </div>
                            </div>
                          <hr>
                        </a>
                      </div>
                    @endforeach
                  </div>
            </div>
        </div>
    </section>

    <section class="section" >
      <div class="container">    
        <div class="row">
          <div class="col-auto">
              <h4>Tag</h4>
          </div>
          @for($a=0; $a<5;$a++)
            <div class="col-auto">
                <button class="btn btn-primary-orange">Tag {{$a+1}}</button>
            </div>
            @endfor
        </div>    
        <div class="mt-3" style="border-bottom:2px solid #000000;">

        </div>
        
      </div>
    </section>

@endsection