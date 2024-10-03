<?php
use App\Models\CartItem;
?>
<div class="row">
    @foreach ($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box">
                <div class="option_container">
                    <div class="options">

                        @auth
                        <?php $itemIsInCart = CartItem::where('user_id', Auth::id())
                        ->where('product_id', $product->id)
                        ->exists(); ?>
                        @if ($itemIsInCart)
                        <a href="{{ route('famms.remove-from-cart', $product->id) }}" class="option2">
                            Remove
                        </a>
                        @else
                        <a href="{{ route('famms.single-product', $product->name) }}" class="option2">
                            Add to cart
                        </a>
                        @endif
                        @endauth

                        @guest
                            <a href="{{ route('famms.single-product', $product->name) }}" class="option2">
                                Add to cart
                            </a>
                        @endguest

                    </div>
                </div>
                <div class="img-box">
                    <img src="{{ asset($product->image) }}" alt="">
                </div>
                <div class="detail-box">
                    <h5>
                        {{ $product->name }}
                    </h5>
                    <h6>
                        €{{ $product->price }}
                    </h6>
                </div>
            </div>
        </div>
    @endforeach
</div>
