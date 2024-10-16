@extends('master.admin')
@section('title', 'Category Manager')
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
                <table class="table text-start align-middle table-bordered table-hover mb-0" style="background-color: white; color: black;">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Mã Khách hàng</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($representativeItems as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->CusID }}</td>
                            <td><input type="checkbox" {{ $item->Status ? 'checked' : '' }}></td>
                            @if($item->CusID)
                               <td><a href="{{ route('admin.cart.detail', ['CusID' => $item->CusID]) }}" class="btn btn-primary" style="color:black;">Chi tiết</a></td>
                            @else
                                <td>N/A</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center pt-4">
              <nav>
                  <ul class="pagination">
                      <!-- Link trang trước -->
                      @if ($Carts->onFirstPage())
                          <li class="page-item disabled"><span class="page-link">Trước</span></li>
                      @else
                          <li class="page-item"><a class="page-link" href="{{ $Carts->previousPageUrl() }}"><i class="fas fa-arrow-left"></i>Trước</a></li>
                      @endif

                      <!-- Link trang sau -->
                      @if ($Carts->hasMorePages())
                          <li class="page-item"><a class="page-link" href="{{ $Carts->nextPageUrl() }}">Sau<i class="fas fa-arrow-right"></i></a></li>
                      @else
                          <li class="page-item disabled"><span class="page-link">Sau</span></li>
                      @endif
                  </ul>
              </nav>
          </div>
        </div>
    </div>
</div>
@endsection
