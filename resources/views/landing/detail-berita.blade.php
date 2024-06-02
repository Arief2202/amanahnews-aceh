@extends('layouts.main')

@section('title')
<title>Amanah News - Berita</title>
@endsection

@section('script')
<script src="/landing/assets/js/navbarDisScroll.js"></script>
@endsection

@section('main')
    <section class="mb-0" style="margin-top: 40px;">
        <div class="mb-0 page-title" data-aos="fade">
            <nav class="breadcrumbs">
              <div class="container">
                <ol>
                  <li><a href="index.html">Home</a></li>
                  <li class="current">Blog Details</li>
                </ol>
              </div>
            </nav>
          </div><!-- End Page Title -->
    </section>

    <section class="mt-0">
        <div class="col-1" style="position: absolute; left:300px; top:250px;">
            <div class="row">
                <div class="col-1">
                    Bagikan Artikel
                    <button class="mt-3 btn btn-primary" style="width:50px; height:50px; border-radius:50px"></button>
                    <button class="mt-3 btn btn-primary" style="width:50px; height:50px; border-radius:50px"></button>
                    <button class="mt-3 btn btn-primary" style="width:50px; height:50px; border-radius:50px"></button>
                    <button class="mt-3 btn btn-primary" style="width:50px; height:50px; border-radius:50px"></button>
                </div>
            </div>
        </div>
        <div class="container p-0 mt-0">
            <div class="row p-0 m-0" style="height:5000px">
                <div class="col-md-8" style="background-color: bisque;">
                    A
                </div>
                <div class="col-md-4" style="background-color: green">
                    B
                </div>
            </div>
        </div>
    </section>

@endsection