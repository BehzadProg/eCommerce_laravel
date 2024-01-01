<?php

namespace App\Http\Controllers\Backend;

use App\Models\FooterTitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\FooterGridThreeDataTable;
use App\Models\FooterGridThree;

class FooterGridThreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterGridThreeDataTable $dataTable)
    {
        $footerTitle = FooterTitle::first();
        return $dataTable->render('admin.footer.footer-grid-three.index' , compact('footerTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.footer-grid-three.create');
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

        $footerGridThree = new FooterGridThree();
        $footerGridThree->name = $request->name;
        $footerGridThree->url = $request->url;
        $footerGridThree->status = $request->status;
        $footerGridThree->save();

        toastr('Created Successfully', 'success');

        return redirect()->route('admin.footer-grid-three.index');
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
        $footerGridThree = FooterGridThree::findOrFail($id);
        return view('admin.footer.footer-grid-three.edit', compact('footerGridThree'));
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

        $footerGridThree = FooterGridThree::findOrFail($id);
        $footerGridThree->name = $request->name;
        $footerGridThree->url = $request->url;
        $footerGridThree->status = $request->status;
        $footerGridThree->save();

        toastr('Updated Successfully', 'success');

        return redirect()->route('admin.footer-grid-three.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $footerGridThree =  FooterGridThree::findOrFail($id);
        $footerGridThree->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully']);
    }

    public function changeStatus(Request $request)
    {
        $footerGridThree = FooterGridThree::findOrFail($request->id);
        $footerGridThree->status = $request->status == 'true' ? 1 : 0;
        $footerGridThree->save();

        return response(['message' => 'status updated successfully']);
    }

    public function changeGridThreeTitle(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200',
        ]);

        FooterTitle::updateOrCreate(
            ['id' => 1],
            [
                'footer_grid_three_title' => $request->title
            ]
        );

        toastr('Title Updated Successfully', 'success');

        return redirect()->back();
    }
}
