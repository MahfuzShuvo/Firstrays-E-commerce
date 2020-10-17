<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Cart;
use App\User;
use App\Coupon;
use App\Product;
Use App\Order;
use App\OrdersProduct;

use Auth;
use DB;
use Session;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
    	
    	// $order = $request->all();
    	// echo "<pre>"; print_r($order); die;
    	$id = "INV-".uniqid();
    	$order = new Order;

    	$order->ip_address = request()->ip();
        if (Auth::check()) {
            $order->user_id = Auth::id();
        }
        $order->orderID = $id;
    	$order->user_name = $request->name;
    	$order->user_phone = $request->phone;
    	$order->user_email = $request->email;
    	$order->shipping_address = $request->street_address;
    	$order->shipping_charge = 0;
    	$order->order_status = 0;
    	$order->payment_method = $request->payment_method;
    	$order->grand_total = $request->grand_total;
    	$order->coupon_code = $request->coupon_code;
    	$order->coupon_amount = $request->coupon_amount;
    	

    	if ($request->division) {
            $divisionPath = 'public/assets/json/bd-divisions.json';
            $divisionJson = json_decode(file_get_contents($divisionPath), true);
            $collection = collect($divisionJson)->where('id', $request->division);

            foreach ($collection as $key => $value) {
                $order->division = $value['name'];
            }
        }
        if ($request->district) {
            $districtPath = 'public/assets/json/bd-districts.json';
            $districtJson = json_decode(file_get_contents($districtPath), true);
            $collection = collect($districtJson)->where('id', $request->district);

            foreach ($collection as $key => $value) {
                $order->district = $value['name'];
            }
        }
        if ($request->zone) {
            $zonePath = 'public/assets/json/bd-postcodes.json';
            $zoneJson = json_decode(file_get_contents($zonePath), true);
            $collection = collect($zoneJson)->where('postCode', $request->zone);

            foreach ($collection as $key => $value) {
                $order->zone = $value['postOffice'];
                $order->postal_code = $value['postCode'];
            }
        }
        $order->save();

        $order_id = DB::getPdo()->lastInsertId();

        foreach (Cart::totalCarts() as $cart) {
        	$ordersProduct = new OrdersProduct;

        	$ordersProduct->ip_address = $cart->ip_address;
	        if (Auth::check()) {
	            $ordersProduct->user_id = Auth::id();
	        }
	        $ordersProduct->order_id = $order_id;
	        $ordersProduct->product_id = $cart->product_id;
	        $ordersProduct->product_name = $cart->name;
            $ordersProduct->product_image = $cart->image;
            $ordersProduct->product_attribute = $cart->attribute;
	        $ordersProduct->price = $cart->price;
	        $ordersProduct->quantity = $cart->quantity;
	        $ordersProduct->product_sku = Product::where('id', $cart->product_id)->first()->sku;

	        $ordersProduct->save();

	        $cart->delete();
        }
        Session::put('id', $id);
        Session::put('grand_total', $request->grand_total);
         // dd($ordersProduct);
        return redirect('/thanks');
    }

    public function delete_orders_product($id)
    {
        $total = 0;
        $ordersProduct = OrdersProduct::find($id);
        $order = Order::where('id', $ordersProduct->order_id)->first();

        if (!is_null($ordersProduct)) {
            $ordersProduct->delete();
        }

        if (!is_null($order)) {
            $op = OrdersProduct::where('order_id', $order->id)->get();

            if (!is_null($op)) {
                foreach ($op as $value) {
                    $total = $total + ( $value->quantity * $value->price );
                }
                
                if (!is_null($order->coupon_code)) {
                    $coupon = Coupon::where('code', $order->coupon_code)->first();

                    if($coupon->type == "Fixed") {
                        $couponAmount = $coupon->amount;
                        $couponAmount = round($couponAmount);
                    }
                    else  {
                        $couponAmount = $total * ( $coupon->amount / 100 );
                        $couponAmount = round($couponAmount);
                    }
                    $order->coupon_amount = $couponAmount;
                    $order->grand_total = $total - $couponAmount;
                    $order->save();
                }
            }
            if ($op->count() == 0) {
                $order->delete();
            }

        }
        
        session()->flash('success', 'Product deleted from orderlist');
        return redirect()->back();
    }

    public function orderStatus($id)
    {
        $order = Order::find($id);

        if ($order->order_status == 0) {
            $order->order_status = 1;

            $order->save();

            session()->flash('success', 'Order Confirmed');
            return redirect()->back();
        }
        if ($order->order_status == 1) {
            $order->order_status = 2;

            $order->save();

            session()->flash('success', 'Order Sent to Shipping');
            return redirect()->back();
        }
        if ($order->order_status == 2) {
            $order->order_status = 3;

            $order->save();

            session()->flash('success', 'Order completed');
            return redirect()->back();
        }

    }

    public function thanks()
    {
        return view('thanks');
    }
}
