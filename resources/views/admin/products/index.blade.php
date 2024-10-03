@extends('admin.master')
@section('title', 'Products | ' . env('APP_NAME'))

@section('content')

    <h1>Products</h1>
    <hr>
    @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
    @endif
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
        </thead>
        <tbody class="text-center">
            @forelse ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><img src="{{ asset($product->image) }}" height="100" width="100" style="object-fit: cover;"></td>
                <td>{{ $product->name }}</td>
                <td>€{{ $product->price }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <th colspan="5" class="text-center">No Data Found.</th>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $products->links() }}
















@endsection
