@extends('master.admin')
@section('title', 'Sửa nv')

@section('main') 
<div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white user"></i><span class="break"></span>Sửa sản phẩm: {{$employee->EmpID}}</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
    </div>
    <div class="box-content">
        <!-- <table class="table table-striped table-bordered bootstrap-datatable datatable"> -->
        <form action="{{ route('employee.update',['EmpID' => $employee->EmpID])}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="editvalue">
            <input type="hidden" name="EmpID">
            <table>
            <thead>
                <tr>
                    <td>EmpName</td>
                    <td><input type='text' name='EmpName' id='EmpName' value='{{$employee->EmpName}}'></td>                  
                </tr>
                <tr>
                    <td>EmpAddress</td>
                    <td><input type='text' name='EmpAddress' id='EmpAddress' value='{{$employee->EmpAddress}}'></td>                  
                </tr>
                <tr>
                    <td>EmpPhone</td>
                    <td><input type='text' name='EmpPhone' id='EmpPhone' value='{{$employee->EmpPhone}}'></td>                  
                </tr>
                <tr>
                    <td>EmpEmail</td>
                    <td><input type='text' name='EmpEmail' id='EmpEmail' value='{{$employee->EmpEmail}}'></td>                  
                </tr>
                <tr>
                    <td>EmpPosition</td>
                    <td><input type='text' name='EmpPosition' id='EmpPosition' value='{{$employee->EmpPosition}}'></td>                  
                </tr>
                <tr>
                    <td>EmpSalary</td>
                    <td><input type='text' name='EmpSalary' id='EmpSalary' value='{{$employee->EmpSalary}}'></td>                  
                </tr>
                <tr>
                    <td>EmpStartDate</td>
                    <td><input type='text' name='EmpStartDate' id='EmpStartDate' value='{{$employee->EmpStartDate}}'></td>                  
                </tr>
                <tr>
                    <td>EmpEndDate</td>
                    <td><input type='text' name='EmpEndDate' id='EmpEndDate' value='{{$employee->EmpEndDate}}'></td>                  
                </tr>
                <tr>
                    <td>EmpImage</td>
                    <td><input type='file' name='EmpImage' id='EmpImage' value='{{$employee->EmpImage}}'></td>                  
                </tr>
                   
                <tr>
                    <td>created_at</td>
                    <td><input type='text' name='created_at' id='created_at' value='{{$employee->created_at}}'></td>                  
                </tr>
                <tr>
                    <td>updated_at</td>
                    <td><input type='text' name='updated_at' id='updated_at' value='{{$employee->updated_at}}'></td>                  
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
