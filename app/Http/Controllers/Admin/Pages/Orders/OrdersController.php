<?php

namespace App\Http\Controllers\Admin\Pages\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\OrdersProduct;

use PDF;

class OrdersController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function viewSingleOrder($id)
    {
    	$order = Order::where('id', $id)->first();
    	return view('admin.pages.orders.single_order_view', compact('order'));
    }

    public function generate_invoice($id)
    {
        $order = Order::find($id);
        
        $pdf = PDF::loadView('admin.pages.orders.invoice', compact('order'));
        return $pdf->stream('invoice.pdf');
    }
}
