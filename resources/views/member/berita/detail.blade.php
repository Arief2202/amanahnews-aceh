<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
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
                            <img src="\assets\uploads\berita\pesawat.png" alt="" style="width:100%">
                            <p class="mt-1" style="font-size:12px; color: color:rgba(255, 255, 255, 0.700)">{{$post->banner_source}}</p>
                            <div>
                                <?=$post->content?>
                            </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    
    
    <x-slot name="script">
        <script type="text/javascript">
            // $(document).ready( function () {
            //     $('#myTable').DataTable({
            //         scrollX: true,
            //     });
            // } );
        </script>
    </x-slot>
</x-app-layout>
