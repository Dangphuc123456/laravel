@extends('master.admin')
@section('title', 'Product')
@section('main')
<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Thêm nhà cung cấp</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('supplier.store') }}" method="post">
            @csrf
            <input type="hidden" name="id">
            <div class="form-group">
                <label style="font-size: 14px" for="tenncc">Tên NCC</label>
                <input class="form-control form-control-lg mb-3" type="text" name="tenncc" id="tenncc">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="Diachi">Địa chỉ</label>
                <input class="form-control form-control-lg mb-3" type="text" name="Diachi" id="Diachi">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="Sdt">Số điện thoại</label>
                <input class="form-control form-control-lg mb-3" type="text" name="Sdt" id="Sdt">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="Email">Email</label>
                <input class="form-control form-control-lg mb-3" type="email" name="Email" id="Email">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="Ghichu">Ghi chú</label>
                <input class="form-control form-control-lg mb-3" type="text" name="Ghichu" id="Ghichu">
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</div>
@endsection
