<x-app-layout>

    <div class="card">
        <div class="card-header">
            <div class="float-left font-weight-bolder">Post Add</div>
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

            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput2">Fixed Price</label>
                    <input type="text" name="price" class="form-control" id="exampleFormControlInput1">
                </div>

                <div class="form-group">
                    <label for="floatingSelect">Category</label>
                    <select class="form-select" name="category_id"  id="floatingSelect" aria-label="Floating label select example">
                    <option selected value="">Select category</option>
                    @foreach($job_category as $job)
                      <option value="{{ $job->id}}">{{$job->name}}</option>
                    @endforeach
                    </select>

                  </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>


                <button type="submit" class="btn btn-primary float-right">Post Add</button>
            </form>
        </div>
    </div>

</x-app-layout>
