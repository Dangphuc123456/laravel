@extends('master.admin')
@section('title', 'ctnv')
@section('main')

 <div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white user"></i><span class="break"></span>Chi tiết nhan viên : {{$EmpID}}</h2>
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
                    <td>EmpID:</td>      
                    <td>{{$EmpID}}</td>            
                </tr>
                <tr>
                    <td>EmpName:</td>      
                    <td>{{$EmpName}}</td>            
                </tr>
                <tr>
                    <td>EmpAddress:</td>      
                    <td>{{$EmpAddress}}</td>            
                </tr>
                <tr>
                    <td>EmpPhone:</td>      
                    <td>{{$EmpPhone}}</td>            
                </tr>
                <tr>
                    <td>EmpEmail:</td>      
                    <td>{{$EmpEmail}}</td>            
                </tr>
                <tr>
                    <td>EmpPosition:</td>      
                    <td>{{$EmpPosition}}</td>            
                </tr>
                <tr>
                    <td>EmpSalary:</td>      
                    <td>{{$EmpSalary}}</td>            
                </tr>
                <tr>
                    <td>EmpStartDate:</td>      
                    <td>{{$EmpStartDate}}</td>            
                </tr>
                <tr>
                    <td>EmpEndDate:</td>      
                    <td>{{$EmpEndDate}}</td>            
                </tr>
                <tr>
                    <td>EmpImage:</td>      
                    <td><img src="/anh/{{$EmpImage}}" alt="" style="width:200px;"></td>            
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