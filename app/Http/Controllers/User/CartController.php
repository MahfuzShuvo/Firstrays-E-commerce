<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Melihovv\ShoppingCart\Facades\ShoppingCart as Cart;
use Auth;
use App\Cart;
use App\Product;
use App\ProductAttribute;

class CartController extends Controller
{
    public function add_to_cart(Request $request, $id)
    {

    	$product = Product::where('id', $id)->first();
    	$attr = ProductAttribute::where('product_id', $id)->get();

    	if (Auth::check()) {
            $cart = Cart::Where('user_id', Auth::id())
                    ->where('product_id', $id)
                    ->first();
        } else {
            $cart = Cart::Where('ip_address', request()->ip())
                    ->where('product_id', $id)
                    ->first();
        }

        if (!is_null($cart)) {
            $cart->increment('quantity');
        } else {

            $cart = new Cart();

                if (Auth::check()) {
                    $cart->user_id = Auth::id();
                }

                $cart->ip_address = request()->ip();
                $cart->product_id = $id;
                $cart->name = $product->name;
                foreach ($product->images as $key => $product_img) {
                    if ($key == 0) {
                        $cart->image = $product_img->display_image;
                    }
                }
                
                if ($product->promotion_price) {
                	$cart->price = $product->promotion_price;
                } else {
                	$cart->price = $product->price;
                }
                $cart->save();
        }

    	// Cart::add(id, name, quantity, price);
    	// if ($product->promotion_price) {
    	// 	Cart::add($product->id, $product->name, 1, $product->promotion_price);
    	// }
    	// else {
    	// 	Cart::add($product->id, $product->name, 1, $product->price);
    	// }
    	return \Response::json(['success' => 'Product successfully added to your cart', 'cart' => $cart, 'totalCartQuantity' => $cart->totalItems()]);
    	// return response()->json($data);
    }

    public function add_to_cart_with_attr(Request $request, $id)
    {

        $product = Product::where('id', $id)->first();
        $attr1 = ProductAttribute::where('id', $request->attributes1)->first()->value;
        $attr2 = ProductAttribute::where('id', $request->attributes2)->first()->value;

        if (Auth::check()) {
            $cart = Cart::Where('user_id', Auth::id())
                    ->where('product_id', $id)
                    ->first();
        } else {
            $cart = Cart::Where('ip_address', request()->ip())
                    ->where('product_id', $id)
                    ->first();
        }

        if (!is_null($cart)) {
            $cart->increment('quantity');
        } else {

            $cart = new Cart();

                if (Auth::check()) {
                    $cart->user_id = Auth::id();
                }

                $cart->ip_address = request()->ip();
                $cart->product_id = $id;
                $cart->name = $product->name;
                $cart->attribute_1 = $attr1;
                $cart->attribute_2 = $attr2;
                $cart->quantity = $request->quantity;
                foreach ($product->images as $key => $product_img) {
                    if ($key == 0) {
                        $cart->image = $product_img->display_image;
                    }
                }
                
                if ($product->promotion_price) {
                    $cart->price = $product->promotion_price;
                } else {
                    $cart->price = $product->price;
                }
                $cart->save();
        }

        
        return \Response::json(['success' => 'Product successfully added to your cart', 'cart' => $cart, 'totalCartQuantity' => $cart->totalItems()]);
        // return response()->json($data);
        // return $request;
    }

    public function check()
    {
    	$content = Cart::content();
    	dd($content->toArray());
    }
}
