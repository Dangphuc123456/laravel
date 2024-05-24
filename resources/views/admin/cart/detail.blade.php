@extends('master.admin')
@section('title', 'Customer Cart Detail')
@section('main')
<div class="container-fluid pt-4 px-4" style="background-color: white;">
    <div class="box span12">
        <div class="container-fluid pt-4 px-4">
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0" style="background-color: white; color: black;">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Mã Sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($customerCartItems as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->ProID }}</td>
                            <td>{{ $item->Quantity }}</td>
                            <td>{{ $item->Price }}</td>
                            <td><input type="checkbox" {{ $item->Status ? 'checked' : '' }}></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
