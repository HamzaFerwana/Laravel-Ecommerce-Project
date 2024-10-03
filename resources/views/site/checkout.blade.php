@extends('site.master')
@section('title', 'Checkout | ' . env('APP_NAME'))

@section('content')
    <?php
    use App\Models\CartItem;
    use App\Models\Product;
    $total = 0;
    ?>
    <div class="container d-flex w-100" style="justify-content: space-between">

        <div class="con1 w-45" style="border: 1px none">
            <h1>Checkout: </h1>

            <table class="table table-bordered table-striped table-hover">
                <thead class="text-center">
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Count</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($cartItems as $ci)
                        <tr>
                            <td>{{ Product::where('id', $ci->product_id)->first()->name }}</td>
                            <td><img src="{{ asset(Product::where('id', $ci->product_id)->first()->image) }}" height="100"
                                    width="100"></td>
                            <td>€{{ Product::where('id', $ci->product_id)->first()->price }}</td>
                            <td>{{ $ci->count }}</td>
                            <td>€{{ Product::where('id', $ci->product_id)->first()->price * $ci->count }}
                                <?php $total += Product::where('id', $ci->product_id)->first()->price * $ci->count; ?>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="6" class="text-center">Cart is empty.</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <h4>Total = ${{ request()->total }}</h4>
        </div>

        <div class="con2 w-45" style="border: 1px none">
            <form action="{{ route('famms.checkout-result') }}" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>
        </div>

    </div>

@endsection
<script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $checkoutID }}"></script>
@section('scripts')

@endsection
