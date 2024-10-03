@extends('site.master')
@section('title', 'Products | ' . env('APP_NAME'))

@section('content')
    <!-- inner page section -->
    <section class="inner_page_head">
        <div class="container_fuild">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <h3>@if (session('msg'))
                            {{ session('msg') }}
                            @else
                            Products
                        @endif</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end inner page section -->
    <!-- product section -->
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our <span>products</span>
                </h2>
            </div>
            @include('site.parts.products')
            <hr>
            {{ $products->links() }}
        </div>
    </section>
    <!-- end product section -->
@endsection
