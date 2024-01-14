<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'string|max:200',
            'title' => 'required|max:200',
            'banner' => 'required|image|max:2000',
            'btn_text' => 'max:200',
            'btn_url' => 'url|nullable',
            'priority' => 'required|integer|unique:sliders,priority',
            'status' => 'required',
        ]);

        $slider = new Slider();
        $imagePath = handleUpload('banner' , null , env('SLIDER_IMAGE_UPLOAD_PATH') , 'Slider');
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->banner = $imagePath;
        $slider->btn_text = $request->btn_text;
        $slider->btn_url = $request->btn_url;
        $slider->priority = $request->priority;
        $slider->status = $request->status;
        $slider->save();

        toastr('Slider Created Successfully' , 'success');
        return redirect()->route('admin.slider.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit' , compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'string|max:200',
            'title' => 'required|max:200',
            'banner' => 'image|max:2000',
            'btn_text' => 'max:200',
            'btn_url' => 'url|nullable',
            'priority' => 'required|integer|unique:sliders,priority',
            'status' => 'required',
        ]);

        $slider = Slider::findOrFail($id);
        $imagePath = handleUpload('banner' , $slider , env('SLIDER_IMAGE_UPLOAD_PATH') , 'Slider');
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->banner = (!empty($imagePath) ? $imagePath : $slider->banner);
        $slider->btn_text = $request->btn_text;
        $slider->btn_url = $request->btn_url;
        $slider->priority = $request->priority;
        $slider->status = $request->status;
        $slider->save();

        toastr('Slider Updated Successfully' , 'success');
        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        deleteFileIfExist(env('SLIDER_IMAGE_UPLOAD_PATH').$slider->banner);
        $slider->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
