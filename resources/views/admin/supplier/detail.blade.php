@extends('master.admin')
@section('title', 'product detail')
@section('main')

 <div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white user"></i><span class="break"></span>Chi tiết nhà cung cấp : {{$id}}</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
    </div>
    <div class="box-content">
        <!-- <table class="table table-striped table-bordered bootstrap-datatable datatable"> -->
        <table>
            <thead>
                <tr>
                    <td>id:</td>      
                    <td>{{$id}}</td>            
                </tr>
                <tr>
                    <td>tenncc:</td>      
                    <td>{{$tenncc}}</td>            
                </tr>
                <tr>
                    <td>Diachi:</td>      
                    <td>{{$Diachi}}</td>            
                </tr>
                <tr>
                    <td>Sdt:</td>      
                    <td>{{$Sdt}}</td>            
                </tr>
                <tr>
                    <td>Email:</td>      
                    <td>{{$Email}}</td>            
                </tr>
                <tr>
                    <td>Ghichu:</td>      
                    <td>{{$Ghichu}}</td>            
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