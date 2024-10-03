@extends('admin.master')
@section('title', 'Create Slider | ' . env('APP_NAME'))

@section('content')

<h1>Create Slider</h1>
<hr>

<form action="{{ route('admin.sliders.store') }}" method="POST">
@csrf
<div class="mb-2">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}" class="form-control @error('title')
        is-invalid
    @enderror">
    @error('title')
    <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-2">
    <label for="description">Description</label>
    <input type="text" name="description" id="description" placeholder="Description" value="{{ old('description') }}" class="form-control @error('description')
        is-invalid
    @enderror">
    @error('description')
    <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<button class="btn btn-success">Submit</button>

</form>

@endsection
