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
          <div class="table-responsive">
          <p style="color: black;float:right"><a class=" btn btn-sm btn-primary" href="{{route('admin.product.create')}}">Thêm</a></p>
          <div class="table-responsive p-3">
            <table class="table text-start align-middle table-bordered table-hover mb-0" style="background-color: white; color: black;" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th scope="col">TT</th>
                  <th scope="col">Tên Sản Phẩm</th>
                  <th scope="col">Trạng thái</th>
                  <th scope="col">Chi tiết</th>
                  <th scope="col">Ảnh</th>
                  <th scope="col">Size</th>
                  <th scope="col">Sửa</th>
                  <th scope="col">Xóa</th>
                </tr>
              </thead>
              <tbody>
                @php $i = 1; @endphp
                @foreach ($product as $sp)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$sp-> ProName}}</td>
                    <td><input type="checkbox" {{ $sp->Status ? 'checked' : '' }}></td>
                    <td><a href="{{ route('admin.product.detail',$sp->ProID) }}" class="btn btn-primary" style="color:black;">Chi tiết</a></td>
                    <td><img src="/anh/{{$sp->ProImage}}"  alt="Product Image" style="max-width: 100px;"></td>
                    <td>{{$sp->Size}}</td>
                    <td><a href="{{ route('admin.product.edit', $sp->ProID) }}" class="btn btn-warning" style="color: black;">Edit</a> </td> 
                    <td><a href="{{route('product.destroy',$sp->ProID)}}" class="btn btn-danger" style="color: black;" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a></td>                                                                
                </tr>                    
                @endforeach               
              </tbody>
            </table>
          </div>
       </div> 
    </div>
    
@endsection
