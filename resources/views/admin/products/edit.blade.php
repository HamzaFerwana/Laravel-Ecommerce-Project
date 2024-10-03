@extends('admin.master')
@section('title', 'Edit Product | ' . env('APP_NAME'))

@section('content')

    <h1>Edit Product</h1>
    <hr>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" placeholder="Name"
                class="form-control @error('name')
            is-invalid
            @enderror">
            @error('name')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-2">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" placeholder="price"
                class="form-control @error('price')
            is-invalid
            @enderror">
            @error('price')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" id="image"
                class="form-control @error('image')
            is-invalid
            @enderror">
            @error('image')
                <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Submit</button>
    </form>


@endsection
