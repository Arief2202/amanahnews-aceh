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
                    <form action="{{route('member.e-catalog.banner.post')}}" method="POST" enctype="multipart/form-data">@csrf
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
                        <div class="mb-5 img-preview-div">                            
                            <label for="image" class="form-label">Photo Preview</label>
                            <img for="image" src="/uploads/e-catalog/bg.png" alt="" class="img-preview img-fluid" style="display:hidden; max-width:200px; max-height:150px;">
                        </div>
                        
                        <div class="d-flex justify-content-between">
                          <div>
                            <a href="{{route('member.e-catalog')}}" type="button" class="btn btn-secondary me-3">Cancel</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                          </div>
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
