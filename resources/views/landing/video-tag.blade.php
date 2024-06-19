@extends('layouts.main')

@section('title')
<title>Amanah News - video</title>
@endsection

@section('script')
<script src="/landing/assets/js/navbarDisScroll.js"></script>
<script src="/landing/assets/js/autoPreloader.js"></script>
@endsection

@section('main')
    <section class="mb-0 pb-0" style="margin-top: 40px;">
        <div class="mb-0 page-title" data-aos="fade">
            <nav class="breadcrumbs">
              <div class="container">
                <ol>
                  <li><a href="/video">Video</a></li>
                  <li><a href="/video/tag">Tag</a></li>
                  <li><a href="/video/tag/{{$selected->slug}}">{{$selected->name}}</a></li>
                </ol>
              </div>
            </nav>
          </div><!-- End Page Title -->
    </section>

  

    <section class="section" style="">
      <div class="container">
        <div class=" d-flex justify-content-center w-100">
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Cari video yang ingin anda baca" style="width: 50vw; border-width: 2px 2px;">
            </div>
            <div class="col">
              <button class="btn btn-primary-orange">Search</button>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <h3 class="mt-5" style="font-weight:500;margin:0px;padding:0px;text-align:left;">Tag {{$selected->name}} dari AMANAH Video</h3>
          </div>
          <div class="col d-flex justify-content-end align-items-end mb-2">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Category
              </button>
              <ul class="dropdown-menu">
                @foreach($categories as $category)
                <li><a class="dropdown-item" href="{{route('video.category', ['slug'=>$category->slug])}}">{{$category->name}}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <div style="margin:0px;padding:0px; border:none; border-top:2px solid #000000;margin-bottom:20px"></div>
        <div class="row p-3">
          <div class="col-xl-8 ps-5 pe-5">
              @foreach($filters as $a=>$new)
                <?php
                  $content = Str::limit($new->post->content, 370);
                  $content = str_replace("<div>","",$content);
                  $content = str_replace("</div>","",$content);
                ?>
                <div class="mb-3 w-100" data-aos="fade-up" data-aos-delay="50">
                  <a href="{{route('video.detail', ['slug' => $new->post->slug])}}">
                    <div class="d-flex justify-content-between">
                      <p style="color:#92929D;margin:0px;padding:0px;font-size:14px;text-align:left; margin-bottom: 5px;">{{$new->post->category->name}}</p>
                      <p style="color:#92929D;margin:0px;padding:0px;font-size:14px;text-align:left; margin-bottom: 5px;">{{date('d M Y', strtoTime($new->post->updated_at))}}</p>
                    </div>
                    <img src="/uploads/video/image/{{$new->post->banner}}" alt="" style="width: 100%">
                    <h3 class="mt-3" style="font-weight:700;">{{$new->post->title}}</h3>
                    <p class="mt-3" style="color:#92929D;font-size:16px;text-align:left;"><?= $content ?></p>
                    <a href="/video/detail/{{$new->post->slug}}"style=" color:#000000;font-size:16px;font-weight:600;text-align:left;">Baca Artikel ></a>
                    <hr>
                  </a>
                </div>
              @endforeach
          </div>
          <div class="col-xl-4 p-2">
            <div class="mb-5">
              <a href="">
                <img src="\assets\uploads\iklan\iklan1.png" alt="" style="width: 100%">
              </a>
            </div>
            @foreach($trendings as $i=>$trending)
              <div class="mb-3 w-100" data-aos="fade-left" data-aos-delay="100">
                <a href="{{route('video.detail', ['slug' => $trending->slug])}}">
                  <div class="d-flex justify-content-between">
                    <p style="color:#92929D;margin:0px;padding:0px;font-size:12px;text-align:left; margin-bottom: 5px;">{{$trending->category->name}}</p>
                    <p style="color:#92929D;margin:0px;padding:0px;font-size:12px;text-align:left; margin-bottom: 5px;">{{date('d M Y', strtoTime($trending->updated_at))}}</p>
                  </div>
                  <img src="/uploads/video/image/{{$trending->banner}}" alt="" style="width: 100%">
                  <h4 class="mt-3 mb-4" style="font-weight:600;">{{$trending->title}}</h4>
                  <a href="/video/detail/{{$trending->slug}}">Baca Artikel ></a>
                  <hr>
                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    
    <section class="section" style="padding-top:0px;">
      <div class="container">        
        <div class="container section-title" data-aos="fade-up">
          <h2>Artikel Lainnya</h2>
          {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
        </div>
        <div class="row">
          @foreach($others as $i=>$lainnya)
          <div class="col-xl-4 mb-3">
            <a href="{{route('video.detail', ['slug' => $lainnya->slug])}}">
              <div class="" style="width:100%;" data-aos="flip-left" data-aos-delay="{{($i%3)*100}}">
                <img src="/uploads/video/image/{{$lainnya->banner}}" alt="" style="width: 100%">
                <h4 class="mt-3 mb-4" style="font-weight:600;">{{$lainnya->title}}</h4>
                <a href="mb-5">Baca Artikel ></a>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </section>
@endsection