@extends('master.admin')
@section('title', 'Sửa sản phẩm')

@section('main') 
<div class="box span12">
    <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white user"></i><span class="break"></span>Sửa sản phẩm: {{$slide->idanh}}</h2>
        <div class="box-icon">
            <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
            <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
            <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
    </div>
    <div class="box-content">
        <!-- <table class="table table-striped table-bordered bootstrap-datatable datatable"> -->
        <form action="{{ route('slide.update',['idanh' => $slide->idanh])}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="editvalue">
            <input type="hidden" name="idanh">
            <table>
            <thead>
                <tr>
                    <td>idanh</td>
                    <td><input type='idanh' name='idanh' id='idanh' value='{{$slide->idanh}}'></td>                  
                </tr>
                <tr>
                    <td>image1</td>
                    <td><input type='file' name='image1' id='image1' value='{{$slide->image1}}'></td>                  
                </tr>

                <tr>
                    <td>image2</td>
                    <td><input type='file' name='image2' id='image2' value='{{$slide->image2}}'></td>                  
                </tr>

                <tr>
                    <td>image3</td>
                    <td><input type='file' name='image3' id='image3' value='{{$slide->image3}}'></td>                  
                </tr>
                
                <tr>
                    <td>image4</td>
                    <td><input type='file' name='image4' id='image4' value='{{$slide->image4}}'></td>                  
                </tr>

                <tr>
                    <td>image5</td>
                    <td><input type='file' name='image5' id='image5' value='{{$slide->image5}}'></td>                  
                </tr>

                <tr>
                    <td>image6</td>
                    <td><input type='file' name='image6' id='image6' value='{{$slide->image6}}'></td>                  
                </tr>
            <thead>
            </table>
            <div class="form-actions">
            <button type="submit" class="btn btn-primary" name="cmd">Save</button>                          
            <button type="reset" class="btn">Cancel</button>
		</div>
        </form>
    </div>
</div>
@endsection
