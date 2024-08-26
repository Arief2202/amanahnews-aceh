@extends('layouts.main')

@section('title')
    <title>
        Amanah News - Berita</title>
@endsection

@section('script')
    @if ($carousel_items->count() == 0 || strlen(request('search')) > 0 || request('page') > 1)
        <script src="/landing/assets/js/navbarDisScroll.js"></script>
    @else
        <script src="/landing/assets/js/navbarScroll.js"></script>
    @endif
    <script src="/landing/assets/js/autoPreloader.js"></script>
@endsection

@section('style')
    <style>
        .news-link-hover {
            display: inline-block;
            width: 100%;
        }

        .news-link-hover img {
            transition: transform 0.3s ease;
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .news-link-hover:hover img {
            transform: scale(1.1);
        }
    </style>
@endsection

@section('main')

    <section class="d-block d-xl-none" style="margin: 0px; padding: 0px; width:100%;">
        <div style="height: 100px">

        </div>
    </section>
    <!-- Hero Section -->
    @if (strlen(request('search')) > 0 || request('page') > 1)
        <section class="d-block" style="margin: 0px; padding: 0px; width:100%;">
            <div style="height: 100px">

            </div>
        </section>
    @else
        <section class="d-none d-xl-block" style="margin: 0px; padding: 0px; width:100%;">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    @foreach ($carousel_items as $a => $carousel_item)
                        <?php
                            $content = Str::limit($carousel_item->content, 370);
                            $content = str_replace('<div>', '', $content);
                            $content = str_replace('</div>', '', $content);
                        ?>
                        <div class="carousel-item @if ($a == 0) active @endif" data-bs-interval="3000">
                            <div
                                style="background-color:#000000; width:100%; height:100%;position: absolute; z-index: 0; top:0px;">
                            </div>
                            <img src="/uploads/post/image/{{ $carousel_item->banner }}" class="d-block w-100" alt="..."
                                style="height: 100vh; object-fit: cover; opacity: 0.3; z-index: 1;">

                            <div class="p-3 carousel-caption d-none d-md-block h-100" style="width: 1000px">
                                <div
                                    style="position: absolute; left:50px; top:50%; transform:translateY(-50%); height:100% color:white;">
                                    <h5
                                        style="color:white;font-weight:600;margin:0px;padding:0px;text-align:left; margin-bottom: 50px;">
                                        Peuhaba Aceh Gayo...</h5>
                                    <h1
                                        style="color:white;font-weight:800;font-size:56px; margin:0px;padding:0px;text-align:left; margin-bottom: 50px;">
                                        {{ $carousel_item->title }}</h1>
                                    <div
                                        style="color:white;margin:0px;padding:0px;font-size:16px;text-align:left; margin-bottom: 50px;">
                                        <?= $content ?></div>

                                    <div class="mt-4 d-flex justfiy-content-start align-items-start">
                                        <a href="{{ route('berita.detail', ['slug' => $carousel_item->slug]) }}"
                                            style="color:white;font-weight:600;font-size:20px;margin:0px;padding:0px;text-align:left; margin-bottom: 50px;">Lihat
                                            Selengkapnya ></a>
                                    </div>
                                    <div class="row" style="position:absolute">
                                        <div class="col">
                                            <button type="button" data-bs-target="#carouselExample" data-bs-slide="prev"
                                                style="background-color: transparent;border:none;">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                        </div>
                                        <div class="col">
                                            <button type="button" data-bs-target="#carouselExample" data-bs-slide="next"
                                                style="background-color: transparent;border:none;">
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

        <section class="d-block d-xl-none" style="margin: 0px; padding: 0px; width:100%; height: 300px; display: flex; justify-content: center; align-items: center;">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" style="width: 100%;">
                <div class="carousel-inner">
                    @foreach ($carousel_items as $a => $carousel_item)
                        <a href="{{ route('berita.detail', ['slug' => $carousel_item->slug]) }}">
                            <div class="carousel-item @if ($a == 0) active @endif" data-bs-interval="3000">
                                <!-- Image with lower opacity -->
                                <img src="/uploads/post/image/{{ $carousel_item->banner }}"
                                    class="d-block w-100 img-carousel-home-small" alt="..." style="height: 300px; object-fit: cover;">

                                <!-- Dark overlay -->
                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 1;"></div>

                                <!-- Keep the text fully opaque and centered -->
                                <div class="carousel-caption w-100 h-100 d-flex justify-content-center align-items-center" style="position: absolute; top: 0; left: 0; z-index: 2;">
                                    <div style="text-align: center; width: 100%;">
                                        <h1 style="color: #ffffff; font-weight:600; font-size: 4vw; max-width: 90%; margin: 0 auto;">
                                            {{ $carousel_item->title }}
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <section class="section" style="">
        <div class="container">
            <div class=" d-flex justify-content-center w-100">
                <form action="" method="get">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Cari Berita yang ingin anda baca"
                                name="search" value="{{ request('search') }}" style="width: 50vw; border-width: 2px 2px;">
                        </div>
                        <div class="col">
                            <button class="btn btn-primary-orange">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col">
                    @if (strlen(request('search')) > 0)
                        <h3 class="mt-5" style="font-weight:500;margin:0px;padding:0px;text-align:left;">Pencarian
                            "{{ Str::limit(request('search'), 50) }}"<h3>
                            @else
                                @if (isset($selected_category))
                                    <h3 class="mt-5" style="font-weight:500;margin:0px;padding:0px;text-align:left;">
                                        Category {{ $selected_category->name }} dari AMANAH @if (request('page') > 1)
                                            (Page {{ request('page') }})
                                        @endif
                                    </h3>
                                @elseif(isset($selected_tag))
                                    <h3 class="mt-5" style="font-weight:500;margin:0px;padding:0px;text-align:left;">Tag
                                        {{ $selected_tag->name }} dari AMANAH @if (request('page') > 1)
                                            (Page {{ request('page') }})
                                        @endif
                                    </h3>
                                @else
                                    <h3 class="mt-5" style="font-weight:500;margin:0px;padding:0px;text-align:left;">
                                        Terbaru dari AMANAH @if (request('page') > 1)
                                            (Page {{ request('page') }})
                                        @endif
                                    </h3>
                                @endif
                    @endif
                </div>
                <div class="mb-2 col d-flex justify-content-end align-items-end">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Category
                        </button>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item"
                                        href="{{ route('berita.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div style="margin:0px;padding:0px; border:none; border-top:2px solid #000000;margin-bottom:20px"></div>
            <div class="p-3 row">
                <div class="col-xl-8 ps-2 pe-2">
                    @if (strval(request('search')) > 0)
                        @foreach ($search['items'] as $a => $new)
                            <?php
                            $content = Str::limit($new->content, 370);
                            $content = str_replace('<div>', '', $content);
                            $content = str_replace('</div>', '', $content);
                            ?>
                            <div class="mb-3 w-100 news-link-hover" data-aos="fade-up" data-aos-delay="50">
                                <a href="{{ route('berita.detail', ['slug' => $new->slug]) }}">
                                    <div class="d-flex justify-content-between">
                                        <p
                                            style="color:#92929D;margin:0px;padding:0px;font-size:14px;text-align:left; margin-bottom: 5px;">
                                            {{ $new->category->name }}</p>
                                        <p
                                            style="color:#92929D;margin:0px;padding:0px;font-size:14px;text-align:left; margin-bottom: 5px;">
                                            {{ date('d M Y', strtoTime($new->updated_at)) }}</p>
                                    </div>
                                    <img src="/uploads/post/image/{{ $new->banner }}" alt=""
                                        style="max-height:350px;width: 100%;object-fit:cover;">
                                    <h3 class="mt-3" style="font-weight:700;">{{ $new->title }}</h3>
                                    <p class="mt-3" style="color:#92929D;font-size:16px;text-align:left;">
                                        <?= $content ?>
                                    </p>
                                    <a href="/berita/detail/{{ $new->slug }}"
                                        style="color:#000000;font-size:16px;font-weight:600;text-align:left;">
                                        Baca Berita ></a>
                                    <hr>
                                </a>
                            </div>
                        @endforeach
                        @if ($search['total_item'] > 0)
                            <div class="d-flex justify-content-center">
                                <nav aria-label="...">
                                    <?php $per5 = (int) ($search['currentPage'] / 3); ?>
                                    <ul class="pagination">
                                        <li class="page-item @if ($search['currentPage'] <= 1) disabled @endif">
                                            <a href="{{ route('berita', ['page' => $search['currentPage'] - 1]) }}&search={{ request('search') }}"
                                                class="page-link">Prev</a>
                                        </li>

                                        @if ($search['lastPage'] > 3)
                                            @if ($search['currentPage'] < 3)
                                                @for ($a = 1; $a <= 3; $a++)
                                                    @if ($a == $search['currentPage'])
                                                        <li class="page-item active" aria-current="page">
                                                            <span class="page-link">{{ $a }}</span>
                                                        </li>
                                                    @else
                                                        <li class="page-item">
                                                            <a class="page-link"
                                                                href="{{ route('berita', ['page' => $a]) }}&search={{ request('search') }}">
                                                                {{ $a }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endfor
                                                <li class="page-item">
                                                    <a class="page-link"
                                                        href="{{ route('berita', ['page' => $per5 * 3 + 4]) }}&search={{ request('search') }}">
                                                        {{ $per5 * 3 + 4 }}
                                                    </a>
                                                </li>
                                            @elseif($search['currentPage'] > $search['lastPage'] - 3)
                                                <li class="page-item">
                                                    <a class="page-link"
                                                        href="{{ route('berita', ['page' => $per5 * 3 - 4]) }}&search={{ request('search') }}">
                                                        {{ $per5 * 3 - 4 }}
                                                    </a>
                                                </li>
                                                @for ($a = $search['lastPage'] - 3; $a <= $search['lastPage']; $a++)
                                                    @if ($a == $search['currentPage'])
                                                        <li class="page-item active" aria-current="page">
                                                            <span class="page-link">{{ $a }}</span>
                                                        </li>
                                                    @else
                                                        <li class="page-item">
                                                            <a class="page-link"
                                                                href="{{ route('berita', ['page' => $a]) }}&search={{ request('search') }}">
                                                                {{ $a }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endfor
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link"
                                                        href="{{ route('berita', ['page' => $per5 * 3 - 1]) }}&search={{ request('search') }}">
                                                        {{ $per5 * 3 - 1 }}
                                                    </a>
                                                </li>
                                                @for ($a = $per5 * 3; $a < $per5 * 3 + 3; $a++)
                                                    @if ($a == $search['currentPage'])
                                                        <li class="page-item active" aria-current="page">
                                                            <span class="page-link">{{ $a }}</span>
                                                        </li>
                                                    @else
                                                        <li class="page-item">
                                                            <a class="page-link"
                                                                href="{{ route('berita', ['page' => $a]) }}&search={{ request('search') }}">
                                                                {{ $a }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endfor
                                                <li class="page-item">
                                                    <a class="page-link"
                                                        href="{{ route('berita', ['page' => $per5 * 3 + 3]) }}&search={{ request('search') }}">
                                                        {{ $per5 * 3 + 3 }}
                                                    </a>
                                                </li>
                                            @endif
                                        @else
                                            @for ($a = 1; $a <= $search['lastPage']; $a++)
                                                @if ($a == $search['currentPage'])
                                                    <li class="page-item active" aria-current="page">
                                                        <span class="page-link">{{ $a }}</span>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ route('berita', ['page' => $a]) }}&search={{ request('search') }}">
                                                            {{ $a }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endfor
                                        @endif
                                        <li class="page-item @if ($search['currentPage'] >= $search['lastPage']) disabled @endif">
                                            <a class="page-link"
                                                href="{{ route('berita', ['page' => $search['currentPage'] + 1]) }}&search={{ request('search') }}">
                                                Next
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        @else
                            <p>Data Pencarian tidak ditemukan</p>
                        @endif
                    @else
                        @if (request('page') > 1)
                            @foreach ($others as $a => $new)
                                <?php
                                $content = Str::limit($new->content, 370);
                                $content = str_replace('<div>', '', $content);
                                $content = str_replace('</div>', '', $content);
                                ?>
                                <div class="mb-3 w-100 news-link-hover" data-aos="fade-up" data-aos-delay="50">
                                    <a href="{{ route('berita.detail', ['slug' => $new->slug]) }}">
                                        <div class="d-flex justify-content-between">
                                            <p
                                                style="color:#92929D;margin:0px;padding:0px;font-size:14px;text-align:left; margin-bottom: 5px;">
                                                {{ $new->category->name }}</p>
                                            <p
                                                style="color:#92929D;margin:0px;padding:0px;font-size:14px;text-align:left; margin-bottom: 5px;">
                                                {{ date('d M Y', strtoTime($new->updated_at)) }}</p>
                                        </div>
                                        <img src="/uploads/post/image/{{ $new->banner }}" alt=""
                                            style="max-height:350px;width: 100%;object-fit:cover;">
                                        <h3 class="mt-3" style="font-weight:700;">{{ $new->title }}</h3>
                                        <p class="mt-3" style="color:#92929D;font-size:16px;text-align:left;">
                                            <?= $content ?>
                                        </p>
                                        <a href="/berita/detail/{{ $new->slug }}"
                                            style="color:#000000;font-size:16px;font-weight:600;text-align:left;">
                                            Baca Berita ></a>
                                        <hr>
                                    </a>
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-center">
                                <nav aria-label="...">
                                    <?php $per5 = (int) ($others->currentPage() / 3); ?>
                                    <ul class="pagination">
                                        <li class="page-item @if ($others->currentPage() <= 1) disabled @endif">
                                            <a href="{{ request()->getPathInfo() }}?page={{ $others->currentPage() - 1 }}"
                                                class="page-link">Prev</a>
                                        </li>
                                        @if ($others->currentPage() < 3)
                                            @for ($a = 1; $a <= 3; $a++)
                                                @if ($a == $others->currentPage())
                                                    <li class="page-item active" aria-current="page">
                                                        <span class="page-link">{{ $a }}</span>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ request()->getPathInfo() }}?page={{ $a }}">
                                                            {{ $a }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endfor
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="{{ request()->getPathInfo() }}?page={{ $per5 * 3 + 4 }}">
                                                    {{ $per5 * 3 + 4 }}
                                                </a>
                                            </li>
                                        @elseif($others->currentPage() > $others->lastPage() - 3)
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="{{ request()->getPathInfo() }}?page={{ $per5 * 3 - 4 }}">
                                                    {{ $per5 * 3 - 4 }}
                                                </a>
                                            </li>
                                            @for ($a = $others->lastPage() - 3; $a <= $others->lastPage(); $a++)
                                                @if ($a == $others->currentPage())
                                                    <li class="page-item active" aria-current="page">
                                                        <span class="page-link">{{ $a }}</span>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ request()->getPathInfo() }}?page={{ $a }}">
                                                            {{ $a }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endfor
                                        @else
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="{{ request()->getPathInfo() }}?page={{ $per5 * 3 - 1 }}">
                                                    {{ $per5 * 3 - 1 }}
                                                </a>
                                            </li>
                                            @for ($a = $per5 * 3; $a < $per5 * 3 + 3; $a++)
                                                @if ($a == $others->currentPage())
                                                    <li class="page-item active" aria-current="page">
                                                        <span class="page-link">{{ $a }}</span>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ request()->getPathInfo() }}?page={{ $a }}">
                                                            {{ $a }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endfor
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="{{ request()->getPathInfo() }}?page={{ $per5 * 3 + 3 }}">
                                                    {{ $per5 * 3 + 3 }}
                                                </a>
                                            </li>
                                        @endif
                                        <li class="page-item @if ($others->currentPage() >= $others->lastPage()) disabled @endif">
                                            <a class="page-link"
                                                href="{{ request()->getPathInfo() }}?page={{ $others->currentPage() + 1 }}">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        @else
                            @foreach ($newest as $a => $new)
                                <?php
                                $content = Str::limit($new->content, 370);
                                $content = str_replace('<div>', '', $content);
                                $content = str_replace('</div>', '', $content);
                                ?>
                                <div class="mb-3 w-100 news-link-hover" data-aos="fade-up" data-aos-delay="50">
                                    <a href="{{ route('berita.detail', ['slug' => $new->slug]) }}">
                                        <div class="d-flex justify-content-between">
                                            <p
                                                style="color:#92929D;margin:0px;padding:0px;font-size:14px;text-align:left; margin-bottom: 5px;">
                                                {{ $new->category->name }}</p>
                                            <p
                                                style="color:#92929D;margin:0px;padding:0px;font-size:14px;text-align:left; margin-bottom: 5px;">
                                                {{ date('d M Y', strtoTime($new->updated_at)) }}</p>
                                        </div>
                                        <img src="/uploads/post/image/{{ $new->banner }}" alt=""
                                            style="max-height:350px;width: 100%;object-fit:cover;">
                                        <h3 class="mt-3" style="font-weight:700;">{{ $new->title }}</h3>
                                        <p class="mt-3" style="color:#92929D;font-size:16px;text-align:left;">
                                            <?= $content ?>
                                        </p>
                                        <a href="/berita/detail/{{ $new->slug }}"
                                            style="color:#000000;font-size:16px;font-weight:600;text-align:left;">
                                            Baca Berita ></a>
                                        <hr>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    @endif
                </div>

                <div class="p-2 col-xl-4">
                    @if ($iklan)
                        <div class="mb-5">
                            <form action="{{ route('iklan.click') }}" method="POST">@csrf
                                <input type="hidden" name="id" value="{{ $iklan->id }}">
                                <button type="submit">
                                    <img src="/uploads/iklan/image/{{ $iklan->type }}\{{ $iklan->image }}"
                                        alt="" style="width: 100%">
                                </button>
                            </form>
                        </div>
                    @endif
                    @if (isset($selected_category))
                        <div class="h3">Trending {{ $selected_category->name }}</div>
                    @elseif(isset($selected_tag))
                        <div class="h3">Trending {{ $selected_tag->name }}</div>
                    @else
                        <div class="h3">Trending</div>
                    @endif
                    <hr>
                    @foreach ($trendings as $i => $trending)
                        <div class="mb-3 w-100" data-aos="fade-left" data-aos-delay="100">
                            <a href="{{ route('berita.detail', ['slug' => $trending->slug]) }}">
                                <div class="d-flex justify-content-between">
                                    <p
                                        style="color:#92929D;margin:0px;padding:0px;font-size:12px;text-align:left; margin-bottom: 5px;">
                                        {{ $trending->category->name }}</p>
                                    <p
                                        style="color:#92929D;margin:0px;padding:0px;font-size:12px;text-align:left; margin-bottom: 5px;">
                                        {{ date('d M Y', strtoTime($trending->updated_at)) }}</p>
                                </div>
                                <img src="/uploads/post/image/{{ $trending->banner }}" alt=""
                                    style="max-height:300px;width: 100%;">
                                <h4 class="mt-3 mb-4" style="font-weight:600;">{{ $trending->title }}</h4>
                                <a href="/berita/detail/{{ $trending->slug }}">Baca Berita ></a>
                                <hr>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @if (strval(request('search')) > 0 || request('page') > 1)
    @else
        <section class="section" style="padding-top:0px;">
            <div class="container">
                <div class="container section-title" data-aos="fade-up">
                    @if (isset($selected_category))
                        <h2>Berita {{ $selected_category->name }} Lainnya</h2>
                    @elseif(isset($selected_tag))
                        <h2>Berita {{ $selected_tag->name }} Lainnya</h2>
                    @else
                        <h2>Berita Lainnya</h2>
                    @endif
                    {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
                </div>
                <div class="row">
                    @foreach ($others as $i => $lainnya)
                        <?php
                        if (isset($selected_tag)) {
                            $lainnya = $lainnya->post;
                        }
                        ?>
                        <div class="mb-3 col-xl-4 col-12">
                            <a href="{{ route('berita.detail', ['slug' => $lainnya->slug]) }}">
                                <div class="" style="width:100%;" data-aos="flip-left"
                                    data-aos-delay="{{ ($i % 3) * 100 }}">
                                    <!-- Aspect ratio container -->
                                    <div class="col-12"
                                        style="position: relative; width: 100%; padding-bottom: 56.25%; overflow: hidden;">
                                        <img src="/uploads/post/image/{{ $lainnya->banner }}" alt=""
                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <h4 class="mt-3 mb-4" style="font-weight:600;">{{ $lainnya->title }}</h4>
                                    <a href="{{ route('berita.detail', ['slug' => $lainnya->slug]) }}">Baca Berita ></a>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center">

                        <nav aria-label="...">

                            <?php $per5 = (int) ($others->currentPage() / 3); ?>
                            <ul class="pagination">
                                <li class="page-item @if ($others->currentPage() <= 1) disabled @endif">
                                    <a href="{{ request()->getPathInfo() }}?page={{ $others->currentPage() - 1 }}"
                                        class="page-link">Prev</a>
                                </li>
                                @if ($others->currentPage() < 3)
                                    @for ($a = 1; $a <= 3; $a++)
                                        @if ($a == $others->currentPage())
                                            <li class="page-item active" aria-current="page"><span
                                                    class="page-link">{{ $a }}</span></li>
                                        @else
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ request()->getPathInfo() }}?page={{ $a }}">{{ $a }}</a>
                                            </li>
                                        @endif
                                    @endfor
                                    <li class="page-item"><a class="page-link"
                                            href="{{ request()->getPathInfo() }}?page={{ $per5 * 3 + 4 }}">{{ $per5 * 3 + 4 }}</a>
                                    </li>
                                @elseif($others->currentPage() > $others->lastPage() - 3)
                                    <li class="page-item"><a class="page-link"
                                            href="{{ request()->getPathInfo() }}?page={{ $per5 * 3 - 4 }}">{{ $per5 * 3 - 4 }}</a>
                                    </li>
                                    @for ($a = $others->lastPage() - 3; $a <= $others->lastPage(); $a++)
                                        @if ($a == $others->currentPage())
                                            <li class="page-item active" aria-current="page"><span
                                                    class="page-link">{{ $a }}</span></li>
                                        @else
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ request()->getPathInfo() }}?page={{ $a }}">{{ $a }}</a>
                                            </li>
                                        @endif
                                    @endfor
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ request()->getPathInfo() }}?page={{ $per5 * 3 - 1 }}">{{ $per5 * 3 - 1 }}</a>
                                    </li>
                                    @for ($a = $per5 * 3; $a < $per5 * 3 + 3; $a++)
                                        @if ($a == $others->currentPage())
                                            <li class="page-item active" aria-current="page"><span
                                                    class="page-link">{{ $a }}</span></li>
                                        @else
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ request()->getPathInfo() }}?page={{ $a }}">{{ $a }}</a>
                                            </li>
                                        @endif
                                    @endfor
                                    <li class="page-item"><a class="page-link"
                                            href="{{ request()->getPathInfo() }}?page={{ $per5 * 3 + 3 }}">{{ $per5 * 3 + 3 }}</a>
                                    </li>
                                @endif
                                <li class="page-item @if ($others->currentPage() >= $others->lastPage()) disabled @endif">
                                    <a class="page-link"
                                        href="{{ request()->getPathInfo() }}?page={{ $others->currentPage() + 1 }}">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
