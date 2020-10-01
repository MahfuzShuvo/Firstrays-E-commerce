<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Wishlist;
use Auth;

class WishlistController extends Controller
{
    public function add_to_wishlist($id)
    {
        

        $wish = Wishlist::where('product_id', $id)->where('user_id', Auth::id())->first();
        // dd($wish);

        if (Auth::check()) {
            if ($wish) {
                return \Response::json(['error' => 'You already added this product as your wishlist']);
            }
            if (is_null($wish)) {
                $wishlist = new Wishlist;
                $wishlist->user_id = Auth::id();
                $wishlist->product_id = $id;

                $wishlist->save();
                return \Response::json(['success' => 'Successfully added on your wishlist']);
            }
        }
        else {
            return \Response::json(['error' => 'Please! At first login your account']);
        }

        
    }

    public function remove_wishlist($id)
    {
        $wishlist = Wishlist::find($id);

        if (!is_null($wishlist)) {
            $wishlist->delete();
            return redirect()->back()->with('delete', 'This product is removed from your wishlist');
        }
    }
}
