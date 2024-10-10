@extends('master.admin')
@section('title', 'supplier')
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
          <p style="color: black;float:right"><a class=" btn btn-sm btn-primary" href="{{route('admin.supplier.create')}}">Thêm</a></p>
          <div class="table-responsive p-3">
            <table class="table text-start align-middle table-bordered table-hover mb-0" style="background-color: white; color: black;" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th scope="col">TT</th>
                  <th scope="col">Tên nhà cung cấp</th>
                  <th scope="col">Địa chỉ</th>
                  <th scope="col">Chi tiết</th>
                  <th scope="col">Sửa</th>
                  <th scope="col">Xóa</th>
                </tr>
              </thead>
              <tbody>
                @php $i = 1; @endphp
                @foreach ($suppliers as $sp)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$sp-> tenncc}}</td>
                    <td>{{$sp-> Diachi}}</td>
                    <td><a href="{{ route('admin.supplier.detail',$sp->id) }}" class="btn btn-primary" style="color:black;">Chi tiết</a></td>
                    <td><a href="{{ route('admin.supplier.edit', $sp->id) }}" class="btn btn-warning" style="color: black;">Edit</a> </td> 
                    <td><a href="{{route('supplier.destroy',$sp->id)}}" class="btn btn-danger" style="color: black;" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a></td>                                                                
                </tr>                    
                @endforeach               
              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-center pt-4">
              <nav>
                  <ul class="pagination">
                      <!-- Link trang trước -->
                      @if ($suppliers->onFirstPage())
                          <li class="page-item disabled"><span class="page-link">Trước</span></li>
                      @else
                          <li class="page-item"><a class="page-link" href="{{ $suppliers->previousPageUrl() }}"><i class="fas fa-arrow-left"></i>Trước</a></li>
                      @endif

                      <!-- Link trang sau -->
                      @if ($suppliers->hasMorePages())
                          <li class="page-item"><a class="page-link" href="{{ $suppliers->nextPageUrl() }}">Sau<i class="fas fa-arrow-right"></i></a></li>
                      @else
                          <li class="page-item disabled"><span class="page-link">Sau</span></li>
                      @endif
                  </ul>
              </nav>
          </div>
       </div> 
    </div>
    
@endsection
