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
            <!-- <div class="bg-secondary text-center rounded p-4" style="color: black;">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Recent Salse</h6>
                    <a href="">Show All</a>
                </div> -->
                <p style="color: black;float:right"><a class=" btn btn-sm btn-primary" href="{{route('admin.category.create')}}">Thêm</a></p>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0" style="background-color: white; color: black;">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col" >Chi tiết</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($category as $sp)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $sp->CatName }}</td>
                                <td><input type="checkbox" {{ $sp->Status ? 'checked' : '' }}></td>
                                <td><a href="{{ route('category.detail',$sp->CatID) }}" class="btn btn-primary" style="color:black;">Chi tiết</a></td>
                                <td><a href="{{ route('category.edit',$sp->CatID) }}" class="btn btn-warning" style="color: black;">Edit</a></td>
                                <td><a href="{{ route('category.destroy',$sp->CatID) }}" class="btn btn-danger" style="color: black;" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection
