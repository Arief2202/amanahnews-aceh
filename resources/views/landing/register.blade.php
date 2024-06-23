@extends('layouts.main')

@section('title')
<title>Amanah News - Register</title>
@endsection

@section('script')
<script src="/landing/assets/js/navbarDisScroll.js"></script>
<script src="/landing/assets/js/autoPreloader.js"></script>

<script type="text/javascript">        
    function previewImage(){
        const image = document.querySelector("#image");
        const imgPreview = document.querySelector('.img-preview');
        const imgPreviewDiv = document.querySelector('.img-preview-div');
        imgPreview.style.display = 'block';
        imgPreviewDiv.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection

@section('main')
    <section class="section" style="margin-top: 100px;">
        <div class="container">
            <div class="shadow card" style="position:relative; overflow:hidden;">
                <div class="row h-100">
                    <div class="col border p-5 h-100">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">@csrf
                            <h1 style="font-weight: 700;">Register</h1>
                            
                            <div class="mb-3">
                                <label for="image" class="form-label">Photo</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" accept="image/*" id="image" name="image" onchange="previewImage()">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-5 img-preview-div" style="display:none;">                            
                                <label for="image" class="form-label">Photo Preview</label>
                                <img for="image" src="" alt="" class="img-preview img-fluid" style="display:hidden; max-width:200px; max-height:150px;">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" name="name" value="{{old('name')}}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput1" name="email" value="{{old('email')}}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Instance</label>
                                <input type="text" class="form-control @error('instance') is-invalid @enderror" id="exampleFormControlInput1" name="instance" value="{{old('instance')}}">
                                @error('instance')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput2" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleFormControlInput2" name="password" value="{{old('password')}}">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput2" class="form-label">Password Confirmation</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="exampleFormControlInput2" name="password_confirmation" value="{{old('password_confirmation')}}">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-warning" style="color: white;">Daftar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col d-none d-xl-block p-5" style="background-color:var(--accent-color); height:auto">
                        <div class="" style="position:absolute;transform:translateY(-50%); top:50%; color:white;">
                            <h3 style="color: white;">Sudah mempunyai Akun ?</h3>
                            <p class="mt-3 mb-5">Silahkan login</p>
                            <a href="/login" class="btn btn-light" style="width: 100px;">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection