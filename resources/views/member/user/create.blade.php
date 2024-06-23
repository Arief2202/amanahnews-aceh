<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambahkan E-Catalog Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('member.e-catalog.create.post')}}" method="POST" enctype="multipart/form-data">@csrf
                        <input type="hidden" name="user_id" id="user_id" value="{{old('user_id', Auth::user()->id)}}">
                        
                        <div class="mb-3">
                          <label for="image" class="form-label">Image</label>
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
                            <label for="price" class="form-label">Price</label>
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Rp. </span>
                              <input type="number" class="form-control" placeholder="10000" id="price" name="price" value="{{ old('price') }}">
                            </div>
                            @error('price')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="owner" class="form-label">Owner</label>
                            <input type="text" class="form-control @error('owner') is-invalid @enderror" id="owner" name="owner" value="{{ old('owner') }}">
                            @error('owner')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description" value="{{ old('description') }}">{{ old('description') }}</textarea>
                            @error('description')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
                            @error('address')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="hubungi" class="form-label">Hubungi Kami (Link)</label>
                            <input type="text" class="form-control @error('hubungi') is-invalid @enderror" id="hubungi" name="hubungi" value="{{ old('hubungi') }}" placeholder="Ex. https://wa.me/+6212345678">
                            @error('hubungi')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sosmed" class="form-label">Sosial Media (Link)</label>
                            <input type="text" class="form-control @error('sosmed') is-invalid @enderror" id="sosmed" name="sosmed" value="{{ old('sosmed') }}" placeholder="Ex. https://instagram.com/amanahnews">
                            @error('sosmed')
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
                fetch("{{route('member.e-catalog.slug.check')}}?title="+title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug);
            });
        </script>
    </x-slot>
</x-app-layout>
