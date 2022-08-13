<x-app-layout>
    <div class="container">
        <div class="m-5"></div>
        <div class="row">
          <div class="col-md-9">
            <div class="form-floating mb-3 m-2">
              <input type="text" class="form-control" id="floatingInput" placeholder="Search for job..">
              <label for="floatingInput">Search for job...</label>
            </div>
            @foreach($jobs as $job)
            <div class="card m-2">
                <div class="card-header">
                  {{$job->userName->name}} |
                  {{$job->JobCategory->name}}
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ $job->title}}</h5>

                  <p class="card-text">{{ $job->body}} </p>

                  <span class="badge text-bg-light">Budget: {{$job->price}}</span>
                  <a href="{{ route('job.show',$job->slug) }}" class="btn btn-primary">Go Job Detail</a>
                </div>
              </div>
              @endforeach

            </div>
            <div class="col-md-3">
              <div class="card">
                <div class="card-body text-center">
                  @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                  <img src="{{ Auth::user()->profile_photo_url }}" class="rounded mx-auto d-block m-1" width="100px">
                  @endif
                  <h5 class="card-title"> {{ Auth::user()->name }}</h5>
                  <p class="card-text"><span class="badge bg-secondary">Freelancer</span></p>

                </div>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
