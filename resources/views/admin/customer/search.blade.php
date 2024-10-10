@extends('master.admin')
@section('title', 'Customer')
@section('main')
<div>
    <div>
        <a href="{{ route('admin.customer.index') }}">
            <button class="btn btn-primary me-2">
                <i class="fas fa-arrow-left"></i>
            </button>
        </a>
    </div>
    <div style="float: right;">
        <form method="GET" action="{{ route('customer.search') }}" class="d-flex ms-auto">
            <input name="keyword" class="form-control me-2" type="text" placeholder="Search" required style="width: auto;">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </form>
    </div>
</div>
<h2>Kết quả cho "{{ $keyword ?? '' }}"</h2>
@if(isset($customer) && $customer->isEmpty())
<p>No customers found.</p>
@else
<div class="container-fluid pt-4 px-4" style="background-color: white;">
    <div class="box span12">
        <div class="table-responsive">
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
                        <td>{{ $i++ }}</td>
                        <td>{{ $sp->CusName }}</td>
                        <td>{{ $sp->CusAddress }}</td>
                        <td>{{ $sp->CusEmail }}</td>
                        <td>{{ $sp->UserName }}</td>
                        <td>
                            <a href="{{ route('customer.destroy', $sp->CusID) }}" class="btn btn-danger" style="color: black;" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection