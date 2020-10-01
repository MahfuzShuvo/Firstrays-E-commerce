<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Cart extends Model
{
	public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    public static function totalItems()
    {
    	if (Auth::check()) {
    		$carts = Cart::Where('user_id', Auth::id())
                    ->get();
    	} else {
    		$carts = Cart::Where('ip_address', request()->ip())
                    ->get();
    	}

        $total_item = 0;

        foreach ($carts as $cart) {
            $total_item += $cart->quantity;
        }
        return $total_item;
    }

    public static function totalCarts()
    {
        if (Auth::check()) {
            $carts = Cart::Where('user_id', Auth::id())
                    ->get();
        } else {
            $carts = Cart::Where('ip_address', request()->ip())
                    ->get();
        }

        return $carts;
    }
}
