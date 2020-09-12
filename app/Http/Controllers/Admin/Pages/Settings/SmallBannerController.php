<?php

namespace App\Http\Controllers\Admin\Pages\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SmallBanner;
use File;

class SmallBannerController extends Controller
{
    public function store(Request $request)
    {
        // $input = $request->all();

        $validator  = \Validator::make($request->all(), [
            'img_1' => 'required',
            'img_2' => 'required',
            'img_3' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file_1 = $request->file('img_1');
        $file_2 = $request->file('img_2');
        $file_3 = $request->file('img_3');

        if ($file_1 && $file_2 && $file_3) {
            
            $filename_1 = $file_1->getClientOriginalName();
            $filesize_1 = $file_1->getClientSize();
            $extension_1 = $file_1->getClientOriginalExtension();

            $file_title_1 = uniqid().time().'.'.$extension_1;
            $file_1->move('public/assets/images/small-banner/', $file_title_1);


            $filename_2 = $file_2->getClientOriginalName();
            $filesize_2 = $file_2->getClientSize();
            $extension_2 = $file_2->getClientOriginalExtension();

            $file_title_2 = uniqid().time().'.'.$extension_2;
            $file_2->move('public/assets/images/small-banner/', $file_title_2);


            $filename_3 = $file_3->getClientOriginalName();
            $filesize_3 = $file_3->getClientSize();
            $extension_3 = $file_3->getClientOriginalExtension();

            $file_title_3 = uniqid().time().'.'.$extension_3;
            $file_3->move('public/assets/images/small-banner/', $file_title_3);


            $multi_images = SmallBanner::create([
                'title_1' => $file_title_1,
                'title_2' => $file_title_2,
                'title_3' => $file_title_3,

                'size_1' => $filesize_1,
                'size_2' => $filesize_2,
                'size_3' => $filesize_3,

                'path_1' => "public/assets/images/small-banner/".$file_title_1,
                'path_2' => "public/assets/images/small-banner/".$file_title_2,
                'path_3' => "public/assets/images/small-banner/".$file_title_3,

                'extension_1' => $extension_1,
                'extension_2' => $extension_2,
                'extension_3' => $extension_3,

                'url_1' => $request->url_1,
                'url_2' => $request->url_2,
                'url_3' => $request->url_3
            ]);
        }
        session()->flash('success', 'Images uploaded successfully');
        return redirect()->back();
    }

    public function status($id)
    {
        $banner = SmallBanner::find($id);

        $count = SmallBanner::where('status','=','1')->count();
        if ($banner->status) {
            $banner->status = 0;
            session()->flash('error', 'Small Banner is disabled for slider');
        }
        else {
        	if ($count > 0) {
        		session()->flash('error', 'Oops!! You already enabled small banner group');
        	}
        	else {
        		$banner->status = 1;
            	session()->flash('success', 'Small Banner is enabled for slider');
        	}
            
        }
        $banner->save();
        return redirect()->back();
    }

    public function delete_small_banner($id)
    {
        $banner = SmallBanner::find($id);
        if (!is_null($banner)) {
            // delete the old image from folder
            if (File::exists($banner->path_1) && File::exists($banner->path_2) && File::exists($banner->path_3)) {
                File::delete($banner->path_1);
                File::delete($banner->path_2);
                File::delete($banner->path_3);
            }
            else {
                session()->flash('error', $banner->path_1.', '.$banner->path_2.' & '.$banner->path_3.' not found');
                return redirect()->back();
            }
            $banner->delete();
        }
        session()->flash('success', 'Successfully deleted the small banner group!!');
        return redirect()->back();
    }
}