@extends('master.admin')
@section('title', 'customer')
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
          <div class="table-responsive p-3">
            <table class="table text-start align-middle table-bordered table-hover mb-0" style="background-color: white; color: black;" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th scope="col">TT</th>
                  <th scope="col">Tên khách</th>
                  <th scope="col">Địa chỉ</th>
                  <th scope="col">Email</th>
                  <th scope="col">Tên tài khoản</th>
                  <th scope="col">Xóa</th>
                </tr>
              </thead>
              <tbody>
                @php $i = 1; @endphp
                @foreach ($customer as $sp)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$sp-> CusName}}</td>
                    <td>{{$sp-> CusAddress}}</td>
                    <td>{{$sp->CusEmail}}</td>
                    <td>{{$sp->UserName}}</td>
                    <td><a href="{{route('customer.destroy',$sp->CusID)}}" class="btn btn-danger" style="color: black;" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a></td>                                                                
                </tr>                    
                @endforeach               
              </tbody>
            </table>
          </div>
        <!-- </div> -->
      </div> 
    </div>
@endsection
