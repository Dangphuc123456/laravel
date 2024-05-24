@extends('master.admin')
@section('title', 'gioithieu')
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
          <div class="table-responsive p-3">
            <table class="table text-start align-middle table-bordered table-hover mb-0" style="background-color: white; color: black;" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th scope="col">TT</th>
                  <th scope="col">Nội dung</th>
                  <th scope="col">Ảnh</th>
                  <th scope="col">Chi tiết</th>
                  <th scope="col">Sửa</th>
                </tr>
              </thead>
              <tbody>
                @php $i = 1; @endphp
                @foreach ($gt as $sp)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$sp-> topic}}</td>
                    <td><img src="/anh/{{$sp->image}}"  alt="" style="width: 100px; height: 100px"></td>
                    <td><a href="{{ route('admin.gioithieu.detail',$sp->id) }}" class="btn btn-primary" style="color:black;">Chi tiết</a></td>
                    <td><a href="{{ route('admin.gioithieu.edit', $sp->id) }}" class="btn btn-warning" style="color: black;">Edit</a> </td> 
                </tr>                    
                @endforeach               
              </tbody>
            </table>
          </div>
        <!-- </div> -->
      </div> 
    </div>
@endsection
