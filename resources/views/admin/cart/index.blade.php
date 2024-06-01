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
        </div>
    </div>
</div>
@endsection
