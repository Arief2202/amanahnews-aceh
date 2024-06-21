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
            
            <div style="background-color:var(--main-color); width:100%; min-height:500px;position: absolute; z-index: 0; top:0px;"></div>
            <img style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" src="/uploads/e-catalog/bg.png" alt="" style="position: absolute; width:100%; height:500px; z-index: 1; top:0px; opacity:7%;">
            <div class="topBar">
                <h2 style="color:white;font-weight:600;font-size:62px; margin:0px;padding:0px;text-align:center; margin-bottom: 50px;">E-Katalog</h2>
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
                    @foreach($ecatalogs as $ecatalog)
                    <div class="col-md-3 p-2">
                        <a href="{{route('e-catalog.detail', ['slug' => $ecatalog->slug])}}">
                            <div class="shadow" style="border-radius: 15px">
                                <img style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" style="object-fit:cover;" src="/uploads/e-catalog/image/{{$ecatalog->photo}}" alt="" style="width: 100%;">
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