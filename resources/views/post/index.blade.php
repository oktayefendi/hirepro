<x-app-layout>
    <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="float-left font-weight-bolder">My Post</div>
            <div class="float-right">
                <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Post</a>
            </div>
        </div>
        <div class="card-body">
            @if (Session::has('messages'))
            <div class="alert alert-primary" role="alert">
                {{Session::get('messages')}}
            </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Body</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $post)
                        <tr>
                            <td scope="row"><img src="{{ asset('images') }}/{{ $post->image_path }}" alt="" style="width: 50px"></td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($post->body,50) }}</td>
                            <td>
                                <a href="{{ route('post.edit',$post->slug) }}" class="btn btn-sm btn-success"><i class="far fa-edit"></i></a>
                               
                                <a href="{{ route('post.delete',$post->id) }}" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $jobs->links() }}
        </div>
    </div>    
</div>
    </x-app-layout>