@extends('master.admin')
@section('title', 'hoadonnhap')
@section('main')
<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Thêm hóa đơn nhập</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('hoadonnhap.store') }}" method="post">
            @csrf
            <input type="hidden" name="idNhap">
            <div class="form-group">
                <label style="font-size: 14px" for="tenncc">id</label>
                <input class="form-control form-control-lg mb-3" type="text" name="id" id="id">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="Diachi">Số lượng</label>
                <input class="form-control form-control-lg mb-3" type="text" name="SoLuong" id="SoLuong">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="Sdt">Đơn giá</label>
                <input class="form-control form-control-lg mb-3" type="text" name="DonGia" id="DonGia">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="Email">Thahf tiền </label>
                <input class="form-control form-control-lg mb-3" type="ThanhTien" name="Email" id="ThanhTien">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="Ghichu">ProID</label>
                <input class="form-control form-control-lg mb-3" type="text" name="ProID" id="ProID">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="Ghichu">ProName</label>
                <input class="form-control form-control-lg mb-3" type="text" name="ProName" id="ProName">
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</div>
@endsection
