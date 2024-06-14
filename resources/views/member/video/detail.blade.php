<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Video Detail') }}
        </h2>
    </x-slot>

    <div class="pt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="row mb-4">
                        <div class="col-auto">
                            <div class="input-group">
                                <span class="input-group-text">Publish Status</span>
                                @if($post->show == 1) <a href="{{route('member.video.publish', ['id' => $post->id])}}" class="btn btn-success disabled" disabled>Published</a>
                                @elseif($post->show == 0) <a href="{{route('member.video.unpublish', ['id' => $post->id])}}" class="btn btn-danger disabled" disabled>Not Publish</a>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            @if($post->show == 0) <a href="{{route('member.video.publish', ['id' => $post->id])}}?source=detail" class="btn btn-success">Publish</a>
                            @elseif($post->show == 1) <a href="{{route('member.video.unpublish', ['id' => $post->id])}}?source=detail" class="btn btn-secondary">Unpublish</a>
                            @endif
                        </div>
                        <div class="col d-flex justify-content-end">
                            <a href="{{route('member.video.delete', ['id' => $post->id])}}" class="btn btn-danger me-3">Delete Post</a>
                            <a href="{{route('member.video.update', ['id' => $post->id])}}" class="btn btn-warning">Edit Post</a>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text">View Total</span>
                                <input type="number" class="form-control" disabled value="{{$post->view_total}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text">View Monthly</span>
                                <input type="number" class="form-control" disabled value="{{$post->view_monthly}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text">View Weekly</span>
                                <input type="number" class="form-control" disabled value="{{$post->view_weekly}}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text">View Daily</span>
                                <input type="number" class="form-control" disabled value="{{$post->view_daily}}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="mt-3">
                        Link Post : <a href="{{route('video.detail', ['slug' => $post->slug])}}">{{route('video.detail', ['slug' => $post->slug])}}</a>
                    </div>
                    <div class="ps-3">                
                        <div class="mt-3 mb-2">
                            <h1 style="font-weight:600">{{$post->title}}</h1>
                        </div>
                        <div class="mb-3">
                            <div class="row mb-2">
                                <div class="col-auto">
                                    <button class="mt-3 btn btn-secondary" style="width:70px; height:70px; border-radius:50px"></button>
                                </div>
                                <div class="col">
                                    <h5 class="mt-3" style="font-weight:600">{{$post->user->name}}</h5>
                                    <p class=" " style="font-weight:600; color:rgba(255, 255, 255, 0.700)">{{$post->user->instance}}</p>
                                </div>
                            </div>
                            <div>
                                <p>{{date('d M Y H:i',strtoTime($post->created_at));}} WIB - Waktu baca 1 menit</p>
                            </div>
                        </div>
                    </div>

                    <div class="row p-0 m-0">
                        {{-- <div class="col-xl-8" style=""> --}}
                            <div class="row">
                                <div class="col">
                                    <h5>Banner</h5>
                                    <img src="/uploads/video/image/{{$post->banner}}" alt="" style="width:100%">
                                </div>
                                <div class="col">
                                    <h5>Video</h5>
                                    <iframe style="width:100%; height:300px;" src="https://www.youtube.com/embed/{{$post->video}}"></iframe>
                                </div>
                            </div>
                            <p class="mt-1" style="font-size:12px; color: color:rgba(255, 255, 255, 0.700)">{{$post->banner_source}}</p>
                            <div>
                                <?=$post->content?>
                            </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    @foreach($postcontents as $pc)
    
        <div class="pt-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="w-100">
                            @if($pc->saved == 0)
                                <form action="{{route('postcontent.video.save')}}" method="POST" enctype="multipart/form-data"> @csrf
                                    <div class="d-flex justify-content-end">
                                        <input type="hidden" name="postcontent_id" value="{{$pc->id}}">
                                        <a href="{{route('postcontent.video.delete', ['id' => $pc->id])}}" class="btn btn-danger me-3">Delete</a>
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                    <hr>
                                    @if($pc->type=='image')

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input class="form-control @error('image') is-invalid @enderror" type="file" accept="image/*" id="image" name="image" onchange="previewImage()">
                                            @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="mb-5 img-preview-div" style="@if($pc->content == null) display:none;@endif">                            
                                            <label for="image" class="form-label">Photo Preview</label>
                                            <img for="image" src="/uploads/post/image/{{$pc->content}}" alt="" class="img-preview img-fluid" style="display:hidden; max-width:200px; max-height:150px;">
                                        </div>                                        
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="mb-3">
                                                    <label for="image_source" class="form-label">Image Width (optional)</label>
                                                    <input type="number" class="form-control" id="image_width" name="image_width" value="{{ $pc->image_width }}">
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="mb-3">
                                                    <label for="image_source" class="form-label">Image Height (optional)</label>
                                                    <input type="text" class="form-control" id="image_height" name="image_height" value="{{ $pc->image_height }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image_source" class="form-label">Image Source / description (optional)</label>
                                            <input type="text" class="form-control" id="source" name="source" value="{{ $pc->source }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="image_source" class="form-label">Image Link / href (optional)</label>
                                            <input type="text" class="form-control" id="href" name="href" value="{{ $pc->href }}">
                                        </div>

                                    @elseif($pc->type=='text')

                                        <div class="mb-3">
                                            <label for="title" class="form-label">Content</label>
                                            <input id="x" type="hidden" name="content" class="@error('content') is-invalid @enderror" value="{{old('content', $pc->content)}}">
                                            <trix-editor class="@error('content') is-invalid @enderror" input="x"></trix-editor>
                                            @error('content')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    @endif
                                </form>
                            @else
                                <form action="{{route('postcontent.video.edit')}}" method="POST"> @csrf
                                    <div class="d-flex justify-content-end">
                                        <input type="hidden" name="postcontent_id" value="{{$pc->id}}">
                                        <button type="submit" class="btn btn-secondary">Edit</button>
                                    </div>
                                </form>
                                <hr>
                                @if($pc->type=='image')

                                <div class="row p-0 m-0">
                                    {{-- <div class="col-xl-8" style=""> --}}
                                        @if($pc->href)<a href="{{$pc->href}}">@endif
                                        <img src="/uploads/post/image/{{$pc->content}}" alt="" style="max-width:{{$pc->image_width}}px; max-height:{{$pc->image_height}}px;">
                                        @if($pc->href)</a>@endif
                                        <p class="mt-1" style="font-size:12px; color: color:rgba(255, 255, 255, 0.700)">{{$pc->source}}</p>
                                </div>
                                @elseif($pc->type=='text')
                                    <?=$pc->content?>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="pt-2" id="newSectionView">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-100">
                        <button class="btn btn-success dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Add New Section
                        </button>
                        <ul class="dropdown-menu">
                            <div class="w-100" id="dropDownItemAddNewSection">
                                <form action="{{route('member.video.newSection')}}" method="POST">@csrf
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <li><button type="submit" name="type" value="image" class="dropdown-item">Image</button></li>
                                    <li><button type="submit" name="type" value="video" class="dropdown-item">Video</button></li>
                                    <li><button type="submit" name="type" value="text" class="dropdown-item">Text</button></li>
                                </form>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-2 pb-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="d-flex justify-content-end">
                        <div>
                            <button class="btn btn-danger dropdown-toggle me-3 mb-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Delete Tags
                            </button>
                            <ul class="dropdown-menu" id="myDropdownTagDelete">
                                <div class="pe-2 ps-2">
                                <input type="text" class="form-control mb-3" placeholder="Search.." id="myInputTagDelete" onkeyup="filterFunctionDeleteTag()">
                                </div> 
                                <div style="overflow-y: scroll; height: 150px;" id="dropDownItemDelete">
                                @foreach($postTags as $i=>$tag)
                                <li><a class="dropdown-item" onclick="deleteTag('{{ $tag->id }}')">{{ $tag->tagname->name }}</a></li>
                                @endforeach
                                </div>
                            </ul>
                        </div>

                        <div>
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tambahkan Tags
                            </button>
                            <ul class="dropdown-menu" id="myDropdownTag">
                                <div class="pe-2 ps-2">
                                <input type="text" class="form-control mb-3" placeholder="Search.." id="myInputTag" onkeyup="filterFunctionTag()">
                                <button class="btn btn-secondary w-100 mb-3" id="btnNewTag" style="display: none;" type="button" onclick="addNewTag()">Add New Tag</button>
                                </div> 
                                <div style="overflow-y: scroll; height: 150px;" id="dropDownItem">
                                @foreach($tags as $i=>$tag)
                                <li><a class="dropdown-item" onclick="selectTag('{{ $tag->name }}', '{{ $tag->id }}')">{{ $tag->name }}</a></li>
                                @endforeach
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="row" id="tagsView">
                        <div class="col-auto">
                            Tags : 
                        </div>
                        @foreach($postTags as $postTag)
                            <div class="col-auto m-0 p-0 me-2 mb-2">
                                <button class="btn btn-secondary disabled">{{$postTag->tagname->name}}</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <x-slot name="script">
        <script type="text/javascript">     
            $( document ).ready(function() {
                @if($postcontents->where('saved', '0')->count() > 0)
                    document.getElementById( 'newSectionView' ).scrollIntoView(); 
                @endif
            });       
            function filterFunctionTag() {
              const input = document.getElementById("myInputTag");
              const filter = input.value.toUpperCase();
              const div = document.getElementById("myDropdownTag");
              const a = div.getElementsByTagName("li");
              var count = 0;
              var found = false;
              for (let i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  a[i].style.display = "";
                  count += 1;
                } else {
                  a[i].style.display = "none";
                }
                if(txtValue.toUpperCase() == filter.toUpperCase()) found = true;
              }
              
              const btnNew = document.getElementById('btnNewTag');
              if(count == 0 || !found){
                btnNew.style.display = ""
              }
              else {
                btnNew.style.display = "none"
              }
            }          
            function filterFunctionDeleteTag() {
              const input = document.getElementById("myInputTagDelete");
              const filter = input.value.toUpperCase();
              const div = document.getElementById("myDropdownTagDelete");
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
            }

            function showAll(){                
              const div = document.getElementById("myDropdownTag");
              const a = div.getElementsByTagName("li");
              var count = 0;
              for (let i = 0; i < a.length; i++) {
                a[i].style.display = "";
              }
            }

            function addNewTag(){
              const input = document.getElementById("myInputTag");
              fetch("{{route('member.video.newTag.add')}}?name="+input.value)
              .then(response => response.json())
              .then(data => {
                console.log(data);
                if(data.id > 0){
                  const btnNew = document.getElementById('btnNewTag').style.display = "none";
                  document.getElementById('dropDownItem').innerHTML += "<li><a class=\"dropdown-item\" onclick=\"selectTag('"+data.name+"', '"+data.id+"')\">"+data.name+"</a></li>";
                  document.getElementById("myInputTag").value = null;
                  showAll();
                  selectTag(data.name, data.id);
                }
              });
            }

            function selectTag(name, id){
                showAll();
                document.getElementById("myInputTag").value = null;

                fetch("{{route('member.video.tag.add')}}?post_id={{$post_id}}&tagname_id="+id)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                });
                updateTagValue();
            }

            function deleteTag(id){
                showAll();
                document.getElementById("myInputTagDelete").value = null;

                fetch("{{route('member.video.tag.delete')}}?id="+id)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                });
                updateTagValue();
            }

            setInterval(updateTagValue, 1000);

            function updateTagValue(){                
                fetch("{{route('member.video.tag.get')}}?post_id={{$post_id}}")
                .then(response => response.json())
                .then(data => {
                    document.getElementById('tagsView').innerHTML = "<div class=\"col-auto\">Tags : </div>";
                    document.getElementById('dropDownItemDelete').innerHTML = "";
                    for(var a=0; a<data.tags.length; a++){
                        document.getElementById('tagsView').innerHTML += "<div class=\"col-auto m-0 p-0 me-2 mb-2\"><button class=\"btn btn-secondary disabled\">"+data.tags[a].tagname.name+"</button></div>";
                        document.getElementById('dropDownItemDelete').innerHTML += "<li><a class=\"dropdown-item\" onclick=\"deleteTag('"+data.tags[a].id+"')\">"+data.tags[a].tagname.name+"</a></li>";
                    }
                });
            }
            
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
    </x-slot>
</x-app-layout>
