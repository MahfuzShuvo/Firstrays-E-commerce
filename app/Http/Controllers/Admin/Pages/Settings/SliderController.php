<?php

namespace App\Http\Controllers\Admin\Pages\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use File;

class SliderController extends Controller
{
    
    public function store(Request $request)
    {
        $input = $request->all();

        $file = $request->file('file');

        if ($file) {
            
            $filename = $file->getClientOriginalName();
            $filesize = $file->getClientSize();
            $extension = $file->getClientOriginalExtension();

            $file_title = uniqid().time().'.'.$extension;
            $file->move('public/assets/images/banner/', $file_title);


            $multi_images = Slider::create([
                'title' => $file_title,
                'size' => $filesize,
                'path' => "public/assets/images/banner/".$file_title,
                'extension' => $extension
            ]);
        }
        session()->flash('success', 'Slider image uploaded successfully');
        // return redirect()->back();
    }

    public function status($id)
    {
        $slider = Slider::find($id);
        if ($slider->status) {
            $slider->status = 0;
            session()->flash('error', 'Image is disabled for slider');
        }
        else {
            $slider->status = 1;
            session()->flash('success', 'Image is enabled for slider');
        }
        $slider->save();
        return redirect()->back();
    }

    public function delete_slider($id)
    {
        $slider = Slider::find($id);
        if (!is_null($slider)) {
            // delete the old image from folder
            if (File::exists($slider->path)) {
                File::delete($slider->path);
            }
            else {
                session()->flash('error', $slider->path.' not found');
                return redirect()->back();
            }
            $slider->delete();
        }
        session()->flash('success', 'Successfully deleted the slider!!');
        return redirect()->back();
    }

    public function add_url(Request $request, $id)
    {
        $slider = Slider::find($id);

        $slider->url = $request->url;

        $slider->save();

        session()->flash('success', 'Successfully added the URl for the slider!!');
        return redirect()->back();
    }

    public function priority(Request $request, $id)
    {
         // Validation
        $validator  = \Validator::make($request->all(), [
            'priority' => 'required|unique:sliders',
        ]);

        if ($validator->fails()) {
            if($request->priority == 0)
            {
                $slider = Slider::find($id);

                $slider->priority = $request->priority;

                $slider->save();

                session()->flash('success', 'Successfully disable the priority');
                return redirect()->back();
            }

            session()->flash('error', 'Oops!! You are trying to use the same priority');
            return redirect()->back();
        }

        $slider = Slider::find($id);

        $slider->priority = $request->priority;

        $slider->save();

        session()->flash('success', 'Successfully set the priority');
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
