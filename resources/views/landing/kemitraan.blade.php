@extends('layouts.main')

@section('title')
<title>Amanah News - Coming Soon</title>
@endsection

@section('style')
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('script')
<script src="/landing/assets/js/autoPreloader.js"></script>
<script src="/landing/assets/js/navbarDisScroll.js"></script>
@endsection

@section('main')
    <section style="top: 0px; padding:0px; margin:0px;">
        <div class="container-top" style="">
            
            <div class="bg-container-top"></div>
            {{-- <img src="/assets/img/dimsum.png" alt="" style="position: absolute; width:100%; height:500px; z-index: 1; top:0px; opacity:7%;"> --}}
            <div class="topBar">
                <h2 style="color:white;font-weight:600;font-size:62px; margin:0px;padding:0px;text-align:center; margin-bottom: 50px;" data-aos="zoom-out" data-aos-delay="100">Mitra Amanah</h2>
                <p  style="color:white;font-size:18px; margin:0px;padding:0px;text-align:center; margin-bottom: 50px;" data-aos="zoom-out" data-aos-delay="100">Mereka yang ikut serta dalam upaya meningkatkan Ekonomi Kreatif Para Pemuda Aceh untuk bangsa Indonesia.</p>
            </div>
        </div>
    </section>

    <section class="ftco-section mb-0 pb-0">
        <div class="container p-5" data-aos="zoom-out" data-aos-delay="100">
            <h2 style="font-weight: 700;">Bermitra dengan Kami!</h2>
            <div class="pe-5">
                <p style="font-size: 18px;">Anda bisa menjangkau seluruh Indonesia melalui kolaborasi kreatif dibidang Marketing dan CSR. Mari ciptakan dampak positif untuk customer, employee, dan tentunya brand perusahaan anda di Provinsi Aceh bahkan di seluruh Indonesia!</p>
                <p style="font-size: 18px;">Kami mengundang seluruh perusahaan dari berbagai sektor bisnis untuk menciptakan kolaborasi positif dan kreatif yang dapat dirasakan manfaatnya. Melalui kolaborasi bersama kami, anda turut mendukung program Amanah Aceh yang langsung memberikan dampak atas kehadiran mereka di seluruh daerah Aceh bahkan untuk Indonesia.</p>
            </div>
            <div class="d-flex justify-content-center">
                <a href="https://wa.me/+6282311938885" class="btn btn-primary-orange">Hubungi tim kami</a>
            </div>
        </div>

    </section>

    <section class="ftco-section mb-0 pb-0 mt-0 pt-0">
        <div class="container p-5" data-aos="zoom-out" data-aos-delay="100">
            <div class="card p-3" style="width: 100%;">
                <div class="row">
                    @foreach($mitras as $mitra)
                    <div class="col-md-2 d-flex justify-content-center p-4">
                        <a href="{{$mitra->href}}" target="_blank"><img src="/uploads/mitra/image/{{$mitra->image}}" style="width: 100%; height:100%; object-fit:cover;"></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>