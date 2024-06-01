@extends('master.admin')
@section('title', 'hoadonnhap')
@section('main')
<div class="container-fluid pt-4 px-4" style="background-color: white;">
    <div class="box span12">
        <div class="container-fluid pt-4 px-4">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
          <div class="table-responsive">
          <p style="color: black;float:right"><a class=" btn btn-sm btn-primary" href="{{route('admin.hoadonnhap.create')}}">Thêm</a></p>
          <div class="table-responsive p-3">
            <table class="table text-start align-middle table-bordered table-hover mb-0" style="background-color: white; color: black;" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th scope="col">TT</th>
                  <th scope="col">Mã nhà cung cấp</th>
                  <th scope="col">Tổng tiền</th>
                  <th scope="col">Chi tiết</th>
                  <th scope="col">Xóa</th>
                </tr>
              </thead>
              <tbody>
                @php $i = 1; @endphp
                @foreach ($hoadonnhap as $sp)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$sp-> id}}</td>
                    <td>{{$sp-> TongTien}}</td>
                    <td><a href="{{ route('admin.hoadonnhap.detail',$sp->idNhap) }}" class="btn btn-primary" style="color:black;">Chi tiết</a></td>
                    <td><a href="{{route('hoadonnhap.destroy',$sp->idNhap)}}" class="btn btn-danger" style="color: black;" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a></td>                                                                
                </tr>                    
                @endforeach               
              </tbody>
            </table>
          </div>
       </div> 
    </div>
    
@endsection
