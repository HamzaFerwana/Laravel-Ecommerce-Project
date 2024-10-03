@extends('site.master')
@section('title', 'My Cart | ' . env('APP_NAME'))

@section('content')
    <?php
    use App\Models\CartItem;
    use App\Models\Product;
    $total = 0;
    ?>
    <div class="container">
        <h1>My Cart: </h1>
        <table class="table table-bordered table-striped table-hover">
            <thead class="text-center">
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Count</th>
                    <th>Total</th>
                    <th>...</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($cartItems as $ci)
                    <tr>
                        <td>{{ Product::where('id', $ci->product_id)->first()->name }}</td>
                        <td><img src="{{ asset(Product::where('id', $ci->product_id)->first()->image) }}" height="100" width="100"></td>
                        <td>${{ Product::where('id', $ci->product_id)->first()->price }}</td>
                        <td>{{ $ci->count }}</td>
                        <td>${{ Product::where('id', $ci->product_id)->first()->price * $ci->count }} <?php $total += Product::where('id', $ci->product_id)->first()->price * $ci->count ?>
                        </td>
                        <td>
                            <a href="{{ route('famms.remove-from-cart', $ci->product_id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="6" class="text-center">Cart is empty.</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h4>Total = ${{ $total }}</h4>
            <a  href="{{ route('famms.checkout', $total) }}" class="btn btn-primary" class="mb-5">Checkout</a>
        </div>
    </div>










@endsection
