<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\FlashSale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\FlashSaleItemDataTable;
use App\Models\FlashSaleItem;

class FlashSaleController extends Controller
{
    public function index(FlashSaleItemDataTable $dataTable){
        $flashSale = FlashSale::first();
        $products = Product::where('is_approved' , 1)->where('status' , 1)->orderBy('id' , 'DESC')->get();
        return $dataTable->render('admin.flash-sale.index' , compact('flashSale' , 'products'));
    }

    public function updateDate(Request $request){
        $request->validate([
            'end_date' => 'required'
        ]);

        FlashSale::updateOrCreate(
            ['id' => 1],
            ['end_date' => $request->end_date]
        );

        toastr('Updated Successfully' , 'success');

        return redirect()->back();
    }

    public function addProduct(Request $request) {
        $request->validate([
            'product' => 'required|unique:flash_sale_items,product_id',
            'show_at_home' => 'required',
            'status' => 'required'
        ],[
            'product.unique' => 'This Product is already in flash sale!'
        ]);

        $flashSale = FlashSale::first();
        $flashSaleItem = new FlashSaleItem();
        $flashSaleItem->product_id = $request->product_id;
        $flashSaleItem->flash_sale_id = $flashSale->id;
        $flashSaleItem->show_at_home = $request->show_at_home;
        $flashSaleItem->status = $request->status;
        $flashSaleItem->save();

        toastr('Product Added Successfully' , 'success');

        return redirect()->back();
    }

    public function changeStatus(Request $request)
    {
        $flashSaleItem = FlashSaleItem::findOrFail($request->id);
        $flashSaleItem->status = $request->status == 'true' ? 1 : 0;
        $flashSaleItem->save();

        return response(['message' => 'status updated successfully']);
    }

    public function changeShowAtHome(Request $request)
    {
        $flashSaleItem = FlashSaleItem::findOrFail($request->id);
        $flashSaleItem->show_at_home = $request->status == 'true' ? 1 : 0;
        $flashSaleItem->save();

        return response(['message' => 'Show at home updated successfully']);
    }

    public function destroy(string $id)  {
        $flashSaleItem = FlashSaleItem::findOrFail($id);
        $flashSaleItem->delete();
        return response(['status' => 'success' , 'message' => 'Deleted Successfully']);
    }
}
