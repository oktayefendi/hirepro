<x-app-layout>
    <div class="container mt-5">
        <div class="row">
        <div class="col-md-6 card p-3">
    <h1>Create a new message</h1>
    <form action="{{ route('messages.store') }}" method="post">
        {{ csrf_field() }}

            <!-- Subject Form Input -->
            <div class="form-group">
                <label class="control-label">Subject</label>
                <input type="text" class="form-control" name="subject" placeholder="Subject"
                       value="{{ old('subject') }}">
            </div>

            <!-- Message Form Input -->
            <div class="form-group">
                <label class="control-label">Message</label>
                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
            </div>
            <label>User id:</label>
            <input type="text"  class="form-control mt-2 mb-2" name="recipients[]" value="<?php if(isset($_GET['name'])) { echo($_GET['name']); } ?>" readonly>

            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>

    </form>
</div>
<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Title</h5>
            <p class="card-text">Content</p>
        </div>
    </div>
</div>
</div>
</div>
</x-app-layout>
