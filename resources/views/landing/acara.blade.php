@extends('layouts.main')

@section('title')
<title>Amanah News - Acara</title>
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
<script src="/calender/js/popper.js"></script>
<script src="/calender/js/main.js"></script>
@endsection

@section('main')
    <section class="ftco-section mt-5">
        <div class="container">

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

        </div>
    </section>
    <section class="section">
        <div class="container">
            <a href="">                
                <img src="\assets\uploads\iklan\iklan2.png" alt="" style="width: 100%">
            </a>
        </div>
    </section>
    <section class="section" style="">
        <div class="container">
            <div class="container section-title" data-aos="fade-up">
              <h2>Acara</h2>
              <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->
            <div class="">
                <div class="row p-3">
                @foreach($acaras as $acara)
                    <div class="col-md-4 p-2">
                        <a href="{{route('acara.detail', ['id' => $acara->slug])}}">
                            <div class="shadow" style="border-radius: 15px">
                                <img src="/uploads/acara/image/{{$acara->poster}}" alt="" style="width: 100%;">
                                <div class="p-3">
                                    <h4 style="font-weight:600;">{{$acara->title}}</h4>
                                    <p style="color:rgb(121, 121, 121);">{{$acara->deskripsi}}</p>
                                    <button class="btn btn-primary-orange" style="width:100%; border-radius:10px">Read More</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">

                    <nav aria-label="...">
                        <ul class="pagination">
                          <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>

                          <li class="page-item active" aria-current="page">
                            <span class="page-link">2</span>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          
                          <li class="page-item">
                            <a class="page-link" href="#">Next</a>
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
@endsection