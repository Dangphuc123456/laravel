@extends('master.admin')
@section('title', 'nv')
@section('main')
<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Thêm nhân viên</h6>
    </div>
    <div class="card-body">
    <form action="{{ route('employee.store')}}" method="post">
            @csrf
            <input type="hidden" name="editvalue">
            <input type="hidden" name="EmpID">
        </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">EmpName</label>
                <input class="form-control form-control-lg mb-3" type="text" name="EmpName">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">EmpAddress</label>
                <input class="form-control form-control-lg mb-3" type="text" name="EmpAddress">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">EmpPhone</label>
                <input class="form-control form-control-lg mb-3" type="text" name="EmpPhone">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">EmpEmail</label>
                <input class="form-control form-control-lg mb-3" type="text" name="EmpEmail">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">EmpPosition</label>
                <input class="form-control form-control-lg mb-3" type="text" name="EmpPosition">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">EmpSalary</label>
                <input class="form-control form-control-lg mb-3" type="text" name="EmpSalary">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">EmpStartDate</label>
                <input class="form-control form-control-lg mb-3" type="text" name="EmpStartDate">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">EmpEndDate</label>
                <input class="form-control form-control-lg mb-3" type="text" name="EmpEndDate">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">EmpImage</label>
                <input class="form-control form-control-lg mb-3" type="file" name="EmpImage">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">created_at</label>
                <input class="form-control form-control-lg mb-3" type="text" name="created_at">
            </div>
            <div class="form-group">
                <label style="font-size: 14px" for="exampleInputEmail1">updated_at</label>
                <input class="form-control form-control-lg mb-3" type="text" name="updated_at">
            </div>           
            <button type="submit" class="btn btn-primary">Thêm</button>
      </form>
    </div>
  </div>

@endsection
<!-- @push('ckeditor_footer')
    <script>
        CKEDITOR.replace('Mota')
    </script>
@endpush -->