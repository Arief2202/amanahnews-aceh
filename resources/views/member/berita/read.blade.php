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
                    <div class="d-flex justify-content-end mb-3">
                        <div class="row">
                            <div class="col-md-auto d-flex justify-content-center mb-3">
                                <a href="{{route('member.berita.category')}}" class="btn btn-secondary">Category List</a>
                            </div>
                            <div class="col-md-auto d-flex justify-content-center mb-3">
                                <a href="{{route('member.berita.tag')}}" class="btn btn-secondary">Tag List</a>
                            </div>
                            <div class="col-md-auto d-flex justify-content-center mb-3">
                                <a href="{{route('member.berita.create')}}" class="btn btn-primary">Tambahkan Berita Baru</a>
                            </div>
                        </div>
                    </div>

                    <table id="myTable" class="display nowrap">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Slug Link</th>
                                <th>Tag</th>
                                <th>Total View</th>
                                <th>Total View Monthly</th>
                                <th>Total View Weekly</th>
                                <th>Preview</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $a=>$post)
                            <tr>
                                <td>{{$a+1}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>{{$post->title}}</td>
                                <td><a href="{{route('berita.detail', ['slug' => $post->slug])}}">{{$post->slug}}</a></td>
                                <td>{{fake()->sentence(1)}} @for($b=0;$b<rand(0,10); $b++), {{fake()->sentence(1)}} @endfor</td>
                                <td>{{$post->view_total}}</td>
                                <td>{{$post->view_monthly}}</td>
                                <td>{{$post->view_weekly}}</td>
                                <td><button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#previewModal">Preview</button></td>
                                <td><a href="{{route('member.berita.detail', ['id' => $post->id])}}" class="btn btn-success">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Preview</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="ps-3">                
                    <div class="mt-3 mb-2">
                        <h1 style="font-weight:600">{{ "Title" }}</h1>
                    </div>
                    <div class="mb-3">
                        <div class="row mb-2">
                            <div class="col-auto">
                                <button class="mt-3 btn btn-secondary" style="width:70px; height:70px; border-radius:50px"></button>
                            </div>
                            <div class="col">
                                <h5 class="mt-3" style="font-weight:600">{{ "Name" }}</h5>
                                <p class=" " style="font-weight:600; color:rgba(255, 255, 255, 0.700)">{{ "Instance" }}</p>
                            </div>
                        </div>
                        <div>
                            <p>{{/*date('d M Y H:i',strtoTime($post->created_at));*/ date('d M Y H:i')}} WIB - Waktu baca 1 menit</p>
                        </div>
                    </div>
                </div>

                <div class="row p-0 m-0">
                    {{-- <div class="col-xl-8" style=""> --}}
                        <img src="\assets\uploads\berita\pesawat.png" alt="" style="width:100%">
                        <p class="mt-1" style="font-size:12px; color: color:rgba(255, 255, 255, 0.700)">{{ "Banner Source" }}</p>
                        <p><b>amanahnews.id</b> - Masako, salah satu merek bumbu penyedap terkemuka di Indonesia, dengan bangga mengumumkan peluncuran varian terbaru mereka yang berukuran 250 gram. Langkah inovatif ini merupakan bagian dari komitmen Masako untuk terus memberikan kemudahan dan kepuasan kepada para konsumennya dalam memasak berbagai hidangan lezat.<br><br>

                            Varian baru 250 gram ini hadir sebagai solusi bagi para ibu rumah tangga dan pecinta masak-memasak yang menginginkan kemasan bumbu yang lebih besar dan ekonomis. Dengan ukuran yang lebih besar, pengguna bisa lebih leluasa menyiapkan masakan favorit untuk keluarga tanpa khawatir kehabisan bumbu di tengah proses memasak. Ini sangat ideal untuk keluarga besar atau mereka yang sering mengadakan acara kumpul-kumpul di rumah.<br><br>
                            
                            Selain itu, Masako 250 gram ini tetap menjaga kualitas dan cita rasa yang selama ini telah menjadi ciri khas dari Masako. Mengandung bahan-bahan berkualitas tinggi dan diracik dengan sempurna, bumbu penyedap ini mampu memberikan rasa gurih yang kaya dan nikmat pada setiap hidangan. Pengguna tidak perlu lagi menambahkan banyak bumbu lain, karena satu sendok Masako saja sudah cukup untuk membuat masakan menjadi lebih lezat dan menggugah selera.<br><br>
                            
                            Inovasi ini juga sejalan dengan permintaan pasar yang terus meningkat akan kemasan bumbu penyedap yang lebih praktis dan ekonomis. Masako 250 gram hadir untuk menjawab kebutuhan tersebut, memberikan lebih banyak nilai bagi konsumen tanpa mengorbankan kualitas. Dengan harga yang kompetitif, varian baru ini diharapkan dapat menjadi pilihan utama di dapur setiap keluarga Indonesia.<br><br>
                            
                            Melalui peluncuran varian 250 gram ini, Masako tidak hanya sekadar menawarkan bumbu penyedap, tetapi juga memberikan solusi praktis bagi setiap orang yang mencintai kegiatan memasak. Dengan demikian, Masako terus berupaya untuk menjadi bagian tak terpisahkan dari setiap momen kebahagiaan di meja makan keluarga Indonesia.<br><br>
                            
                            Dalam jangka panjang, Masako berkomitmen untuk terus berinovasi dan memberikan produk-produk terbaik yang sesuai dengan kebutuhan konsumen. Dengan dukungan dan kepercayaan dari masyarakat, Masako optimis akan terus menjadi pemimpin di industri bumbu penyedap di Indonesia. Jadi, tunggu apa lagi? Segera coba Masako varian 250 gram dan rasakan kemudahan serta kelezatannya dalam setiap masakan Anda!</p>
                    
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    
    <x-slot name="script">
        <script type="text/javascript">
            $(document).ready( function () {
                $('#myTable').DataTable({
                    scrollX: true,
                });
            } );
        </script>
    </x-slot>
</x-app-layout>
