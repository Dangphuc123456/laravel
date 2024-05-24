@extends('master.admin')
@section('title', 'Sửa sản phẩm')

@section('main') 
<div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white user"></i><span class="break"></span>Sửa sản phẩm: {{$hoadonnhap->idNhap}}</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
    </div>
    <div class="box-content">
        <!-- <table class="table table-striped table-bordered bootstrap-datatable datatable"> -->
        <form action="{{ route('hoadonnhap.update',['idNhap' => $hoadonnhap->idNhap])}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="editvalue">
            <input type="hidden" name="idNhap">
            <table>
            <thead>
                <tr>
                    <td>id</td>
                    <td><input type='text' name='id' id='id' value='{{$hoadonnhap->id}}'></td>                  
                </tr>
                <tr>
                    <td>TongSoTien</td>
                    <td><input type='text' name='TongSoTien' id='TongSoTien' value='{{$hoadonnhap->TongTien}}'></td>                  
                </tr>
                <tr>
                    <td>SoLuong</td>
                    <td><input type='text' name='SoLuong' id='SoLuong' value='{{$hoadonnhap->SoLuong}}'></td>                  
                </tr>
                
                <tr>
                    <td>DonGia</td>
                    <td><input type='text' name='DonGia' id='DonGia' value='{{$hoadonnhap->DonGia}}'></td>                  
                </tr>
                <tr>
                    <td>ProName</td>
                    <td><input type='text' name='ProName' id='ProName' value='{{$hoadonnhap->ProName}}'></td>                  
                </tr>
                
            <thead>
            </table>
            <div class="form-actions">
            <button type="submit" class="btn btn-primary" name="cmd">Save</button>                          
            <button type="reset" class="btn">Cancel</button>
		</div>
        </form>
    </div>
</div>
@endsection
