@extends('site.master')
@section('title', 'Home | ' . env('APP_NAME'))

@section('content')
    <!-- slider section -->
    <section class="slider_section ">
        <div class="slider_bg_box">
            <img src="{{ asset(settings()->get('bg_image')) }}" alt="">
        </div>
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            {{ $slider->title }}
                                        </h1>
                                        <p>
                                            {{ $slider->description }}
                                        </p>
                                        <div class="btn-box">
                                            <a href="{{ route('famms.products') }}" class="btn1">
                                                Shop Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="container">
                <ol class="carousel-indicators">
                    <?php $index = 0; ?>
                    @foreach ($sliders as $slider)
                        <li data-target="#customCarousel1" data-slide-to="{{ $index++ }}"
                            class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
            </div>
        </div>
    </section>
    <!-- end slider section -->

    <!-- product section -->
    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our <span>products</span>
                </h2>
            </div>


                @include('site.parts.products')

            <div class="btn-box">
                <a href="{{ route('famms.products') }}">
                    View All products
                </a>
            </div>

    </section>
    <!-- end product section -->


@endsection
