@extends('layouts.main')

@section('title')
<title>Amanah News - E Catalog</title>
@endsection

@section('script')
<script src="/landing/assets/js/navbarScroll.js"></script>
<script src="/landing/assets/js/autoPreloader.js"></script>
@endsection

@section('main')
    <section style="top: 0px; padding:0px; margin:0px;">
        <div class="" style="height: 500px">
            
            <div style="background-color:#7E9465; width:100%; height:500px;position: absolute; z-index: 0; top:0px;"></div>
            <img src="/assets/img/dimsum.png" alt="" style="position: absolute; width:100%; height:500px; z-index: 1; top:0px; opacity:15%;">
            <div style="position: absolute; transform: translateX(-50%); left:50%;top:150px; z-index:2;">
                <h1 style="color:white;font-weight:600;font-size:62px; margin:0px;padding:0px;text-align:center; margin-bottom: 50px;">E-Katalog</h1>
                <p  style="color:white;font-size:20px; margin:0px;padding:0px;text-align:center; margin-bottom: 50px;">Dukung UMKM dengan membeli produk dari kami. Sebagian besar produk merupakan hasil kolaborasi antara Amanah dan Pemuda Setempat</p>
            </div>
        </div>
    </section>
    
    <section class="section" style="">
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
    </section>

    <section class="section" style="">
        <div class="container">
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