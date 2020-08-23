<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class CustomerController extends Controller
{
    public function status($id)
    {
        $user = User::find($id);
        if ($user->active) {
            $user->active = 0;
            session()->flash('error', 'Customer Suspanded');
        }
        else {
            $user->active = 1;
            session()->flash('success', 'Customer Activated');
        }
        $user->save();
        return redirect()->back();
    }
}
