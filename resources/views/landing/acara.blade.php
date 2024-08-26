@extends('layouts.main')

@section('title')
    <title>
        Amanah News - Acara</title>
@endsection

@section('style-before')
    <link rel="stylesheet" href="/calender/css/style.css">
@endsection

@section('style')
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <div class="topBar">
                <h2
                    style="color:white;font-weight:600;font-size:62px; margin:0px;padding:0px;text-align:center; margin-bottom: 50px;">
                    Acara</h2>
                <p style="color:white;font-size:18px; margin:0px;padding:0px;text-align:center; margin-bottom: 50px;">
                    Berikut merupakan Kalender mengenai acara-acara yang diselenggarakan oleh Amanah. Ayo Sobat, daftar
                    Amanah sekarang juga dan nikmati berbagai fasilitas pemasaran produk melalui acara Amanah secara gratis,
                    lho!</p>
            </div>
        </div>
    </section>
    @if (request('search'))
    @else
        <section class="pb-0 mb-0 ftco-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="calendar-section">

                            <div class="calendar calendar-first" id="calendar_first">
                                <div class="calendar_header">
                                    <button class="switch-month switch-left">
                                        <i class="fa fa-chevron-left"></i>
                                    </button>
                                    <h2></h2>
                                    <button class="switch-month switch-right">
                                        <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                                <div class="calendar_weekdays"></div>
                                <div class="calendar_content"></div>
                            </div>


                        </div>
                    </div>

                    <div class="mb-3 col-md-5">
                        <div class="p-2 shadow" style="border-radius: 15px">
                            <div class="pt-3 h3 ps-3 pe-3">Acara Hari Ini ({{ $today->count() }})</div>
                            <hr>
                            <?php $count = 0; ?>
                            @foreach ($today as $i => $acara)
                                <?php
                                $content = Str::limit($acara->deskripsi, 50);
                                $content = str_replace('<div>', '', $content);
                                $content = str_replace('</div>', '', $content);
                                if ($today->count() > 3) {
                                    $count++;
                                    if ($count >= 4) {
                                        break;
                                    }
                                }
                                ?>

                                <div class="p-2 mb-3">
                                    <a href="{{ route('acara.detail', ['id' => $acara->slug]) }}">
                                        <div class="shadow" style="border-radius: 15px; overflow: hidden;">
                                            <div class="row">
                                                <div class="col-md">
                                                    <!-- Aspect ratio container for 1:1 image -->
                                                    <div
                                                        style="position: relative; width: 100%; padding-bottom: 100%; overflow: hidden;">
                                                        <img src="/uploads/acara/image/{{ $acara->poster }}" alt=""
                                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                                                    </div>
                                                </div>
                                                <div class="col-md d-flex flex-column justify-content-between">
                                                    <div>
                                                        <h5 style="font-weight:600; font-size:14px;">{{ $acara->title }}
                                                        </h5>
                                                        <p style="color:rgb(121, 121, 121); font-size:12px;">
                                                            {{ $content }}</p>
                                                        <p style="color:rgb(121, 121, 121); font-size:12px;">
                                                            {{ date('d M Y', strtotime($acara->start_acara_date)) }}
                                                            @if (isset($acara->end_acara_date))
                                                                - {{ date('d M Y', strtotime($acara->end_acara_date)) }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <button class="mt-auto btn btn-primary-orange"
                                                        style="width:100%; border-radius:10px">Read More</button>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <hr>
                            @endforeach
                            @if ($today->count() > 3)
                                <div style="m-3 w-100">
                                    <button class="btn btn-primary w-100" data-bs-toggle="modal"
                                        data-bs-target="#myModalToday">Acara Hari Ini Lainnya</button>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

            </div>

            </div>
        </section>
        @if ($iklan)
            <section class="section">
                <div class="container">
                    <form action="{{ route('iklan.click') }}" method="POST">@csrf
                        <input type="hidden" name="id" value="{{ $iklan->id }}">
                        <button type="submit">
                            <img src="/uploads/iklan/image/{{ $iklan->type }}\{{ $iklan->image }}" alt=""
                                style="width: 100%">
                        </button>
                    </form>
                </div>
            </section>
        @endif
    @endif

    <section class="section" style="">
        <div class="container">
            @if (request('search'))
            @else
                <div class="container section-title" data-aos="fade-up">
                    <h2>Acara Lainnya</h2>
                </div><!-- End Section Title -->
            @endif
            <div class="mb-3 d-flex justify-content-center w-100">
                <form action="" method="get">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Cari Acara yang anda inginkan..."
                                name="search" value="{{ request('search') }}" style="width: 50vw; border-width: 2px 2px;">
                        </div>
                        <div class="col">
                            <button class="btn btn-primary-orange">Cari Disini</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="">
                <div class="p-3 row">
                    @foreach ($acaras as $acara)
                        <?php
                        $content = Str::limit($acara->deskripsi, 75);
                        $content = str_replace('<div>', '', $content);
                        $content = str_replace('</div>', '', $content);
                        ?>
                        <div class="p-2 col-md-4">
                            <a href="{{ route('acara.detail', ['id' => $acara->slug]) }}">
                                <div class="shadow" style="border-radius: 15px; height: 100%; display: flex; flex-direction: column;">
                                    <!-- 1:1 aspect ratio container -->
                                    <div style="position: relative; width: 100%; padding-bottom: 100%; overflow: hidden;">
                                        <img src="/uploads/acara/image/{{ $acara->poster }}" alt=""
                                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                                    </div>
                                    <div class="p-3 d-flex flex-column justify-content-between" style="flex-grow: 1;">
                                        <h4 style="font-weight:600;">{{ $acara->title }}</h4>
                                        <p style="color:rgb(121, 121, 121);">{{ $content }}</p>
                                        <button class="btn btn-primary-orange mt-auto" style="width:100%; border-radius:10px">Read More</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">

                    <nav aria-label="...">

                        <?php $per5 = (int) ($acaras->currentPage() / 3); ?>
                        <ul class="pagination">
                            <li class="page-item @if ($acaras->currentPage() <= 1) disabled @endif">
                                <a href="{{ route('acara', ['page' => $acaras->currentPage() - 1]) }}@if (request('search')) &search={{ request('search') }} @endif"
                                    class="page-link">Prev</a>
                            </li>
                            @if ($acaras->lastPage() > 3)
                                @if ($acaras->currentPage() < 3)
                                    @for ($a = 1; $a <= 3; $a++)
                                        @if ($a == $acaras->currentPage())
                                            <li class="page-item active" aria-current="page"><span
                                                    class="page-link">{{ $a }}</span></li>
                                        @else
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ route('acara', ['page' => $a]) }}@if (request('search')) &search={{ request('search') }} @endif">{{ $a }}</a>
                                            </li>
                                        @endif
                                    @endfor
                                    <li class="page-item"><a class="page-link"
                                            href="{{ route('acara', ['page' => $per5 * 3 + 4]) }}@if (request('search')) &search={{ request('search') }} @endif">{{ $per5 * 3 + 4 }}</a>
                                    </li>
                                @elseif($acaras->currentPage() > $acaras->lastPage() - 3)
                                    <li class="page-item"><a class="page-link"
                                            href="{{ route('acara', ['page' => $per5 * 3 - 4]) }}@if (request('search')) &search={{ request('search') }} @endif">{{ $per5 * 3 - 4 }}</a>
                                    </li>
                                    @for ($a = $acaras->lastPage() - 3; $a <= $acaras->lastPage(); $a++)
                                        @if ($a == $acaras->currentPage())
                                            <li class="page-item active" aria-current="page"><span
                                                    class="page-link">{{ $a }}</span></li>
                                        @else
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ route('acara', ['page' => $a]) }}@if (request('search')) &search={{ request('search') }} @endif">{{ $a }}</a>
                                            </li>
                                        @endif
                                    @endfor
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ route('acara', ['page' => $per5 * 3 - 1]) }}@if (request('search')) &search={{ request('search') }} @endif">{{ $per5 * 3 - 1 }}</a>
                                    </li>
                                    @for ($a = $per5 * 3; $a < $per5 * 3 + 3; $a++)
                                        @if ($a == $acaras->currentPage())
                                            <li class="page-item active" aria-current="page"><span
                                                    class="page-link">{{ $a }}</span></li>
                                        @else
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ route('acara', ['page' => $a]) }}@if (request('search')) &search={{ request('search') }} @endif">{{ $a }}</a>
                                            </li>
                                        @endif
                                    @endfor
                                    <li class="page-item"><a class="page-link"
                                            href="{{ route('acara', ['page' => $per5 * 3 + 3]) }}@if (request('search')) &search={{ request('search') }} @endif">{{ $per5 * 3 + 3 }}</a>
                                    </li>
                                @endif
                            @else
                                @for ($a = 1; $a <= $acaras->lastPage(); $a++)
                                    @if ($a == $acaras->currentPage())
                                        <li class="page-item active" aria-current="page"><span
                                                class="page-link">{{ $a }}</span></li>
                                    @else
                                        <li class="page-item"><a class="page-link"
                                                href="{{ route('acara', ['page' => $a]) }}@if (request('search')) &search={{ request('search') }} @endif">{{ $a }}</a>
                                        </li>
                                    @endif
                                @endfor
                            @endif
                            <li class="page-item @if ($acaras->currentPage() >= $acaras->lastPage()) disabled @endif">
                                <a class="page-link"
                                    href="{{ route('acara', ['page' => $acaras->currentPage() + 1]) }}@if (request('search')) &search={{ request('search') }} @endif">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-title">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModalToday" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-title">Acara Hari Ini</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">

                    @foreach ($today as $acara)
                        <?php
                        $content = Str::limit($acara->deskripsi, 50);
                        $content = str_replace('<div>', '', $content);
                        $content = str_replace('</div>', '', $content);
                        ?>

                        <div class="p-2 mb-3">
                            <a href="{{ route('acara.detail', ['id' => $acara->slug]) }}">
                                <div class="row">
                                    <div class="col-md">
                                        <img src="/uploads/acara/image/{{ $acara->poster }}" alt=""
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-md">
                                        <h5 style="font-weight:600; font-size:14px;">{{ $acara->title }}</h5>
                                        <p style="color:rgb(121, 121, 121); font-size:12px;">{{ $content }}</p>
                                        <p style="color:rgb(121, 121, 121); font-size:12px;">
                                            {{ date('d M Y', strtotime($acara->start_acara_date)) }} @if (isset($acara->end_acara_date))
                                                - {{ date('d M Y', strtotime($acara->end_acara_date)) }}
                                            @endif
                                        </p>
                                        <button class="btn btn-primary-orange" style="width:100%; border-radius:10px">Read
                                            More</button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <hr>
                    @endforeach

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
