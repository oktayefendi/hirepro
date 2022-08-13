<x-app-layout>

    <div class="card">
        <div class="card-header">
            <div class="float-left font-weight-bolder">Post Update</div>
            <div class="float-right">
                <a href="/index" class="btn btn-sm btn-primary">My Post</a>
            </div>
        </div>
        <div class="card-body">
            @if (Session::has('messages'))
            <div class="alert alert-primary" role="alert">
                {{Session::get('messages')}}
            </div>
            @endif

            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-primary" role="alert">
                {{$error}}
            </div>
            @endforeach
            @endif

            <form action="{{ route('post.update',$post->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}" id="exampleFormControlInput1">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3">{{ $post->body }}</textarea>
                </div>
                
                <button type="submit" class="btn btn-sm btn-success float-right">Post Update</button>
            </form>
        </div>
    </div>

</x-app-layout>