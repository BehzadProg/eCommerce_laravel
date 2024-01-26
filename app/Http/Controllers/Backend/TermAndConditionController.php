<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TermAndCondition;
use Illuminate\Http\Request;

class TermAndConditionController extends Controller
{
    public function index(){
        $condition = TermAndCondition::first();
        return view('admin.termAndContion.index' , compact('condition'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required'
        ]);

        TermAndCondition::updateOrCreate(
            ['id' => 1],
            [
                'content' => $request->content
            ]
        );

        toastr()->success('updated Successfully');
        return redirect()->back();
    }
}
