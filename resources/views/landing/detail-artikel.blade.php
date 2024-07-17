@extends('layouts.main')

@section('title')
<title>Amanah News - Artikel</title>
@endsection

@section('style')
  <meta property="og:title" content="{{$post->title}}"/>
  <meta property="og:image" content="https://amanahnews.id/uploads/artikel/image/{{$post->banner}}"/>
  {{-- <meta property="og:description" content="3 words describe your website"/> --}}
  <meta property="og:url" content="https://amanahnews.id"/>
  {{-- <meta property="og:image:width" content="500" />
  <meta property="og:image:height" content="500"/> --}}
  <meta property="og:type" content="article"/>
  <meta property="image_src" href="https://amanahnews.id/uploads/artikel/image/{{$post->banner}}"/>
@endsection

@section('script')
<script src="/landing/assets/js/navbarDisScroll.js"></script>
<script src="/landing/assets/js/autoPreloader.js"></script>
@endsection

@section('main')
    <section class="pb-0 mb-0" style="margin-top: 40px;">
        <div class="mb-0 page-title" data-aos="fade">
            <nav class="breadcrumbs">
              <div class="container">
                <ol>
                  <li><a href="/artikel">Artikel</a></li>
                  <li><a href="/artikel/category/{{$post->category->slug}}">{{$post->category->name}}</a></li>
                  <li class="current">{{$post->slug}}</li>
                </ol>
              </div>
            </nav>
          </div><!-- End Page Title -->
    </section>

    <section class="pt-0 mt-0">
        {{-- <div class="col-1 " style="position: fixed; left:200px; top:200px;">
            <div class="row">
                <div class="col-1">
                    Bagikan Artikel
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{route('artikel.detail', ['slug' => $post->slug])}}" class="mt-3 btn btn-primary" style="width:50px; height:50px; border-radius:50px"></a>
                    <a href="https://twitter.com/share?url={{route('artikel.detail', ['slug' => $post->slug])}}" class="mt-3 btn btn-success" style="width:50px; height:50px; border-radius:50px"></a>
                    <a href="https://www.linkedin.com/uas/login?session_redirect={{route('artikel.detail', ['slug' => $post->slug])}}" class="mt-3 btn btn-dark" style="width:50px; height:50px; border-radius:50px"></a>
                    <a href="https://web.whatsapp.com/send?text={{route('artikel.detail', ['slug' => $post->slug])}}" class="mt-3 btn btn-warning" style="width:50px; height:50px; border-radius:50px"></a>
                </div>
            </div>
        </div> --}}
        <div class="container p-0 mt-0">

                <div class="ps-3 pe-3">
                    <div class="mt-3 mb-2">
                        <h1 style="font-weight:600">{{$post->title}}</h1>
                    </div>
                    <div class="mb-3 row">
                        <div class="mb-2 col-md-6 row">
                            <div class="col-auto">
                                <img src="/uploads/user/{{$post->user->photo}}" alt="" style="width:70px; height:70px; border-radius:50px">
                            </div>
                            <div class="col-6">
                                <h5 class="mt-2" style="font-weight:600">{{$post->user->name}}</h5>
                                <p class="" style="font-weight:600; color:rgba(0, 0, 0, 0.486)">{{$post->user->instance}}</p>
                            </div>
                            <div>
                              <?php
                                  $val = $post->view_total;
                                  $divider = "";
                                  $valPrint = "";
                                  if($val > 1000000000){
                                      $valPrint = number_format((float)($val/1000000000), 2, '.', '')." M";
                                  }
                                  else if($val > 1000000){
                                      $valPrint = number_format((float)($val/1000000), 2, '.', '')." Jt";
                                  }
                                  else if($val > 1000){
                                      $valPrint = number_format((float)($val/1000), 2, '.', '')." Rb";
                                  }
                                  else{
                                      $valPrint = $val;
                                  }

                              ?>
                                <p>{{date('d M Y H:i', strtotime($post->updated_at))}} WIB - Total Views {{$valPrint}}</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="p-0 m-0 row">
                  <div class="col-xl-8" style="">
                    <img src="/uploads/artikel/image/{{$post->banner}}" alt="" style="width:100%">
                    <p class="mt-2" style="font-size:12px; color:rgba(0, 0, 0, 0.4)">{{$post->banner_source}}</p>
                    <div>
                      <?=$post->content ?>
                      @foreach($post->contents->where('post_type', 'artikel') as $content)
                        @if($content->type=='image')
                        <div class="p-0 m-0 row">
                            {{-- <div class="col-xl-8" style=""> --}}
                                @if($content->href)<a href="{{$content->href}}">@endif
                                <img src="/uploads/artikel/image/{{$content->content}}" alt="" style="max-width:{{$content->image_width}}px; max-height:{{$content->image_height}}px;">
                                @if($content->href)</a>@endif
                                <p class="mt-1" style="font-size:12px; color: color:rgba(255, 255, 255, 0.700)">{{$content->source}}</p>
                        </div>
                        @elseif($content->type=='text')
                            <?=$content->content?>
                        @endif

                      @endforeach
                    </div>

                    <div class="p-0 m-0 mt-4 row">
                      <div class="col-auto">
                          <h4>Tag</h4>
                      </div>
                      @foreach($post->tags->where('post_type', 'artikel') as $tag)
                        <div class="col-auto p-0 m-0 mb-3 me-2">
                            <a href="/artikel/tag/{{$tag->tagname->slug}}" class="btn btn-primary-orange">{{$tag->tagname->name}}</a>
                        </div>
                      @endforeach
                    </div>
                    <div class="mt-3" style="border-bottom:2px solid #000000;">

                    </div>
                    <div class="mt-2 mb-3">
                          <h5 style="font-weight: 700;">Bagikan Artikel</h5>
                          <a href="https://www.facebook.com/sharer/sharer.php?u={{route('artikel.detail', ['slug' => $post->slug])}}" class="btn btn-primary me-2" style="position:relative; width:40px; height:40px; border-radius:5px"><i class="bi bi-facebook" style="position: absolute; font-size: 30px; transform:translate(-50%, -50%); top:49%; left:50%;"></i></a>
                          <a href="https://twitter.com/share?url={{route('artikel.detail', ['slug' => $post->slug])}}" class="btn btn-dark me-2" style="position:relative; width:40px; height:40px; border-radius:5px"><i class="bi bi-twitter-x" style="position: absolute; font-size: 25px; transform:translate(-50%, -50%); top:49%; left:50%;"></i></a>
                          <a href="https://www.linkedin.com/uas/login?session_redirect={{route('artikel.detail', ['slug' => $post->slug])}}" class="btn btn-primary me-2" style="position:relative; width:40px; height:40px; border-radius:5px"><i class="bi bi-linkedin" style="position: absolute; font-size: 25px; transform:translate(-50%, -50%); top:49%; left:50%;"></i></a>
                          <a href="https://web.whatsapp.com/send?text={{route('artikel.detail', ['slug' => $post->slug])}}" class="btn btn-success me-2" style="position:relative; width:40px; height:40px; border-radius:5px"><i class="bi bi-whatsapp" style="position: absolute; font-size: 25px; transform:translate(-50%, -50%); top:49%; left:50%;"></i></a>
                          <a href="https://telegram.me/share/url?url={{route('artikel.detail', ['slug' => $post->slug])}}" class="btn btn-primary me-2" style="position:relative; width:40px; height:40px; border-radius:5px; background-color:#26a5e4; border-color:#26a5e4"><i class="bi bi-telegram" style="position: absolute; font-size: 25px; transform:translate(-50%, -50%); top:49%; left:50%;"></i></a>
                    </div>
                </div>
                <div class="p-3 col-xl-4">
                  @if($iklan)
                  <div class="mb-5">
                    <form action="{{route('iklan.click')}}" method="POST">@csrf
                      <input type="hidden" name="id" value="{{$iklan->id}}">
                      <button type="submit">
                        <img src="/uploads/iklan/image/{{$iklan->type}}\{{$iklan->image}}" alt="" style="width: 100%">
                      </button>
                    </form>
                  </div>
                  @endif
                    <h4 style="font-weight: 600;">Sedang Hangat</h4>
                    <hr>
                    @foreach($hots as $a=>$hot)
                      <div class="w-100" data-aos="fade-left" data-aos-delay="100">
                        <a href="/artikel/detail/{{$hot->slug}}">
                            <h5 class="p-0 m-0" style="font-weight:700; font-size:16px;">{{$hot->title}}</h5>
                            <div class="p-0 m-0 mt-2 row">
                                <div class="col-auto p-0 m-0">
                                  <img src="/uploads/user/{{$post->user->photo}}" alt="" style="width:30px; height:30px; border-radius:50px">
                                </div>
                                <div class="col-auto p-0 m-0">
                                    <h5 style="font-weight:600; font-size:14px; margin-left:10px; margin-top:8px">{{$hot->user->name}}</h5>
                                </div>
                                <div class="col-auto m-0 ps-1 ms-2" style="padding:3px;width:4px; height:4px;">
                                    <button class="btn btn-secondary" style="width:3px; height:4px; border-radius:50px; margin:0px; padding:0px;background-color:rgba(0, 0, 0, 0.2); border-color:transparent;"></button>
                                </div>
                                <div class="p-0 m-0 col ms-2">
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

    <section class="section" style="padding-top:0px;">
      <div class="container">
        <div class="container section-title" data-aos="fade-up">
          <h2>Artikel Lainnya</h2>
        </div>
        <div class="row">
          @foreach($others as $i=>$lainnya)
          <div class="mb-3 col-xl-4">
            <a href="{{route('artikel.detail', ['slug' => $lainnya->slug])}}">
              <div class="" style="width:100%;" data-aos="flip-left" data-aos-delay="{{($i%3)*100}}">
                <img src="/uploads/artikel/image/{{$lainnya->banner}}" alt="" style="max-height:300px;width: 100%">
                <h4 class="mt-3 mb-4" style="font-weight:600;">{{$lainnya->title}}</h4>
                <a href="{{route('artikel.detail', ['slug' => $lainnya->slug])}}">Baca Artikel ></a>
              </div>
            </a>
          </div>
          @endforeach
          <div class="d-flex justify-content-center">

            <nav aria-label="...">

                <?php $per5 = (int)($others->currentPage()/3);?>
                <ul class="pagination">
                  <li class="page-item @if($others->currentPage() <= 1) disabled @endif">
                    <a href="{{route('artikel', ['page'=>$others->currentPage()-1])}}" class="page-link">Prev</a>
                  </li>
                  @if($others->currentPage() < 3)
                    @for($a=1; $a<=3; $a++)
                        @if($a == $others->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{$a}}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{route('artikel', ['page'=>$a])}}">{{$a}}</a></li>
                        @endif
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{route('artikel', ['page'=>$per5*3+4])}}">{{$per5*3+4}}</a></li>

                  @elseif($others->currentPage() > $others->lastPage()-3)
                    <li class="page-item"><a class="page-link" href="{{route('artikel', ['page'=>$per5*3-4])}}">{{$per5*3-4}}</a></li>
                    @for($a=$others->lastPage()-3; $a<=$others->lastPage(); $a++)
                        @if($a == $others->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{$a}}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{route('artikel', ['page'=>$a])}}">{{$a}}</a></li>
                        @endif
                    @endfor
                  @else
                    <li class="page-item"><a class="page-link" href="{{route('artikel', ['page'=>$per5*3-1])}}">{{$per5*3-1}}</a></li>
                    @for($a = ($per5 * 3); $a < ($per5 * 3 + 3); $a++)
                        @if($a == $others->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{$a}}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{route('artikel', ['page'=>$a])}}">{{$a}}</a></li>
                        @endif
                    @endfor
                    <li class="page-item"><a class="page-link" href="{{route('artikel', ['page'=>$per5*3+3])}}">{{$per5*3+3}}</a></li>
                  @endif
                  <li class="page-item @if($others->currentPage() >= $others->lastPage() ) disabled @endif">
                    <a class="page-link" href="{{route('artikel', ['page'=>$others->currentPage()+1])}}">Next</a>
                  </li>
                </ul>
              </nav>
        </div>
        </div>
      </div>
    </section>

@endsection
