@extends('admin.master')
@section('title', 'Sliders BG Image | ' . env('APP_NAME'))

@section('content')
@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif

<form action="{{ route('admin.sliders-bg-image-data') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-2">
        <label for="bg_image">Background Image</label>
        <input type="file" name="bg_image" id="bg_image" class="form-control @error('bg_image')
        is-invalid
        @enderror">
        @error('bg_image')
        <small class="invalid-feedback">{{ $message }}</small>
        @enderror
    </div>
    <button class="btn btn-success">Submit</button>
</form>
<hr>
<h4>Current BG Image: </h4>
<img src="{{ asset(settings()->get('bg_image')) }}" height="300" width="600" style="object-fit: cover">














@endsection
