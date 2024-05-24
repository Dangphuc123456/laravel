@extends('master.admin')
@section('title', 'product')
@section('main')
<div class="container-fluid pt-4 px-4" style="background-color: white;">
    <div class="box span12">
        <div class="container-fluid pt-4 px-4">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- <div class="bg-secondary text-center rounded p-4" style="color:white;">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Recent Salse</h6>
                    <a href="">Show All</a>
                </div> -->
          <div class="table-responsive">
          <p style="color: black;float:right"><a class=" btn btn-sm btn-primary" href="{{route('admin.employee.create')}}">Thêm</a></p>
          <div class="table-responsive p-3">
            <table class="table text-start align-middle table-bordered table-hover mb-0" style="background-color: white; color: black;" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th scope="col">TT</th>
                  <th scope="col">Tên nhân viên</th>
                  <th scope="col">Chi tiết</th>
                  <th scope="col">Ảnh</th>
                  <th scope="col">Email</th>
                  <th scope="col">Sửa</th>
                  <th scope="col">Xóa</th>
                </tr>
              </thead>
              <tbody>
                @php $i = 1; @endphp
                @foreach ($employee as $sp)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$sp-> EmpName}}</td>
                    <td><a href="{{ route('admin.employee.detail',$sp->EmpID) }}" class="btn btn-primary" style="color:black;">Chi tiết</a></td>
                    <td><img src="/anh/{{$sp->EmpImage}}"  alt="employee Image" style="width: 100px; height: 100px"></td>
                    <td>{{$sp->EmpEmail}}</td>
                    <td><a href="{{ route('admin.employee.edit', $sp->EmpID) }}" class="btn btn-warning" style="color: black;">Edit</a> </td> 
                    <td><a href="{{route('employee.destroy',$sp->EmpID)}}" class="btn btn-danger" style="color: black;" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a></td>                                                                
                </tr>                    
                @endforeach               
              </tbody>
            </table>
          </div>
        <!-- </div> -->
      </div> 
    </div>
@endsection
