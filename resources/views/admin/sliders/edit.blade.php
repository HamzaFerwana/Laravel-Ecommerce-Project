@extends('admin.master')
@section('title', 'Edit Slider | ' . env('APP_NAME'))

@section('content')

<h1>Edit Slider</h1>
<hr>

<form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST">
@csrf @method('PUT')
<div class="mb-2">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title', $slider->title) }}" class="form-control @error('title')
        is-invalid
    @enderror">
    @error('title')
    <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-2">
    <label for="description">Description</label>
    <input type="text" name="description" id="description" placeholder="Description" value="{{ old('description', $slider->description) }}" class="form-control @error('description')
        is-invalid
    @enderror">
    @error('description')
    <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<button class="btn btn-success">Submit</button>

</form>

@endsection
