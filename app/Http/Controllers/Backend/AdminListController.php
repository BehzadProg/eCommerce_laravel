<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\AdminListDataTable;

class AdminListController extends Controller
{
    public function index(AdminListDataTable $dataTable)
    {
        return $dataTable->render('admin.admin-list.index');
    }

    public function changeStatus(Request $request)
    {
        $admin = User::findOrFail($request->id);
        $admin->status = $request->status == 'true' ? 'active' : 'inactive';
        $admin->save();

        return response(['message' => 'status updated successfully']);
    }

    public function destroy(string $id)
    {
        $admin = User::findOrFail($id);

        $product = Product::where('vendor_id' , $admin->vendor->id)->get();
        if(count($product) > 0){
            return response(['status' => 'error' ,'message' => 'Admin can\'t be deleted Please ban the user insted of delete!']);
        }

        Vendor::where('user_id' , $admin->id)->delete();
        $admin->delete();
        
        return response(['status' => 'success' ,'message' => 'Account Deleted Successfully']);
    }
}
