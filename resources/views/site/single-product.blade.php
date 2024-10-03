@extends('site.master')
@section('title', $product->name . ' | ' . env('APP_NAME'))

@section('content')


    <div class="container d-flex justify-content-center align-items-center" style="flex-direction: column;">

        <div class="card w-100 d-flex align-items-center mt-5 mb-5" style="flex-direction: column;">
            <div class="card-body">
                <img src="{{ asset($product->image) }}" height="300" width="300" style="object-fit: contain">
                <hr>
                <p
                    style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 19px; text-align: center;">
                    {{ $product->name }} : ${{ $product->price }}</p>
            </div>
        </div>

        @if (!$itemIsInCart)
        <div class="count w-25">
            <form action="{{ route('famms.add-to-cart', $product->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="number" min="1" max="5" name="count" id="count" placeholder="Count"
                        value="{{ old('count') }}"
                        class="form-control @error('count')
                    is-invalid
                    @enderror text-center">
                    @error('count')
                        <small class="invalid-feedback">{{ $message }}</small>
                    @enderror
                </div>
                <button class="btn btn-primary mb-4 w-100">Add to cart</button>
            </form>
        </div>
        @else
        <h3 class="text-danger">This item is already in your cart.</h3>
        @endif

    </div>















@endsection
