<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('List Video') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm bg-dark2 dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-3 d-flex justify-content-end">
                        <div class="row">
                            <div class="mb-3 col-md-auto d-flex justify-content-center">
                                <a href="{{route('member.video.create')}}" class="btn btn-primary">Tambahkan Video Baru</a>
                            </div>
                        </div>
                    </div>

                    <table id="myTable" class="display nowrap">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Detail</th>
                                <th>Publish Status</th>
                                <th>Publish</th>
                                <th>Category</th>
                                <th>Video</th>
                                <th>Title</th>
                                <th>Slug Link</th>
                                <th>Tag</th>
                                <th>Total View</th>
                                <th>Total View Monthly</th>
                                <th>Total View Weekly</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $a=>$post)
                            <tr>
                                <td>{{$a+1}}</td>
                                <td><a href="{{route('member.video.detail', ['id' => $post->id])}}" class="btn btn-warning">Detail</a></td>
                                <td>
                                    @if($post->show == 1) <a href="{{route('member.video.publish', ['id' => $post->id])}}" class="btn btn-success disabled" disabled>Published</a>
                                    @elseif($post->show == 0) <a href="{{route('member.video.unpublish', ['id' => $post->id])}}" class="btn btn-danger disabled" disabled>Not Publish</a>
                                    @endif
                                </td>
                                <td>
                                    @if($post->show == 0) <a href="{{route('member.video.publish', ['id' => $post->id])}}" class="btn btn-secondary">Publish</a>
                                    @elseif($post->show == 1) <a href="{{route('member.video.unpublish', ['id' => $post->id])}}" class="btn btn-secondary">Unpublish</a>
                                    @endif
                                </td>
                                <td>{{$post->category->name}}</td>
                                <td><a href="https://youtu.be/{{$post->video}}">{{$post->video}}</a></td>
                                <td>{{$post->title}}</td>
                                <td><a href="{{route('video.detail', ['slug' => $post->slug])}}">{{$post->slug}}</a></td>
                                <td>@foreach($tags->where('post_id', $post->id)->where('post_type', 'video') as $key=>$tag)@if($key!=0), @endif {{$tag->tagname->name}}@endforeach</td>
                                <td>{{$post->view_total}}</td>
                                <td>{{$post->view_monthly}}</td>
                                <td>{{$post->view_weekly}}</td>
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
