@extends('master.admin')
@section('title', 'customer')
@section('main')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<form method="GET" action="{{ route('customer.search') }}">
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
          <div class="d-flex justify-content-center pt-4">
              <nav>
                  <ul class="pagination">
                    <!-- Link trang trước -->
                      @if ($customer->onFirstPage())
                          <li class="page-item disabled"><span class="page-link">Trước</span></li>
                      @else
                          <li class="page-item"><a class="page-link" href="{{ $customer->previousPageUrl() }}"><i class="fas fa-arrow-left"></i>Trước</a></li>
                      @endif

                      <!-- Link trang sau -->
                      @if ($customer->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $customer->nextPageUrl() }}">Sau<i class="fas fa-arrow-right"></i></a></li>
                      @else
                          <li class="page-item disabled"><span class="page-link">Sau</span></li>
                      @endif
                  </ul>
              </nav>
          </div>
      </div> 
    </div>
@endsection
