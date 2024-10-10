@extends('master.admin')
@section('title', 'Supplier')
@section('main')
    <div class="container">
        <h1 class="text-center my-4">Thống kê bán hàng</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        <h2>Thống kê bán theo ngày</h2>
                    </div>
                    <div class="card-body">
                        <p>Tổng số sản phẩm được bán: {{ $dailyStatistics->total_products ?? '0' }}</p>
                        <p>Tổng doanh thu: {{ number_format($dailyStatistics->total_revenue ?? 0) }}tr</p>
                        <p>Tổng số đơn hàng đã bán: {{ $dailyOrderCount->total_orders ?? '0' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        <h2>Thống kê bán theo tuần</h2>
                    </div>
                    <div class="card-body">
                        <p>Tổng số sản phẩm được bán: {{ $weeklyStatistics->total_products ?? '0' }}</p>
                        <p>Tổng doanh thu: {{ number_format($weeklyStatistics->total_revenue ?? 0) }}tr</p>
                        <p>Tổng số đơn hàng đã bán: {{ $weeklyOrderCount->total_orders ?? '0' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        <h2>Thống kê bán theo tháng</h2>
                    </div>
                    <div class="card-body">
                        <p>Tổng số sản phẩm được bán: {{ $monthlyStatistics->total_products ?? '0' }}</p>
                        <p>Tổng doanh thu: {{ number_format($monthlyStatistics->total_revenue ?? 0) }}tr</p>
                        <p>Tổng số đơn hàng đã bán: {{ $monthlyOrderCount->total_orders ?? '0' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

