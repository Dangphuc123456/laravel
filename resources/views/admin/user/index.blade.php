@extends('master.admin')
@section('title', 'user')
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
          <p style="color: black;float:right"><a class=" btn btn-sm btn-primary" href="{{route('admin.product.create')}}">Thêm</a></p>
          <div class="table-responsive p-3">
            <table class="table text-start align-middle table-bordered table-hover mb-0" style="background-color: white; color: black;" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th scope="col">TT</th>
                  <th scope="col">Tên tài khoản</th>
                  <th scope="col">Email</th>
                  <th scope="col">Mật khẩu</th>
                  <th scope="col">Xóa</th>
                </tr>
              </thead>
              <tbody>
                @php $i = 1; @endphp
                @foreach ($user as $item)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item-> username}}</td>
                    <td>{{$item-> email}}</td>
                    <td>{{$item->password}}</td>
                    <td><a href="{{route('user.destroy',$item->id)}}" class="btn btn-danger" style="color: black;" onclick="return confirm('Bạn có muốn xóa tài khoản này không?')">Xoá</a></td>                                                                
                </tr>                    
                @endforeach               
              </tbody>
            </table>
          </div>
        <!-- </div> -->
      </div> 
    </div>
@endsection
