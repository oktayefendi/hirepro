<x-app-layout>

<section class="jumbotron  mt-5">
    <div class="container">
      <div class="card">
        <div class="card-header">
            {{$job->userName->name}}
          </div>
          <div class="card-body text-center">
            <h1 class="mt-3">{{ $job->title }}</h1>
            <p class="lead text-muted mt-3">{{ $job->body }}</p>
            <span class="badge text-bg-light">Budget: {{$job->price}}</span>
          </div>
          
      </div>
       
    </div>
</section>
</x-app-layout>