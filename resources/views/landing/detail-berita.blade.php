@extends('layouts.main')

@section('title')
<title>Amanah News - Berita</title>
@endsection

@section('style')
  <meta property="og:title" content="{{$post->title}}"/>
  <meta property="og:image" content="https://amanahnews.id/uploads/post/image/{{$post->banner}}"/>
  {{-- <meta property="og:description" content="3 words describe your website"/> --}}
  <meta property="og:url" content="https://amanahnews.id"/>
  {{-- <meta property="og:image:width" content="500" />
  <meta property="og:image:height" content="500"/> --}}
  <meta property="og:type" content="article"/> 
  <meta property="image_src" href="https://amanahnews.id/uploads/video/image/{{$post->banner}}"/>
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
                  <li><a href="/berita">Berita</a></li>
                  <li><a href="/berita/category/{{$post->category->slug}}">{{$post->category->name}}</a></li>
                  <li class="current">{{$post->slug}}</li>
                </ol>
              </div>
            </nav>
          </div><!-- End Page Title -->
    </section>

    <section class="mt-0 pt-0">
        {{-- <div class="col-1 " style="position: fixed; left:200px; top:200px;">
            <div class="row">
                <div class="col-1">
                    Bagikan Artikel
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{route('berita.detail', ['slug' => $post->slug])}}" class="mt-3 btn btn-primary" style="width:50px; height:50px; border-radius:50px"></a>
                    <a href="https://twitter.com/share?url={{route('berita.detail', ['slug' => $post->slug])}}" class="mt-3 btn btn-success" style="width:50px; height:50px; border-radius:50px"></a>
                    <a href="https://www.linkedin.com/uas/login?session_redirect={{route('berita.detail', ['slug' => $post->slug])}}" class="mt-3 btn btn-dark" style="width:50px; height:50px; border-radius:50px"></a>
                    <a href="https://web.whatsapp.com/send?text={{route('berita.detail', ['slug' => $post->slug])}}" class="mt-3 btn btn-warning" style="width:50px; height:50px; border-radius:50px"></a>
                </div>
            </div>
        </div> --}}
        <div class="container p-0 mt-0">

                <div class="">                
                    <div class="mt-3 mb-2">
                        <h1 style="font-weight:600">{{$post->title}}</h1>
                    </div>
                    <div class="mb-3">
                        <div class="row mb-2">
                            <div class="col-auto">
                                <img src="/uploads/user/{{$post->user->photo}}" alt="" style="width:70px; height:70px; border-radius:50px">
                            </div>
                            <div class="col-6">
                                <h5 class="mt-2" style="font-weight:600">{{$post->user->name}}</h5>
                                <p class=" " style="font-weight:600; color:rgba(0, 0, 0, 0.486)">{{$post->user->instance}}</p>
                            </div>
                            <div class="col d-flex justify-content-end">
                                {{-- <div class="row">
                                  <div class="col-12">
                                    Bagikan Artikel
                                  </div>
                                  <div class="col-12">
                                    <div class="col-lg-5 col-md-12 footer-about">
                                      <div class="social-links d-flex mt-4">
                                        <a href=""><i class="bi bi-twitter-x"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""><i class="bi bi-linkedin"></i></a>
                                      </div>
                                    </div>

                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{route('berita.detail', ['slug' => $post->slug])}}" class="btn btn-primary" style="width:50px; height:50px; border-radius:50px"></a>
                                    <a href="https://twitter.com/share?url={{route('berita.detail', ['slug' => $post->slug])}}" class="btn btn-success" style="width:50px; height:50px; border-radius:50px"></a>
                                    <a href="https://www.linkedin.com/uas/login?session_redirect={{route('berita.detail', ['slug' => $post->slug])}}" class="btn btn-dark" style="width:50px; height:50px; border-radius:50px"></a>
                                    <a href="https://web.whatsapp.com/send?text={{route('berita.detail', ['slug' => $post->slug])}}" class="btn btn-warning" style="width:50px; height:50px; border-radius:50px"></a>
                                  </div>
                                </div> --}}
                            </div>
                        </div>
                        <div>
                            <p>{{date('d M Y h:i', strtotime($post->updated_at))}} WIB - Waktu baca 1 menit</p>
                        </div>
                    </div>
                </div>

                <div class="row p-0 m-0">
                  <div class="col-xl-8" style="">
                    <img src="/uploads/post/image/{{$post->banner}}" alt="" style="width:100%">
                    <p class="mt-2" style="font-size:12px; color:rgba(0, 0, 0, 0.4)">{{$post->banner_source}}</p>
                    <div>
                      <?=$post->content ?>
                      @foreach($post->contents->where('post_type', 'photo') as $content)
                        @if($content->type=='image')
                        <div class="row p-0 m-0">
                            {{-- <div class="col-xl-8" style=""> --}}
                                @if($content->href)<a href="{{$content->href}}">@endif
                                <img src="/uploads/post/image/{{$content->content}}" alt="" style="max-width:{{$content->image_width}}px; max-height:{{$content->image_height}}px;">
                                @if($content->href)</a>@endif
                                <p class="mt-1" style="font-size:12px; color: color:rgba(255, 255, 255, 0.700)">{{$content->source}}</p>
                        </div>
                        @elseif($content->type=='text')
                            <?=$content->content?>
                        @endif

                      @endforeach
                    </div>
                </div>
                <div class="col-xl-4 p-3">
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
                        <a href="/berita/detail/{{$hot->slug}}">
                            <h5 class="p-0 m-0" style="font-weight:700; font-size:16px;">{{$hot->title}}</h5>
                            <div class="row p-0 m-0 mt-2">
                                <div class="col-auto p-0 m-0">
                                  <img src="/uploads/user/{{$post->user->photo}}" alt="" style="width:30px; height:30px; border-radius:50px">
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
        <div class="row p-0 m-0">
          <div class="col-auto">
              <h4>Tag</h4>
          </div>
          @foreach($post->tags as $tag)
            <div class="col-auto p-0 m-0 me-2 mb-3">
                <a href="/berita/tag/{{$tag->tagname->slug}}" class="btn btn-primary-orange">{{$tag->tagname->name}}</a>
            </div>
          @endforeach
        </div>    
        <div class="mt-3" style="border-bottom:2px solid #000000;">

        </div>
        
      </div>
    </section>

@endsection