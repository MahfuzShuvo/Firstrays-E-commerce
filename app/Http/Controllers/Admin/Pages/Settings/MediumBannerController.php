<?php

namespace App\Http\Controllers\Admin\Pages\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MediumBanner;
use File;

class MediumBannerController extends Controller
{
    public function store(Request $request)
    {
        // $input = $request->all();
        $validator  = \Validator::make($request->all(), [
            'img_1' => 'required|mimetypes:image/jpeg, image/png, image/jpg|max:1024',
            'img_2' => 'required|mimetypes:image/jpeg, image/png, image/jpg|max:1024',

            'header_txt_1' => 'required',
            'header_txt_2' => 'required',

            'txt_1' => 'required',
            'txt_2' => 'required',

            'discount_1' => 'required',
            'discount_2' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file_1 = $request->file('img_1');
        $file_2 = $request->file('img_2');

        if ($file_1 && $file_2) {
            
            $filename_1 = $file_1->getClientOriginalName();
            $filesize_1 = $file_1->getClientSize();
            $extension_1 = $file_1->getClientOriginalExtension();

            $file_title_1 = uniqid().time().'.'.$extension_1;
            $file_1->move('public/assets/images/medium-banner/', $file_title_1);


            $filename_2 = $file_2->getClientOriginalName();
            $filesize_2 = $file_2->getClientSize();
            $extension_2 = $file_2->getClientOriginalExtension();

            $file_title_2 = uniqid().time().'.'.$extension_2;
            $file_2->move('public/assets/images/medium-banner/', $file_title_2);


            $multi_images = MediumBanner::create([
                'title_1' => $file_title_1,
                'title_2' => $file_title_2,

                'size_1' => $filesize_1,
                'size_2' => $filesize_2,

                'path_1' => "public/assets/images/medium-banner/".$file_title_1,
                'path_2' => "public/assets/images/medium-banner/".$file_title_2,

                'extension_1' => $extension_1,
                'extension_2' => $extension_2,

                'url_1' => $request->url_1,
                'url_2' => $request->url_2,

                'header_txt_1' => $request->header_txt_1,
                'header_txt_2' => $request->header_txt_2,

                'txt_1' => $request->txt_1,
                'txt_2' => $request->txt_2,

                'discount_1' => $request->discount_1,
                'discount_2' => $request->discount_2,
            ]);
        }
        session()->flash('success', 'Images uploaded successfully');
        return redirect()->back();
    }

    public function status($id)
    {
        $banner = MediumBanner::find($id);

        $count = MediumBanner::where('status','=','1')->count();
        if ($banner->status) {
            $banner->status = 0;
            session()->flash('error', 'Medium Banner is disabled for slider');
        }
        else {
        	if ($count > 0) {
        		session()->flash('error', 'Oops!! You already enabled medium banner group');
        	}
        	else {
        		$banner->status = 1;
            	session()->flash('success', 'Medium Banner is enabled for slider');
        	}
            
        }
        $banner->save();
        return redirect()->back();
    }

    public function delete_medium_banner($id)
    {
        $banner = MediumBanner::find($id);
        if (!is_null($banner)) {
            // delete the old image from folder
            if (File::exists($banner->path_1) && File::exists($banner->path_2)) {
                File::delete($banner->path_1);
                File::delete($banner->path_2);
            }
            else {
                session()->flash('error', $banner->path_1.' & '.$banner->path_2.' not found');
                return redirect()->back();
            }
            $banner->delete();
        }
        session()->flash('success', 'Successfully deleted the medium banner group!!');
        return redirect()->back();
    }
}
