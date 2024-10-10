@extends('master.admin')
@section('title', 'Xác nhận đơn hàng')
@section('main')
<div class="container">
    <h1>Đơn đã giao</h1>
    <form action="{{ route('admin.order.delivered', ['id' => $order->OrdID]) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Đã giao thành công </button>
    </form>
    <a href="{{ route('admin.order.index') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection
