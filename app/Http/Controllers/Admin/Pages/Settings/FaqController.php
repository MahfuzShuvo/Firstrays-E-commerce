<?php

namespace App\Http\Controllers\Admin\Pages\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq;

class FaqController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $validator  = \Validator::make($request->all(), [
            'faq' => 'required|unique:faqs',
            'ques' => 'required',
            'ans' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    	$faqs = new Faq;

    	$faqs->faq = $request->faq;
    	$faqs->ques = $request->ques;
    	$faqs->ans = $request->ans;
    	$faqs->save();

    	session()->flash('success', 'FAQ added successfully');
    	return redirect()->back();
    }

    public function delete_faqs($id)
    {
        $faq = Faq::find($id);
        
        $faq->delete();

        session()->flash('success', 'Successfully deleted the FAQ!!');
        return redirect()->back();
    }

    public function edit_faqs(Request $request, $id)
    {

    	$faqs = Faq::find($id);

    	$faqs->faq = $request->faq;
    	$faqs->ques = $request->ques;
    	$faqs->ans = $request->ans;

    	$faqs->save();


        session()->flash('success', 'Successfully updated the FAQ!!');
        return redirect('/faqs');
    }
}
