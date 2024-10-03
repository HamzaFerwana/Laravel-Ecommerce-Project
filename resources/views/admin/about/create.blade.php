@extends('admin.master')
@section('title', 'Create About | ' . env('APP_NAME'))

@section('content')

    <h1>Create About</h1>
    <hr>

    <form action="{{ route('admin.about.store') }}" method="POST">
        @csrf

        <div class="mb-2">
            <label for="icon">Icon</label>
            <input type="text" name="icon" id="icon" value="{{ old('icon') }}"
                class="form-control @error('icon')
            is-invalid
            @enderror" placeholder="Icon">
            @error('icon')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="form-control @error('title')
            is-invalid
            @enderror" placeholder="Title">
            @error('title')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-5">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" value="{{ old('description') }}"
                class="form-control @error('description')
            is-invalid
            @enderror" placeholder="Description">
            @error('description')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-success w-100">Submit</button>

    </form>















@endsection
