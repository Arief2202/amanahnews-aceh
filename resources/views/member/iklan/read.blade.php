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
                                <a href="{{route('member.iklan.create')}}" class="btn btn-primary">Tambahkan Iklan Baru</a>
                            </div>
                        </div>
                    </div>

                    <table id="myTable" class="display nowrap">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Edit</th>
                                <th>Jumlah Click</th>
                                <th>Preview Foto</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Show Status</th>
                                <th>Show</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($iklans as $a=>$iklan)
                            <tr>
                                <td>{{$a+1}}</td>
                                <td><a href="{{route('member.iklan.update', ['id' => $iklan->id])}}" class="btn btn-warning">Edit</a></td>
                                <td>{{$iklan->click}}</td>
                                <td><button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="changePhoto({{$iklan}})">Preview</button></td>
                                <td>{{$iklan->title}}</td>
                                <td>{{$iklan->type}}</td>
                                <td>
                                    @if($iklan->show == 1) <a href="{{route('member.iklan.publish', ['id' => $iklan->id])}}" class="btn btn-success disabled" disabled>Tampil</a>
                                    @elseif($iklan->show == 0) <a href="{{route('member.iklan.unpublish', ['id' => $iklan->id])}}" class="btn btn-danger disabled" disabled>Tidak Tampil</a>
                                    @endif
                                </td>
                                <td>
                                    @if($iklan->show == 0) <a href="{{route('member.iklan.publish', ['id' => $iklan->id])}}" class="btn btn-secondary">Tampilkan</a>
                                    @elseif($iklan->show == 1) <a href="{{route('member.iklan.unpublish', ['id' => $iklan->id])}}" class="btn btn-secondary">Jangan Tampilkan</a>
                                    @endif
                                </td>
                                <td><a href="{{$iklan->href}}">{{$iklan->href}}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Preview Foto Iklan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <img src="" alt="" id="imgPreview">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    <x-slot name="script">
        <script type="text/javascript">
            function changePhoto($id){
                console.log($id);
                document.getElementById("imgPreview").src = "/uploads/iklan/image/"+$id.type+"/"+$id.image;
            }
            $(document).ready( function () {
                $('#myTable').DataTable({
                    scrollX: true,
                });
            } );
        </script>
    </x-slot>
</x-app-layout>
