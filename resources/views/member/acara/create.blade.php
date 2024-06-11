<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambahkan Acara Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('member.acara.create.post')}}" method="POST" enctype="multipart/form-data">@csrf
                        <input type="hidden" name="user_id" id="user_id" value="{{old('user_id', Auth::user()->id)}}">
                        
                        <div class="mb-3">
                          <label for="image" class="form-label">Poster</label>
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
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                            @error('title')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
                            @error('slug')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="penyelenggara" class="form-label">Penyelenggara</label>
                            <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror" id="penyelenggara" name="penyelenggara" value="{{ old('penyelenggara') }}">
                            @error('penyelenggara')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="3" name="deskripsi" value="{{ old('deskripsi') }}">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="row mb-4 mt-4">
                          {{-- <div class="col-xl-12 d-flex justify-content-center">
                              <h2>Pendaftaran</h2>
                          </div> --}}
                          <div class="col-md">
                            <div class="mb-3">
                                <label for="start_daftar" class="form-label">Tanggal Start Pendaftaran</label>
                                <input type="date" class="form-control @error('start_daftar') is-invalid @enderror" id="start_daftar" name="start_daftar" value="{{ old('start_daftar') }}">
                                @error('start_daftar')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                @enderror
                            </div>
                          </div>
                          <div class="col-md">
                            <div class="mb-3">
                                <label for="end_daftar" class="form-label">Tanggal End Pendaftaran</label>
                                <input type="date" class="form-control @error('end_daftar') is-invalid @enderror" id="end_daftar" name="end_daftar" value="{{ old('end_daftar') }}">
                                @error('end_daftar')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                @enderror
                            </div>
                          </div>
                          <div class="col-md">
                            <div class="mb-3">
                                <label for="end_daftar" class="form-label">Jam Start Pendaftaran</label>
                                <input type="time" class="form-control @error('end_daftar') is-invalid @enderror" id="end_daftar" name="end_daftar" value="{{ old('end_daftar') }}">
                                @error('end_daftar')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                @enderror
                            </div>
                          </div>
                          <div class="col-md">
                            <div class="mb-3">
                                <label for="end_daftar" class="form-label">Jam End Pendaftaran</label>
                                <input type="time" class="form-control @error('end_daftar') is-invalid @enderror" id="end_daftar" name="end_daftar" value="{{ old('end_daftar') }}">
                                @error('end_daftar')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                @enderror
                            </div>
                          </div>
                        </div>
                        <div class="row mb-4">
                          {{-- <div class="col-xl-12 d-flex justify-content-center">
                              <h2>Acara</h2>
                          </div> --}}
                          <div class="col-md">
                            <div class="mb-3">
                                <label for="start_daftar" class="form-label">Tanggal Start Acara</label>
                                <input type="date" class="form-control @error('start_daftar') is-invalid @enderror" id="start_daftar" name="start_daftar" value="{{ old('start_daftar') }}">
                                @error('start_daftar')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                @enderror
                            </div>
                          </div>
                          <div class="col-md">
                            <div class="mb-3">
                                <label for="end_daftar" class="form-label">Tanggal End Acara</label>
                                <input type="date" class="form-control @error('end_daftar') is-invalid @enderror" id="end_daftar" name="end_daftar" value="{{ old('end_daftar') }}">
                                @error('end_daftar')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                @enderror
                            </div>
                          </div>
                          <div class="col-md">
                            <div class="mb-3">
                                <label for="end_daftar" class="form-label">Jam Start Acara</label>
                                <input type="time" class="form-control @error('end_daftar') is-invalid @enderror" id="end_daftar" name="end_daftar" value="{{ old('end_daftar') }}">
                                @error('end_daftar')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                @enderror
                            </div>
                          </div>
                          <div class="col-md">
                            <div class="mb-3">
                                <label for="end_daftar" class="form-label">Jam End Acara</label>
                                <input type="time" class="form-control @error('end_daftar') is-invalid @enderror" id="end_daftar" name="end_daftar" value="{{ old('end_daftar') }}">
                                @error('end_daftar')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                @enderror
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                            <label for="start_acara" class="form-label">Start Acara</label>
                            <input type="datetime-local" class="form-control @error('start_acara') is-invalid @enderror" id="start_acara" name="start_acara" value="{{ old('start_acara') }}">
                            @error('start_acara')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi') }}">
                            @error('lokasi')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="row">
                          <div class="col-md">
                            <div class="mb-3">
                                <label for="nama_pj" class="form-label">Nama Penanggung jawab</label>
                                <input type="text" class="form-control @error('nama_pj') is-invalid @enderror" id="nama_pj" name="nama_pj" value="{{ old('nama_pj') }}">
                                @error('nama_pj')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                @enderror
                            </div>                            
                          </div>
                          <div class="col-md">
                            <div class="mb-3">
                                <label for="nomor_pj" class="form-label">Nomor Penanggung jawab</label>
                                <input type="text" class="form-control @error('nomor_pj') is-invalid @enderror" id="nomor_pj" name="nomor_pj" value="{{ old('nomor_pj') }}">
                                @error('nomor_pj')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                                @enderror
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                            <label for="hubungi_kami" class="form-label">Hubungi Kami (Link)</label>
                            <input type="text" class="form-control @error('hubungi_kami') is-invalid @enderror" id="hubungi_kami" name="hubungi_kami" value="{{ old('hubungi_kami') }}">
                            @error('hubungi_kami')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sosial_media" class="form-label">Sosial Media (Link)</label>
                            <input type="text" class="form-control @error('sosial_media') is-invalid @enderror" id="sosial_media" name="sosial_media" value="{{ old('sosial_media') }}">
                            @error('sosial_media')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="peta" class="form-label">Map (Link)</label>
                            <input type="text" class="form-control @error('peta') is-invalid @enderror" id="peta" name="peta" value="{{ old('peta') }}">
                            @error('peta')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <a href="{{route('member.acara')}}" type="button" class="btn btn-secondary me-3">Cancel</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
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
            
            function filterFunction() {
              const input = document.getElementById("myInput");
              const filter = input.value.toUpperCase();
              const div = document.getElementById("myDropdown");
              const a = div.getElementsByTagName("li");
              var count = 0;
              for (let i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  a[i].style.display = "";
                  count += 1;
                } else {
                  a[i].style.display = "none";
                }
              }
              
              const btnNew = document.getElementById('btnNew');
              if(count == 0){
                btnNew.style.display = ""
              }
              else {
                btnNew.style.display = "none"
              }
            }

            function addNewCategory(){
              const input = document.getElementById("myInput");
              fetch("{{route('member.berita.newCategory.add')}}?name="+input.value)
              .then(response => response.json())
              .then(data => {
                if(data.id > 0){
                  const btnNew = document.getElementById('btnNew').style.display = "none";
                  document.getElementById('dropDownItem').innerHTML += "<li><a class=\"dropdown-item\" onclick=\"select('"+data.name+"', '"+data.id+"')\">"+data.name+"</a></li>";
                  document.getElementById("category").value = data.name;
                  document.getElementById("category_show").value = data.name;
                  document.getElementById("category_id").value = data.id;
                }
              });
            }

            function select(name, id){
              document.getElementById("category").value = name;
              document.getElementById("category_show").value = name;
              document.getElementById("category_id").value = id;
            }

            const title = document.querySelector("#title");
            const slug = document.querySelector("#slug");
            title.addEventListener('keyup', function(){
                fetch("{{route('member.acara.slug.check')}}?title="+title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug);
            });
        </script>
    </x-slot>
</x-app-layout>
