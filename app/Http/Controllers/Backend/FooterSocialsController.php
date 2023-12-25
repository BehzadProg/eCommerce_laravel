<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FooterSocialsDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterSocials;
use Illuminate\Http\Request;

class FooterSocialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterSocialsDataTable $dataTable)
    {
        return $dataTable->render('admin.footer.footer-social.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.footer-social.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|max:200',
            'name' => 'required|max:200',
            'url' => 'required|url',
            'status' => 'required',
        ]);

        $footerSocial = new FooterSocials();
        $footerSocial->icon = $request->icon;
        $footerSocial->name = $request->name;
        $footerSocial->url = $request->url;
        $footerSocial->status = $request->status;
        $footerSocial->save();

        toastr('Created Successfully' , 'success');

        return redirect()->route('admin.footer-social.index');
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
        $footerSocial = FooterSocials::findOrFail($id);
        return view('admin.footer.footer-social.edit' , compact('footerSocial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => 'max:200',
            'name' => 'max:200',
            'url' => 'url',
            'status' => 'required',
        ]);

        $footerSocial = FooterSocials::findOrFail($id);
        $footerSocial->icon = $request->icon;
        $footerSocial->name = $request->name;
        $footerSocial->url = $request->url;
        $footerSocial->status = $request->status;
        $footerSocial->save();

        toastr('Updated Successfully' , 'success');

        return redirect()->route('admin.footer-social.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $footerSocial = FooterSocials::findOrFail($id);
        $footerSocial->delete();

        return response(['status' => 'success' , 'message' => 'Deleted Successfully']);
    }

    public function changeStatus(Request $request){
        $footerSocial = FooterSocials::findOrFail($request->id);
        $footerSocial->status = $request->status == 'true' ? 1 : 0;
        $footerSocial->save();

        return response(['message' => 'status updated successfully']);
    }
}
