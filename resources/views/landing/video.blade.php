@extends('layouts.main')

@section('title')
<title>Amanah News - Video</title>
@endsection

@section('script')
@if($carousel_items->count() == 0)
<script src="/landing/assets/js/navbarDisScroll.js"></script>
@else
<script src="/landing/assets/js/navbarScroll.js"></script>
@endif
<script src="/landing/assets/js/autoPreloader.js"></script>
@endsection

@section('main')
<section class="d-block d-xl-none" style="margin: 0px; padding: 0px; width:100%;">
  <div style="height: 100px">

  </div>
</section>
<!-- Hero Section -->
<section class="d-none d-xl-block" style="margin: 0px; padding: 0px; width:100%;">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" >
  
              @foreach($carousel_items as $a=>$carousel_item)
              <?php
                $content = Str::limit($carousel_item->content, 370);
                $content = str_replace("<div>","",$content);
                $content = str_replace("</div>","",$content);
              ?>
              <div class="carousel-item @if($a==0) active @endif" data-bs-interval="3000">
                <div style="background-color:#000000; width:100%; height:100%;position: absolute; z-index: 0; top:0px;"></div>
                <img src="/uploads/video/image/{{$carousel_item->banner}}" class="d-block w-100" alt="..." style="height: 100vh; background-size:cover; opacity:30%;z-index:1; overflow:hidden;">
                
                <div class="carousel-caption d-none d-md-block h-100 p-3" style="width: 1000px">
                  <div style="position: absolute; left:50px; top:50%; transform:translateY(-50%); height:100% color:white;">
                    <h5 style="color:white;font-weight:600;margin:0px;padding:0px;text-align:left; margin-bottom: 50px;">Peuhaba Aceh Gayo...</h5>
                    <h1 style="color:white;font-weight:800;font-size:56px; margin:0px;padding:0px;text-align:left; margin-bottom: 50px;">{{$carousel_item->title}}</h1>
                    <div style="color:white;margin:0px;padding:0px;font-size:16px;text-align:left; margin-bottom: 50px;"><?=$content?></div>
                      
                    <div class="d-flex justfiy-content-start align-items-start mt-4">
                      <a href="{{route('video.detail', ['slug' => $carousel_item->slug])}}" style="color:white;font-weight:600;font-size:20px;margin:0px;padding:0px;text-align:left; margin-bottom: 50px;">Lihat Selengkapnya ></a>
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
              @endforeach

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
            @if(isset($selected_category))
            <h3 class="mt-5" style="font-weight:500;margin:0px;padding:0px;text-align:left;">Category {{$selected_category->name}} dari AMANAH Video</h3>
            @elseif(isset($selected_tag))
            <h3 class="mt-5" style="font-weight:500;margin:0px;padding:0px;text-align:left;">Tag {{$selected_tag->name}} dari AMANAH Video</h3>
            @else
            <h3 class="mt-5" style="font-weight:500;margin:0px;padding:0px;text-align:left;">Terbaru dari AMANAH Video</h3>
            @endif
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
          <div class="col-xl-8 ps-2 pe-2">
              @foreach($newest as $a=>$new)
                <?php
                  $content = Str::limit($new->content, 370);
                  $content = str_replace("<div>","",$content);
                  $content = str_replace("</div>","",$content);
                ?>
                <div class="mb-3 w-100" data-aos="fade-up" data-aos-delay="50">
                  <a href="{{route('video.detail', ['slug' => $new->slug])}}">
                    <div class="d-flex justify-content-between">
                      <p style="color:#92929D;margin:0px;padding:0px;font-size:14px;text-align:left; margin-bottom: 5px;">{{$new->category->name}}</p>
                      <p style="color:#92929D;margin:0px;padding:0px;font-size:14px;text-align:left; margin-bottom: 5px;">{{date('d M Y', strtoTime($new->updated_at))}}</p>
                    </div>
                    <img src="/uploads/video/image/{{$new->banner}}" alt="" style="max-height:350px; width: 100%">
                    <h3 class="mt-3" style="font-weight:700;">{{$new->title}}</h3>
                    <p class="mt-3" style="color:#92929D;font-size:16px;text-align:left;"><?= $content ?></p>
                    <a href="/video/detail/{{$new->slug}}"style=" color:#000000;font-size:16px;font-weight:600;text-align:left;">Baca Artikel ></a>
                    <hr>
                  </a>
                </div>
              @endforeach
          </div>
          <div class="col-xl-4 p-2">
            <?php $videoCode = 'DsqMUJ7rbXg'; ?>
            @if($trendings->first())
            <div class="mb-3 w-100" data-aos="fade-left" data-aos-delay="100">
              <iframe style="width:100%; height:230px;" src="https://www.youtube.com/embed/{{$trendings->first()->video}}"></iframe>
            </div>
            @endif
            {{-- <div class="mb-3 w-100" data-aos="fade-left" data-aos-delay="100">
              <iframe style="width:100%; height:230px;" src="https://www.youtube.com/embed/{{$videoCode}}"></iframe>
            </div> --}}
            <div class="mb-5" data-aos="fade-left" data-aos-delay="100">
              <a href="">
                <img src="\assets\uploads\iklan\iklan1.png" alt="" style="width: 100%">
              </a>
            </div>
            @if(isset($selected_category))
            <div class="h3">Trending {{$selected_category->name}}</div>
            @elseif(isset($selected_tag))
            <div class="h3">Trending {{$selected_tag->name}}</div>
            @else
            <div class="h3">Trending</div>
            @endif
            <hr>
            @foreach($trendings as $i=>$trending)
              <div class="mb-3 w-100" data-aos="fade-left" data-aos-delay="100">
                <a href="{{route('video.detail', ['slug' => $trending->slug])}}">
                  <div class="d-flex justify-content-between">
                    <p style="color:#92929D;margin:0px;padding:0px;font-size:12px;text-align:left; margin-bottom: 5px;">{{$trending->category->name}}</p>
                    <p style="color:#92929D;margin:0px;padding:0px;font-size:12px;text-align:left; margin-bottom: 5px;">{{date('d M Y', strtoTime($trending->updated_at))}}</p>
                  </div>
                  <img src="/uploads/video/image/{{$trending->banner}}" alt="" style="max-height:300px;width: 100%;">
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
          @if(isset($selected_category))
            <h2>Berita Video {{$selected_category->name}} Lainnya</h2>
          @elseif(isset($selected_tag))
            <h2>Berita Video {{$selected_tag->name}} Lainnya</h2>
          @else
            <h2>Berita Video Lainnya</h2>
          @endif
          {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
        </div>
        <div class="row">
          @foreach($others as $i=>$lainnya)
          <div class="col-xl-4 mb-3">
            <a href="{{route('video.detail', ['slug' => $lainnya->slug])}}">
              <div class="" style="width:100%;" data-aos="flip-left" data-aos-delay="{{($i%3)*100}}">
                <img src="/uploads/video/image/{{$lainnya->banner}}" alt="" style="max-height:300px;width: 100%">
                <h4 class="mt-3 mb-4" style="font-weight:600;">{{$lainnya->title}}</h4>
                <a href="mb-5">Baca Artikel ></a>
              </div>
            </a>
          </div>
          @endforeach
          <div class="d-flex justify-content-center">

            <nav aria-label="...">
                
                <?php $per5 = (int)($others->currentPage()/3);?>
                <ul class="pagination">
                  <li class="page-item @if($others->currentPage() <= 1) disabled @endif">
                    <a href="{{route('video', ['page'=>$others->currentPage()-1])}}" class="page-link">Prev</a>
                  </li>
                  @if($others->currentPage() < 3)
                    @for($a=1; $a<=3; $a++)
                        @if($a == $others->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{$a}}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{route('video', ['page'=>$a])}}">{{$a}}</a></li>
                        @endif
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{route('video', ['page'=>$per5*3+4])}}">{{$per5*3+4}}</a></li>
                    
                  @elseif($others->currentPage() > $others->lastPage()-3)                      
                    <li class="page-item"><a class="page-link" href="{{route('video', ['page'=>$per5*3-4])}}">{{$per5*3-4}}</a></li>
                    @for($a=$others->lastPage()-3; $a<=$others->lastPage(); $a++)
                        @if($a == $others->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{$a}}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{route('video', ['page'=>$a])}}">{{$a}}</a></li>
                        @endif
                    @endfor
                  @else                 
                    <li class="page-item"><a class="page-link" href="{{route('video', ['page'=>$per5*3-1])}}">{{$per5*3-1}}</a></li>
                    @for($a = ($per5 * 3); $a < ($per5 * 3 + 3); $a++)
                        @if($a == $others->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{$a}}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{route('video', ['page'=>$a])}}">{{$a}}</a></li>
                        @endif
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{route('video', ['page'=>$per5*3+3])}}">{{$per5*3+3}}</a></li>
                  @endif
                  <li class="page-item @if($others->currentPage() >= $others->lastPage() ) disabled @endif">
                    <a class="page-link" href="{{route('video', ['page'=>$others->currentPage()+1])}}">Next</a>
                  </li>
                </ul>
              </nav>
        </div>
        </div>
      </div>
    </section>
@endsection