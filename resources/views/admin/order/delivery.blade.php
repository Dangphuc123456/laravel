@extends('master.admin')
@section('title', 'Xác nhận đơn hàng')
@section('main')
<div class="container">
    <h1>Đơn đang giao</h1>
    <form action="{{ route('admin.order.delivery', ['id' => $order->OrdID]) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Đang giao hàng  </button>
    </form>
    <a href="{{ route('admin.order.index') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection
