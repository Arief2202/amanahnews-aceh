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
                        <img src="/uploads/e-catalog/image/{{$ecatalog->photo}}" alt="" style="width: 100%; border-radius: 20px;" class="mb-3">
                    </div>
                    <div class="col-md h-auto" class="position:relative">
                        <h2 style="font-weight:700;text-transform: uppercase; color:#7E9465; font-weight:700;">{{$ecatalog->title}}</h2>
                        <h4 style="font-weight:600; color:#EEAF22;">Rp. {{number_format($ecatalog->price, 2, ",", ".")}}</h4>
                        <p style="font-weight:500;color:rgb(121, 121, 121);text-transform: uppercase;">{{$ecatalog->owner}}</p>
                        <h5 style="font-weight:700;color:#EEAF22; font-size:18px; margin:0px;">Info Usaha</h5>
                        <div style="margin:0px;padding:0px; border:none; border-top:4px solid #EEAF22;margin-bottom:10px;margin-top:5px; width:50px;"></div>
                        <h5 style="color:rgb(121, 121, 121);font-weight:500;font-size:16px; margin:0px;">{{$ecatalog->description}}</h5>
                        <h5 style="font-weight:700;color:#EEAF22; font-size:18px; margin:0px; margin-top:20px;">Alamat</h5>
                        <div style="margin:0px;padding:0px; border:none; border-top:4px solid #EEAF22;margin-bottom:10px;margin-top:2px; width:50px;"></div>
                        <h5 style="color:rgb(121, 121, 121);font-weight:500;font-size:16px; margin:0px;">{{$ecatalog->address}}</h5>
                        <div class="row mt-3">
                            <div class="col-auto">
                                <a href="{{$ecatalog->hubungi}}" target="_blank" class="btn btn-primary-orange" style="border-radius:10px">Hubungi Kami</a>
                            </div>
                            <div class="col-auto">
                                <a href="{{$ecatalog->sosmed}}" target="_blank" class="btn btn-primary-orange" style="border-radius:10px">Sosial Media</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="section" style="">
        <div class="container">
            <div class="container section-title" data-aos="fade-up">
              <h2>Rekomendasi E-Catalog Lainnya</h2>
            </div>
            <div class="">
                <div class="row p-3">
                    @foreach($ecatalogs as $ecatalog)
                    <div class="col-md-3 p-2">
                        <a href="">
                            <div class="shadow" style="border-radius: 15px">
                                <img src="/uploads/e-catalog/image/{{$ecatalog->photo}}" alt="" style="width: 100%;">
                                <div class="p-3">

                                    <h4 style="font-weight:600;">{{$ecatalog->title}}</h4>
                                    <p style="color:rgb(121, 121, 121);">{{$ecatalog->owner}}</p>
                                    <a href="{{route('e-catalog.detail', ['slug' => $ecatalog->slug])}}" class="btn btn-primary-orange" style="width:100%; border-radius:10px">Read More</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">

                    <nav aria-label="...">
                        
                        <?php $per5 = (int)($ecatalogs->currentPage()/3);?>
                        <ul class="pagination">
                          <li class="page-item @if($ecatalogs->currentPage() <= 1) disabled @endif">
                            <a href="{{route('e-catalog', ['page'=>$ecatalogs->currentPage()-1])}}" class="page-link">Prev</a>
                          </li>
                          @if($ecatalogs->currentPage() < 3)
                            @for($a=1; $a<=3; $a++)
                                @if($a == $ecatalogs->currentPage())
                                    <li class="page-item active" aria-current="page"><span class="page-link">{{$a}}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{route('e-catalog', ['page'=>$a])}}">{{$a}}</a></li>
                                @endif
                            @endfor
                            <li class="page-item"><a class="page-link" href="{{route('e-catalog', ['page'=>$per5*3+4])}}">{{$per5*3+4}}</a></li>
                            
                          @elseif($ecatalogs->currentPage() > $ecatalogs->lastPage()-3)                      
                            <li class="page-item"><a class="page-link" href="{{route('e-catalog', ['page'=>$per5*3-4])}}">{{$per5*3-4}}</a></li>
                            @for($a=$ecatalogs->lastPage()-3; $a<=$ecatalogs->lastPage(); $a++)
                                @if($a == $ecatalogs->currentPage())
                                    <li class="page-item active" aria-current="page"><span class="page-link">{{$a}}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{route('e-catalog', ['page'=>$a])}}">{{$a}}</a></li>
                                @endif
                            @endfor
                          @else                 
                            <li class="page-item"><a class="page-link" href="{{route('e-catalog', ['page'=>$per5*3-1])}}">{{$per5*3-1}}</a></li>
                            @for($a = ($per5 * 3); $a < ($per5 * 3 + 3); $a++)
                                @if($a == $ecatalogs->currentPage())
                                    <li class="page-item active" aria-current="page"><span class="page-link">{{$a}}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{route('e-catalog', ['page'=>$a])}}">{{$a}}</a></li>
                                @endif
                            @endfor
                            <li class="page-item"><a class="page-link" href="{{route('e-catalog', ['page'=>$per5*3+3])}}">{{$per5*3+3}}</a></li>
                          @endif
                          <li class="page-item @if($ecatalogs->currentPage() >= $ecatalogs->lastPage() ) disabled @endif">
                            <a class="page-link" href="{{route('e-catalog', ['page'=>$ecatalogs->currentPage()+1])}}">Next</a>
                          </li>
                        </ul>
                      </nav>
                </div>
            </div>
        </div>
    </section>
@endsection