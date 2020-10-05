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
    	return \Response::json(['success' => 'Product successfully added to your cart', 'cart' => $cart->totalCarts(), 'totalCartQuantity' => $cart->totalItems()]);
    	// return response()->json($data);
    }

    public function add_to_cart_with_attr(Request $request, $id)
    {
        $prev_qty;
        $product = Product::where('id', $id)->first();
        $attr1 = ProductAttribute::where('id', $request->attributes1)->first()->value;
        $attr2 = ProductAttribute::where('id', $request->attributes2)->first()->value;
        $attr = $attr1.' - '.$attr2;

        if (Auth::check()) {
            $cart = Cart::Where('user_id', Auth::id())
                    ->where('product_id', $product->id)
                    ->where('attribute', $attr)
                    ->first();
        } else {
            $cart = Cart::Where('ip_address', request()->ip())
                    ->where('product_id', $product->id)
                    ->where('attribute', $attr)
                    ->first();
        }
        // dd($cart);
        if (!is_null($cart)) {
            $cart->quantity = $request->quantity + $cart->quantity;
            // foreach ($cart as $key => $cart) {
            //     if ($cart->attribute == $attr) {

            //     $cart->quantity = $request->quantity + $cart->quantity;
            //     $cart->save(); 
            // }
            // else {
            //     $cart = new Cart();

            //     if (Auth::check()) {
            //         $cart->user_id = Auth::id();
            //     }

            //     $cart->ip_address = request()->ip();
            //     $cart->name = $product->name;
            //     $cart->product_id = $product->id;
            //     $cart->attribute = $attr;
            //     $cart->quantity = $request->quantity;
            //     foreach ($product->images as $key => $product_img) {
            //         if ($key == 0) {
            //             $cart->image = $product_img->display_image;
            //         }
            //     }
                
            //     if ($product->promotion_price) {
            //         $cart->price = $product->promotion_price;
            //     } else {
            //         $cart->price = $product->price;
            //     }
            //     $cart->save();
            // }
            // }
            
            
            // if ($request->attributes1 || $request->attributes2 || ($request->attributes1 && $request->attributes2)) {
            //     $cart = new Cart();

            //     if (Auth::check()) {
            //         $cart->user_id = Auth::id();
            //     }

            //     $cart->ip_address = request()->ip();
            //     $cart->product_id = $id;
            //     $cart->name = $product->name;
            //     $cart->quantity = $request->quantity;
            //     foreach ($product->images as $key => $product_img) {
            //         if ($key == 0) {
            //             $cart->image = $product_img->display_image;
            //         }
            //     }
                
            //     if ($product->promotion_price) {
            //         $cart->price = $product->promotion_price;
            //     } else {
            //         $cart->price = $product->price;
            //     }
            //     if ($request->attributes1 && $request->attributes2) {
            //         if ($cart->attribute != $attr) {
            //             $cart->attribute = $attr;
                        
            //             // $cart->save();
            //         }
            //         if ($cart->attribute == $attr) {
            //             $cart->quantity = $request->quantity + $cart->quantity;
            //         }
            //     }
            //     if ($request->attributes1) {
            //         if ($cart->attribute != $attr) {
            //             $cart->attribute = $attr1;
                        
            //             // $cart->save();
            //         }
            //         if ($cart->attribute == $attr) {
            //             $cart->quantity = $request->quantity + $cart->quantity;
            //         }
            //     }
            //     if ($request->attributes2) {
            //         if ($cart->attribute != $attr) {
            //             $cart->attribute = $attr2;
            //             // $cart->save();
            //         }
            //         if ($cart->attribute == $attr) {
            //             $cart->quantity = $request->quantity + $cart->quantity;
            //         }
            //     }
            //     $cart->save();
            // }
            
            $cart->save();
        } else {

            $cart = new Cart();

                if (Auth::check()) {
                    $cart->user_id = Auth::id();
                }

                $cart->ip_address = request()->ip();
                $cart->product_id = $id;
                $cart->name = $product->name;
                $cart->attribute = $attr;
                // $cart->attribute_2 = $attr2;
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

        
        return \Response::json(['success' => 'Product successfully added to your cart', 'cart' => $cart->totalCarts(), 'totalCartQuantity' => $cart->totalItems()]);
        // return response()->json($data);
        // return $request;
    }

    public function check()
    {
    	$content = Cart::content();
    	dd($content->toArray());
    }
}
