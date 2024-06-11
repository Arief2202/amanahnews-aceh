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
                <li><a href="/e-catalog">E-Catalog</a></li>
                <li><a href="/e-catalog">Detail</a></li>
                </ol>
            </div>
            </nav>
        </div><!-- End Page Title -->
    </section>
    <section class="section" style="">
        <div class="container">
            <div class="card">
                <div class="row p-3">
                    <div class="col-md-4">
                        <img src="/assets/uploads/e-catalog/rendang.png" alt="" style="width: 100%; border-radius: 20px;">
                    </div>
                    <div class="col-md">
                        <h2 style="font-weight:700;text-transform: uppercase; color:#7E9465; font-weight:700;">Rendang Gulai Enak</h2>
                        <h4 style="font-weight:600;text-transform: uppercase; color:#EEAF22;">Rp. 25.000</h4>
                        <p style="color:rgb(121, 121, 121);text-transform: uppercase;">Warung Bu Kris</p>
                        <h5 style="font-weight:700;color:#EEAF22; font-size:18px; margin:0px;">Info Usaha</h5>
                        <div style="margin:0px;padding:0px; border:none; border-top:4px solid #EEAF22;margin-bottom:10px;margin-top:5px; width:50px;"></div>
                        <h5 style="font-weight:600;font-size:20px; margin:0px;">Makanan rendang yang berasal dari kota Padang asli</h5>
                        <h5 style="font-weight:700;color:#EEAF22; font-size:18px; margin:0px; margin-top:20px;">Alamat</h5>
                        <div style="margin:0px;padding:0px; border:none; border-top:4px solid #EEAF22;margin-bottom:10px;margin-top:2px; width:50px;"></div>
                        <h5 style="color:rgb(121, 121, 121);font-weight:500;font-size:16px; margin:0px;">No. 4, Lorong Amalia, Peuniti, Kec. Baiturrahman, Kota Banda Aceh, Aceh 23127</h5>
                        <div class="row d-flex align-items-end">
                            <div class="col-auto">
                                <a href="{{route('landing.e-catalog.detail')}}" class="btn btn-primary-orange" style="border-radius:10px">Read More</a>
                            </div>
                            <div class="col-auto">
                                <a href="{{route('landing.e-catalog.detail')}}" class="btn btn-primary-orange" style="border-radius:10px">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
    {{-- <section class="section" style="">
        <div class="container">
          <div class=" d-flex justify-content-center w-100">
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" placeholder="Cari Produk yang ingin anda inginkan disini" style="width: 50vw; border-width: 2px 2px;">
              </div>
              <div class="col">
                <button class="btn btn-primary-orange">Cari Disini</button>
              </div>
            </div>
          </div>
        </div>
    </section> --}}

    <section class="section" style="">
        <div class="container">
            <div class="container section-title" data-aos="fade-up">
              <h2>Rekomendasi E-Catalog Lainnya</h2>
              {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
            </div>
            <div class="">
                <div class="row p-3">
                @for($a=0; $a<3; $a++)
                    <div class="col-md-3 p-2">
                        <a href="">
                            <div class="shadow" style="border-radius: 15px">
                                <img src="/assets/uploads/e-catalog/rendang.png" alt="" style="width: 100%;">
                                <div class="p-3">

                                    <h4 style="font-weight:600;">Rendang Gulai Enak</h4>
                                    <p style="color:rgb(121, 121, 121);">Warung Bang Sapri</p>
                                    <a href="{{route('landing.e-catalog.detail')}}" class="btn btn-primary-orange" style="width:100%; border-radius:10px">Read More</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 p-2">
                        <a href="">
                            <div class="shadow" style="border-radius: 15px">
                                <img src="/assets/uploads/e-catalog/kue-keukarah.png" alt="" style="width: 100%;">
                                <div class="p-3">

                                    <h4 style="font-weight:600;">Rendang Gulai Enak</h4>
                                    <p style="color:rgb(121, 121, 121);">Warung Bang Sapri</p>
                                    <a href="{{route('landing.e-catalog.detail')}}" class="btn btn-primary-orange" style="width:100%; border-radius:10px">Read More</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 p-2">
                        <a href="">
                            <div class="shadow" style="border-radius: 15px">
                                <img src="/assets/uploads/e-catalog/kue-bhoi.png" alt="" style="width: 100%;">
                                <div class="p-3">

                                    <h4 style="font-weight:600;">Rendang Gulai Enak</h4>
                                    <p style="color:rgb(121, 121, 121);">Warung Bang Sapri</p>
                                    <a href="{{route('landing.e-catalog.detail')}}" class="btn btn-primary-orange" style="width:100%; border-radius:10px">Read More</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 p-2">
                        <a href="">
                            <div class="shadow" style="border-radius: 15px">
                                <img src="/assets/uploads/e-catalog/kopi-aceh.png" alt="" style="width: 100%;">
                                <div class="p-3">

                                    <h4 style="font-weight:600;">Rendang Gulai Enak</h4>
                                    <p style="color:rgb(121, 121, 121);">Warung Bang Sapri</p>
                                    <a href="{{route('landing.e-catalog.detail')}}" class="btn btn-primary-orange" style="width:100%; border-radius:10px">Read More</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endfor
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
@endsection