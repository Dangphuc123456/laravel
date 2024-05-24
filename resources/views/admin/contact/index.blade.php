@extends('master.admin')
@section('title', 'contact')
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
                  <th scope="col">Email</th>
                  <th scope="col">Chi tiết</th>
                  <th scope="col">Xóa</th>
                </tr>
              </thead>
              <tbody>
                @php $i = 1; @endphp
                @foreach ($contact as $sp)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$sp-> email}}</td>
                    <td><a href="{{ route('admin.contact.detail',$sp->id) }}" class="btn btn-primary" style="color:black;">Chi tiết</a></td>
                    <td><a href="{{route('contact.destroy',$sp->id)}}" class="btn btn-danger" style="color: black;" onclick="return confirm('Bạn có muốn xóa không?')">Xoá</a></td>                                                                
                </tr>                    
                @endforeach               
              </tbody>
            </table>
          </div>
        <!-- </div> -->
      </div> 
    </div>
@endsection
