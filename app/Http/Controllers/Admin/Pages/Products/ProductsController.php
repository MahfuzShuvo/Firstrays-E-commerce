<?php

namespace App\Http\Controllers\Admin\Pages\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\ProductImage;
use File;

class ProductsController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $validator  = \Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'display_image' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    	$product = new Product;

    	$product->name = $request->name;
    	$product->description = $request->description;
    	$product->price = $request->price;
    	$product->discount = $request->discount;
    	$product->quantity = $request->quantity;

    	$product->slug = Str::slug($product->name);
    	$product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->sku = "#FR".uniqid();

    	$product->save();

    	if ($request->hasFile('image') && $request->hasFile('display_image')) {
    		$image = $request->file('display_image');

    		$imagename = $image->getClientOriginalName();
            $imagesize = $image->getClientSize();
            $ext = $image->getClientOriginalExtension();

            $image_title = uniqid().time().'.'.$ext;
            $image->move('public/assets/images/new-products/', $image_title);

    		foreach ($request->file('image') as $file) {
    			$filename = $file->getClientOriginalName();
	            $filesize = $file->getClientSize();
	            $extension = $file->getClientOriginalExtension();

	            $file_title = uniqid().time().'.'.$extension;
	            $file->move('public/assets/images/new-products/', $file_title);

	            $product_image = new ProductImage;

	            $product_image->product_id = $product->id;
	            $product_image->display_image = "public/assets/images/new-products/".$image_title;
	            $product_image->image = "public/assets/images/new-products/".$file_title;

	            $product_image->save();
    		}
    	}
    	session()->flash('success', 'Product added in the stock successfully');
    	return redirect()->back();
    }

    public function status($id)
    {
        $product = Product::find($id);
        if ($product->status) {
            $product->status = 0;
            session()->flash('error', 'Product disabled to show');
        }
        else {
            $product->status = 1;
            session()->flash('success', 'Product enabled to show');
        }
        $product->save();
        return redirect()->back();
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        $product_img = ProductImage::where('product_id', $product->id)->get();

        if (!is_null($product)) {
            // delete the old image from folder
            foreach ($product_img as $image) {
            	if (File::exists($image->image) || File::exists($image->display_image)) {
		            File::delete($image->image);
		            File::delete($image->display_image);
		        }
		        else {
		            session()->flash('error', $image->image.' & '.$image->display_image.' not found');
		            return redirect()->back();
		        }
		        $image->delete();
		    }
		    $product->delete();
        }
            
        session()->flash('success', 'Successfully deleted the product from the stock');
        return redirect()->back();
    }

    public function edit_product(Request $request, $id)
    {

        $product = Product::find($id);
        $product_img = ProductImage::where('product_id', $product->id)->get();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->quantity = $request->quantity;

        $product->slug = Str::slug($product->name);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;


        if ($request->hasFile('image'))
        {
            foreach ($product_img as $key => $img) {
                if ($key == 0) {
                    $dis_img = $img->display_image;
                }
            }
            
            foreach ($product_img as $img) {
                if (File::exists($img->image)) {
                    File::delete($img->image);
                }
                $img->delete();
            }

            foreach ($request->file('image') as $file) {
                $filename = $file->getClientOriginalName();
                $filesize = $file->getClientSize();
                $extension = $file->getClientOriginalExtension();

                $file_title = uniqid().time().'.'.$extension;
                $file->move('public/assets/images/new-products/', $file_title);

                $product_image = new ProductImage;

                $product_image->product_id = $product->id;
                $product_image->display_image = $dis_img;
                $product_image->image = "public/assets/images/new-products/".$file_title;

                $product_image->save();
            }
        }
        else if($request->hasFile('display_image'))
        {
            // delete the old image from folder
            foreach ($product_img as $img) {
                if (File::exists($img->display_image)) {
                    File::delete($img->display_image);
                }
                $img->delete();
            }

            $image = $request->file('display_image');

            $imagename = $image->getClientOriginalName();
            $imagesize = $image->getClientSize();
            $ext = $image->getClientOriginalExtension();

            $image_title = uniqid().time().'.'.$ext;
            $image->move('public/assets/images/new-products/', $image_title);

            // $product_image = ProductImage::where('product_id', $product->id)->get();

            foreach ($product_img as $img) {
                $img->display_image = "public/assets/images/new-products/".$image_title;
                $img->save();
            }
            // $product_image = new ProductImage;
            // $product_image->save(); 
        }
        else if($request->hasFile('image') && $request->hasFile('display_image'))
        {
            $image = $request->file('display_image');

            $imagename = $image->getClientOriginalName();
            $imagesize = $image->getClientSize();
            $ext = $image->getClientOriginalExtension();

            $image_title = uniqid().time().'.'.$ext;
            $image->move('public/assets/images/new-products/', $image_title);

            foreach ($request->file('image') as $file) {
                $filename = $file->getClientOriginalName();
                $filesize = $file->getClientSize();
                $extension = $file->getClientOriginalExtension();

                $file_title = uniqid().time().'.'.$extension;
                $file->move('public/assets/images/new-products/', $file_title);

                $product_image = new ProductImage;

                $product_image->product_id = $product->id;
                $product_image->display_image = "public/assets/images/new-products/".$image_title;
                $product_image->image = "public/assets/images/new-products/".$file_title;

                $product_image->save();
            }
        }

        

        $product->save();


        session()->flash('success', 'Successfully updated the product!!');
        return redirect('/products');
    }
}
