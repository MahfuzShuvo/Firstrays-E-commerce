<?php

namespace App\Http\Controllers\Admin\Pages\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use File;

class BrandsController extends Controller
{
    public function store(Request $request)
    {
    	// Validation
    	$validator  = \Validator::make($request->all(), [
	        'name' => 'required|max:500',
	        'image' => 'required'
    	]);

    	if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


    	$brand = new Brand;

    	$brand->name = $request->name;
    	$brand->description = $request->description;
    	
    	// insert image
    	if ($request->hasFile('image')) {
    		$image = $request->file('image');

    		$imagename = $image->getClientOriginalName();
            $imagesize = $image->getClientSize();
            $ext = $image->getClientOriginalExtension();

            $image_title = uniqid().time().'.'.$ext;
            $image->move('public/assets/images/brands/', $image_title);
            $brand->image = "public/assets/images/brands/".$image_title;
    	}

    	$brand->save();
    	
    	session()->flash('success', 'Successfully added the brand!!');
    	return redirect('/brands');
    }

    public function delete_brand($id)
    {
    	$brand = Brand::find($id);
    	if (!is_null($brand)) {
    		// delete the old image from folder
    		if (File::exists($brand->image)) {
    			File::delete($brand->image);
    		}

    		$brand->delete();
    	}
    	session()->flash('success', 'Successfully deleted the brand!!');
    	return back();
    }

    public function edit_brand(Request $request, $id)
    {

    	$brand = Brand::find($id);

        // $validator  = \Validator::make($request->all(), [
        //     'image' => 'mimes:jpg, jpeg, png'
        // ]);

        // if($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

    	$brand->name = $request->name;
    	$brand->description = $request->description;

    	// insert image
    	if ($request->hasFile('image')) {
    		
    		// delete the old image from folder
    		if (File::exists($brand->image)) {
    			File::delete($brand->image);
    		}
    		$image = $request->file('image');
    		$imagename = $image->getClientOriginalName();
            $imagesize = $image->getClientSize();
            $ext = $image->getClientOriginalExtension();

            $image_title = uniqid().time().'.'.$ext;
            $image->move('public/assets/images/brands/', $image_title);
            $brand->image = "public/assets/images/brands/".$image_title;
    	}

    	$brand->save();


        session()->flash('success', 'Successfully updated the brand!!');
        return redirect('/brands');
    }
}
