<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Melihovv\ShoppingCart\Facades\ShoppingCart as Cart;

use Auth;

use App\Cart;
use App\Coupon;
use App\Product;
use App\ProductAttribute;

use Session;

class CartController extends Controller
{
    public function add_to_cart(Request $request, $id)
    {
        Session::forget('couponAmount');
        Session::forget('couponCode');

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
        Session::forget('couponAmount');
        Session::forget('couponCode');

        $prev_qty;
        $product = Product::where('id', $id)->first();
        $attr1 = ProductAttribute::where('id', $request->attributes1)->first();
        $attr2 = ProductAttribute::where('id', $request->attributes2)->first();

        if (!is_null($attr1) && !is_null($attr2)) {
            $attr = $attr1->value.' - '.$attr2->value;
        }
        if (!is_null($attr1) && is_null($attr2)) {
            $attr = $attr1->value;
        }
        if (is_null($attr1) && !is_null($attr2)) {
            $attr = $attr2->value;
        }
        

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

    // public function check()
    // {
    // 	$content = Cart::content();
    // 	dd($content->toArray());
    // }

    public function cart_delete($id)
    {
        Session::forget('couponAmount');
        Session::forget('couponCode');

        $cart = Cart::find($id);

        if(!is_null($cart))
        {
            $cart->delete();
        } else {
            return redirect('/cart');
        }
        session()->flash('success', 'Cart item has deleted successfully !!');
        return back();
    }

    public function update_quantity(Request $request, $id)
    {
        Session::forget('couponAmount');
        Session::forget('couponCode');
        
        $cart = Cart::find($id);

        if (!is_null($cart)) {
            $cart->quantity = $request->quantity;
            $cart->save();

            return \Response::json(['success' => 'Cart quantity updated successfully', 'cart' => $cart]);
        }
        else {
            session()->flash('error', 'Invalid cart item');
            return redirect('/cart');
        }
    }

    public function apply_coupon(Request $request)
    {
        Session::forget('couponAmount');
        Session::forget('couponCode');

        $coupon = $request->coupon;

        $couponCount = Coupon::where('code', $coupon)->count();

        if (is_null($coupon)) {
            session()->flash('error', 'Please enter a coupon code');
            return redirect()->back();
        }
        else {
            if ($couponCount == 0) {
                session()->flash('error', 'Coupon Code does not exists');
                return redirect()->back();
            }
            else {
                $couponDetails = Coupon::where('code', $coupon)->first();

                if ($couponDetails->status == 0) {
                    session()->flash('error', 'Invalid coupon code');
                    return redirect()->back();
                }

                $expiry_date = $couponDetails->expiry_date;
                $current_date = date('Y-m-d');

                if (!is_null($expiry_date)) {
                    if($expiry_date < $current_date) {
                        session()->flash('error', 'Coupon code is already expired.');
                        return redirect()->back();
                    }
                }

                

                // $session_id = Session::get('session_id');
                // $userCart = Cart::where(['session_id'=>$session_id])->get();
                if (Auth::check()) {
                    $userCart = Cart::Where('user_id', Auth::id())
                            ->get();
                } else {
                    $userCart = Cart::Where('ip_address', request()->ip())
                            ->get();
                }
                $total_amount = 0;

                foreach ($userCart as $value) {
                    $total_amount = $total_amount + ($value->price * $value->quantity);
                }

                if($couponDetails->type == "Fixed") {
                    $couponAmount = $couponDetails->amount;
                    $couponAmount = round($couponAmount);
                }
                else  {
                    $couponAmount = $total_amount * ( $couponDetails->amount / 100 );
                    $couponAmount = round($couponAmount);
                }

                Session::put('couponAmount', $couponAmount);
                Session::put('couponCode', $coupon);

                session()->flash('success', 'Coupon code is applied successfully');
                return redirect()->back();
            }
        }
    }

    public function remove_coupon()
    {
        Session::forget('couponAmount');
        Session::forget('couponCode');

        return redirect()->back();
    }
}
