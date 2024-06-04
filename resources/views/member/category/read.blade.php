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
                                <a href="{{route('member.berita.category.create')}}" class="btn btn-primary">Tambahkan Category Baru</a>
                            </div>
                        </div>
                    </div>

                    <table id="myTable" class="display nowrap">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($a=0; $a<10; $a++)
                            <tr>
                                <td>{{$a+1}}</td>
                                <td>{{fake()->sentence(rand(1,2))}}</td>
                                <td>{{fake()->slug()}}</td>
                            </tr>
                            @endfor
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
                });
            } );
        </script>
    </x-slot>
</x-app-layout>
