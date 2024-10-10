@extends('master.admin')
@section('title', 'product')
@section('main')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<form method="GET" action="{{ route('product.search') }}">
    <input name="keyword" class="form-control d-inline" type="text" placeholder="Search" required style="width: auto; display: inline;">
    <button class="btn btn-outline-secondary" type="submit">Search</button>
</form>


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
                    <td><img src="/anh/{{$sp->ProImage}}"  alt="Product Image" style="max-width: 100px;height:100px"></td>
                    <td><a href="{{ route('admin.product.edit', $sp->ProID) }}" class="btn btn-warning" style="color: black;">Edit</a> </td> 
                    <td><a href="{{route('product.destroy',$sp->ProID)}}" class="btn btn-danger" style="color: black;" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a></td>                                                                
                </tr>                    
                @endforeach               
              </tbody>
            </table>
          </div>
          <!-- Phân trang -->
          <div class="d-flex justify-content-center pt-4">
              <nav>
                  <ul class="pagination">
                      <!-- Link trang trước -->
                      @if ($product->onFirstPage())
                          <li class="page-item disabled"><span class="page-link">Trước</span></li>
                      @else
                          <li class="page-item"><a class="page-link" href="{{ $product->previousPageUrl() }}"><i class="fas fa-arrow-left"></i>Trước</a></li>
                      @endif

                      <!-- Link trang sau -->
                      @if ($product->hasMorePages())
                          <li class="page-item"><a class="page-link" href="{{ $product->nextPageUrl() }}">Sau<i class="fas fa-arrow-right"></i></a></li>
                      @else
                          <li class="page-item disabled"><span class="page-link">Sau</span></li>
                      @endif
                  </ul>
              </nav>
          </div>
       </div> 
    </div>
    
@endsection
