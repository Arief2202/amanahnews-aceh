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
                                <a href="{{route('member.e-catalog.create')}}" class="btn btn-primary">Tambahkan E-Catalog Baru</a>
                            </div>
                        </div>
                    </div>

                    <table id="myTable" class="display nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Reset Password</th>
                                <th>Role</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Instance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $a=>$user)
                            <tr>
                                <td>{{$a+1}}</td>
                                <td><a href="{{route('member.user.update', ['id' => $user->id])}}" class="btn btn-warning">Edit</a></td>
                                <td>
                                        @if($user->role == 1)
                                        <button class="btn btn-success" type="button" data-bs-toggle="dropdown" aria-expanded="false">Admin</button>
                                        @elseif($user->role == 2)
                                        <button class="btn btn-danger" type="button" data-bs-toggle="dropdown" aria-expanded="false">Super Admin</button>
                                        @else
                                        <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">Member</button>
                                        @endif
                                        <ul class="dropdown-menu" id="myDropdown">
                                        <div style="overflow-y: scroll; height: 150px;" id="dropDownItem">
                                            <form action="{{route('member.changeRole')}}" method="POST">@csrf
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                @if($user->role != 2)<li><button class="dropdown-item" name="role" value="2">Super Admin</button></li>@endif
                                                @if($user->role != 1)<li><button class="dropdown-item" name="role" value="1">Admin</button></li>@endif
                                                @if($user->role != 0)<li><button class="dropdown-item" name="role" value="0">Member</button></li>@endif
                                            </form>
                                        </div>
                                        </ul>
                                        
                                        <input type="hidden" name="category" id="category" value="{{ old('category') }}" class="@error('category') is-invalid @enderror">
                                        @error('category')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                        @enderror
              
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->instance}}</td>
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
                    // scrollX: true,
                });
            } );
        </script>
    </x-slot>
</x-app-layout>
