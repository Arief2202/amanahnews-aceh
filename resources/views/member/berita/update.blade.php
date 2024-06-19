<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Berita') }}
        </h2>
        <style>
          trix-toolbar [data-trix-attribute='quote'],
          trix-toolbar [data-trix-attribute='code'] ,
          trix-toolbar [data-trix-button-group='file-tools'],
          trix-toolbar [data-trix-action='increaseNestingLevel'],
          trix-toolbar [data-trix-action='decreaseNestingLevel']{
            display: none;
          }
        </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('member.berita.update.post')}}" method="POST" enctype="multipart/form-data">@csrf
                        <input type="hidden" name="id" id="id" value="{{old('id', $post->id)}}">
                        <input type="hidden" name="user_id" id="user_id" value="{{old('user_id', $post->user_id)}}">
                        <input type="hidden" name="category_id" id="category_id" value="{{old('category_id', $post->category_id)}}">
                        <div class="mb-3">
                            <label for="myDropDown" class="form-label">Category</label>
                            <div class="input-group">
                              <input type="text" class="form-control @error('category') is-invalid @enderror" aria-label="Text input with dropdown button" value="{{ old('category', $post->category->name) }}" id="category_show" disabled>
                              <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Select Category
                              </button>
                              <ul class="dropdown-menu" id="myDropdown">
                                <div class="pe-2 ps-2">
                                  <input type="text" class="form-control mb-3" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                                  <button class="btn btn-secondary w-100 mb-3" id="btnNew" style="display: none;" type="button" onclick="addNewCategory()">Add New Category</button>
                                </div> 
                                <div style="overflow-y: scroll; height: 150px;" id="dropDownItem">
                                  @foreach($categories as $i=>$category)
                                  <li><a class="dropdown-item" onclick="select('{{ $category->name }}', '{{ $category->id }}')">{{ $category->name }}</a></li>
                                  @endforeach
                                </div>
                              </ul>
                            </div>
                            
                            <input type="hidden" name="category" id="category" value="{{ old('category', $post->category->name) }}" class="@error('category') is-invalid @enderror">
                            @error('category')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
  
                          </div>

                          <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
                            @error('title')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
                            @error('slug')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Thumbnail</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" accept="image/*" id="image" name="image" onchange="previewImage()">
                            @error('image')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="mb-5 img-preview-div" style="@if(!$post->banner)display:none;@endif">                            
                            <label for="image" class="form-label">Photo Preview</label>
                            <img for="image" src="/uploads/post/image/{{$post->banner}}" alt="" class="img-preview img-fluid" style="display:hidden; max-width:200px; max-height:150px;">
                        </div>
                        
                        <div class="mb-3">
                            <label for="image_source" class="form-label">Image Source / description</label>
                            <input type="text" class="form-control @error('image_source') is-invalid @enderror" id="image_source" name="image_source" value="{{ old('image_source', $post->banner_source) }}">
                            @error('image_source')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Content</label>
                            <input id="x" type="hidden" name="content" class="@error('image_source') is-invalid @enderror" value="{{old('content', $post->content)}}">
                            <trix-editor class="@error('image_source') is-invalid @enderror" input="x"></trix-editor>
                            @error('content')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between">
                          <a href="{{route('member.berita.delete', ['id'=>$post->id])}}" type="button" class="btn btn-danger me-3">Delete Berita</a>

                          <div>
                            <a href="{{route('member.berita')}}" type="button" class="btn btn-secondary me-3">Cancel</a>
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
                fetch("{{route('member.berita.slug.check')}}?title="+title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug);
            });
        </script>
    </x-slot>
</x-app-layout>
