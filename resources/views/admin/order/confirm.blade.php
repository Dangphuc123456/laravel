@extends('master.admin')
@section('title', 'Xác nhận đơn hàng')
@section('main')
<div class="container">
    <h1>Xác nhận đơn hàng</h1>
    <p>Bạn có chắc chắn muốn xác nhận đơn hàng này?</p>
    <form action="{{ route('admin.order.confirm', ['id' => $order->OrdID]) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Xác nhận</button>
    </form>
    <a href="{{ route('admin.order.index') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection
