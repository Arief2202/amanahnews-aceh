@extends('layouts.main')

@section('title')
<title>Amanah News - Coming Soon</title>
@endsection


@section('style')
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('script')
<script src="/landing/assets/js/navbarDisScroll.js"></script>
<script src="/landing/assets/js/autoPreloader.js"></script>
{{-- <script src="/landing/assets/js/disPreloader.js"></script> --}}
@endsection

@section('main')
    <section style="top: 0px; padding:0px; margin:0px;">
        <div class="container-top" style="">
            
            <div class="bg-container-top"></div>
            {{-- <img src="/assets/img/dimsum.png" alt="" style="position: absolute; width:100%; height:500px; z-index: 1; top:0px; opacity:7%;"> --}}
            <div class="topBar">
                <h2 style="color:white;font-weight:600;font-size:62px; margin:0px;padding:0px;text-align:center; margin-bottom: 50px;" data-aos="zoom-out" data-aos-delay="100">Coming Soon</h2>
                <p  style="color:white;font-size:18px; margin:0px;padding:0px;text-align:center; margin-bottom: 50px;" data-aos="zoom-out" data-aos-delay="100">This Feature will coming soon</p>
            </div>
        </div>
    </section>

    <section class="ftco-section mb-0 pb-0">
        <div class="container p-4" data-aos="zoom-out" data-aos-delay="100">
            Content will be here
        </div>
    </section>