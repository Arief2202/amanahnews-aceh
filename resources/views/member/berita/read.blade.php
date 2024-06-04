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
                            @for($a=0; $a<10; $a++)
                            <tr>
                                <td>{{$a+1}}</td>
                                <td>{{fake()->sentence(rand(2,5))}}</td>
                                <td><a href="/post/{{fake()->slug()}}">{{fake()->slug()}}</a></td>
                                <td>{{fake()->sentence(1)}} @for($b=0;$b<rand(0,10); $b++), {{fake()->sentence(1)}} @endfor</td>
                                <td>{{rand(1, 10000)}}</td>
                                <td>{{rand(1, 1000)}}</td>
                                <td>{{rand(1, 100)}}</td>
                                <td><button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#previewModal">Preview</button></td>
                                <td><button class="btn btn-success">Edit</button></td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Preview</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            ...
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
