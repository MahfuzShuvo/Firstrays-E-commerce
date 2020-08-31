<?php

namespace App\Http\Controllers\Admin\Pages\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $validator  = \Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    	$category = new Category;

    	$category->name = $request->name;
    	$category->description = $request->description;
    	$category->parent_id = $request->parent_id;
    	$category->save();

    	session()->flash('success', 'Category added successfully');
    	return redirect()->back();
    }


    public function status($id)
    {
        $category = Category::find($id);
        if ($category->status) {
        	if ($category->parent_id == null) {
    			$sub_cat = Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();

    			foreach ($sub_cat as $sub) {
    				$sub->status = 0;
    				$sub->save();
    			}
    		}
            $category->status = 0;
            session()->flash('error', 'Category disabled to show');
        }
        else {
        	if ($category->parent_id == null) {
    			$sub_cat = Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();

    			foreach ($sub_cat as $sub) {
    				$sub->status = 1;
    				$sub->save();
    			}
    		}
            $category->status = 1;
            session()->flash('success', 'Category enabled to show');
        }
        $category->save();
        return redirect()->back();
    }

    public function delete_category($id)
    {
    	$category = Category::find($id);
    	if (!is_null($category)) {
    		if ($category->parent_id == null) {
    			$sub_cat = Category::orderBy('name', 'desc')->where('parent_id', $category->id)->get();

    			foreach ($sub_cat as $sub) {
    				$sub->delete();
    			}
    		}
    		$category->delete();
    	}
    	session()->flash('success', 'Successfully deleted the category!!');
    	return back();
    }


}
