<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ThongkeCotroller extends Controller
{
    public function index()
    {
        // Lấy ngày hiện tại
        $today = Carbon::today();
        // Lấy ngày đầu tuần và cuối tuần hiện tại
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        // Lấy ngày đầu tháng và cuối tháng hiện tại
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Lấy thống kê hàng ngày
        $dailyStatistics = $this->getStatistics($today->startOfDay(), $today->endOfDay());
        // Lấy thống kê hàng tuần
        $weeklyStatistics = $this->getStatistics($startOfWeek->startOfDay(), $endOfWeek->endOfDay());
        // Lấy thống kê hàng tháng
        $monthlyStatistics = $this->getStatistics($startOfMonth->startOfDay(), $endOfMonth->endOfDay());

        // Lấy số lượng đơn hàng hàng ngày
        $dailyOrderCount = $this->getOrderCount($today, $today->copy()->endOfDay());
        // Lấy số lượng đơn hàng hàng tuần
        $weeklyOrderCount = $this->getOrderCount($startOfWeek, $endOfWeek);
        // Lấy số lượng đơn hàng hàng tháng
        $monthlyOrderCount = $this->getOrderCount($startOfMonth, $endOfMonth);

        // Trả về view với các dữ liệu thống kê
        return view('admin.thongke.index', compact('dailyStatistics', 'weeklyStatistics', 'monthlyStatistics', 'dailyOrderCount', 'weeklyOrderCount', 'monthlyOrderCount'));
    }

    private function getStatistics($startDate, $endDate)
    {
        // Truy vấn cơ sở dữ liệu để lấy tổng số lượng sản phẩm và tổng doanh thu trong khoảng thời gian đã cho
        return DB::table('order')
            ->join('orderdetail', 'order.OrdID', '=', 'orderdetail.OrdID')
            ->select(DB::raw('SUM(orderdetail.Quantity) as total_products'), DB::raw('SUM(orderdetail.Quantity * orderdetail.Price) as total_revenue'))
            // Lọc theo khoảng thời gian
            ->whereBetween('order.OrderDate', [$startDate->toDateString(), $endDate->toDateString()])
            // Lấy kết quả đầu tiên (và duy nhất)
            ->first();
    }

    private function getOrderCount($startDate, $endDate)
    {
        // Truy vấn cơ sở dữ liệu để đếm tổng số đơn hàng trong khoảng thời gian đã cho
        return DB::table('order')
            ->select(DB::raw('COUNT(*) as total_orders'))
            // Lọc theo khoảng thời gian
            ->whereBetween('OrderDate', [$startDate->toDateString(), $endDate->toDateString()])
            // Lấy kết quả đầu tiên (và duy nhất)
            ->first();
    }
}
