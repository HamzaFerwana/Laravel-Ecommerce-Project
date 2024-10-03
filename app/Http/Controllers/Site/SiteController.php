<?php

namespace App\Http\Controllers\Site;

use App\Models\About;
use App\Models\Slider;
use App\Models\Payment;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TestNotification;

class SiteController extends Controller
{
    public function index()
    { $user = User::findOrFail(1);
      $user->notify(new TestNotification());
        $products = Product::take(4)->latest('id')->get();
        $abouts = About::all();
        $sliders = Slider::all();
        return view('site.index', compact('sliders', 'abouts', 'products'));
    }

    public function about()
    {
        $abouts = About::all();
        return view('site.about', compact('abouts'));
    }

    public function products()
    {
        $products = Product::latest('id')->paginate(8);
        return view('site.products', compact('products'));
    }

    public function my_cart()
    {
        $cartItems = CartItem::where('user_id', Auth::id())->get();
        return view('site.my-cart', compact('cartItems'));
    }

    public function single_product($name)
    {
        $product = Product::where('name', $name)->first();
        $itemIsInCart = CartItem::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->exists();
        return view('site.single-product', compact('product', 'itemIsInCart'));
    }

    public function add_to_cart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'count' => 'required|numeric|min:1|max:5'
        ]);
        CartItem::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'price' => $product->price,
            'count' => $request->count
        ]);
        return redirect()->route('famms.products')->with(['msg' => 'Product added to cart!']);
    }

    public function remove_from_cart($id)
    {
        $product = CartItem::where('product_id', $id)->where('user_id', Auth::id())->first();
        CartItem::destroy($product->id);
        return redirect()->route('famms.products')->with(['msg' => 'Product removed from cart!']);
    }

    public function checkout(Request $request)
    {
        $total = $request->total;
        $cartItems = CartItem::where('user_id', Auth::id())->get();
        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
            "&amount=" . $total .
            "&currency=EUR" .
            "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData, true);
        $checkoutID = $responseData['id'];
        return view('site.checkout', compact('cartItems', 'checkoutID'));
    }

    public function checkout_result(Request $request)
    {
        $resourcePath = $request->resourcePath;
        $url = "https://eu-test.oppwa.com" . $resourcePath;
        $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData, true);
        if ($responseData['result']['code'] == '000.100.110') {
            Payment::create([
                'transaction_id' => $responseData['id'],
                'amount' => $responseData['amount'],
                'currency' => $responseData['currency'],
                'user_id' => Auth::id()
            ]);
            $cart_items = CartItem::where('user_id', Auth::id())->get();
            foreach($cart_items as $ci) {
                Purchase::create([
                    'user_id' => $ci->user_id,
                    'product_id' => $ci->product_id,
                    'price' => $ci->price,
                    'count' => $ci->count
                ]);
            }
            CartItem::where('user_id', Auth::id())->truncate();
            return redirect()->route('famms.products')->with('msg', 'Thank you for your purchase!');
        } else {
            return 'Payment failed.';
        }
    }
    public function purchases() {
        $purchases = Purchase::where('user_id', Auth::id())->get();
        return view('site.purchases', compact('purchases'));
    }
}
