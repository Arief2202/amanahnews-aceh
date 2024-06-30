@extends('layouts.main')

@section('title')
<title>Amanah News - Video</title>
@endsection

@section('script')
<script src="/landing/assets/js/navbarDisScroll.js"></script>
<script src="/landing/assets/js/autoPreloader.js"></script>
@endsection

@section('style')
  <meta property="og:title" content="{{$post->title}}"/>
  <meta property="og:image" content="/uploads/video/image/{{$post->banner}}"/>
  {{-- <meta property="og:description" content="3 words describe your website"/> --}}
  <meta property="og:url" content="https://amanahnews.id"/>
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="1200"/>
  <meta property="og:type" content="website"/> 
@endsection

@section('main')
    <section class="mb-0 pb-0" style="margin-top: 40px;">
        <div class="mb-0 page-title" data-aos="fade">
            <nav class="breadcrumbs">
              <div class="container">
                <ol>
                  <li><a href="/video">Video</a></li>
                  <li><a href="/video/category/{{$post->category->slug}}">{{$post->category->name}}</a></li>
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
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{route('video.detail', ['slug' => $post->slug])}}" class="mt-3 btn btn-primary" style="width:50px; height:50px; border-radius:50px"></a>
                    <a href="https://twitter.com/share?url={{route('video.detail', ['slug' => $post->slug])}}" class="mt-3 btn btn-success" style="width:50px; height:50px; border-radius:50px"></a>
                    <a href="https://www.linkedin.com/uas/login?session_redirect={{route('video.detail', ['slug' => $post->slug])}}" class="mt-3 btn btn-dark" style="width:50px; height:50px; border-radius:50px"></a>
                    <a href="https://web.whatsapp.com/send?text={{route('video.detail', ['slug' => $post->slug])}}" class="mt-3 btn btn-warning" style="width:50px; height:50px; border-radius:50px"></a>
                </div>
            </div>
        </div> --}}
        <div class="container p-0 mt-0">
            <div class="ps-3">                
                <div class="mt-3 mb-2">
                    <h1 style="font-weight:600">{{$post->title}}</h1>
                </div>
                <div class="mb-3">
                    <div class="row mb-2">
                        <div class="col-auto">
                          <img src="/uploads/user/{{$post->user->photo}}" alt="" style="width:70px; height:70px; border-radius:50px">
                        </div>
                        <div class="col">
                            <h5 class="mt-2" style="font-weight:600">{{$post->user->name}}</h5>
                            <p class=" " style="font-weight:600; color:rgba(0, 0, 0, 0.486)">{{$post->user->instance}}</p>
                        </div>
                    </div>
                    <div>
                        <p>{{date('d M Y h:i', strtotime($post->updated_at))}} WIB - Waktu baca 1 menit</p>
                    </div>
                </div>
            </div>
            <div class="row p-0 m-0">
                <div class="col-xl-8" style="">
                  <iframe style="width:100%; height:500px;" src="https://www.youtube.com/embed/{{$post->video}}"></iframe>
                    <p class="mt-2" style="font-size:12px; color:rgba(0, 0, 0, 0.4)">{{$post->video_source}}</p>
                    <div>
                      <?=$post->content ?>
                      @foreach($post->contents->where('post_type', 'video')->where('saved', '1') as $content)
                        @if($content->type=='image')
                        <div class="row p-0 m-0">
                            {{-- <div class="col-xl-8" style=""> --}}
                                @if($content->href)<a href="{{$content->href}}">@endif
                                <img src="/uploads/post/image/{{$content->content}}" alt="" style="max-width:{{$content->image_width}}px; max-height:{{$content->image_height}}px;">
                                @if($content->href)</a>@endif
                                <p class="mt-1" style="font-size:12px; color: color:rgba(255, 255, 255, 0.700)">{{$content->source}}</p>
                        </div>
                        @elseif($content->type=='video')
                        <div class="mt-2">
                          <iframe style="width:100%; height:500px;" src="https://www.youtube.com/embed/{{$content->content}}"></iframe>
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
                        <a href="/video/detail/{{$hot->slug}}">
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
                <a href="/video/tag/{{$tag->tagname->slug}}" class="btn btn-primary-orange">{{$tag->tagname->name}}</a>
            </div>
          @endforeach
        </div>    
        <div class="mt-3" style="border-bottom:2px solid #000000;">

        </div>
        
      </div>
    </section>

@endsection