<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = OrderModel::all();
        return view('admin.order.index', compact('orders'));
    }

    public function confirm($id)
    {
        $order = OrderModel::where('OrdID', $id)->firstOrFail();

        $order->Status = 'Đã xác nhận';

        $order->save();

        return redirect()->route('admin.order.index')->with('success', 'Đơn hàng đã được xác nhận.');
    }


    public function cancel($id)
    {
        $order = OrderModel::findOrFail($id);
        $order->Status = 'Đã hủy';
        $order->save();

        return redirect()->route('admin.order.index')->with('success', 'Đơn hàng đã bị hủy.');
    }

    public function show(string $OrdID)
{
    $order = OrderModel::where('OrdID', $OrdID)->first();

    if (!$order) {
        // Xử lý khi không tìm thấy đơn hàng với OrdID tương ứng
        return abort(404); // Trả về trang lỗi 404
    }

    $CusID = $order->CusID;
    $EmpID = $order->EmpID;
    $Name = $order->Name;
    $OrderDate = $order->OrderDate;
    $Status = $order->Status;
    $Address = $order->Address;
    $Phone = $order->Phone;
    $MoneyTotal = $order->MoneyTotal;
    $Note = $order->Note;
    $Email = $order->Email;
    $Payment = $order->Payment;
    $created_at = $order->created_at;
    $updated_at = $order->updated_at;

    return view('admin.order.detail', compact('order', 'OrdID', 'CusID', 'EmpID', 'Name', 'OrderDate', 'Status', 'Address', 'Phone', 'MoneyTotal', 'Note', 'Email', 'Payment', 'created_at', 'updated_at'));
}

}
