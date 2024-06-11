@extends('layouts.main')

@section('title')
<title>Amanah News - E Catalog</title>
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
                <li><a href="/acara">Acara</a></li>
                <li><a href="/acara">Detail</a></li>
                <li><a href="/acara/detail/{{$acara->slug}}">{{$acara->slug}}</a></li>
                </ol>
            </div>
            </nav>
        </div><!-- End Page Title -->
    </section>
    <section class="section" style="">
        <div class="container">
            <div class="card">
                <div class="row p-3">
                    <div class="col-xl-5">
                        <img src="/uploads/acara/image/{{$acara->poster}}" alt="" style="width: 100%; border-radius: 20px;">
                    </div>
                    <div class="col-xl">
                        <h2 class="mb-3" style="font-weight:700;text-transform: uppercase; color:#7E9465; font-weight:700;">{{$acara->title}}</h2>
                        <h5 style="font-weight:600; font-size:17px; color:#EEAF22;">Penyelenggara</h5>
                        <h5 class="mb-4" style="font-weight:600;font-size:20px; margin:0px;">{{$acara->penyelenggara}}</h5>
                        <h5 style="font-weight:600; font-size:17px; color:#EEAF22;">Deskripsi</h5>
                        <p class="mb-4" style="color:rgb(121, 121, 121);">{{$acara->deskripsi}}</p>
                        @if($acara->start_daftar && $acara->end_daftar)
                            <h5 style="font-weight:600; font-size:17px; color:#EEAF22;">Jadwal Pendaftaran</h5>
                            <p class="mb-4" style="color:rgb(121, 121, 121);font-weight:600;"><i class='bx bx-calendar'></i> {{date('d M', strtoTime($acara->start_daftar))}} - {{date('d M Y', strtoTime($acara->end_daftar))}}</p>
                        @endif
                        <h5 style="font-weight:600; font-size:17px; color:#EEAF22;">Jadwal Kegiatan</h5>
                        <p class="mb-4" style="color:rgb(121, 121, 121);font-weight:600;"><i class='bx bx-calendar'></i> {{date('d M Y', strtoTime($acara->created_at))}} - Pukul {{date('H:i', strtoTime($acara->created_at))}} WIB</p>

                        <h5 style="font-weight:600; font-size:17px; color:#EEAF22;">Lokasi Event</h5>
                        <p class="mb-4" style="color:rgb(121, 121, 121);">{{$acara->lokasi}}</p>

                        <h5 style="font-weight:600; font-size:17px; color:#EEAF22;">Penanggung Jawab</h5>
                        <p class="mb-4" style="color:rgb(121, 121, 121);">{{$acara->nama_pj}} - {{$acara->nomor_pj}}</p>

                        <div class="row d-flex align-items-end">
                            <div class="col-auto">
                                <a href="{{$acara->hubungi_kami}}" class="btn btn-primary-orange" style="border-radius:10px">Hubungi Kami</a>
                            </div>
                            <div class="col-auto">
                                <a href="{{$acara->sosial_media}}" class="btn btn-primary-orange" style="border-radius:10px">Sosial Media</a>
                            </div>
                            <div class="col-auto">
                                <a href="{{$acara->peta}}" class="btn btn-primary-orange" style="border-radius:10px">Lihat Peta</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <a href="">                
                <img src="\assets\uploads\iklan\iklan2.png" alt="" style="width: 100%">
            </a>
        </div>
    </section>
@endsection