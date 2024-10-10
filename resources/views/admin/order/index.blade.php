@extends('master.admin')
@section('title', 'Quản lý đơn hàng')
@section('main')
<div class="container">
    <h1>Quản lý đơn hàng</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="d-flex justify-content-center pt-4">
        <nav>
            <ul class="pagination">
                <!-- Link trang trước -->
                @if ($orders->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Trước</span></li>
                @else
                <li class="page-item"><a class="page-link" href="{{ $orders->previousPageUrl() }}"><i class="fas fa-arrow-left"></i>Trước</a></li>
                @endif

                <!-- Link trang sau -->
                @if ($orders->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $orders->nextPageUrl() }}">Sau<i class="fas fa-arrow-right"></i></a></li>
                @else
                <li class="page-item disabled"><span class="page-link">Sau</span></li>
                @endif
            </ul>
        </nav>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Mã Đơn Hàng</th>
                    <th scope="col">Tên Khách Hàng</th>
                    <th scope="col">Email</th>
                    <th scope="col">Địa Chỉ</th>
                    <th scope="col">Số Điện Thoại</th>
                    <th scope="col">Tổng Tiền</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->OrdID }}</td>
                    <td>{{ $order->Name }}</td>
                    <td>{{ $order->Email }}</td>
                    <td>{{ $order->Address }}</td>
                    <td>{{ $order->Phone }}</td>
                    <td>{{ number_format($order->MoneyTotal) }} VND</td>
                    <td>{{ $order->Status }}</td>
                    <td>
                        @if($order->Status != 'Đã hủy')
                        <form action="{{ route('admin.order.confirm', ['id' => $order->OrdID]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Xác nhận</button>
                        </form>

                        <form action="{{ route('admin.order.delivery', ['id' => $order->OrdID]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Đang giao hàng</button>
                        </form>

                        <form action="{{ route('admin.order.delivered', ['id' => $order->OrdID]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Đã Giao</button>
                        </form>
                        @endif

                        <form action="{{ route('admin.order.cancel', ['id' => $order->OrdID]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirmCancel()">Hủy</button>
                        </form>

                        <a href="{{ route('admin.order.show', ['id' => $order->OrdID]) }}" class="btn btn-primary">Chi Tiết</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
<script>
    function confirmCancel() {
        return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?');
    }
</script>