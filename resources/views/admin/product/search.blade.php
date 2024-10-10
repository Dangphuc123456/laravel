@extends('master.admin')
@section('title', 'Sửa sản phẩm')

@section('main')

<div class="container">
    <div>
        <a href="{{ route('admin.product.index') }}">
            <button class="btn btn-primary me-2">
                <i class="fas fa-arrow-left"></i>
            </button>
        </a>
    </div>
    <div style="float: right;">
        <form method="GET" action="{{ route('product.search') }}" class="d-flex ms-auto">
            <input name="keyword" class="form-control me-2" type="text" placeholder="Search" required style="width: auto;">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </form>
    </div>
    <h2>Kết quả cho "{{ $keyword ?? '' }}"</h2>
    @if(isset($products) && $products->isEmpty())
    <p>No products found.</p>
    @else
    <table class="table">
        <thead>
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
                <td><img src="/anh/{{$sp->ProImage}}" alt="Product Image" style="max-width: 100px;height:100px"></td>
                <td><a href="{{ route('admin.product.edit', $sp->ProID) }}" class="btn btn-warning" style="color: black;">Edit</a> </td>
                <td><a href="{{route('product.destroy',$sp->ProID)}}" class="btn btn-danger" style="color: black;" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection