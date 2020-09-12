<?php

namespace App\Http\Controllers\Admin\Pages\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Attribute;

class AttributesController extends Controller
{
    public function store(Request $request)
    {
    	// Validation
    	$validator  = \Validator::make($request->all(), [
	        'name' => 'required|max:500|unique:attributes',
    	]);

    	if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


    	$attribute = new Attribute;

    	$attribute->name = $request->name;
    	
    	$attribute->save();
    	
    	session()->flash('success', 'Successfully added the attribute!!');
    	return redirect('/attributes');
    }

    public function delete_attribute($id)
    {
        $attribute = Attribute::find($id);
        
        $attribute->delete();

        session()->flash('success', 'Successfully deleted the attribute!!');
        return redirect()->back();
    }
}
