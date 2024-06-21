@extends('layouts.main')

@section('title')
<title>Amanah News - E Catalog</title>
@endsection

@section('script')
<script src="/landing/assets/js/navbarDisScroll.js"></script>
<script src="/landing/assets/js/autoPreloader.js"></script>
@endsection

@section('main')
    <section class="section" style="margin-top: 100px;">
        <div class="container">
            <div class="shadow card" style="position:relative; overflow:hidden; height: 500px;">
                <div class="row h-100">
                    <div class="col d-none d-xl-block border p-5 h-100">
                        <form method="POST" action="{{ route('login') }}">@csrf
                            <h1 style="font-weight: 700;">Login</h1>
                            <div class="mb-5 mt-5">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="email" class="form-control @error('title') is-invalid @enderror" id="exampleFormControlInput1" name="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="exampleFormControlInput2" class="form-label">Password</label>
                                <input type="password" class="form-control @error('title') is-invalid @enderror" id="exampleFormControlInput2" name="password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-warning" style="color: white;">Masuk</button>
                            </div>
                        </form>
                    </div>
                    <div class="col d-none d-xl-block p-5 h-100" style="background-color:var(--accent-color);">
                        <div class="" style="position:absolute;transform:translateY(-50%); top:50%; color:white;">
                            <h3 style="color: white;">Belum mempunyai Akun ?</h3>
                            <p class="mt-3 mb-5">Silahkan mendaftar dan nikmati manfaatnya</p>
                            <a href="/register" class="btn btn-light" style="width: 100px;">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection