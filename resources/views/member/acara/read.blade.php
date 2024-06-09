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
                                <a href="{{route('member.acara.create')}}" class="btn btn-primary">Tambahkan Acara Baru</a>
                            </div>
                        </div>
                    </div>

                    <table id="myTable" class="display nowrap">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Edit</th>
                                <th>title</th>
                                <th>slug</th>
                                <th>penyelenggara</th>
                                <th>deskripsi</th>
                                <th>Start Daftar</th>
                                <th>End Daftar</th>
                                <th>Start Acara</th>
                                <th>Lokasi</th>
                                <th>Nama PJ</th>
                                <th>Nomor PJ</th>
                                <th>Hubungi Kami</th>
                                <th>Sosial Media</th>
                                <th>Peta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($acaras as $a=>$acara)
                            <tr>
                                <td>{{$acara->id}}</td>
                                <td><a href="{{route('member.acara.delete', ['id' => $acara->id])}}" class="btn btn-danger">Delete</a></td>
                                <td>{{$acara->title}}</td>
                                <td>{{$acara->slug}}</td>
                                <td>{{$acara->penyelenggara}}</td>
                                <td>{{$acara->deskripsi}}</td>
                                <td>{{$acara->start_daftar}}</td>
                                <td>{{$acara->end_daftar}}</td>
                                <td>{{$acara->start_acara}}</td>
                                <td>{{$acara->lokasi}}</td>
                                <td>{{$acara->nama_pj}}</td>
                                <td>{{$acara->nomor_pj}}</td>
                                <td>{{$acara->hubungi_kami}}</td>
                                <td>{{$acara->sosial_media}}</td>
                                <td>{{$acara->peta}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

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
