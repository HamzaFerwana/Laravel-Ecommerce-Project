@extends('site.master')
@section('title', 'My Purchases | ' . env('APP_NAME'))

@section('content')
<?php
use App\Models\Product;
?>
<div class="container">
<h1>My Purchases: </h1>
<table class="table table-bordered table-striped table-hover text-center">
    <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Count</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($purchases as $purchase)
        <tr>
            <td>{{ Product::where('id', $purchase->product_id)->first()->name }}</td>
            <td><img src="{{ asset(Product::where('id', $purchase->product_id)->first()->image) }}" height="100" width="100"></td>
            <td>€{{ Product::where('id', $purchase->product_id)->first()->price }}</td>
            <td>{{ $purchase->count }}</td>
            <td>€{{ Product::where('id', $purchase->product_id)->first()->price * $purchase->count }}</td>
        </tr>
        @empty
            <tr>
                <th colspan="5" class="text-center">No Purchases yet.</th>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
@endsection
