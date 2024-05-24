@extends('master.admin')
@section('title', 'slide')
@section('main')
<div class="container-fluid pt-4 px-4" style="background-color: white;">
    <div class="box span12">
        <div class="container-fluid pt-4 px-4">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- <div class="bg-secondary text-center rounded p-4" style="color:white;">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Recent Salse</h6>
                    <a href="">Show All</a>
                </div> -->
          <div class="table-responsive">
          <div class="table-responsive p-3">
            <table class="table text-start align-middle table-bordered table-hover mb-0" style="background-color: white; color: black;" id="dataTable">
              <thead class="thead-light">
                <tr>
                  <th scope="col">TT</th>
                  <th scope="col">Slide1</th>
                  <th scope="col">Slide2</th>
                  <th scope="col">Slide3</th>
                  <th scope="col">Slide4</th>
                  <th scope="col">Slide5</th>
                  <th scope="col">Slide6</th>
                  <th scope="col">Sửa</th>
                </tr>
              </thead>
              <tbody>
                @php $i = 1; @endphp
                @foreach ($slide as $sp)
                <tr>
                    <td>{{$i++}}</td>
                    <td><img src="{{ asset('anh/' . $sp->image1) }}"  alt="Product Image" style="width: 130px; height: 120px"></td>
                    <td><img src="{{ asset('anh/' . $sp->image2) }}"  alt="Product Image" style="width: 130px; height: 120px"></td>
                    <td><img src="{{ asset('anh/' . $sp->image3) }}"  alt="Product Image" style="width: 130px; height: 120px"></td>
                    <td><img src="{{ asset('anh/' . $sp->image4) }}"  alt="Product Image" style="width: 130px; height: 120px"></td>
                    <td><img src="{{ asset('anh/' . $sp->image5) }}"  alt="Product Image" style="width: 130px; height: 120px"></td>
                    <td><img src="{{ asset('anh/' . $sp->image6) }}"  alt="Product Image" style="width: 130px; height: 120px"></td>
                    <td><a href="{{ route('admin.slide.edit', $sp->idanh) }}" class="btn btn-warning" style="color: black;">Edit</a> </td>                                                               
                </tr>                    
                @endforeach               
              </tbody>
            </table>
          </div>
        <!-- </div> -->
      </div> 
    </div>
@endsection
