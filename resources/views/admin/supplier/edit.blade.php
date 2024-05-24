@extends('master.admin')
@section('title', 'Sửa sản phẩm')

@section('main') 
<div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white user"></i><span class="break"></span>Sửa sản phẩm: {{$supplier->id}}</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
    </div>
    <div class="box-content">
        <!-- <table class="table table-striped table-bordered bootstrap-datatable datatable"> -->
        <form action="{{ route('supplier.update',['id' => $supplier->id])}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="editvalue">
            <input type="hidden" name="id">
            <table>
            <thead>
                <tr>
                    <td>tenncc</td>
                    <td><input type='text' name='tenncc' id='tenncc' value='{{$supplier->tenncc}}'></td>                  
                </tr>
                <tr>
                    <td>Diachi</td>
                    <td><input type='text' name='Diachi' id='Diachi' value='{{$supplier->Diachi}}'></td>                  
                </tr>
                <tr>
                    <td>Sdt</td>
                    <td><input type='text' name='Sdt' id='Sdt' value='{{$supplier->Sdt}}'></td>                  
                </tr>
                
                <tr>
                    <td>Email</td>
                    <td><input type='text' name='Email' id='Email' value='{{$supplier->Email}}'></td>                  
                </tr>
                <tr>
                    <td>Ghichu</td>
                    <td><input type='text' name='Ghichu' id='Ghichu' value='{{$supplier->Ghichu}}'></td>                  
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
