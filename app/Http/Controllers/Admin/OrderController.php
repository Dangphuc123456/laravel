<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = OrderModel::paginate(15);
        return view('admin.order.index', compact('orders'));
    }

    public function confirm($id)
    {
        $order = OrderModel::find($id);

        if ($order) {
            $order->Status = 'Đã xác nhận';
            $order->save();

            return redirect()->route('admin.order.index')->with('success', 'Xác nhận đơn hàng thành công.');
        } else {
            return redirect()->route('admin.orders.index')->with('error', 'Không tìm thấy đơn hàng.');
        }
    }

    public function delivered($id)
    {
        // Find the order by its ID
        $order = OrderModel::findOrFail($id);

        // Update the order status
        $order->update([
            'Status' => 'Đã giao hàng thành công', // Assuming 'Status' is the field indicating the order status
        ]);

        // Optionally, you can save the order after updating
        // $order->save();

        return redirect()->route('admin.order.index')->with('success', 'Đã giao hàng thành công.');
    }
    public function delivery($id)
    {
        // Find the order by its ID
        $order = OrderModel::findOrFail($id);

        // Update the order status
        $order->update([
            'Status' => 'Đang giao hàng', // Assuming 'Status' is the field indicating the order status
        ]);

        // Optionally, you can save the order after updating
        // $order->save();

        return redirect()->route('admin.order.index')->with('success', 'Đơn hàng đã đang được giao.');
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

    public function neworder()
    {
        // Lấy danh sách đơn hàng mới nhất
        $orders = OrderModel::where('Status', 'new')
            ->orderByDesc('created_at')
            ->take(5) // Lấy 5 đơn hàng mới nhất
            ->get();

        // Trả về view và truyền dữ liệu sang view
        return view('admin.order.neworder', compact('orders'));
    }
}
