@extends('master.admin')

@section('title', 'hoadonnhap')

@section('main')
<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Thêm hóa đơn nhập</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('hoadonnhap.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id">Mã nhà cung cấp:</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="ProName">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="ProName" name="ProName" required>
            </div>
            <div class="form-group">
                <label for="SoLuong">Số lượng:</label>
                <input type="number" class="form-control" id="SoLuong" name="SoLuong" required>
            </div>
            <div class="form-group">
                <label for="DonGia">Đơn giá:</label>
                <input type="number" class="form-control" id="DonGia" name="DonGia" required>
            </div>
            <div class="form-group">
                <label for="TongTien">Tổng Tiền:</label>
                <input type="text" class="form-control" id="TongTien" name="TongTien" readonly>
            </div>
            <div class="form-group">
                <label for="Diachi">Địa chỉ:</label>
                <input type="text" class="form-control" id="Diachi" name="Diachi" required>
            </div>
            <div class="form-group">
                <label for="Sdt">Số điện thoại:</label>
                <input type="text" class="form-control" id="Sdt" name="Sdt" required>
            </div>
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" class="form-control" id="Email" name="Email" required>
            </div>
            <div class="form-group">
                <label for="Ghichu">Ghi chú:</label>
                <textarea class="form-control" id="Ghichu" name="Ghichu"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Thêm </button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const soLuongInput = document.getElementById('SoLuong');
        const donGiaInput = document.getElementById('DonGia');
        const tongTienInput = document.getElementById('TongTien');

        function calculateTotal() {
            const soLuong = parseFloat(soLuongInput.value) || 0;
            const donGia = parseFloat(donGiaInput.value) || 0;
            const tongTien = soLuong * donGia;
            tongTienInput.value = tongTien.toFixed(0); // Ensure no decimal places
        }

        soLuongInput.addEventListener('input', calculateTotal);
        donGiaInput.addEventListener('input', calculateTotal);
    });
</script>
@endsection
