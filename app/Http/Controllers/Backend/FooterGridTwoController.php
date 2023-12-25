<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FooterGridTwoDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterGridTwo;
use App\Models\FooterTitle;
use Illuminate\Http\Request;

class FooterGridTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterGridTwoDataTable $dataTable)
    {
        $footerTitle = FooterTitle::first();
        return $dataTable->render('admin.footer.footer-grid-two.index' , compact('footerTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.footer-grid-two.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'url' => 'required|url',
            'status' => 'required',
        ]);

        $footerGridTwo = new FooterGridTwo();
        $footerGridTwo->name = $request->name;
        $footerGridTwo->url = $request->url;
        $footerGridTwo->status = $request->status;
        $footerGridTwo->save();

        toastr('Created Successfully', 'success');

        return redirect()->route('admin.footer-grid-two.index');
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
    public function edit(string $id)
    {
        $footerGridTwo = FooterGridTwo::findOrFail($id);
        return view('admin.footer.footer-grid-two.edit', compact('footerGridTwo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:200',
            'url' => 'required|url',
            'status' => 'required',
        ]);

        $footerGridTwo =  FooterGridTwo::findOrFail($id);
        $footerGridTwo->name = $request->name;
        $footerGridTwo->url = $request->url;
        $footerGridTwo->status = $request->status;
        $footerGridTwo->save();

        toastr('Updated Successfully', 'success');

        return redirect()->route('admin.footer-grid-two.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $footerGridTwo =  FooterGridTwo::findOrFail($id);
        $footerGridTwo->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully']);
    }

    public function changeStatus(Request $request)
    {
        $footerGridTwo =  FooterGridTwo::findOrFail($request->id);
        $footerGridTwo->status = $request->status == 'true' ? 1 : 0;
        $footerGridTwo->save();

        return response(['message' => 'status updated successfully']);
    }

    public function changeGridTwoTitle(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200',
        ]);

        FooterTitle::updateOrCreate(
            ['id' => 1],
            [
                'footer_grid_two_title' => $request->title
            ]
        );

        toastr('Title Updated Successfully', 'success');

        return redirect()->back();
    }
}
