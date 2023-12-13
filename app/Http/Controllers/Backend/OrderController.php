<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CanceledOrderDataTable;
use App\DataTables\DeliveredOrderDataTable;
use App\DataTables\DroppedOffOrderDataTable;
use App\Models\Order;
use Illuminate\Http\Request;
use App\DataTables\OrderDataTable;
use App\DataTables\OutForDeliveryOrderDataTable;
use App\DataTables\PendingOrderDataTable;
use App\DataTables\ProcessedOrderDataTable;
use App\DataTables\ShippedOrderDataTable;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.index');
    }

    public function showPendingOrders(PendingOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.pending-order');
    }

    public function showProcessedOrders(ProcessedOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.processed-order');
    }

    public function showDroppedOffOrders(DroppedOffOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.droppedOff-order');
    }

    public function showShippedOrders(ShippedOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.shipped-order');
    }

    public function showOutForDeliveryOrders(OutForDeliveryOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.outForDelivery-order');
    }

    public function showDeliveredOrders(DeliveredOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.delivered-order');
    }

    public function showCanceledOrders(CanceledOrderDataTable $dataTable)
    {
        return $dataTable->render('admin.order.canceled-order');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.show' , compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changeOrderStatus(Request $request) {
        $order = Order::findOrFail($request->id);
        $order->order_status = $request->status;
        $order->save();

        return response(['status' => 'success' , 'message' => 'Status Updated Successfully']);
    }

    public function changePaymentStatus(Request $request) {
        $paymentStatus = Order::findOrFail($request->id);
        $paymentStatus->payment_status = $request->status;
        $paymentStatus->save();

        return response(['status' => 'success' , 'message' => 'Status Updated Successfully']);
    }
}
