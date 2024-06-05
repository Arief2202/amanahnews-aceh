<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Detail') }}
        </h2>
    </x-slot>

    <div class="pt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="d-flex justify-content-between">
                        <div>
                            Link Post : <a href="{{route('berita.detail', ['slug' => $post->slug])}}">{{route('berita.detail', ['slug' => $post->slug])}}</a>
                        </div>
                        <button class="btn btn-secondary">Edit</button>
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
                            <img src="/uploads/post/image/{{$post->banner}}" alt="" style="width:100%">
                            <p class="mt-1" style="font-size:12px; color: color:rgba(255, 255, 255, 0.700)">{{$post->banner_source}}</p>
                            <div>
                                <?=$post->content?>
                            </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="pt-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Test
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
            function filterFunctionTag() {
              const input = document.getElementById("myInputTag");
              const filter = input.value.toUpperCase();
              const div = document.getElementById("myDropdownTag");
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
              
              const btnNew = document.getElementById('btnNewTag');
              if(count == 0){
                btnNew.style.display = ""
              }
              else {
                btnNew.style.display = "none"
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
              fetch("{{route('member.berita.newTag.add')}}?name="+input.value)
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

                fetch("{{route('member.berita.tag.add')}}?post_id={{$post_id}}&tagname_id="+id)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                });
                updateTagValue();
            }

            setInterval(updateTagValue, 1000);

            function updateTagValue(){                
                fetch("{{route('member.berita.tag.get')}}?post_id={{$post_id}}")
                .then(response => response.json())
                .then(data => {
                    document.getElementById('tagsView').innerHTML = "<div class=\"col-auto\">Tags : </div>";
                    for(var a=0; a<data.tags.length; a++){
                        document.getElementById('tagsView').innerHTML += "<div class=\"col-auto m-0 p-0 me-2 mb-2\"><button class=\"btn btn-secondary disabled\">"+data.tags[a].tagname.name+"</button></div>";

                    }
                });
            }
        </script>
    </x-slot>
</x-app-layout>
