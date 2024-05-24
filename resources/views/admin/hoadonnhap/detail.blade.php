@extends('master.admin')
@section('title', 'Product Detail')
@section('main')

<div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white user"></i><span class="break"></span>Chi tiết sản phẩm : {{$idNhap}}</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
    </div>
    <div class="box-content">
        <table>
            <thead>
                <tr>
                    <td>idNhap:</td>
                    <td>{{$idNhap}}</td>
                </tr>
                <tr>
                    <td>id:</td>
                    <td>{{$id}}</td>
                </tr>
                <tr>
                    <td>SoLuong:</td>
                    <td>{{$SoLuong}}</td>
                </tr>
                <tr>
                    <td>DonGia:</td>
                    <td>{{$DonGia}}</td>
                </tr>
                <tr>
                    <td>TongTien:</td>
                    <td>{{$TongTien}}</td>
                </tr>
                <tr>
                    <td>ProName:</td>
                    <td>{{$ProName}}</td>
                </tr>
                <tr>
                    <td>created_at:</td>
                    <td>{{$created_at}}</td>
                </tr>
                <tr>
                    <td>updated_at:</td>
                    <td>{{$updated_at}}</td>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection