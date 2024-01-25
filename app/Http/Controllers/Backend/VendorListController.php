<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\VendorListDataTable;

class VendorListController extends Controller
{
    public function index(VendorListDataTable $dataTable) {
        return $dataTable->render('admin.vendor-list.index');
    }

    public function changeStatus(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->status = $request->status == 'true' ? 'active' : 'inactive';
        $user->save();

        return response(['message' => 'status updated successfully']);
    }
}
