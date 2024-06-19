<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('E-Catalog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="d-flex justify-content-end mb-3">
                        <div class="row">
                            <div class="col-md-auto d-flex justify-content-center mb-3">
                                <a href="{{route('member.e-catalog.banner')}}" class="btn btn-warning me-3">Ubah Banner</a>
                                <a href="{{route('member.e-catalog.create')}}" class="btn btn-primary">Tambahkan Acara Baru</a>
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
                                <th>Price</th>
                                <th>Owner</th>
                                <th>Description</th>
                                <th>Address</th>
                                <th>Hubungi</th>
                                <th>Sosmed</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ecatalogs as $a=>$ecatalog)
                            <tr>
                                <td>{{$ecatalog->id}}</td>
                                <td><a href="{{route('member.e-catalog.update', ['id' => $ecatalog->id])}}" class="btn btn-warning">Edit</a></td>
                                <td>{{$ecatalog->title}}</td>
                                <td><a href="{{route('e-catalog.detail', ['slug' => $ecatalog->slug])}}" class="">{{$ecatalog->slug}}</a></td>
                                <td>Rp. {{number_format($ecatalog->price, 2, ",", ".")}}</td>
                                <td>{{$ecatalog->owner}}</td>
                                <td>{{$ecatalog->description}}</td>
                                <td>{{$ecatalog->address}}</td>
                                <td>{{$ecatalog->hubungi}}</td>
                                <td>{{$ecatalog->sosmed}}</td>
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
